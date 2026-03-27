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
$bannerList=$general->getBanner();

?>
<!doctype html>
<html lang="en">
	<?php include_once('inc/header_includes.php'); ?>
	<body>
		<?php include_once('inc/header.php'); ?>
		<section class="container mt-5">
			<div class="row">
				<div class="col-12">
					<h1 class="text-center mt-4 text-primary">Banner Lists</h1>
					<div class="text-center text-success">
<?php					
					if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION["msg"]);
					}
?>
					</div>
					<div class="addBannerContainer">
						<button class="btn addBannerButton text-light"><a href="banner-add-edit.php">Add Banner</a></button>
					</div>
					
					<div class="tableList">
						<table class="tabledata">
							<thead class="tableHead text-center">
								<tr>
									<th colspan="4">Action</th>
									<th>Banner Title</th>
									<th>Title Colour</th>
									<th>Button Text</th>
									<th>Button Colour</th>
								</tr>
							</thead>
							<tbody class="text-center">
<?php
								if(!empty($bannerList)){
									foreach($bannerList as $row){	
										if($row['live']=="1"){
											$bannerLive="Live";
										}else{
											$bannerLive="Un-Live";
										}
?>										
									<tr>
										<td>																														
											<!--<a data-toggle="tooltip" title="<img src='ecommerce/cms/uploads/<?php //echo $row['banner_image']?>' />">-->		
											<a data-toggle="tooltip" title="<img src='<?php echo UPLOADS_PATH . $row['banner_image']?>' width='100' />">
											<i class="fa-solid fa-image"></i>
											</a>
										</td>
										
										<td><a href=""><div onclick="liveBanner('<?= $row['pk_id']?>')" id="liveData<?=$row['pk_id']?>"><?=$bannerLive;?></div></a></td>
										<td><a href="banner-add-edit.php?id=<?= $row['pk_id']?>">Edit</a></td>
										<td><a href="banner-delete.php?id=<?= $row['pk_id']?>">Delete</a></td>
										<td><?php echo $row['banner_title']?></td>
										<td><div class="titleColourBox" style="background-color:<?php echo $row['title_colour'];?>;"></div></td>
										<td><?php echo $row['button_text']?></td>
										<td><div class="buttonColourBox" style="background-color:<?php echo $row['button_colour'];?>;"></div></td>
									</tr>
<?php										
								}
								}
?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</section>
		<?php include_once('inc/footer.php');?>
	</body>
</html>

