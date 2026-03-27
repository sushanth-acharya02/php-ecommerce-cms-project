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
								<li class="nav-item dropdown">
								    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
										Home
								    </a>
									<ul class="dropdown-menu">
											<li><a class="dropdown-item" href="banner-listing.php">Banner</a></li>
									</ul>
								</li>

								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
										Products
								    </a>
									<ul class="dropdown-menu">
											<li><a class="dropdown-item" href="shoe-colour-listing.php">Shoe Colour</a></li>
											<li><a class="dropdown-item" href="category-listing.php">Category Lists</a></li>
											<li><a class="dropdown-item" href="product-listing.php">Product Lists</a></li>
									</ul>
									
								  <!--<a class="nav-link" href="#">Products</a>-->
								</li>
								
								<li class="nav-item">
								  <a class="nav-link" href="#">Blog</a>
								</li>
								
								<li class="nav-item">
								  <a class="nav-link" href="#">Contact Us</a>
								</li>
							</ul>

						</div>
						
						 <div class="logoutContainer">
							<?php if(isset($_SESSION["email"])): ?>
							<a href="logout.php"><button class="btn btn-outline-primary" type="submit">Logout</button></a>
							<?php  else: ?>
							<a href=""><button class="btn btn-outline-primary" type="submit">Login</button></a>
							<?php endif; ?>
						 </div>
					  </div>
				</nav>
			</div>
	</div>
</section>
