<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: login.php");
  exit();
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
					<h1 class="text-center text-primary">Home Page</h1>
					<h2>Welcome, <?php echo $_SESSION['email'];?></h2>
				</div>
			</div>
		</section>
		<?php include_once('inc/footer.php');?>
	</body>
</html>