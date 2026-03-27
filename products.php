<?php
include_once('lib/connect_db.php');
include_once('lib/general.php');
include_once('inc/function.php');

$db=new DBController();
$general=new General();

$getAllProducts=$general->getAllProducts();
?>
<!doctype html>
<html lang="en">
	<?php include_once('inc/header_includes.php'); ?>
	<body>
	<?php include_once('inc/header.php'); ?>
		<section class="container mt-5">
			<h2 class="text-center text-primary">All Products</h2>
			<div class="row mt-5">
<?php
			foreach($getAllProducts as $allProductRow){
				$subSubCategoryRow = $general->getCategoryDetailsByID($allProductRow['fk_category']);
				$subCategoryRow = $general->getCategoryDetailsByID($subSubCategoryRow['pcid']);
				$mainCategoryRow = $general->getCategoryDetailsByID($subCategoryRow['pcid']);
?>
				<div class="col-3 mb-5">
					<div class="allProductContainer">
					<a href="<?php echo ROOT_PATH.$mainCategoryRow['seo_url'].'/'.$subCategoryRow['seo_url'].'/'.$subSubCategoryRow['seo_url'].'/'.$allProductRow['seo_url'].".htm";?>">
						<div class="allProductImage mx-4 my-5">
								<img src="<?php echo UPLOADS_PATH . "product_image".$allProductRow['pk_id'].".jpg";?>" />
						</div>
					</a>	
						<div class="allProductInfo mx-2">
							<h3 class="allProductName mt-3 mb-1"><?php echo $allProductRow['product_title'];?></h3>
							<p class="allProductRating mb-0"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> 5.0</p>
							<p>Rs. <?php echo $allProductRow['product_price'];?></p>
							<!--<a class="btn text-primary" href="product-details.php?id=<?//= $allProductRow['pk_id'];?>">Buy Now</a>	-->	
						</div>
					</div>
					
				</div>
<?php
			}
?>
			</div>
		</section>	
	<?php include_once('inc/footer.php'); ?>
	</body>
</html>