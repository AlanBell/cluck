<?php
function rendervtigerfield($block, $content, $collection = false, $object = false, $mode = "edit") {
$name=getfield("name",$block);
$label=getfield("label",$block) ?: $name;
$column=getfield("column",$block) ?: $name;
$columntype=getfield("columntype",$block);
$uitype=getfield("uitype",$block);
$quickcreate=getfield("quickcreate",$block);
$typeofdata=getfield("typeofdata",$block);
$masseditable=getfield("masseditable",$block);


$code.=<<<"CODE"
\$field = new Vtiger_Field();
\$field->name='$name';
\$field->label='$label';
\$field->column='$column';
\$field->columntype='$columntype';
\$field->uitype=$uitype;
\$field->quickcreate=$quickcreate;
\$field->typeofdata='$typeofdata';
\$field->masseditable=$masseditable;
\$block->addfield(\$field);

CODE;
    return "$code\n\n";
}
?>
