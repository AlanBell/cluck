<?php
function rendermenu($block, $content, $collection = false, $object = false, $mode = "edit") {
    $html.= render(getstatement("menu", $block));
    return $html;
}
?>
