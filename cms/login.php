<?php 
session_start();

if (isset($_SESSION['email'])) {
	header("Location: home.php");
	exit();
}

include_once('lib/connect_db.php');
include_once('lib/general.php');
include_once('inc/function.php');

$db=new DBController();
$general=new General();

$emailErr="";
$passwordErr="";

$email="";
$password="";
//echo base64_encode('1234Demo');
$validate=true;
if(isset($_POST["formSubmitted"]) && $_POST["formSubmitted"]=="true"){
	if(empty($_POST["email"])){
		$emailErr="Please fill the email";
		$validate=false;
	}else{
		$email=$_POST["email"];
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Invalid email format";
			$validate=false;
		}
	}
	
	if(empty($_POST["password"])){
		$passwordErr="Please fill the password";
		$validate=false;
	}else{
		$password=$_POST["password"];
		if (strlen($_POST["password"]) < 8) {
			$passwordErr = "Your Password Must Contain At Least 8 Characters!";
			$validate=false;
		}
	}
	
	if($validate){

		$login=$general-> loginUser();
		print_r($login);
		if($login){	
			//$_SESSION['email'] = $email;
			$_SESSION['email'] = $login['email'];
			$_SESSION['uId'] = $login['pk_id'];
			//echo "Login success";
			header("Location: home.php");
		}else{
			echo "Not success";
		}
	}
}

?>
<!doctype html>
<html lang="en">
	<?php include_once('inc/header_includes.php'); ?>
	
	<body>
		<?php include_once('inc/header.php'); ?>
		<section class="container mt-5">
			<div class="row">
				<div class="col-12">
					<div class="loginContainer">
						<form class="mx-3" action="" method="POST" name="loginForm" onsubmit="return validateForm()">
							<h2 class="text-center text-primary">Login Form</h2>
							<div class="mb-3">
								<label for="email" class="form-label">Email address</label>
								<input type="email" class="form-control" id="email" name="email" >
								<span id="emailError" class="error text-danger"><?php echo $emailErr;?></span>
							</div>
							<div class="mb-3">
								<label for="password" class="form-label">Password</label>
								<input type="password" class="form-control" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
								<span id="passwordError" class="error text-danger" ><?php echo $passwordErr;?></span>
						    </div>
							<button type="submit" class="btn btn-primary mb-4">Login</button>
							<input type="hidden" name="formSubmitted" value="true" />
						</form>
					</div>
				</div>
			</div>
		</section>
		<?php include_once('inc/footer.php');?>
	</body>
</html>