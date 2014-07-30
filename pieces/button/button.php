<?php
function renderbutton($block, $content, $collection = false, $object = false, $mode = "edit") {
    $title= getvalue("title", $block);
    $action= getvalue("action", $block);//this could eventually be a chunk of javascript
    switch($mode){
    case "column":
        //when rendering in a column we should prevent event bubbling, we don't want the row click to happen.
        $html.="<button type='button' class='btn btn-default' onclick='$action(event,\"{$object['_id']}\")'>$title</button>";
    break;
    default:
        $html.="<button type='button' class='btn btn-default' onclick='$action(event,\"{$object['_id']}\")'>$title</button>";
    }
    return $html;
}
?>
