<?php
// this is for parsing bits out of blockly structures that are in data fields
require_once ('blocktree.php');
//these functions are used to grab design structure items
function getvalue($valuename, $content) {
    foreach ($content as $block) {
        if ($block['_name'] == $valuename) {
            return render($block);
        }
    }
    //so it wasn't found at that level,maybe we have an array of values
    foreach ($content as $subcontent) {
        foreach ($subcontent as $block) {
            if ($block['_name'] == $valuename) {
                return render($block);
            }
        }
    }
    if (is_array($content) && !(bool)count(array_filter(array_keys($content), 'is_string'))) {
        //this is not an associative array, we need to render the component parts in sequence
        //this is used for lists of layouts, like fields
        echo "array of content";
    }
}
function getstatement($valuename, $content) {
    foreach ($content as $block) {
        if ($block['_name'] == $valuename) {
            return ($block);
        }
    }
}
function render($content, $collection = false, $object = false, $mode = "edit") {
    //this attempts to produce and return some bootstrap friendly html
    //it calls itself recursively rather a lot
    //it parses blockly blocks rather a lot of the time
    //some context may be read from the _$REQUEST, in particular a collection and an object id
    //this context may be overriden for certain sections of the page.
    if (is_array($content) && !(bool)count(array_filter(array_keys($content), 'is_string'))) {
        //this is not an associative array, we need to render the component parts in sequence
        //this is used for lists of layouts, like fields
        foreach ($content as $subunit) {
            $html.= render($subunit, $collection, $object, $mode);
        }
        return $html;
    }
    if (array_key_exists("block", $content)) {
        //this is a block we are rendering
        //blocks are recursively rendered
        //the function to render a block is in a plugin, so we require it's code once and call the rendering function
        //for the plugin concerned
        $block = $content['block'];
        $type = $block['_type'];
        require_once ("pieces/$type/$type.php");
        $rendermethod = str_replace(' ', '', "render$type");
        $html.= $rendermethod($block, $content, $collection, $object, $mode);
        $html.= render($block['next'], $collection, $object, $mode);
        return $html;
    }else{
        //we have not been told what the datatype is, and we couldn't guess
        //if it is an array lets return it with commas, otherwise just return it
        //this should handle encoding correctly and perhaps stripping out unsafe things to avoid xss attacks
        //return str_replace("\n","",htmlentities($value,ENT_QUOTES));
        if (is_array($content)){
                return implode($content,",");
        }else{
                return $content;
        }
    }
}
?>
