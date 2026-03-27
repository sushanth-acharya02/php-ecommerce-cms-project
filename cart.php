<?php
include_once('lib/connect_db.php');
include_once('lib/general.php');
include_once('inc/function.php');
?>
<!doctype html>
<html lang="en">
<?php include_once('inc/header_includes.php'); ?>
<body>
<?php //include_once('inc/header.php'); ?>	
	<section class="container">
	<h2 class="text-center text-primary">Shopping cart</h2>
		<div class="row">
			<div class="col-12">
				<div class="cartTable">
					<table class="tableData text-center">
						<thead >
							<tr>
							<th></th>
							<th>Product Name(Size,Colour)</th>
							<th></th>
							<th>Unit Price</th>
							<th>Quantity</th>
							<th>Subtotal</th>
							<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>img</td>
								<td></td>
								<td><a href="">edit</a></td>
								<td></td>
								<td></td>
								<td></td>
								<td><a href="">delete</a></td>
							</tr>
						</tbody>
					</table>
					<h2 class="text-center">Grand Total</h2>
				</div>
			</div>
		</div>
	</section>
<?php //include_once('inc/footer.php'); ?>	
</body>
</html>