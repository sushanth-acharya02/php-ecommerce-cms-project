<?php
session_start();

if (!isset($_SESSION['email'])) {
	header("Location: login.php");
	exit();
}

include_once('lib/connect_db.php');
include_once('lib/general.php');
include_once('inc/function.php');

$db=new DBController();
$general=new General();

$parentCategory=$general->getParentCategory();

$shoeColourRow=$general->getShoeColour();



//echo "<pre>";
//print_r($shoeColourRow);

$titleErr="";
$categoryErr="";
$colourErr="";
$sizeErr="";
$descriptionErr="";
$priceErr="";
$imageErr="";

$title="";
$category="";
$colour="";
$sizes="";
$description="";
$price="";
$image="";

$validate=true;

if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id="";
}

$productRow=array();
$imageRow=array();

$mainImage="";
$imageTwo="";
$imageThree="";

if(!empty($id)){
	$productRow=$general->getProductById($id);
	$imageRow=$general->getImage($id);
	//echo "<pre>";
	//print_r($imageRow);
	
	if(!empty($imageRow[0]['images'])){
		$mainImage=$imageRow[0]['images'];
		$mainImageId=$imageRow[0]['pk_id'];
		//echo $mainImage;
	}
	if(!empty($imageRow[1]['images'])){
		$imageTwo=$imageRow[1]['images'];
		$imageTwoId=$imageRow[0]['pk_id'];
		//echo $imageTwo;
	}
	if(!empty($imageRow[2]['images'])){
		$imageThree=$imageRow[2]['images'];
		$imageThreeId=$imageRow[0]['pk_id'];
		//echo $imageThree;
	}
	
	$addEditText="Edit";
	$addUpdateButton="Update";
}else{
	$addEditText="Add";
	$addUpdateButton="Add";
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(empty($_POST["title"])){
		$titleErr="Please fill the title";
		$validate=false;
	}else{
		$titleErr="";
		$title=$_POST["title"];
	}
	
	if(empty($_POST["category"])){
		$categoryErr="Please select the category";
		$validate=false;
	}else{
		$categoryErr="";
		$category=$_POST["category"];
	}
	
	if(empty($_POST["colour"])){
		$colourErr="Please select the colour";
		$validate=false;
	}else{
		$colourErr="";
		$colour=$_POST["colour"];
	}
	
	if(empty($_POST["sizes"])){
		$sizeErr="Please select atleast one size";
		$validate=false;
	}else{
		$sizes=$_POST["sizes"];
	}
	
	if(empty($_POST["description"])){
		$descriptionErr="Please fill the description";
		$validate=false;
	}else{
		$descriptionErr="";
		$description=$_POST["description"];
	}
	
	if(empty($_POST["price"])){
		$priceErr="Please fill the price";
		$validate=false;
	}else{
		$priceErr="";
		$price=$_POST["price"];
	}
	
	if(empty($_FILES["image"]["name"]) && (isset($_POST['deleteImage']) && $_POST['deleteImage'] != 1)){
		$imageErr="Please select the image";
		$validate=false;
	}else{
		$imageErr="";
	}
	
	if($validate){
		if(!empty($id)){
			$result=$general->editProduct($id);
			$sizes=$_POST["sizes"];
			foreach($sizes as $size){
				$insertSize=$general->insertSize($size,$id);
			}
			if($result>0){
				$_SESSION["msg"]="Product updated successfully";
				header("Location:product-listing.php");
			}else{
				$_SESSION["msg"]="Product not updated";
				header("Location:product-listing.php");
			}
		}else{
		$result=$general->addProduct();
		//print_r($result);
		$sizes=$_POST["sizes"];
		foreach($sizes as $size){
			$insertSize=$general->insertSize($size,$result);
		}
		
		if($result>0){
			$_SESSION["msg"]="Product added successfuly";
			header("Location: product-listing.php");
		}else{
			$_SESSION["msg"]="Product not added";
			header("Location: product-listing.php");
		}
		}
	}
}

?>
<!doctype html>
<html lang="en">
	<?php include_once('inc/header_includes.php'); ?>
	<body>
		<?php include_once('inc/header.php'); ?>
		<section class="container mt-5">
			<div class="row">
				<div class="col-12">
					<div class="cmsProductContainer">
						<form class="mx-3" action="" method="post" name="productForm" onsubmit="return productValidateForm()" enctype="multipart/form-data" >

							<h2 class="text-center text-primary"><?= $addEditText;?> Product</h2>
							
							<div class="mb-3">
								<label for="title" class="form-label">Product title</label>
								<input type="text" class="form-control" id="title" name="title" value="<?php if(!empty($productRow)) echo $productRow['product_title'];?>"/>
								<span id="titleError" class="error text-danger"><?php echo $titleErr;?></span>
							</div>
							
							<div class="mb-3">
								<label for="category" class="form-label">Category</label>
								<select class="form-select" name="category" id="category">
									<option value="0"<?php ?> >Select a category</option>
<?php 
									if(!empty($parentCategory)){
										foreach($parentCategory as $row){
											
											$selected='';
											if($productRow['fk_category']==$row['pk_id']){
												$selected='selected';
											}else{
												$selected='';
											}										
?>											 
											<option value="<?php echo $row['pk_id'];?>" <?php echo $selected;?> ><?php echo $row['title'];?></option>
<?php
											$subCategory=$general->getSubCategory($row['pk_id']);
											foreach($subCategory as $subRow){
												$selectedSub='';
												if($productRow['fk_category']==$subRow['pk_id']){
													$selectedSub='selected';
												}else{
													$selectedSub='';
												}
?>											
												<option value="<?php echo $subRow['pk_id'];?>" <?php echo $selectedSub;?>>-><?php echo $subRow['title'];?></option>
<?php
												$subSubCategory=$general->getSubSubCategory($subRow['pk_id']);
												foreach($subSubCategory as $subSubRow){	
													$selectedSubSub='';
													if($productRow['fk_category']==$subSubRow['pk_id']){
														$selectedSubSub='selected';														
													}else{
														$selectedSubSub='';
													}
												
?>
												<option value="<?php echo $subSubRow['pk_id'];?>"<?php echo $selectedSubSub;?>>--> <?php echo $subSubRow['title'];?></option>
<?php										
												}
											}
										}
									}
?>
								</select>
								<span id="categoryError" class="error text-danger"><?php echo $categoryErr;?></span>
							</div>
							
							<div class="mb-3">
								<label for="colour" class="form-label">Shoe Colour</label>
								<select class="form-select" name="colour" id="colour">
									<option value="0" selected>Select a Colour</option>	
<?php
									if(!empty($shoeColourRow)){
										foreach ($shoeColourRow as $shoeColour){ 
											if($productRow['fk_colour']==$shoeColour['pk_id']){
												$selected='selected';
											}else{
												$selected='';
											}
										
?>
									<option value="<?php echo $shoeColour['pk_id'];?>"<?php echo $selected;?>><?php echo $shoeColour['title'];?></option>
<?php
										}
									}
?>
								</select>
								<span id="colourError" class="error text-danger"><?php echo $colourErr;?></span>
							</div>
							
							
							<div class="mb-3">
								<label class="form-label">Shoe Size</label><br>
								<span id="sizeError" class="error text-danger"><?php echo $sizeErr;?></span>
								<?php
								if(!empty($id)){
									$shoeSizeRow=$general->getShoeSize($productRow['pk_id']);
									$savedSize=[];
									//echo "<pre>";
									//print_r($shoeSizeRow);
									if(!empty($shoeSizeRow)){
										foreach($shoeSizeRow as $shoeSize){
											$savedSize[]=$shoeSize['size'];
											//print_r($savedSize);
										}
									}
								}
								?>
								<?php
									$allSizes=[6,7,8,9,10];
									foreach($allSizes as $size){
								?>
								<input type="checkbox" name="sizes[]" value="<?php echo $size;?>" <?php if(!empty($shoeSizeRow)){if(in_array($size,$savedSize)) {echo "checked";}}?> /><?php echo $size;?><br>
								
								<?php								
								}
								?>
							</div>
							
							
							<div class="mb-3">
								<label for="description">Product Description</label>
								<textarea id="description" name="description" class="form-control inputArea"><?php if(!empty($productRow)) echo $productRow['product_description'];?></textarea>
								<span id="descriptionError" class="error text-danger"><?php echo $descriptionErr;?></span>
							</div>
							
							<div class="mb-3">
								<label for="price" class="form-label">Product price</label>
								<input type="text" class="form-control" id="price" name="price" value="<?php if(!empty($productRow)) echo $productRow['product_price'];?>" /> <!--pattern="^\d*(\.\d{0,2})?$"-->
								<span id="priceError" class="error text-danger"><?php echo $priceErr;?></span>
							</div>
							
							
							<div class="mb-3">
								<label for="image" class="form-label">Main Image</label>
<?php
								if(!empty($mainImage)){ 
?>
								<div class="productImage mt-2 mb-2">
									<img class="productImg" src="<?php echo UPLOADS_PATH . $mainImage;?>" />
								</div>
								<span>
									<input type="checkbox" id="deleteImage" name="deleteImage" value="1" /> Check to update image<br>
									<input type="hidden" name="mainImageId" value="<?=$mainImageId;?>" />
								</span>
<?php
								}
?>
								<input type="file" class="form-control" id="image" name="image"/>
								<span id="imageError" class="error text-danger"><?php echo $imageErr;?></span>
							</div>
							
							
							<div class="mb-3">
								<label for="imageTwo" class="form-label">Product Image 2</label>
<?php
								if(!empty($imageTwo)){
									
?>
								<div class="productImage mt-2 mb-2">
									<img class="productImg" src="<?php echo UPLOADS_PATH . $imageTwo;?>"/>
								</div>
								<span>
									<input type="checkbox" name="deleteImageTwo" value="1" /> Check to update image<br>
									<input type="hidden" name="imageTwoId" value="<?=$imageTwoId;?>" />
								</span>
<?php
								}
?>
								<input type="file" class="form-control mt-2" id="imageTwo" name="imageTwo" />
							</div>
							
								
							<div class="mb-3">
								<label for="imageThree" class="form-label">Product Image 3</label>
<?php
								if(!empty($imageThree)){
?>
								<div class="productImage mt-2 mb-2">
									<img class="productImg" src="<?php echo UPLOADS_PATH . $imageThree;?>"/>
								</div>
								<span>
									<input type="checkbox" name="deleteImageThree" value="1" /> Check to update image<br>
									<input type="hidden" name="imageThreeId" value="<?=$imageThreeId;?>" />
								</span>
<?php
								}
?>
								<input type="file" class="form-control mt-2" id="imageThree" name="imageThree" />
							</div>
							
							<a href="product-listing.php" class="btn btn-warning mb-4 ">Back</a>

							<button type="submit" class="btn btn-primary mb-4"><?= $addUpdateButton;?></button>
						
						</form>
					</div>
				</div>
			</div>
		</section>
		<?php include_once('inc/footer.php');?>
	</body>
</html>