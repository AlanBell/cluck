<?php
function rendervtigerfilter($block, $content, $collection = false, $object = false, $mode = "edit") {
$isdefault=getfield("isdefault",$block)=="TRUE"?"true":"false";

    return "$isdefault\n";
}
?>
