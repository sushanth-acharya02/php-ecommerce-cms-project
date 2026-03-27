<?php 
include_once('lib/connect_db.php');
include_once('lib/general.php');

$db=new DBController();
$general=new General();

$deleteId=$_GET['id'];
$deletaBanner=$general -> deleteBanner($deleteId);
if($deletaBanner){
	header("Location: banner-listing.php");
}
?>