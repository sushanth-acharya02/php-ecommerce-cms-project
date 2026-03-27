<?php 
include_once('lib/connect_db.php');
include_once('lib/general.php');

$db=new DBController();
$general=new General();

$deleteId=$_GET['id'];
$deleteCategory=$general -> deleteCategory($deleteId);
if($deleteCategory){
	header("Location: category-listing.php");
}
?>