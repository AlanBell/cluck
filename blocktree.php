<?php
//this represents a generic blockly block, it will perhaps be subclassed for specific different blocks
//the idea is you construct it by giving it a datastructure which is the result of parsing the stored
//json version of the xml DOM of the diagram
//it then constructs the subtree below it as properties
//you can then query the tree and get different stuff back, including evaulation of nodes that produce an output
//a block may have
//field(s) - internal values
//value(s) - jigsaw connectors
//statement(s) - these are not arrays, a statement connects to just the top block it contains, basically the top of a linked list
//next - if this block is in a statement this connects to one next block.
//this class is supposed to be a lightweight fast parser, it won't fully execute the blockly code
//it is for grabbing text out of the tree, so it will evaluate simple text operations, but this is never intended to do complicated stuff with blocks
//think of it more like an xpath for picking specific information out of a diagram
function is_assoc($array) {
    //sometimes there is a single block, sometimes an array, this helps figure out which is which
    return (bool)count(array_filter(array_keys($array), 'is_string'));
}
function arr_get($array, $key, $default = "") {
    return isset($array[$key]) ? $array[$key] : $default; //if it is set, but is blank then we return blank, so not using the ternary shortcut ?: here
    
}
class blocklyblock {
    public $fields;
    public $values;
    public $statements;
    public $next;
    public $_type;
    public $root;
    function __construct($blocktree) {
        if (array_key_exists('_type', $blocktree)) {
            //this is a block of some kind
            $this->_type = $blocktree['_type'];
            if (array_key_exists('field', $blocktree)) {
                if (is_assoc($blocktree['field'])) {
                    $field = $blocktree['field'];
                    $this->fields[$field['_name']] = $field['__text'];
                } else {
                    foreach ($blocktree['field'] as $field) {
                        $this->fields[$field['_name']] = $field['__text'];
                    }
                }
            }
            if (array_key_exists('value', $blocktree)) {
                if (is_assoc($blocktree['value'])) {
                    $value = $blocktree['value'];
                    $this->values[$value['_name']] = new blocklyblock($value['block']);
                } else {
                    foreach ($blocktree['value'] as $value) {
                        $this->values[$value['_name']] = new blocklyblock($value['block']);
                    }
                }
            }
            if (array_key_exists('statement', $blocktree)) {
                if (is_assoc($blocktree['statement'])) {
                    $statement = $blocktree['statement'];
                    $this->statements[$statement['_name']] = new blocklyblock($statement['block']);
                } else {
                    foreach ($blocktree['statement'] as $statement) {
                        $this->statements[$statement['_name']] = new blocklyblock($statement['block']);
                    }
                }
            }
            if (array_key_exists('next', $blocktree)) {
                $this->next = new blocklyblock($blocktree['next']['block']);
            }
        } else {
            //this might be the root workspace which could contain multiple blocks
            //in essence each one can be treated as a statement of this top block
            $this->_type = "workspace";
            foreach ($blocktree as $block) {
                $this->root[] = new blocklyblock($block);
            }
        }
    }
    public function __toString() {
        //this is what happens if you echo a block, it should be overridden
        //by the different types of block
        //probably should do this with class inheritance, but for now a switch will do the job
        switch ($this->_type) {
            case "text":
            case "math_number":
                $retval = $this->fields['TEXT'];
            break;
            case "static_text":
                $retval = "{$this->fields['static']}{$this->next}";
            break;
            case "expected":
                $retval = "formula";
            break;
            case "test":
                $retval = "test of {$this->values['range']} on {$this->values['sheet']} for \"{$this->values['expected']}\"";
            break;
            case "expectation":
                $retval = "{$this->statements['formula']}";
            break;
            case "cell_reference":
                $retval = "{$this->values['Column']}{$this->values['Row']}{$this->next}";
            break;
            case "row_offset":
                $retval = "(myrow+{$this->values['Offset']})";
            break;
            case "column_offset":
                $offset = arr_get($this->values, "offset");
                $retval = "(mycol+$offset)";
            break;
            case "workspace":
                $retval = "workspace{$this->root[0]}";
            break;
            default:
                //no idea what this is, so lets just return the next thing if it is in a statement block
                $retval = "{$this->next}";
        }
        //there is a chance that something set retval to null, but we can only return a string.
        if (isset($retval)) {
            return $retval;
        } else {
            return "";
        }
    }
    function getpath($path) {
        //path is an array of values referencing a point in the tree, we need to navigate through the tree by delegating, and then return a getvalue of the end node
        $findnode = array_shift($path); //pop the first value off the path, we will pass the rest of the path into the delegated object when we find it
        if (isset($findnode)) {
            //each path is a reference into one of our arrays
            if (array_key_exists($findnode, $this->root)) {
                return $this->root[$findnode]->getpath($path);
            } elseif (array_key_exists($findnode, $this->values)) {
                return $this->values[$findnode]->getpath($path);
            } elseif (array_key_exists($findnode, $this->statements)) {
                return $this->statements[$findnode]->getpath($path);
            }
            //we don't go looking down 'next', that isn't path referenceable for the purpose of getting a text value
            
        } else {
            //we reached the end of the path, return what we have.
            return "$this";
        }
    }
}
