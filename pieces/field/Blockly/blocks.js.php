<?php
//this pulls together all the block.js files in the individual plugins
header('Content-Type: application/javascript; charset=en_GB');

foreach(glob('../../*', GLOB_ONLYDIR) as $dir) {
//    $dir = str_replace('directory/', '', $dir);
    echo file_get_contents("$dir/block.js");
}

?>
