<?php
function rendervtigerblock($block, $content, $collection = false, $object = false, $mode = "edit") {
$blockname= getfield("blockname",$block);
//first create the block if we need to
$code.=<<<"CODE"
\$block = Vtiger_Block::getInstance('$blockname', \$module);
if (\$block == false) {
        \$block = new Vtiger_Block();
        \$block->label = '$blockname';
        \$module->addBlock(\$block);
}
CODE;
    $code.="\n";
    //when rendering the fields we want them to add themselves to this block
    $code.=render(getstatement("Fields", $block), $collection, $object, $mode);

    return "$code";
}
?>
