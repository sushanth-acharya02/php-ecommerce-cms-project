<?php
	$filename='uploads/test_image.jpg';
	if(file_exists($filename)){
		unlink($filename);
		echo "File deleted successfully";
	}
?>