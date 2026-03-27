<?php
session_start();
include_once('lib/connect_db.php');
include_once('lib/general.php');
include_once('inc/function.php');

$db=new DBController();
$general=new General();

$allCountries=$general->getAllCountries();
//print_r($allCountries);
$firstNameErr="";
$lastNameErr="";
$emailErr="";
$passwordErr="";
$confirmPasswordErr="";
$addressOneErr="";
$cityErr="";
$stateErr="";
$postalCodeErr="";

$firstName="";
$lastName="";
$email="";
$password="";
$confirmPassword="";
$addressOne="";
$city="";
$state="";
$country="";
$postalCode="";

$validate=true;

if($_SERVER["REQUEST_METHOD"]=="POST"){
	
	if(empty($_POST["firstName"])){
		$firstNameErr="Please fill the first name";
		$validate=false;
	}else{
		$firstName=$_POST["firstName"];
	}
	
	if(empty($_POST["lastName"])){
		$lastNameErr="Please fill the last name";
		$validate=false;
	}else{
		$lastName=$_POST["lastName"];
	}
	
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
	
	if(empty($_POST["confirmPassword"])){
		$confirmPasswordErr="Please fill the password";
		$validate=false;
	}else{
		$confirmPassword=$_POST["confirmPassword"];
		if(strlen($confirmPassword) < 8){
			$passwordErr="Confirm password must contain atlease 8 characters";
			$validate=false;
		}
	}
	
	if($password!==$confirmPassword){
		$confirmPasswordErr="Password does not match";
		$validate=false;
	}
	
	if(empty($_POST["addressOne"])){
		$addressOneErr="Please fill the address";
		$validate=false;
	}else{
		$addressOne=$_POST["addressOne"];
	}
	
	if(empty($_POST["city"])){
		$cityErr="Please fill the city";
		$validate=false;
	}else{
		$city=$_POST["city"];
	}
	
	if(empty($_POST["state"])){
		$stateErr="Please fill the state";
		$validate=false;
	}else{
		$state=$_POST["state"];
	}
	
	if(empty($_POST["postalCode"])){
		$postalCodeErr="Please fill the postalCode";
		$validate=false;
	}else{
		$postalCode=$_POST["postalCode"];
	}
	
	if($validate){
		$registerResult=$general->registerUser();
		
		if($registerResult>0){
			//echo "Successfully registered";
			$_SESSION['email'] = $_POST["email"];
			header("Location:home.htm");
			exit();
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
				<div class="registerContainer mt-5">
				<form name="registerForm" method="post" action="" class="mx-3" onsubmit="return validateRegisterForm()">
				<h2 class="text-center text-primary">Registration form</h2>
				
				  <div class="mb-3">
				  <label for="title" class="form-label">Title</label>
					  <select id="title" name="title" class="registerDropdown">
						  <option value="Mr">Mr</option> 
						  <option value="Mrs">Mrs</option> 
						  <option value="Other">Other</option> 
					  </select>
				  </div>
				  
				  <div class="mb-3">
					  <label for="firstName" class="form-label">First Name</label>
					  <input type="text" class="form-control" id="firstName" name="firstName" />
					  <span id="firstNameError" class="error text-danger"><?php echo $firstNameErr;?></span>
				  </div>
				  
				  <div class="mb-3">
					  <label for="lastName" class="form-label">Last Name</label>
					  <input type="text" class="form-control" id="lastName" name="lastName" />
					  <span id="lastNameError" class="error text-danger"><?php echo $lastNameErr;?></span>
				  </div>
				  
				  <div class="mb-3">
					<label for="email" class="form-label">Username</label>
					<input type="email" class="form-control" id="email" name="email" onkeyup="checkregisterEmail()" />
					<span id="emailError" class="error text-danger"><?php echo $emailErr;?></span>
				  </div>
				  
				  <div class="mb-3">
					<label for="password" class="form-label">Password</label>
					<input type="password" class="form-control" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
					<span id="passwordError" class="error text-danger"><?php echo $passwordErr;?></span>
				  </div>
				  
				   <div class="mb-3">
					<label for="confirmPassword" class="form-label">Confirm Password</label>
					<input type="password" class="form-control" id="confirmPassword" name="confirmPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
					<span id="confirmPasswordError" class="error text-danger"><?php echo $confirmPasswordErr;?></span>
				  </div>
				  
				 <div class="mb-3">
					  <label for="addressOne" class="form-label">Address 1</label>
					  <textarea type="message" class="form-control" id="addressOne" name="addressOne"></textarea> 
					  <span id="addressOneError" class="error text-danger"><?php echo $addressOneErr;?></span>
				  </div>
				  
				  <div class="mb-3">
					  <label for="addressTwo" class="form-label">Address 2(Optional)</label>
					  <textarea type="message" class="form-control" id="addressTwo" name="addressTwo"></textarea> 
					  <span id="addressTwoError" class="error text-danger"></span>
				  </div>
				  
				  <div class="mb-3">
					<label for="city" class="form-label">Town/City</label>
					<input type="text" class="form-control" id="city" name="city" />
					<span id="cityError" class="error text-danger"><?php echo $cityErr;?></span>
				  </div>
				  
				  <div class="mb-3">
					<label for="state" class="form-label">State</label>
					<input type="text" class="form-control" id="state" name="state" />
					<span id="stateError" class="error text-danger"><?php echo $stateErr;?></span>
				  </div>
				  
				   <div class="mb-3">
					<label for="country" class="form-label">Country</label>
						<select id="country" name="country" class="registerDropdown">
							<option value=""> Select Country</option>
							<?php
							if(!empty($allCountries)){
								foreach($allCountries as $countries){
							?>		
							<option value="<?=$countries['iso'];?>" <?php if(($country == '' && $countries['iso']=='IN') || $country == $countries['iso']){ echo "selected"; } ?>><?=$countries['country'];?></option>
							<?php
								}
							}
							?>
						</select>
				  </div>
				  
				  <div class="mb-3">
					<label for="postalCode" class="form-label">Postal Code</label>
					<input type="text" class="form-control" id="postalCode" name="postalCode" />
					<span id="postalCodeError" class="error text-danger"><?php echo $postalCodeErr;?></span>
				  </div>
			
				  <button type="submit" class="btn btn-primary mb-4">Register</button>
				  <p class="mb-0 pb-3">Already registered? <a href="login.htm">Login</a></p>
				</form>
				</div>
			</div>
		</div>
	</section>
	<?php include_once('inc/footer.php'); ?>
</body>
</html>
