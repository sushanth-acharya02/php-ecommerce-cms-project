<?php
include_once('lib/connect_db.php');
include_once('lib/general.php');
include_once('inc/function.php');

$db=new DBController();
$general=new General();

$registeredEmail=$general->checkRegisteredEmail();

//echo $registeredEmail;

if($registeredEmail>0){
	echo "Email already exists";
}

?>