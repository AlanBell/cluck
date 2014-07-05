<?php
defined('_EXCEPTIONAL') or die("Go through the front door please.");
?>
<?php
//this is the menu across the top
//it needs to build from a datastructure in the database
//but it might also be somewhat dynamic depending on data in the database and
//who the user is
//so it kind of needs to build a link collection from a query of some sort
//the menu should be hierachical
//maybe we should go through all the menuitem objects and they could have criteria on them that would influence whether they display or not
//need to grab the branding from a defined place
global $userRef;
$menus = $mdb->design->find(array("type" => "Menu"));
?>

<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="?page=home"><?php echo $database['name']; ?></a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
<?php
foreach ($menus as $menu) {
    echo render($menu["design"], false, false, $page['mode']); //we always start with a layout
    
}
?>
            </ul>
  </div><!-- /.navbar-collapse -->
</nav>
