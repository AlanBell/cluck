<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title><?php
ini_set('display_errors', TRUE);
echo $database['name']; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css">
<!--now go includ all the stuff that plugins want-->
        <link rel="stylesheet" href="pieces/field/Date/datepicker/css/datepicker.css">
        <script src="pieces/field/Date/datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//x2js.googlecode.com/hg/xml2json.js"></script>

        <link rel="stylesheet" type="text/css" href="pieces/field/Richtext/bootstrap3-wysihtml5/src/bootstrap-wysihtml5.css" />
        <script src="pieces/field/Richtext/bootstrap3-wysihtml5/lib/js/wysihtml5-0.3.0.js" type="text/javascript"></script>
        <script src="pieces/field/Richtext/bootstrap3-wysihtml5/src/bootstrap3-wysihtml5.js" type="text/javascript"></script>


        <html itemscope itemtype="http://schema.org/Article">

        <meta itemprop="image" content="http://libertus.co.uk/images/medium-logo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
<script type="text/javascript">

var timer;
var doubleclicking;
function openread(collection,object){
  singlefunction="singleclick(\""+ collection + "\",\"" + object +"\")";
  timer = setTimeout(singlefunction, 400);
}
function singleclick(collection,object){
  if(!doubleclicking){
    console.log(collection,object);
    window.location="?page="+collection+"&collection="+collection+"&objectid="+object+"&mode=read"
  }
}
function openedit(collection,object){
  clearTimeout(timer);
  doubleclicking=1;
  console.log(collection,object);
  window.location="?page="+collection+"&collection="+collection+"&objectid="+object+"&mode=edit"
}

var x2j=new  X2JS;
$(function(){
$('.datepicker').datepicker()
});
</script>

</head>
<body>
        <div class="container-fluid">

