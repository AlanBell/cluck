<?php
function renderform($block, $content, $collection = false, $object = false, $mode = "edit") {
    global $mdb;
    //$mode="edit";//forms are always in edit mode for the moment
    //we need to go collect an object perhaps,if there is one in the $request
    if (!$collection) {
        $collection = $_REQUEST['collection'];
    }
    if (!$object) {
        $object = $mdb->$collection->findOne(array('_id' => new MongoId($_REQUEST['objectid'])));
    }
    if ($mode != 'read') {
        //                              $html.="<form method=post action=?action=objectsave&collection={$collection}&objectid={$object['_id']} >";
        $html.= "<form method=post action=?action=objectsave&collection={$collection} >";
    } else {
        $html.= "<div ondblclick='openedit(\"" . $_REQUEST['collection'] . "\",\"" . $object['_id'] . "\")'>";
    }
    $html.= render(getstatement("content", $block), $collection, $object, $mode);
    if ($mode != 'read') {
        $html.= "<input type='Button' onclick='this.form.action=this.form.action+\"&objectid={$object['_id']}\";this.form.submit();' value='Update'><input type='Button' onclick='this.form.submit();' value='Save as new'></form>";
    } else {
        $html.= "</div>";
    }
    return $html;
}
?>
