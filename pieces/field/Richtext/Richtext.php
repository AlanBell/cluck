<?php
function rendertypeRichtext($name, $block, $content, $collection = false, $object = false, $mode = "edit") {
    switch ($mode) {
        case "edit":
            $html.= "<textarea name='$name' id='$name' class='form-control' style='height:200px;' placeholder='Enter text ...'>";
            $html.= render($object[$name], $collection, $object); //this is the current value of the field
            $html.= '</textarea>';
            $html.= '<script type="text/javascript">';
            $html.= "$('#$name').wysihtml5();";
            $html.= '</script>';
        break;
        default:
            $html.= render($object[$name], $collection, $object); //this is the current value of the fild
            
    }
    return $html;
}
?>
