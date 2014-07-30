<?php
function renderbuttongroup($block, $content, $collection = false, $object = false, $mode = "edit") {
    $action= getstatement("value", $block);//this could eventually be a chunk of javascript
    switch($mode){
    case "column":
        $html.="<td><div class='btn-group btn-group-sm'>";
        $html.= render(getstatement("buttons", $block), $collection, $object, $mode);
        $html.="</div></td>";
    }
    return $html;
}
?>
