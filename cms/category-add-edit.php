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

$categoryTitleErr="";
$categoryTitle="";
$success="";
$validate=true;

if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id="";
}

$categoryRow = array();
if(!empty($id)){
	$categoryRow=$general->getCategoryById($id);	
	$addEditText = 'Edit';
	$addUpdateButton = 'Update';
}else{
	$addEditText = 'Add';
	$addUpdateButton = 'Add';
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(empty($_POST["categoryTitle"])){
		$categoryTitleErr="Please fill the title";
		$validate=false;
	}else{
		$categoryTitleErr="";
		$categoryTitle=$_POST["categoryTitle"];
	}
	
	if($validate){
		if(!empty($id)){
			$result=$general->editCategory($id);
			if($result>0){
				$_SESSION['message']="Category updated successfully";
				header('Location: category-listing.php');
			}else{
				$_SESSION['message']="Category not updated";
				header('Location: category-listing.php');
			}
		}else{
			$result=$general -> addCategory();
			if($result>0){
				$_SESSION['message']="Category added successfully";
				header('Location: category-listing.php');
			}else{
				$_SESSION['message']="Category not added";
				header('Location: category-listing.php');
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
					<div class="cmsCategoryContainer">
						<form class="mx-3" action="" method="post" name="categoryForm" onsubmit="return categoryValidateForm()" enctype="multipart/form-data" >

							<h2 class="text-center text-primary"><?= $addEditText;?> Category</h2>

							<div class="text-center">
								<span class="text-success"><?php echo $success;?></span><br>
							</div>
							
							<div class="mb-3">
								<label for="category" class="form-label">Select category</label>
								<select class="form-select" name="category" id="category">
									<option value="0" <?php if(isset($categoryRow['pcid']) && $categoryRow['pcid']==0) echo 'selected'; else echo 'selected';?>>This is the main category</option>
<?php 
									if(!empty($parentCategory)){
										foreach($parentCategory as $subRow){
											
											$selected='';
											if($categoryRow['pcid']==$subRow['pk_id']){
												$selected='selected';
											}else{
												$selected='';
											}
?>											
											<option value="<?php echo $subRow['pk_id'] ?>" <?php echo $selected;?> ><?php echo $subRow['title'];?></option>
<?php
											$subCategory=$general->getSubCategory($subRow['pk_id']);
											foreach($subCategory as $subSubRow){
												$selectedSub='';
												if($categoryRow['pcid']==$subSubRow['pk_id']){
													$selectedSub='selected';
												}else{
													$selectedSub='';
												}
?>
											
												<option value="<?php echo $subSubRow['pk_id']?>" <?php echo $selectedSub;?> >-><?php echo $subSubRow['title'];?></option>
<?php
											}
										}
									}
?>
								</select>
							</div>
							
							<div class="mb-3">
								<label for="categoryTitle" class="form-label">Title</label>
								<input type="text" class="form-control" id="categoryTitle" name="categoryTitle" value="<?php if(!empty($categoryRow)) echo $categoryRow['title'];?>" />
								<span id="categoryTitleError" class="error text-danger"><?php echo $categoryTitleErr?></span>
							</div>
							
							<div class="mb-3">
								<label for="categoryImage" class="form-label">Image</label>
<?php
								if(!empty($id)){
?>	
								<div class="imageCategory mt-2 mb-2">
									<img class="categoryImage" src="<?php if (!empty($categoryRow))echo UPLOADS_PATH . $categoryRow['image'];?>" />
								</div>
								<span>
									<input type="checkbox" name="deleteImage" value="1"/> ckeck to update image<br>
								</span>
<?php
								}
?>
								<input type="file" class="form-control" id="categoryImage" name="categoryImage" value=""/>
								<span id="categoryImageError" class="error text-danger"></span>
							</div>

							<a href="category-listing.php" class="btn btn-warning mb-4 ">Back</a>

							<button type="submit" class="btn btn-primary mb-4"><?=$addUpdateButton?></button>
						
						</form>
					</div>
				</div>
			</div>
		</section>
		<?php include_once('inc/footer.php');?>
	</body>
</html>