<?php
function rendervtigermodule($block, $content, $collection = false, $object = false, $mode = "edit") {
//here we generate some PHP to run, we will at this point be printing it to the screen, but we could
//eval it instead
    $modulename= getfield("modulename",$block);
    $parentmenu=getfield("parent",$block);
    $code.="include_once('vtlib/Vtiger/Module.php');\n";
    $code.="include_once('vtlib/Vtiger/Menu.php');\n";
    $code.="\$module = Vtiger_Module::getInstance('$modulename')\n";
    $code.=<<<"CODE"
if (\$module == false) {
        \$module = new Vtiger_Module();
        \$module->name = '$modulename';
        \$module->parent='$parentmenu';
        \$module->save();
        \$module->initTables();
        \$module->initWebservice();
        \$menuInstance = Vtiger_Menu::getInstance('$parentmenu');
        \$menuInstance->addModule(\$module);
        \$module->setDefaultSharing('Public_ReadWriteDelete');
}

CODE;
    $code.="\n";
    $code.=render(getstatement("Blocks", $block), $collection, $object, $mode);
    return "<pre>$code</pre>";
}
?>
