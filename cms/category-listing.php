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
?>
<!doctype html>
<html lang="en">
	<?php include_once('inc/header_includes.php'); ?>
	<body>
		<?php include_once('inc/header.php'); ?>
		<section class="container mt-5">
			<div class="row">
				<div class="col-12">
					<h1 class="text-center mt-4 text-primary">Category Lists</h1>
					<div class="text-center text-success">
<?php					
					if(isset($_SESSION['message'])){
						echo $_SESSION['message'];
						unset($_SESSION["message"]);
					}
?>
					</div>
					<div class="addCategoryContainer">
						<button class="btn addCategoryButton text-light"><a href="category-add-edit.php">Add Category</a></button>
					</div>
					
					<div class="tableList">
						<table class="tabledata">
							<thead class="tableHead ">
								<tr>
									<th colspan="4" class="categoryActionContainer text-center">Action</th>
									<th class="px-3">Category Title</th>
								</tr>
							</thead>
							<tbody>
<?php
								if(!empty($parentCategory)){
									foreach($parentCategory as $row){
										if($row['live']=="1"){
											$categoryLive="Live";
										}else{
											$categoryLive="Un-Live";
										}
?>										
										<tr>
											<td class="text-center">																														
												<a data-toggle="tooltip" title="<img src='<?php echo UPLOADS_PATH . $row['image']?>' width='100' />">
													<i class="fa-solid fa-image"></i>
												</a>
											</td>
											<td class="text-center"><a href=""><div onclick="liveCategory('<?= $row['pk_id']?>')" id="liveData<?=$row['pk_id']?>"><?=$categoryLive;?></div></a></td>
											<td class="text-center"><a href="category-add-edit.php?id=<?= $row['pk_id']?>">Edit</a></td>
											<td class="text-center"><a href="category-delete.php?id=<?= $row['pk_id']?>">Delete</a></td>
											<td class="px-3"><?php echo $row['title'];?></td>	
										</tr>
<?php
										$subCategory=$general->getSubCategory($row['pk_id']);
										if(!empty($subCategory)){
											foreach($subCategory as $subRow){
												if($subRow['live']=="1"){
													$subCategoryLive="Live";
												}else{
													$subCategoryLive="Un-Live";
												}
?>
												<tr>
													<td class="text-center">																														
														<a data-toggle="tooltip" title="<img src='<?php echo UPLOADS_PATH . $subRow['image']?>' width='100' />">
															<i class="fa-solid fa-image"></i>
														</a>
													</td>
													
													<td class="text-center"><a href=""><div onclick="liveCategory('<?= $subRow['pk_id']?>')" id="liveData<?=$subRow['pk_id']?>"><?=$subCategoryLive;?></div></a></td>
													<td class="text-center"><a href="category-add-edit.php?id=<?= $subRow['pk_id']?>">Edit</a></td>
													<td class="text-center"><a href="category-delete.php?id=<?= $subRow['pk_id']?>">Delete</a></td>
													<td class="px-3">-><?php echo $subRow['title'];?></td>	
												</tr>
<?php
												$subSubCategory=$general->getSubSubCategory($subRow['pk_id']);
												if(!empty($subSubCategory)){
													foreach($subSubCategory as $subSubRow){
														if($subSubRow['live']=="1"){
															$subSubCategoryLive="Live";
														}else{
															$subSubCategoryLive="Un-Live";
														}
?>
														<tr>
															<td class="text-center">																														
																<a data-toggle="tooltip" title="<img src='<?php echo UPLOADS_PATH . $subSubRow['image']?>' width='100' />">
																	<i class="fa-solid fa-image"></i>
																</a>
															</td>
															
															<td class="text-center"><a href=""><div onclick="liveCategory('<?= $subSubRow['pk_id']?>')" id="liveData<?=$subSubRow['pk_id']?>"><?=$subSubCategoryLive;?></div></a></td>
															<td class="text-center"><a href="category-add-edit.php?id=<?= $subSubRow['pk_id']?>">Edit</a></td>
															<td class="text-center"><a href="category-delete.php?id=<?= $subSubRow['pk_id']?>">Delete</a></td>
															<td class="px-3">->-><?php echo $subSubRow['title'];?></td>	
														</tr>
<?php
													}
												}
											}
										}
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