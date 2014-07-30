<?php
function rendertypeText($name, $block, $content, $collection = false, $object = false, $mode = "edit") {
    switch ($mode) {
        case "edit":
            $html.= "<input class='form-control' id=$name name=$name value='";
            $html.= render($object[$name], $collection, $object); //this is the current value of the field
            $html.= "'/>";
        break;
        default:
            $html.= render($object[$name], $collection, $object); //this is the current value of the fild
            
    }
    return $html;
}
?>
