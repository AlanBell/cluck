<?php
function renderfield($block, $content, $collection = false, $object = false, $mode = "edit") {
    //fields can be in one of several modes
    //edit mode when they are likely to be part of a form that gets submitted
    //read mode, when they are on a form but don't display as editable inputs
    //column mode where they just display the value
    //header mode where we only display the names, no context needed
    global $mdb;
//    $name = getvalue("name", $block);
//    $type = getvalue("type", $block) ? : "Text"; //treat field as text if not specified
    $name = getfield("name", $block);
    $type = getfield("type", $block) ? : "Text"; //treat field as text if not specified
    $title = getvalue("title", $block);
    //we need an object context to render a field, if we haven't been passed one then pull it from $_REQUEST
    if (!$collection) {
        $collection = $_REQUEST['collection'];
    }
    if (!$object) {
        $object = $mdb->$collection->findOne(array('_id' => new MongoId($_REQUEST['objectid'])));
    }
    //this is going to be a bootstrapish field lable/content pairing
    //one day we might have variations on the field
    //field datatypes are plugins to the field plugin
    $typemethod = "rendertype$type";
    require_once ("$type/$type.php");
    switch ($mode) {
        case "edit":
            //edit mode fields have a lable
            $html.= '<div class="form-group"><label class="col-lg-2 control-label">';
            $html.= $title ? $title : $name; //should allow for a separate field title to be defined
            $html.= '</label><div class="col-lg-10"><p class="form-control-static">';
            $html.= $typemethod($name, $block, $content, $collection, $object, $mode);
            $html.= '</p></div></div>';
        break;
        case "column":
            //if this is making an appearance in a column it should be in a td
            $html.= '<td>';
            $html.= $typemethod($name, $block, $content, $collection, $object, $mode);
            $html.= '</td>';
        break;
        case "read":
            //in read mode we just want to render the content, with a label
            $html.= '<div class="form-group"><label class="col-lg-2 control-label">';
            $html.= $title ? $title : $name; //should allow for a separate field title to be defined
            $html.= '</label><div class="col-lg-10"><p class="form-control-static">';
            $html.= $typemethod($name, $block, $content, $collection, $object, $mode);
            $html.= '</p></div></div>';
        break;
        case "plain":
            //this mode we just fling the content at the browser, no labels
            $html.= $typemethod($name, $block, $content, $collection, $object, $mode);
        break;
    }
    return $html;
}
?>
