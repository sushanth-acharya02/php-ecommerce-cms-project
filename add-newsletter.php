<?php
include_once('lib/connect_db.php');
include_once('lib/general.php');
include_once('inc/function.php');

$db=new DBController();
$general=new General();

$email=$_POST["username"];

$checkEmail=$general->checkEmail($email);
if(!empty($checkEmail)){
?>
	<p class="text-danger"><?php echo "Email already subscribed";?></p>
<?php
}else{
	$result=$general->addCustomer();
	if($result>0){
		echo "Customer subscribed successfully";
	}else{
		echo "Customer not subscribed";
	}
}

?>