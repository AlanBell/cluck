<?php
function renderquery($block, $content, $cursor = false, $object = false, $mode = "edit") {
//this changes the cursor that will be used for subsequent rendering
    global $mdb;
    $collection = getvalue("collection", $block);
    if (!$collection) {
        $collection = $_REQUEST['collection'];
    }
    $innercollection = $content['collection'];
    $find = getvalue("find", $block);
    $sort = getvalue("sort", $block);
    if ($find) {
        $cursor = $mdb->$collection->find($find);
    } else {
        $cursor = $mdb->$collection->find();
    }
    if ($sort) {
        $cursor->sort(array($sort => - 1)); //should use a query if one is passed
    }
    $html.= render(getstatement("content", $block), $cursor, $object, "column");
    return $html;
}
?>
