<?php
include_once('lib/connect_db.php');
include_once('lib/general.php');

$db=new DBController();
$general=new General();

$liveUnliveId=$_GET['id'];
$liveUnlive=$general->liveBanner($liveUnliveId);
echo $liveUnlive;
?>