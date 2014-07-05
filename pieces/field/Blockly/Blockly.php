<?php
function rendertypeBlockly($name, $block, $content, $collection = false, $object = false, $mode = "edit") {
    switch ($mode) {
        case "column":
            //need a way to specify the path to the thing I want from the blockly tree
            //if a column type is blockly then we will be pulling a bit out of the tree
            $parts = explode(":)", $name); //we use a smiley as the separator between the fieldname holding the blocktree and the blocktree path itself
            $structure = new blocklyblock($object[$parts[0]]);
            $html.= $structure->getpath(explode(".", $parts[1]));
        break;
        case "edit":
            $html.= "<input class='hidden' id=$name name=$name value='";
            $html.= "'/>";
            $html.= "<script>var blockly$name=" . str_replace("1961", "551", json_encode($object[$name])) . ";"; //this is the current value of the field
            $html.= "</script>"; //this is the current value of the field
            $html.= '<iframe src="pieces/field/Blockly/blocklypane.php" width="100%" height="500px"></iframe>';
            //now the scripts to activate the widget
            $html.= <<<EOT
<script>
function blocklyLoaded(blockly) {
  window.Blockly = blockly;
  Blockly.addChangeListener(myUpdateFunction);
  roots={"xml":blockly$name};
  xmldom=x2j.json2xml(roots);
  Blockly.Xml.domToWorkspace(Blockly.mainWorkspace, xmldom.childNodes[0]);
}
function myUpdateFunction() {
    var code = x2j.xml2json(Blockly.Xml.workspaceToDom(Blockly.mainWorkspace));
    $('#$name').val(JSON.stringify(code));
  }
</script>
EOT;
            $b = new blocklyblock($object[$name]);
        break;
        default:
            $html.= "<input class='hidden' id=$name name=$name value='";
            $html.= "'/>";
            $html.= "<script>var blockly$name=" . str_replace("1961", "551", json_encode($object[$name])) . ";"; //this is the current value of the field
            $html.= "</script>"; //this is the current value of the field
            $html.= '<iframe src="pieces/field/Blockly/blocklypane.php" width="100%" height="500px"></iframe>';
            //now the scripts to activate the widget
            $html.= <<<EOT
<script>
function blocklyLoaded(blockly) {
  window.Blockly = blockly;
Blockly.readOnly=true;
  Blockly.addChangeListener(myUpdateFunction);
  roots={"xml":blockly$name};
  xmldom=x2j.json2xml(roots);
  Blockly.Xml.domToWorkspace(Blockly.mainWorkspace, xmldom.childNodes[0]);
}
function myUpdateFunction() {
    var code = x2j.xml2json(Blockly.Xml.workspaceToDom(Blockly.mainWorkspace));
    $('#$name').val(JSON.stringify(code));
  }
</script>
EOT;
            $b = new blocklyblock($object[$name]);
    }
    return $html;
}
?>
