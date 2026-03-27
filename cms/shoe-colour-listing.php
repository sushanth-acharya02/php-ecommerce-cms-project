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
$showColourList=$general->getShoeColour();

?>
<!doctype html>
<html lang="en">
	<?php include_once('inc/header_includes.php'); ?>
	<body>
		<?php include_once('inc/header.php'); ?>
		<section class="container mt-5">
			<div class="row">
				<div class="col-12">
					<h1 class="text-center mt-4 text-primary">Shoe Colour Lists</h1>
					
					<div class="text-center text-success">
<?php					
					if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION["msg"]);
					}
?>
					</div>
					
					<div class="addColourButtonContainer">
						<button class="btn addColourButton text-light"><a href="shoe-colour-add-edit.php">Add Colour</a></button>
					</div>
					<div class="tableList">
						<table class="tabledata">
							<thead class="tableHead text-center">
								<tr>
									<th colspan="3" class="tableActionContainer">Action</th>
									<th>Title</th>
									<th>Colour</th>
								</tr>
							</thead>
							<tbody class="text-center">
<?php
								if(!empty($showColourList)){
									foreach($showColourList as $row){
										if($row['live']=="1"){
											$colourLive="Live";
										}else{
											$colourLive="Un-Live";
										}
?>										
									<tr>
										<td><a href=""><div onclick="liveColour('<?= $row['pk_id']?>')" id="liveData<?=$row['pk_id']?>"><?=$colourLive;?></div></a></td>
										<td><a href="shoe-colour-add-edit.php?id=<?= $row['pk_id']?>">Edit</a></td>
										<td><a href="shoe-color-delete.php?id=<?= $row['pk_id']?>">Delete</a></td>
										<td><?php echo $row['title'];?></td>
										<td><div class="shoeColourBox" style="background-color:<?php echo $row['colour'];?>;"></div></td>										
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