<?php
defined('_EXCEPTIONAL') or die("Go through the front door please.");
?>
<?php
//here we render the content panel, this could be a page of text, a form, a list view
//the action is the starting point
global $userRef;
function isJson($string) {
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something is being saved, we need to validate this and save it
    //it is probably a simple key/value pair form that needs to go into a collection, also passed in
    //no validation at the moment
    //echo print_r($_POST);
    $collection = $mdb->selectCollection($_REQUEST['collection']);
    //we might be accepting standard key/value fields, or fields might contain json which we want to store natively
    //in particular they could be representations of blockly diagrams
    foreach ($_POST as $field => $value) {
        if (isJson($value)) {
            //echo "saving json $field $value";
            $newobject[$field] = json_decode($value);
        } else {
            $newobject[$field] = $value;
        }
    }
    if ($_REQUEST['objectid']) {
        $collection->update(array('_id' => new MongoId($_REQUEST['objectid'])), $newobject, array("upsert" => true));
    } else {
        $collection->insert($newobject);
    }
}
if (isset($_REQUEST['page'])) {
    $pageName = $_REQUEST['page'];
} else {
    //no action specified, lets load the home page
    $pageName = "home";
}
$page = $mdb->design->findOne(array("type" => "page", "name" => $pageName));
//having got our page we need to render it, there are many types of page, basically it is a layout container that could be
//just some HTML
//could have some forms on it
//could contain a list of data
//
//we might have other information passed in on the request that would allow us to load a collection or specific object, that gets picked up by the renderer
//we might have a submit of a form as well
switch ($page['type']) {
    case "static":
        echo $page['content'];
    break;
    default:
        //this is the main kind, we pass the content field to a renderer
        //		echo render($page["content"],"guess",false,false,$_REQUEST['mode']);//we always start with a layout
        //renderable pages have the design blocks in the design field
        echo render($page["design"], false, false, $_REQUEST['mode'] ? $_REQUEST['mode'] : "edit"); //we always start with a layout
        
    break;
}
?>
