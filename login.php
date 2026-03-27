<?php
session_start();

include_once('lib/connect_db.php');
include_once('lib/general.php');
include_once('inc/function.php');

$db=new DBController();
$general=new General();

$emailErr="";
$passwordErr="";

$email="";
$password="";

$validate=true;
if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(empty($_POST["email"])){
		$emailErr="Please fill the email";
		$validate=false;
	}else{
		$email=$_POST["email"];
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$emailErr = "Invalid email format";
			$validate=false;
		}
	}
	
	if(empty($_POST["password"])){
		$passwordErr="Please fill the password";
		$validate=false;
	}else{
		$password=$_POST["password"];
		if(strlen($password) < 8){
			$passwordErr="password must contain atlease 8 characters";
			$validate=false;
		}
	}
	
	if($validate){
		$email=$_POST["email"];
		$password=$_POST["password"];
		$loginResult=$general->loginUser($email);
		
		if(!empty($loginResult)){
			$hashedPassword=$loginResult[0]["password"];		
			
			if(password_verify($password,$hashedPassword)){
				//echo "Successfully logged in";
				$_SESSION["email"]=$email;
				header("Location:home.htm");
			}else{
				$passwordErr="Password not matched";
			}
		}else{
			$emailErr="email not found";
			//echo "email not found";
		}
		
	}
	
	
}
?>
<!doctype html>
<html lang="en">
<?php include_once('inc/header_includes.php'); ?>
<body>
<?php include_once('inc/header.php'); ?>
	<section class="container">
		<div class="row">
			<div class="col-12">
				<div class="loginContainer mt-5">
				<form name="registerForm" method="post" action="" class="mx-3" onsubmit="return validateLoginForm()">
				<h2 class=" text-center text-primary">Login form</h2>
				  <div class="mb-3">
					<label for="email" class="form-label">Email address</label>
					<input type="email" class="form-control" id="email" name="email" value="<?php echo $email;?>"/>
					<span id="emailError" class="error text-danger"><?php echo $emailErr;?></span>
				  </div>
				  <div class="mb-3">
					<label for="password" class="form-label">Password</label>
					<input type="password" class="form-control" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"/>
					<span id="passwordError" class="error text-danger"><?php echo $passwordErr;?></span>
				  </div>
				  <button type="submit" class="btn btn-primary mb-4">Login</button>
				  <p class="mb-0 pb-3">New User? <a href="register.htm">Register</a></p>
				</form>
				</div>
			</div>
		</div>
	</section>
	<?php include_once('inc/footer.php'); ?>
</body>
</html>