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

$titleErr="";
$title="";

$success="";
$validate=true;

if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id="";
}
$shoeColourRow="";
if(!empty($id)){
	$shoeColourRow=$general->getShoeColourById($id);
	$addEditText = 'Edit';
	$addUpdateButton = 'Update';
}else {
	$addEditText = 'Add';
	$addUpdateButton = 'Add';
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(empty($_POST["title"])){
		$titleErr="Please fill the title";
		$validate=false;
	}else{
		$titleErr="";
		$title=$_POST["title"];
	}
	
	if($validate){
		if(!empty($id)){
			$result=$general -> editShoeColour($id);
			if($result>0){
				$_SESSION['msg']="Shoe colour updated successfully";
				header('Location:shoe-colour-listing.php');
				//$success="Shoe colour updated successfully";
			}else{
				$_SESSION['msg']="Shoe colour not updated";
				header('Location:shoe-colour-listing.php');
				//$success="Shoe colour not updated ";
			}
		}else{
			$result=$general -> addShoeColour();
			if($result>0){
				$_SESSION['msg']="Shoe colour inserted successfully";
				header('Location:shoe-colour-listing.php'); 
				//$success="Shoe colour inserted successfully";
			}else{
				$_SESSION['msg']="Shoe colour not inserted ";
				header('Location:shoe-colour-listing.php');
				//$success="Shoe colour not inserted";
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
					<div class="cmsShoeColourContainer">
						<form class="mx-3" action="" method="post" name="shoeColourForm" onsubmit="return colourValidateForm()" >
						
							<h2 class="text-center text-primary"><?=$addEditText;?> Colour</h2>

							<div class="text-center">
								<span class="text-success"><?php echo $success;?></span><br>
							</div>
							
							<div class="mb-3">
								<label for="title" class="form-label">Title</label>
								<input type="text" class="form-control" id="title" name="title" value="<?php if(!empty($shoeColourRow)) echo $shoeColourRow['title'];?>"/>
								<span id="titleError" class="error text-danger"><?php echo $titleErr ;?></span>
							</div>
							
							<div class="mb-3">
								<label for="colour" class="form-label">Colour</label>
								<input type="color" class="form-control" id="colour" name="colour" value="<?php echo !empty($shoeColourRow['colour']) ? $shoeColourRow['colour']:'#000000';?>" />
								<span id="colourError" class="error text-danger"></span>
							</div>                              
							<a href="shoe-colour-listing.php" class="btn btn-warning mb-4 shoeColourBackButton">Back</a>										
							<button type="submit" class="btn btn-primary mb-4"><?=$addUpdateButton;?></button>
									
						</form>
					</div>
				</div>
			</div>
		</section>
		<?php include_once('inc/footer.php');?>
	</body>
</html>