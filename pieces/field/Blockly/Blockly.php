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
            $html.= "<script>var blockly$name=" . json_encode($object[$name]) . ";"; //this is the current value of the field
            $html.= "</script>";
            $html.= "<iframe id='blockly$name' src='pieces/field/Blockly/blocklypane.php' style='width:100%;height:500px;'></iframe>";
$html.="<button id='expand' type='button' onclick='popout(\"#blockly$name\");'>expand</button>";
            //now the scripts to activate the widget
            $html.= <<<EOT
<script>
function popout(element){
    console.log(element);
//first smoothly shrink the iframe before popping it out
//now pop it out in a dialog
 $(element).hide(1000,function(){
    $(element).dialog({width:"800",height:"500",
      close: function(ev, ui) {
        $(element).dialog("destroy");
        $(element).show(1000);
      },
      open: function(ev,ui) {
        $(element).width($(element).dialog("option","width"));
      }
    });
});
//the iframe doesn't quite resize correctly,so fix that now
}

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
//this is the read mode rendering, but perhaps we should call render on it, as if it were a design element

            $html.= render($object[$name], $collection,$object, $mode);
    }
    return $html;
}
?>
