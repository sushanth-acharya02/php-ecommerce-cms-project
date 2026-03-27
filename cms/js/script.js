
function validateForm(){
	let validate=true;
	let email=document.getElementById("email").value;
	if(email==""){
		document.getElementById("emailError").innerHTML="Please fill the email.";
		validate=false;
	}
	
	var psw=document.getElementById("password").value;
	var error=document.getElementById("passwordError");
	if(psw==""){
		error.innerHTML="Please fill the password.";
		validate=false;
	}else {
		let regex=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
		if(regex.test(psw)==false){
			error.innerHTML="Password must be atleast 8 characters.";
			validate = false;
		}else{
			error.innerHTML="";
		}
	}
	return validate;
}

function bannerValidateForm(){
	let validate=true;
	
	let bannerImage=document.getElementById("bannerImage").value;
	if(bannerImage==""){
		document.getElementById("bannerImageError").innerHTML="Please select the image";
		validate=false;
	}else{
		document.getElementById("bannerImageError").innerHTML="";
	}
	
	let bannerTitle=document.getElementById("bannerTitle").value;
	if(bannerTitle==""){
		document.getElementById("bannerTitleError").innerHTML="Please fill the banner title.";
		validate=false;
	}else{
		document.getElementById("bannerTitleError").innerHTML="";
	}
	
	/* let bannerSmallText=document.getElementById("bannerSmallText").value;
	if(bannerSmallText==""){
		document.getElementById("bannerSmallTextError").innerHTML="Please fill the small text";
		validate=false;
	}else{
		document.getElementById("bannerSmallTextError").innerHTML="";
	} */
	
	let buttonText=document.getElementById("buttonText").value;
	if(buttonText==""){
		document.getElementById("buttonTextError").innerHTML="Please fill button text";
		validate=false;
	}
	else{
		document.getElementById("buttonTextError").innerHTML="";
	}
	return validate;
}

function liveBanner(id){
	var xmlHttp=new XMLHttpRequest();
	xmlHttp.onreadystatechange=function(){
		if(this.readyState == 4 && this.status==200){
			document.getElementById("liveData"+id).innerHTML=this.responseText;
		}
	}
	xmlHttp.open("GET","live-unlive.php?id="+id,true);
	xmlHttp.send();
}

$(document).ready(function(){
	$('a[data-toggle="tooltip"]').tooltip({
		animated: 'fade',
		placement: 'bottom',
		html: true
	});
});


function colourValidateForm(){
	let validate=true;

	let title=document.getElementById("title").value;
	if(title==""){
		document.getElementById("titleError").innerHTML="Please fill the title.";
		validate=false;
	}else{
		document.getElementById("titleError").innerHTML="";
	}
	
	return validate;
}


function liveColour(id){
	var xmlHttp=new XMLHttpRequest();
	xmlHttp.onreadystatechange=function(){
		if(this.readyState == 4 && this.status==200){
			document.getElementById("liveData"+id).innerHTML=this.responseText;
		}
	}
	xmlHttp.open("GET","colour-live-unlive.php?id="+id,true);
	xmlHttp.send();
}


function categoryValidateForm(){
	let validate=true;
	let categoryTitle=document.getElementById("categoryTitle").value;
	if(categoryTitle==""){
		document.getElementById("categoryTitleError").innerHTML="Please fill the category title";
		validate=false;
	}else{
		document.getElementById("categoryTitleError").innerHtml="";
	}
	
	return validate;
}

function liveCategory(id){
	var xmlHttp=new XMLHttpRequest();
	xmlHttp.onreadystatechange=function(){
		if(this.readyState == 4 && this.status==200){
			document.getElementById("liveData"+id).innerHTML=this.responseText;   
		}
	}
	xmlHttp.open("GET","category-live-unlive.php?id="+id,true);
	xmlHttp.send();
}

function productValidateForm(){
	let validate=true;
	
	let title=document.getElementById("title").value;
	if(title==""){
		document.getElementById("titleError").innerHTML="Please fill the title";
		validate=false;
	}else{
		document.getElementById("titleError").innerHTML="";
	}
	
	let category=document.getElementById("category").value;
	if(category==""){
		document.getElementById("categoryError").innerHTML="Please select the category";
		validate=false;
	}else{
		document.getElementById("categoryError").innerHTML="";
	}
	
	let colour=document.getElementById("colour").value;
	if(colour==""){
		document.getElementById("colourError").innerHTML="Please select the colour";
		validate=false;
	}else{
		document.getElementById("colourError").innerHTML="";
	}
	
	let description=document.getElementById("description").value;
	if(description==""){
		document.getElementById("descriptionError").innerHTML="Please fill the description";
		validate=false;
	}else{
		document.getElementById("descriptionError").innerHTML="";
	}

	let price=document.getElementById("price").value;
	if(price==""){
		document.getElementById("priceError").innerHTML="Please fill the price";
		validate=false;
	}else{
		//let num=document.forms['productForm']['price'].value; 
		let decimalPattern = /^[0-9]+(\.[0-9]{1,2})?$/;  
		
		if(!decimalPattern.test(price)){		 
			  document.getElementById("priceError").innerHTML="Please enter price with no only and up to 2 decimal points";
				validate=false;
		 }else{
		 document.getElementById("priceError").innerHTML="";
		 }
	}
	
	let img=document.getElementById("image").value;
	var deleteImage = document.getElementById("deleteImage").value;
	if(img=="" && deleteImage != 1){
		document.getElementById("imageError").innerHTML="Please select the image";
		validate=false;
	}else{
		document.getElementById("imageError").innerHTML="";
	}
		
	return validate;
}

$(document).ready(function(){
	$('#description').summernote();
});


function liveProduct(id){
	var xmlHttp=new XMLHttpRequest();
	xmlHttp.onreadystatechange=function(){
		if(this.readyState==4 && this.status==200){
			document.getElementById("liveData"+id).innerHTML=this.responseText;
		}
	}
	xmlHttp.open("GET","product-live-unlive.php?id="+id,true);
	xmlHttp.send();
}

