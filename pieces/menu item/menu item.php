<?php
function rendermenuitem($block, $content, $collection = false, $object = false, $mode = "edit") {
    $html.= '<li><a href="?' . getvalue("action", $block) . '">' . getvalue("title", $block) . '</a></li>';
    return $html;
}
?>
