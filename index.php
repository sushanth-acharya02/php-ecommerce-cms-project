
<?php
include_once('lib/connect_db.php');
include_once('lib/general.php');
include_once('inc/function.php');

$db=new DBController();
$general=new General();
?>
<!doctype html>
<html lang="en">
	<?php include_once('inc/header_includes.php'); ?>
	<body>
		<?php include_once('inc/header.php'); ?>
		
		<?php include_once('inc/banner.php'); ?>
		
		<section class="container mt-5">
		<h2 class="text-center text-primary">Main Category</h2>
			<div class="row mt-4">
<?php
			$getMainCategory = $general->getMainCategory();
			//print_r($getMainCategory);
			foreach($getMainCategory as $mainCategoryRow){	
				
					
?>
				<div class="col-4">
					<div class="mainCategoryContainer">
						<a href=""><img src="<?php echo UPLOADS_PATH . $mainCategoryRow['image'];?>"/></a>
					</div>
					<h2 class="text-center mt-3"><?php echo $mainCategoryRow['title'];?></h2>
					<div class="categoryButton">
						<a href="<?php echo ROOT_PATH.$mainCategoryRow['seo_url'].".htm";?>" class="btn btn-outline-primary">Shop Now</a>
					</div>
				</div>
<?php
			}
?>	
			</div>
		</section>
		
		<section class="container mt-5">
		<h2 class="text-center text-primary">Our products</h2>
			<div class="row mt-4">
<?php
			$getProducts = $general->getProducts();
			foreach($getProducts as $productsRow){
				
				$subSubCategoryRow = $general->getCategoryDetailsByID($productsRow['fk_category']);                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
				
				$subCategoryRow = $general->getCategoryDetailsByID($subSubCategoryRow['pcid']);

				$mainCategoryRow = $general->getCategoryDetailsByID($subCategoryRow['pcid']);
?>
				<div class="col-3">
					<div class="productContainer">
						<div class="productImage mx-4 my-5">
							<a href="<?php echo ROOT_PATH.$mainCategoryRow['seo_url'].'/'.$subCategoryRow['seo_url'].'/'.$subSubCategoryRow['seo_url'].'/'.$productsRow['seo_url'].".htm";?>"><img src="<?php echo UPLOADS_PATH . "product_image".$productsRow['pk_id'].".jpg"; ?>" /></a>
						</div>
						<div class="productInfo mx-2">
							<p class="productName mt-3 mb-1"><?php echo $productsRow['product_title'];?></p>
							<p class="productRating mb-0"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> 5.0</p>
							<p>Rs. <?php echo $productsRow['product_price'];?></p>
						</div>
					</div>
				</div>
<?php
			}
?>		
			</div>
		</section>
		
		<?php include_once('inc/blog.php'); ?>	
		
		<?php include_once('inc/footer.php');?>
	</body>
</html>