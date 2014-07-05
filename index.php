<?php
session_start();
header('Content-Type: text/html; charset=en_GB');
define("_EXCEPTIONAL", 1);
include "utils.php";
include "jsonpath.php";
//include "renderblocks.php";
ini_set('display_errors', '1');
include "renderpieces.php";
global $mdb;
$m = new MongoClient(); // connect to the back end database
$mdb = $m->selectDB("Kobo");
global $userid;
global $userRef;
$database = $mdb->design->findOne(array("type" => "database"));
include "header.php";
//TODO add a bit of error handling if the database is MIA
//is there a session open?
//if there isn't we display welcome and registration page
//we get the user id associated with the session
include "login.php";
include "logout.php";
include "menu.php"; //the menu is different for logged in users
//what command has been passed on the query string?
//the action is going to always describe a page name, we might be saving or loading, that is the post/get command but there is always a page
include "content.php"
?>
	</div> <!-- /container -->
<?php include "footer.php"; ?>
</body>
</html>
