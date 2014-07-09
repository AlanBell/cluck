<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title><?php
echo $database['name']; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css">
        <script                src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/themes/smoothness/jquery-ui.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
<?php
//now go include all the stuff that pieces want
foreach(glob('pieces/*', GLOB_ONLYDIR) as $dir) {
    echo file_get_contents("$dir/include");
}
foreach(glob('pieces/field/*', GLOB_ONLYDIR) as $dir) {
    echo file_get_contents("$dir/include");
}

?>
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
<script type="text/javascript">

var timer;
var doubleclicking;
function openread(page,collection,object){
  singlefunction="singleclick(\""+ page + "\",\"" + collection + "\",\"" + object +"\")";
  timer = setTimeout(singlefunction, 400);
}
function singleclick(page,collection,object){
  if(!doubleclicking){
    console.log(collection,object);
    window.location="?page="+page+"&collection="+collection+"&objectid="+object+"&mode=read"
  }
}
function openedit(page,collection,object){
  clearTimeout(timer);
  doubleclicking=1;
  console.log(collection,object);
  window.location="?page="+page+"&collection="+collection+"&objectid="+object+"&mode=edit"
}

var x2j=new  X2JS;
$(function(){
$('.datepicker').datepicker()
});
</script>

</head>
<body>
        <div class="container">

