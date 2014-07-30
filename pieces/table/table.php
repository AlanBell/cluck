<?php
function rendertable($block, $content, $cursor = false, $object = false, $mode = "edit") {
    $page=getvalue("form", $block);
    $html.= "<table class='table' ><tbody>";
    //table can override the collection in the default context
    //might do a table head block here at some point
    //$html.="<thead>";
    //foreach($content['content']['columns'] as $colheader){
    //              $html.="<th>$colheader</th>";
    //      }
    //      $html.="</thead>";
    $cursorinfo=$cursor->info();
    $collection=substr($cursorinfo['ns'], strpos($cursorinfo['ns'], ".") + 1);
    foreach ($cursor as $object) {
        $html.= "<tr onclick='openread(\"" . $page . "\",\"" . $collection . "\",\"" . $object['_id'] . "\")' ondblclick='openedit(\"" . $page . "\",\"" . $collection . "\",\"" . $object['_id'] . "\")'>";
        $html.= render(getstatement("content", $block), $cursor, $object, "column");
        $html.= "</tr>";
    }
    $html.= "</tbody></table>";
    return $html;
}
?>
