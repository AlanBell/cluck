<?php
function rendervtigerrelated($block, $content, $collection = false, $object = false, $mode = "edit") {
    $html.= $block['field']['__text'];
    $html.= render($block['field']['value']);
    return "related\n";
}
?>
