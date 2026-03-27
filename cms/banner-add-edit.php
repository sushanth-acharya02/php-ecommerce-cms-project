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

$bannerImageErr="";
$bannerTitleErr="";
//$bannerSmallTextErr="";
$buttonTextErr="";

$bannerTitle="";
$bannerSmallText="";
$buttonText="";

$success="";
$validate=true;

if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id="";
}

$bannerRow=array();
if(!empty($id)){
	$bannerRow=$general->getBannerById($id);	
	$addEditText = 'Edit';
	$addUpdateButton = 'Update';
}else{
	$addEditText = 'Add';
	$addUpdateButton = 'Add';
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
	
	if(empty($_FILES["bannerImage"]["name"])){
		$bannerImageErr="Please attach the bannerImage";
		$validate=false;
	}else{
		$bannerImageErr="";
	}
	
	if(empty($_POST["bannerTitle"])){
		$bannerTitleErr="Please fill the banner title";
		$validate=false;
	}else{
		$bannerTitleErr="";
		$bannerTitle=$_POST["bannerTitle"];
	}
	
	/*if(empty($_POST["bannerSmallText"])){
		$bannerSmallTextErr="Please fill the banner title";
		$validate=false;
	}else{
		$bannerSmallText=$_POST["bannerSmallText"];
	}*/
	
	if(empty($_POST["buttonText"])){
		$buttonTextErr="Please fill the banner title";
		$validate=false;
	}else{
		$buttonTextErr="";
		$buttonText=$_POST["buttonText"];
	}
	
	if($validate){
		if(!empty($id)){
			$result=$general -> editBanner($id);
			if($result>0){
				$_SESSION['msg']="Banner updated successfully";
				header('Location:banner-listing.php');    
				//$success="Banner updated successfully";
			}else{
				$_SESSION['msg']="Banner not updated";
				header('Location:banner-listing.php');
				//$success="Banner not updated";
			}
		}else{
			$result=$general -> addBanner();
			if($result>0){
				$_SESSION['msg']="Banner inserted successfully";
				header('Location:banner-listing.php');                                                                                                                                                                                                                                            
				//$success="Banner inserted successfully";
			}else{
				$_SESSION['msg']="Banner not inserted";
				header('Location:banner-listing.php');    
				//$success="Banner not inserted";   
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
					<div class="cmsBannerContainer">
						<form class="mx-3" action="" method="post" name="bannerForm" onsubmit="return bannerValidateForm()" enctype="multipart/form-data" >

							<h2 class="text-center text-primary"><?=$addEditText;?> Banner</h2>

							<div class="text-center">
								<span class="text-success"><?php echo $success;?></span><br>
							</div>
							
							<div class="mb-3">
								<label for="bannerImage" class="form-label">Banner Image</label>
								
<?php
								if(!empty($id)){
?>
								<div class="imageBanner mt-2 mb-2">
									<img class="prefillImage" src="<?php if (!empty($bannerRow))echo UPLOADS_PATH . $bannerRow['banner_image'];?>" />
								</div>
								<span>
									<input type="checkbox" name="deleteImage" value="1"/> ckeck to update image<br>
								</span>
<?php
								}
?>
								<input type="file" class="form-control" id="bannerImage" name="bannerImage" />
								<span id="bannerImageError" class="error text-danger"><?php echo $bannerImageErr;?></span>
							</div>
							
							<div class="mb-3">
								<label for="bannerTitle" class="form-label">Banner title</label>
								<input type="text" class="form-control" id="bannerTitle" name="bannerTitle" value="<?php if(!empty($bannerRow)) echo $bannerRow['banner_title'];?>"/>
								<span id="bannerTitleError" class="error text-danger"><?php echo $bannerTitleErr;?></span>
							</div>
							
							<div class="mb-3">
								<label for="titleColour" class="form-label">Title colour</label>
								<input type="color" class="form-control" id="titleColour" name="titleColour" value="<?php echo !empty($bannerRow['title_colour']) ? $bannerRow['title_colour']:'#00FFFF';?>" />                              
								<span id="titleColourError" class="error text-danger"></span>
							</div>
							
							<div class="mb-3">
								<label for="bannerSmallText" class="form-label">Banner small text</label>
								<input type="text" class="form-control" id="bannerSmallText" name="bannerSmallText" value="<?php if(!empty($bannerRow)) echo $bannerRow['banner_small_text'];?>"/>
								<span id="bannerSmallTextError" class="error text-danger"></span>
							</div>
							
							<div class="mb-3">
								<label for="smallTextColour" class="form-label">Small text colour</label>
								<input type="color" class="form-control" id="smallTextColour" name="smallTextColour" value="<?php echo !empty($bannerRow['small_text_colour']) ? $bannerRow['small_text_colour']:'#FF0000';?>" /> 
								<span id="smallTextColourError" class="error text-danger"></span>
							</div>
							
							<div class="mb-3">
								<label for="buttonText" class="form-label">Banner Button text</label>
								<input type="text" class="form-control" id="buttonText" name="buttonText" value="<?php if(!empty($bannerRow)) echo $bannerRow['button_text'];?>" />
								<span id="buttonTextError" class="error text-danger"><?php echo $bannerTitleErr;?></span>
							</div>
							
							<div class="mb-3">
								<label for="buttonColour" class="form-label">Button colour</label>								
								<input type="color" class="form-control" id="buttonColour" name="buttonColour" value="<?php echo !empty($bannerRow['button_colour']) ? $bannerRow['button_colour']:'#0641C8';?>" /> 
								<span id="buttonTextColourError" class="error text-danger"></span>
							</div>		
							<a href="banner-listing.php" class="btn btn-warning mb-4 bannerBackButton">Back</a>

							<button type="submit" class="btn btn-primary mb-4"><?=$addUpdateButton;?></button>
						
						</form>
					</div>
				</div>
			</div>
		</section>
		<?php include_once('inc/footer.php');?>
	</body>
</html>