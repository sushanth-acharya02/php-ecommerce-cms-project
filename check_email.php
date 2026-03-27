<?php
include_once('lib/connect_db.php');
include_once('lib/general.php');
include_once('inc/function.php');

$db=new DBController();
$general=new General();

$validateCustomer=$general -> validateCustomer();
//echo $validateCustomer;

if($validateCustomer>0){
	echo "email already subscribed";
}
?>