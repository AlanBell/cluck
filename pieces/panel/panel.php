<?php
function renderpanel($block, $content, $collection = false, $object = false, $mode = "edit") {
    $html.= '<div class="panel panel-default">
                          <div class="panel-heading"><h3 class="panel-title">' . render(getvalue("title", $block), $collection, $object, $mode) . ' </h3></div>
                          <div class="panel-body form-horizontal">';
    $html.= render(getstatement("body", $block), $collection, $object, $mode);
    $html.= '</div></div>';
    return $html;
}
?>
