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

$productList=$general->getProduct();
//print_r($productList);
//$category=$general->getCategories();
//echo "<pre>";
//print_r($category)
?>
<!doctype html>
<html lang="en">
	<?php include_once('inc/header_includes.php'); ?>
	<body>
		<?php include_once('inc/header.php'); ?>
		<section class="container mt-5">
			<div class="row">
				<div class="col-12">
					<h1 class="text-center mt-4 text-primary">Product Lists</h1>
					<div class="text-center text-success">
<?php
						if(isset($_SESSION["msg"])){
							echo $_SESSION["msg"];
							unset ($_SESSION["msg"]);
						}
?>
					</div>
					<div class="addProductContainer">
						<button class="btn addProductButton text-light"><a href="product-add-edit.php">Add Product</a></button>
					</div>
					
					<div class="tableList">
						<table class="tabledata">
							<thead class="tableHead text-center">
								<tr>
									<th colspan="4">Action</th>
									<th>Product Title</th>
									<th>Category</th>
									<th>Colour</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody class="text-center">	
								<?php
									if(!empty($productList)){
										foreach($productList as $productRow){
											if($productRow['live']=="1"){
												$productLive="Live";
											}else{
												$productLive="Un-Live";
											}
								?>
									<tr>
										<td>img</td>
										<td><a href=""><div onclick="liveProduct('<?=$productRow['pk_id']?>')" id="liveData<?=$row['pk_id']?>"><?=$productLive;?></div></a></td>
										<td><a href="product-add-edit.php?id=<?= $productRow['pk_id']?>">Edit</a></td>
										<td><a href="product-delete.php?id=<?= $productRow['pk_id']?>">Delete</a></td>
										<td><?php echo $productRow['product_title'];?></td>
										<?php
										$sscRow=$general->getCategoryByPCID($productRow['fk_category']);
										
										$scRow=$general->getCategoryByPCID($sscRow['pcid']);
										
										$mcRow=$general->getCategoryByPCID($scRow['pcid']);
										?>
										<td><?php echo $mcRow['title'].'->'.$scRow['title'].'->'.$sscRow['title'];?></td>
										<?php
										$proColour=$general->getColour($productRow['fk_colour']);
										?>
										<td><div class="productColourBox" style="background-color: <?php echo $proColour['colour'];?>"></div></td>
										<td><?php echo $productRow['product_price'];?></td>
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