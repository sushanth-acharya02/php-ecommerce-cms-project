<?php
//print_r($_SERVER);
include_once('lib/connect_db.php');
include_once('lib/general.php');
include_once('inc/function.php');

$db=new DBController();
$general=new General();

$mainCategory="";
$subCategory="";
$subSubCategory="";

$productDisplay = 0;
$catProText = 'Category';
if(isset($_GET["cid"])){
	$mainCategory=$_GET["cid"];
}
if(isset($_GET["scid"])){
	$subCategory=$_GET["scid"];
}
if(isset($_GET["sscid"])){
	$subSubCategory=$_GET["sscid"];
	$productDisplay = 1;
	$catProText = 'Product';
}
$products=$general->getProductBySeoUrl($mainCategory,$subCategory,$subSubCategory);
//print_r($products);
?>
<!doctype html>
<html lang="en">
	<?php include_once('inc/header_includes.php'); ?>
	<body>
		<?php include_once('inc/header.php'); ?>		
			<section class="container mt-5">
				<h2 class="text-center text-primary"><?=$catProText;?> List(s)</h2>
				<div class="row mt-5">
<?php
					if($productDisplay  == 0){
						foreach($products as $subCatRow){
							print_r($subCatRow);
							if($subCategory != ''){
								$subCategoryRow = $general->getCategoryDetailsByID($subCatRow['pcid']);
								//print_r($subCategoryRow);
								//echo $subCategoryRow["pk_id"];
								$mainCategoryRow = $general->getCategoryDetailsByID($subCategoryRow['pcid']);
								//print_r($mainCategoryRow);
								//echo $mainCategoryRow["pk_id"];
								$subCatURL = $subCategoryRow['seo_url'].'/';
								$mainCatURL = $mainCategoryRow['seo_url'].'/';
							}else {
								$subCatURL = '';
								$mainCatURL = $subCatRow['seo_url'].'/';
							}
?>					
							<div class="col-3">
								<div class="mainCategoryContainer">
									<a href=""><img src="<?php echo UPLOADS_PATH . $subCatRow['image'];?>"/></a>
								</div>
								<h2 class="text-center mt-3"><?php echo $subCatRow['title'];?></h2>
								<div class="categoryButton">
									<a href="<?php echo ROOT_PATH.$mainCatURL.$subCatURL.$subCatRow['seo_url'].".htm";?>" class="btn btn-outline-primary">Shop Now</a>
								</div>
							</div>
<?php
						}
					}else {
						foreach($products as $product){
							$subSubCategoryRow = $general->getCategoryDetailsByID($product['fk_category']);
							$subCategoryRow = $general->getCategoryDetailsByID($subSubCategoryRow['pcid']);
							$mainCategoryRow = $general->getCategoryDetailsByID($subCategoryRow['pcid']);
?>
							<div class="col-3">
								<div class="categoryProductContainer">
									<div class="categoryProductImage mx-4 my-5">
										<a href="<?php echo ROOT_PATH.$mainCategoryRow['seo_url'].'/'.$subCategoryRow['seo_url'].'/'.$subSubCategoryRow['seo_url'].'/'.$product['seo_url'].".htm";?>"><img src="<?php echo UPLOADS_PATH . "product_image".$product['pk_id'].".jpg";?>" /></a>
									</div>
									<div class="categoryProductInfo mx-2">
										<h3 class="categoryProductName mt-3 mb-1"><?php echo $product['product_title'];?></h3>
										<p class="categoryProductRating mb-0"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> 5.0</p>
										<p>Rs. <?php echo $product['product_price'];?></p>
									</div>
								</div>
							</div>
<?php
						}
					}
?>
				</div>
			</section>
		<?php include_once('inc/footer.php'); ?>
	</body>
	
</html>