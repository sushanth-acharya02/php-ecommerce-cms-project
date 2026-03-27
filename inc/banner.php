<?php
include_once('lib/connect_db.php');
include_once('lib/general.php');
include_once('inc/function.php');

$db=new DBController();
$general=new General();
$getBanner=$general->getBanner();

?>
<section class="container bannerContainer">	
	<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-inner bannerheightContainer">
		<?php		
			$active=true;
			if(isset($getBanner)){
			foreach($getBanner as $bannerRow){
				
			?>
			<div class="carousel-item <?php if($active) { echo 'active';$active=false ;}?>">
				<div class="row">
					<div class="col-12">
						<div class="bannerImage">
							<div class="bannerHeadingContainer mt-5">
								<p class="mb-0" style="color:<?php echo $bannerRow['small_text_colour'];?>"><?php echo $bannerRow['banner_small_text'];?></p>
								<h1 class="bannerHeading mb-0" style="color:<?php echo $bannerRow['title_colour'];?>"><?php echo $bannerRow['banner_title'];?></h1>
								<div class="shopNowContainer mt-3">
									<a href="#"><button class="btn showNowButton" style="background-color:<?php echo $bannerRow['button_colour'];?>"><?php  echo $bannerRow['button_text'];?></button></a>                                                                                                                                                                                                    
								</div>
							</div>	
							<img src="<?php echo BANNERS_PATH . $bannerRow['banner_image'];?>"/>
							<!--<img src="<?php //echo IMAGES_PATH;?>bannerImage.jpg"/>-->                                                                                                                                                                                                                                                                                                                                                                                      
						</div>
					</div>
				</div>
			</div>
			<?php
			}
		}
			?>
			
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		 <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>
</section>

