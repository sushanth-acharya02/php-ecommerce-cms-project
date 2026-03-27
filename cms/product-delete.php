<?php 
include_once('lib/connect_db.php');
include_once('lib/general.php');

$db=new DBController();
$general=new General();

$deleteId=$_GET['id'];
$deleteProduct=$general -> deleteProduct($deleteId);
if($deleteProduct){
	header("Location: product-listing.php");
}
?>