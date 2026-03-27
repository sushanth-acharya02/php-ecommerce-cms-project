function validateForm(){
	/*var validate=true;
	var email=document.getElementById("username").value;
	if(email==""){
		document.getElementById("usernameError").innerHTML="Please fill the email";
		validate=false;
	}
	return validate;*/
}

function saveNewsLetter(){
	//var validate=true;
	var email=document.getElementById("username").value;
	if(email==""){
		document.getElementById("usernameError").innerHTML="Please fill the email";
		//validate=false;
	}
	else{
		document.getElementById("usernameError").innerHTML="";
		$.ajax({
			url:"add-newsletter.php",
			method:"POST",
			data:{username:email},
			success:function(response){
				document.getElementById("newsSuccessMessage").innerHTML=response;
				document.getElementById("newsLetterForm").reset(); 
			}
		});
		
	}
}

/*function checkEmail(){
	var email=document.getElementById("username").value;
	if(email!=""){
		$.ajax({
			url:"check_email.php",
			method:"POST",
			data:{username:email},
			success:function(response){
				document.getElementById("usernameError").innerHTML = response;
			}
		});
	}
}*/


function validateRegisterForm(){
	//console.log("present");
	//alert("helloe");
	
	var validate=true;
	var firstName=document.getElementById("firstName").value
	if(firstName==""){
		document.getElementById("firstNameError").innerHTML="Please fill the first name";
		validate=false;
	}else{
		document.getElementById("firstNameError").innerHTML="";
	}
	
	var lastName=document.getElementById("lastName").value
	if(lastName==""){
		document.getElementById("lastNameError").innerHTML="Please fill the last name";
		validate=false;
	}else{
		document.getElementById("lastNameError").innerHTML="";
	}
	
	var email=document.getElementById("email").value;
	if(email==""){
		document.getElementById("emailError").innerHTML="Please fill the email";
		validate=false;	
	}else{
		document.getElementById("emailError").innerHTML="";
	}
	
	var passwords=document.getElementById("password").value;
	if(passwords==""){
		document.getElementById("passwordError").innerHTML="Please fill the password";
		validate=false;
	}else{
		var regex=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
		if(regex.test(passwords)==false){
			document.getElementById("passwordError").innerHTML="password must be atleast 8 characters";
			validate=false;
		}else{
			document.getElementById("passwordError").innerHTML="";
		}
	}
	
	var confirmPasswords=document.getElementById("confirmPassword").value;
	if(confirmPasswords==""){
		document.getElementById("confirmPasswordError").innerHTML="Please fill the confirm password";
		validate=false;
	}else{
		var regex=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
		if(regex.test(confirmPasswords)==false){
			document.getElementById("confirmPasswordError").innerHTML="Confirm Password must atlease 8 characters";
			validate=false;
		}else{
			document.getElementById("confirmPasswordError").innerHTML="";
		}
	}
	
	if(passwords!==confirmPasswords){
		document.getElementById("confirmPasswordError").innerHTML="Password does not match";
		validate=false;
	}
	
	var addressOne=document.getElementById("addressOne").value;
	if(addressOne==""){
		document.getElementById("addressOneError").innerHTML="Please fill the address";
		validate=false;
	}else{
		document.getElementById("addressOneError").innerHTML="";
	}
	
	var city=document.getElementById("city").value;
	if(city==""){
		document.getElementById("cityError").innerHTML="Please fill the town or city";
		validate=false;
	}else{
		document.getElementById("cityError").innerHTML="";
	}
	
	var state=document.getElementById("state").value;
	if(state==""){
		document.getElementById("stateError").innerHTML="Please fill the state";
		validate=false;
	}else{
		document.getElementById("stateError").innerHTML="";
	}
	
	var postalCode=document.getElementById("postalCode").value;
	if(postalCode==""){
		document.getElementById("postalCodeError").innerHTML="Please fill the postal code";
		validate=false;
	}else{
		document.getElementById("postalCodeError").innerHTML="";
	}
	
	/*if(validate==false){
	console.log("validated",validate);
	}else{
		console.log("password validated",validate);
	}*/
	return validate;	
	
}

function checkregisterEmail(){
	var email=document.getElementById("email").value;
	//console.log(email);
	if(email!=""){
		$.ajax({
			url:"check-registered-email.php",
			method:"POST",
			data:{email:email},
			success:function(response){
				document.getElementById("emailError").innerHTML = response;
			}
		});
	}
}

function validateLoginForm(){
	var validate=true;
	var email=document.getElementById("email").value;
	if(email==""){
		document.getElementById("emailError").innerHTML="Please fill the email";
		validate=false;
	}else{
		document.getElementById("emailError").innerHTML="";
	}
	
	var passwords=document.getElementById("password").value;
	if(passwords==""){
		document.getElementById("passwordError").innerHTML="Please fill the password";
		validate=false;
	}else{
		var regex=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
		if(regex.test(passwords)==false){
			document.getElementById("passwordError").innerHTML="Password must atlease 8 characters";
			validate=false;
		}else{
			document.getElementById("passwordError").innerHTML="";
		} 
	}
	return validate;
}

/*function prouductDetailsForm(){
	alert("inside function");
	var validate=true;
	
	var size=document.getElementByName("size");
	var selected=false;
	
	for(i=0;i<size.length;i++){
		if(size[i].checked){
			selected=true;
			break;
		}
	}
	
	if(selected==false){
		document.getElementById("sizeError").innerHTML="Please select the size";
		validate=false;
	}else{
		document.getElementById("sizeError").innerHTML="";
	}
	return validate;
}*/

function prouductDetailsForm(){
	var validate=true;
	var checked_size = document.querySelector('input[name = "size"]:checked');

	if(checked_size != null){  
		//alert(checked_size.value); 
		document.getElementById("sizeError").innerHTML="";
	} else {
		//alert('Please select a shoe size');
		document.getElementById("sizeError").innerHTML="Please select the size";
		validate=false;
	}
	return validate;
}
