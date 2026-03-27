<?php
//session_start();
//echo session_id();

//print_r($_SERVER);
include_once('lib/connect_db.php');
include_once('lib/general.php');
include_once('inc/function.php');

$db=new DBController();
$general=new General();

$mainCategory="";
$subCategory="";
$subSubCategory="";
$productName="";

if(isset($_GET["cid"])){
	$mainCategory=$_GET["cid"];
}

if(isset($_GET["scid"])){
	$subCategory=$_GET["scid"];
}
if(isset($_GET["sscid"])){
	$subSubCategory=$_GET["sscid"];
}
if(isset($_GET["pid"])){
	$productSeoUrl=$_GET["pid"];
}

$products=$general->getProductBySeoUrl($mainCategory,$subCategory,$subSubCategory,$productName); 

$sizeErr="";
$size="";
$validate=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(empty($_POST['size'])){
		$sizeErr="Please select the size";
		$validate=false;
	}else{
		$size=$_POST['size'];
	}
}

//print_r($products[0]['pk_id']);
//print_r($products);
?>

<!doctype html>
<html lang="en">
	<?php include_once('inc/header_includes.php'); ?>
	<body>
	<?php include_once('inc/header.php'); ?>
		<section class="container">
			<h2 class="text-center text-primary mt-5">Product Details</h2>
			<div class="row mt-5">
			
				<div class="col-6">
					<div class="singleProductImage">
						<a href=""><img src="<?php echo UPLOADS_PATH . "product_image".$products[0]['pk_id'].".jpg";?>" /></a>
					</div>	
				</div>
				<div class="col-6">
					<div class="singleProductInfo mx-5 mt-4">
						<h2 class="singleProductName"><?php echo $products[0]['product_title'];?></h2>	
						
						<p class="singleProductRating mb-0"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> 5.0</p>
						<p class="mt-2">PRICE  Rs. <?php echo $products[0]['product_price'];?></p>
						
						<?php
						$shoeColour=$general->fetchShoeColour($products[0]['fk_colour']);	
						?>
						
						<p><?php echo $products[0]['product_description'];?></p>
						
						<form method="post" action="" name="productDetailsForm" onsubmit="return prouductDetailsForm()"> 
							<input type="hidden" name="product_id" value="<?php echo $products[0]['pk_id'];?>" />
							
							<label class="form-label">Colour</label>
							<div>	
								<input type="hidden" name="colour" value="<?php echo $products[0]['fk_colour'];?>"  />
								<span class="shoeColourBox" style="background-color:<?php echo $shoeColour['colour'];?>"></span>
							</div>	
							<br>
							
							<label class="form-label">Size</label>
							<br>
							<span id="sizeError" class="error text-danger"><?php //echo $sizeErr;?></span>
							<div>
							<?php
							$shoeSize=$general->fetchShoeSize($products[0]['pk_id']);
							//print_r($shoeSize);
							if(isset($shoeSize)){
								foreach($shoeSize as $size){
									//print_r($size);
								?>
								<input type="radio" name="size" value="<?php echo $size['size'];?>" />
								<span><?php echo $size['size'];?></span>
								<?php
									}
							}
							?>
							</div>
							
							<br>
							<label>Quantity</label>
							<input type="number" name="quantity" class="form-control sizeQuantityInputField" value="1" min="1" />
							<button type="submit" class="btn btn-primary mt-3">Add to cart</button>
							
						</form>
						
					</div>
				</div>
				
			</div>
		</section>
	<?php include_once('inc/footer.php'); ?>
	</body>
</html>