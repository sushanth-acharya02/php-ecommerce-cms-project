<?php 
include_once('lib/connect_db.php');
include_once('lib/general.php');

$db=new DBController();
$general=new General();

$deleteId=$_GET['id'];
$deletaShoeColour=$general -> deleteShoeColour($deleteId);
if($deletaShoeColour){
	header("Location: shoe-colour-listing.php");
}
?>