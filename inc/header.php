<?php
if(!isset($_SESSION)){
	session_start();
}
/*if(isset($_SESSION)&&!empty($_SESSION)){
	print_r($_SESSION);
}*/
$parentCategory=$general->getParentCategory();
?>
<section  class="container">
	<div class="row">
		<div class="col-12">
			<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
				  <div class="container-fluid">
					<div class="logoContainer">
						<a href="<?php echo ROOT_PATH;?>"><img src="<?php echo IMAGES_PATH;?>logonew.png"/></a>
					</div>
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav">
							<li class="nav-item">
							  <a class="nav-link" aria-current="page" href="home.htm">Home</a>
							</li>	
							<?php
							foreach($parentCategory as $parentRow){
							?>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="<?php echo ROOT_PATH.$parentRow['seo_url'].'.htm'?>" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<?php echo $parentRow['title'];?>
								</a>
<?php 
								$subCategory=$general->getSubCategory($parentRow['pk_id']);
								if(isset($subCategory)){
?>
									<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
<?php
									foreach($subCategory as $subRow){
										
										$subSubCategory=$general->getSubSubCategory($subRow['pk_id']);
?>
										<li class="dropdown-submenu">
											<a class="dropdown-item <?php if(!empty($subSubCategory)) echo ' dropdown-toggle'?>" href="<?php echo ROOT_PATH.$parentRow['seo_url'].'/'.$subRow['seo_url'].'.htm';?>"><?php echo $subRow['title'];?></a>
<?php
											if(isset($subSubCategory)){
?>
												<ul class="dropdown-menu">
<?php
													foreach($subSubCategory as $subSubRow){
?>
													<li><a class="dropdown-item" href="<?php echo ROOT_PATH.$parentRow['seo_url'].'/'.$subRow['seo_url'].'/'.$subSubRow['seo_url'].'.htm';?>"><?php echo $subSubRow['title'];?></a></li>
<?php
													}
?>
												</ul>
<?php
											}
?>
										</li>
<?php
									}
?>
								</ul>
<?php
								}
?>
							</li>
<?php
							}
?>
							<li class="nav-item">
							  <a class="nav-link" href="products.php">Products</a>
							</li>
							
							<li class="nav-item">
							  <a class="nav-link" href="#">Blog</a>
							</li>
							
							<li class="nav-item">
							  <a class="nav-link" href="#">Contact Us</a>
							</li>
						</ul>
						<div class="cartContainer">
							<a href="#"><i class="fa-solid fa-cart-shopping cartIcon"></i></a>
						</div>
					</div>
					
					 <div class="logoutContainer">
					 <?php
					 if(isset($_SESSION["email"])){
					 ?>
						<a href="logout.htm"><button class="btn btn-outline-primary" type="submit">Logout</button></a>
						
					<?php
					 }else{
					?>
						<a href="login.htm"><button class="btn btn-outline-primary" type="submit">Login</button></a>
					<?php
					 }
					?>
					 </div>
				  </div>
				 
			</nav>
		</div>
	</div>
</section>