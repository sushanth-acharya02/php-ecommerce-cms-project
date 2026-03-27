<?php 
include_once('lib/connect_db.php');
include_once('lib/general.php');
include_once('inc/function.php');

$db=new DBController();
$general=new General();

$emailErr="";
$email="";
?>
<section class="container mt-5 footerContainer">
			<div class="row mt-4 footerRow">
				<div class="col-4 footeraddress">
					<h3 class="footerAddressHead"><b>Get In Touch</b></h3>
					<p class="mb-0">A108 Adam Street</p>
					<p class="mb-3">New York, NY 535023</p>
					<p class="mb-0 ">Any other queries:</p>
					<p class="mb-0"><b>9669806012</b></p>
					<p class="mb-0"><b>10.00AM to 7:00PM</b> </p>
					<p class="mb-0">Email:<b>customercare@campusshoes.com</b></p>
				</div>
			
				<div class="col-8 footerLink">
					<div class="row">
						<div class="col-3">
							<h3><b>What's in store</b></h3>
							<ul class="footerList p-0">
								<li><a href="#">Mens</a></li>
								<li><a href="#">Womens</a></li>
								<li><a href="#">Kids</a></li>
							</ul>
						</div>
						<div class="col-3">
							<h3><b>Useful Links</b></h3>
							<ul class="footerList p-0">
								<li><a href="#">Home</a></li>
								<li><a href="#">Products</a></li>
								<li><a href="#">Blog</a></li>
							</ul>
							<h3><b>Partners</b></h3>
							<ul class="footerList p-0">
								<li><a href="#">Nike</a></li>
								<li><a href="#">Puma</a></li>
								<li><a href="#">Campus</a></li>
							</ul>
						</div>
						<div class="col-6">
							<div class="socialIcons mt-3">
								<a href="#"><i class="fa-brands fa-twitter mx-2"></i></a><a href="#"><i class="fa-brands fa-facebook mx-2"></i></a><a href="#"><i class="fa-brands fa-youtube mx-2"></i></a><a href="#"><i class="fa-brands fa-instagram mx-2"></i></a>
							</div>	
						</div>
					</div>
				</div>
			</div>
			<p class="text-center mt-3 copyright">&#169; 2025 Campus Shoes </p>
		</section>