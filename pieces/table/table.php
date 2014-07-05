<?php
function rendertable($block, $content, $collection = false, $object = false, $mode = "edit") {
    global $mdb;
    $collection = getvalue("collection", $block);
    if (!$collection) {
        $collection = $_REQUEST['collection'];
    }
    $innercollection = $content['collection'];
    $find = getvalue("find", $block);
    $sort = getvalue("sort", $block);
    if ($find) {
        $objects = $mdb->$collection->find($find);
    } else {
        $objects = $mdb->$collection->find();
    }
    if ($sort) {
        $objects->sort(array($sort => - 1)); //should use a query if one is passed
        
    }
    $html.= "<table class='table' ><tbody>";
    //table can override the collection in the default context
    //might do a table head block here at some point
    //$html.="<thead>";
    //foreach($content['content']['columns'] as $colheader){
    //              $html.="<th>$colheader</th>";
    //      }
    //      $html.="</thead>";
    foreach ($objects as $object) {
        $html.= "<tr onclick='openread(\"" . $collection . "\",\"" . $object['_id'] . "\")' ondblclick='openedit(\"" . $collection . "\",\"" . $object['_id'] . "\")'>";
        $html.= render(getstatement("content", $block), $collection, $object, "column");
        $html.= "</tr>";
    }
    $html.= "</tbody></table>";
    return $html;
}
?>
