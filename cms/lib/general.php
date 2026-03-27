<?php
use Verot\Upload\Upload;
include('lib/class.upload.php');

class General{
	function loginUser(){
		global $db; 
		$email=$_POST["email"];
		$password=$_POST["password"];
		$verifyPassword = base64_encode($password);
		
		$query="SELECT * FROM user WHERE email='".$email."' and password='".$verifyPassword."' AND delete_id=0";
		$loginUser=$db->runQueryOne($query);
		return $loginUser;
	}
	
	function addBanner(){
		global $db;
		$bannerTitle=$_POST["bannerTitle"];
		$titleColour=$_POST["titleColour"];
		$bannerSmallText=$_POST["bannerSmallText"];
		$smallTextColour=$_POST["smallTextColour"];
		$buttonText=$_POST["buttonText"];
		$buttonColour=$_POST["buttonColour"];
		
		$query="INSERT INTO banners  SET 
		banner_title = '".$bannerTitle."',
		title_colour = '".$titleColour."',
		banner_small_text = '".$bannerSmallText."',                                                         
		small_text_colour = '".$smallTextColour."',
		button_text = '".$buttonText."',
		button_colour = '".$buttonColour."'";
		
		$insertResult = $db->insertQuery($query);
		$path = $_FILES['bannerImage']['name'];
		//$pathName= pathinfo($path, PATHINFO_FILENAME);
		$ext = pathinfo($path, PATHINFO_EXTENSION);
		$bannerImageName = 'banner_image'.$insertResult.".".$ext;
		
		$file = new Upload($_FILES['bannerImage']);
		$file->file_new_name_body = "banner_image".$insertResult;
		$file->image_resize = true;
		$file->image_ratio_x = true;
		$file->image_y = 250;
		
		if($file->uploaded){
			$file->process('uploads');
			if($file->processed){
				//$newInsert = "UPDATE banners SET banner_image='".$pathName."".$insertResult.".".$ext."' WHERE pk_id=".$insertResult."";
				
				$newInsert="UPDATE banners SET banner_image='".$bannerImageName."' WHERE pk_id=".$insertResult."";
				$newInsertResult = $db->executeQuery($newInsert);
			}else{
				echo "error".$file->error;
			}
		}
		
		return $insertResult;
	}
	
	function getBannerById($id){
		global $db;
		$query="SELECT * FROM banners WHERE pk_id=".$id." AND delete_id=0";
		$bannerId=$db -> runQueryOne($query);
		return $bannerId;
	}
	
	function editBanner($id){
		global $db;
		
		$bannerTitle=$_POST["bannerTitle"];
		$titleColour=$_POST["titleColour"];
		$bannerSmallText=$_POST["bannerSmallText"];
		$smallTextColour=$_POST["smallTextColour"];
		$buttonText=$_POST["buttonText"];
		$buttonColour=$_POST["buttonColour"];
		
		$query="UPDATE banners SET 
		banner_title='".$bannerTitle."',
		title_colour='".$titleColour."',
		banner_small_text='".$bannerSmallText."',
		small_text_colour='".$smallTextColour."',
		button_text='".$buttonText."',
		button_colour='".$buttonColour."' WHERE pk_id=".$id."";
		
		$editData=$db->executeQuery($query);
		
		$editImage=$_POST["deleteImage"];
		
		if($editImage==1){
			$path = $_FILES['bannerImage']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			
			$bannerImageName = 'banner_image'.$id.".".$ext;
			
			if((file_exists($_FILES['bannerImage']['name']))){
			$query="DELETE FROM banners WHERE banner_image='".$bannerImageName."'";
			$newInsertResult=$db->executeQuery($query);
			}
		}
		
		if(!empty($_FILES["bannerImage"]["name"])){
			$file=new Upload($_FILES['bannerImage']);
			$file->file_new_name_body = "banner_image".$id;
			if($file->uploaded){
				$file->process('uploads');
				if($file->processed){
					$newInsert="UPDATE banners SET banner_image='".$bannerImageName."'WHERE pk_id=".$id."";
					$newInsertResult=$db->executeQuery($newInsert);	
				}else{
					echo "error".$file->error;
				}
			}
		}
		return $editData;
	}
	
	function getBanner(){
		global $db;
		$query="SELECT * FROM banners WHERE delete_id=0";
		$getBanner=$db->runQuery($query);
		return $getBanner;
	}
	
	function deleteBanner($id){
		global $db;
		$query="UPDATE banners SET delete_id=1,updated_by='".$_SESSION['uId']."' WHERE pk_id=".$id."";
		$deleteData=$db->executeQuery($query);
		return $deleteData;
	}
	
	function liveBanner($id){
		global $db;
		$newResult=1;
		$liveResult="Live";	
		
		$query="SELECT * FROM banners WHERE pk_id=".$id."";
		$result=$db->runQueryOne($query);
		
		if($result['live']==1){
			$newResult=0;
			$liveResult="Un-Live";	
		}
		else{
			$newResult=1;
			$liveResult="Live";	
		}
		
		$update="UPDATE banners SET live=".$newResult." WHERE pk_id=".$id."";
		$db->executeQuery($update);
		return $liveResult;
	}
	
	function addShoeColour(){
		global $db;
		$title=$_POST["title"];
		$colour=$_POST["colour"];
		
		$query="INSERT INTO shoe_colour (title,colour,created_by) VALUES('".$title."','".$colour."','".$_SESSION['uId']."')";
		$insertResult=$db->insertQuery($query);
		return $insertResult;
		
	}
	
	function getShoeColour(){
		global $db;
		$query="SELECT * FROM shoe_colour WHERE delete_id=0";
		$getShoeColour=$db->runQuery($query);
		return $getShoeColour;
	}
	
	
	function getShoeSize($id){
		global $db;
		$query="SELECT size FROM products_size WHERE fk_product_id='".$id."' AND delete_id=0";
		$getShoeSize=$db->runQuery($query);
		return $getShoeSize;
	}
	
	function liveColour($id){
		global $db;
		$newResult=1;
		$liveResult="Live";	
		
		$query="SELECT * FROM shoe_colour WHERE pk_id=".$id."";
		$result=$db->runQueryOne($query);
		
		if($result['live']==1){
			$newResult=0;
			$liveResult="Un-Live";	
		}
		else{
			$newResult=1;
			$liveResult="Live";	
		}
		
		$update="UPDATE shoe_colour SET live=".$newResult.",updated_by='".$_SESSION['uId']."' WHERE pk_id=".$id."";
		$db->executeQuery($update);
		return $liveResult;                             
	}
	
	function getShoeColourById($id){
		global $db;
		$query="SELECT * FROM shoe_colour WHERE pk_id=".$id." AND delete_id=0";
		$shoeColourId=$db -> runQueryOne($query);
		return $shoeColourId;
	}
	
	function editShoeColour($id){
		global $db;
		$title=$_POST["title"];
		$colour=$_POST["colour"];
		
		$query="UPDATE shoe_colour SET title='".$title."',colour='".$colour."',updated_by='".$_SESSION['uId']."' WHERE pk_id=".$id."";
		$insertResult=$db->executeQuery($query);
		return $insertResult;
	}
	
	function deleteShoeColour($id){
		global $db;
		$query="UPDATE shoe_colour SET delete_id=1,updated_by='".$_SESSION['uId']."' WHERE pk_id=".$id."";
		$deleteData=$db->executeQuery($query);
		return $deleteData;
	}
	
	function addCategory(){
		global $db;
		
		$category=$_POST["category"];
		$categoryTitle=$_POST["categoryTitle"];
		
		$seoUrl=strtolower(trim($categoryTitle));
		$seoUrl=str_replace(' ', '-',$seoUrl);
		$seoUrl=preg_replace('/[^a-z0-9\-]/', '', $seoUrl);
		$seoUrl=str_replace('---', '-',$seoUrl);
		$seoUrl=str_replace('--', '-',$seoUrl);
		
		$query="INSERT INTO categories (title,pcid,seo_url) VALUES('".$categoryTitle."','".$category."','".$seoUrl."')";
		$insertResult = $db->insertQuery($query);
		
		$path = $_FILES['categoryImage']['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);
		$categoryImageName = 'category_image'.$insertResult.".".$ext;       
		
		$file = new Upload($_FILES['categoryImage']);
		$file->file_new_name_body = "category_image".$insertResult;
		$file->image_resize = true;
		$file->image_x = 500;
		$file->image_ratio_y = 500;
		
		if($file->uploaded){
			$file->process('uploads');
			if($file->processed){
				$imageInsert="UPDATE categories SET image='".$categoryImageName."' WHERE pk_id=".$insertResult."";
				$imageInserResult=$db->executeQuery($imageInsert);
			}else{
				echo "error" .file->error;
			}
		}
		return $insertResult;
		
	}
	
	function getParentCategory(){
		global $db;
		$query="SELECT * FROM categories WHERE pcid=0 AND delete_id=0";
		$parentCategoryResult=$db->runQuery($query);
		return $parentCategoryResult;
	}
	
	function getSubCategory($mcid){
		global $db;
		$query="SELECT * FROM categories WHERE pcid='".$mcid."' AND delete_id=0";
		$subCategoryResult=$db->runQuery($query);
		return $subCategoryResult;
	}
	
	function getSubSubCategory($scid){
		global $db;
		$query="SELECT * FROM categories WHERE pcid='".$scid."' AND delete_id=0";
		$subCategoryResult=$db->runQuery($query);
		return $subCategoryResult;
	}
	
	function liveCategory($id){
		global $db;
		$newResult=1;
		$liveResult="Live";	
		
		$query="SELECT * FROM categories WHERE pk_id=".$id."";
		$result=$db->runQueryOne($query);
		
		if($result['live']==1){
			$newResult=0;
			$liveResult="Un-Live";	
		}
		else{
			$newResult=1;
			$liveResult="Live";	
		}
		
		$update="UPDATE categories SET live=".$newResult." WHERE pk_id=".$id."";
		$db->executeQuery($update);
		return $liveResult;
	}
	
	function deleteCategory($id){
		global $db;
		$query="UPDATE categories SET delete_id=1 WHERE pk_id='".$id."'";
		$deleteData=$db->executeQuery($query);
		return $deleteData;
	}
	
	function getCategoryById($id){
		global $db;
		$query="SELECT * FROM categories WHERE pk_id=".$id." AND delete_id=0";
		$categoryId=$db -> runQueryOne($query);
		return $categoryId;
	}
	
	function editCategory($id){
		global $db;
		
		$category=$_POST["category"];
		$categoryTitle=$_POST["categoryTitle"];
		
		$seoUrl=strtolower(trim($categoryTitle));
		$seoUrl=str_replace(' ', '-',$seoUrl);
		$seoUrl=preg_replace('/[^a-z0-9\-]/', '', $seoUrl);
		$seoUrl=str_replace('---', '-',$seoUrl);
		$seoUrl=str_replace('--', '-',$seoUrl);
		
		$query="UPDATE categories SET title='".$categoryTitle."',pcid='".$category."',seo_url='".$seoUrl."' WHERE pk_id=".$id."";
		$editData=$db->executeQuery($query);
		
		$editImage=$_POST["deleteImage"];	
		if($editImage==1){
			$path = $_FILES['categoryImage']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			
			$categoryImageName = 'category_image'.$id.".".$ext;
			
			if((file_exists($_FILES['categoryImage']['name']))){
			$query="DELETE FROM categories WHERE image='".$categoryImageName."'";
			$newInsertResult=$db->executeQuery($query);
			}
		}
		if(!empty($_FILES["categoryImage"]["name"])){
			$file=new Upload($_FILES['categoryImage']);
			$file->file_new_name_body = "category_image".$id;
			if($file->uploaded){
				$file->process('uploads');
				if($file->processed){
					$newUpdate="UPDATE categories SET image='".$categoryImageName."' WHERE pk_id=".$id."";
					$updatedResult=$db->executeQuery($newUpdate);
				}
			}
		}
		return $editData;
	}
	
	
	
	function addProduct(){
		global $db;
		
		$title=$_POST["title"];
		$category=$_POST["category"];
		$colour=$_POST["colour"];
		$description=addslashes($_POST["description"]);
		$price=$_POST["price"];
		
		$seoUrl=strtolower(trim($title));
		$seoUrl=str_replace(' ', '-',$seoUrl);
		$seoUrl=preg_replace('/[^a-z0-9\-]/', '', $seoUrl);
		$seoUrl=str_replace('---', '-',$seoUrl);
		$seoUrl=str_replace('--', '-',$seoUrl);
		
		$query="INSERT INTO products SET 
		product_title = '".$title."',
		fk_category = '".$category."',
		fk_colour = '".$colour."',                                                         
		product_description = '".$description."',
		product_price = '".$price."',
		seo_url ='".$seoUrl."'";
		
		$productID=$db->insertQuery($query);
				
		if(!empty($_FILES["image"])){
			$path=$_FILES["image"]["name"];
			$ext=pathinfo($path,PATHINFO_EXTENSION);
				
			$productImageName='product_image'.$productID.".".$ext;
				
			$file=new Upload($_FILES['image']);
			$file->file_new_name_body="product_image".$productID;
				
			if($file->uploaded){
				$file->process('uploads');
				if($file->processed){	
					$query="INSERT INTO products_image(fk_product_id,images)VALUES('".$productID."','".$productImageName."')";
					$result=$db->insertQuery($query);
				}else{
					echo "error".$file->error;
				}
			}
		}
		
		if(!empty($_FILES["imageTwo"])){
			$path=$_FILES["imageTwo"]["name"];
			$ext=pathinfo($path,PATHINFO_EXTENSION);
				
			$productImageName='product_second_image'.$productID.".".$ext;
				
			$file=new Upload($_FILES['imageTwo']);
			$file->file_new_name_body="product_second_image".$productID;
				
			if($file->uploaded){
				$file->process('uploads');
				if($file->processed){	
					$query="INSERT INTO products_image(fk_product_id,images)VALUES('".$productID."','".$productImageName."')";
					$result=$db->insertQuery($query);
				}else{
					echo "error".$file->error;
				}
			}
		}
		
		if(!empty($_FILES["imageThree"])){
			$path=$_FILES["imageThree"]["name"];
			$ext=pathinfo($path,PATHINFO_EXTENSION);
				
			$productImageName='product_third_image'.$productID.".".$ext;
				
			$file=new Upload($_FILES['imageThree']);
			$file->file_new_name_body="product_third_image".$productID;
				
			if($file->uploaded){
				$file->process('uploads');
				if($file->processed){	
					$query="INSERT INTO products_image(fk_product_id,images)VALUES('".$productID."','".$productImageName."')";
					$result=$db->insertQuery($query);
				}else{
					echo "error".$file->error;
				}
			}
		}
		return $productID;              
	}

	function getProduct(){
		global $db;
		$query="SELECT * FROM products WHERE delete_id=0";
		$result=$db->runQuery($query);
		return $result;	
	}
	function getCategoryByPCID($categoryId){
		global $db;
		$query="SELECT * FROM categories WHERE pk_id='".$categoryId."' AND delete_id=0";
		$categoryResult=$db->runQueryOne($query);
		return $categoryResult;
	}
	
	function getColour($colourId){
		global $db;
		$query="SELECT * FROM shoe_colour WHERE pk_id='".$colourId."' AND delete_id=0";
		$colourResult=$db->runQueryOne($query);
		return $colourResult;
	}
	
	function deleteProduct($id){
		global $db;
		$query="UPDATE products SET delete_id=1 WHERE pk_id='".$id."'";
		$deleteData=$db->executeQuery($query);
		return $deleteData;
	}
	
	function liveProduct($id){
		global $db;
		$newResult=1;
		$liveResult="Live";
		$query="SELECT * FROM products WHERE pk_id=".$id."";
		$result=$db->runQueryOne($query);
		
		if($result['live']==1){
			$newResult=0;
			$liveResult="Un-Live";	
		}
		else{
			$newResult=1;
			$liveResult="Live";	
		}
		
		$updateLive="UPDATE products SET live=".$newResult." WHERE pk_id=".$id."";
		$db->executeQuery($updateLive);
		return $liveResult;	
	}
	
	function getProductById($id){
		global $db;
		$query="SELECT * FROM products WHERE pk_id=".$id." AND delete_id=0";
		$getProduct=$db->runQueryOne($query);
		return $getProduct;
	}
	
	function editProduct($id){
		global $db;
		$title=$_POST["title"];
		$category=$_POST["category"];
		$colour=$_POST["colour"];
		$description=addslashes($_POST["description"]);
		$price=$_POST["price"];
		
		$seoUrl=strtolower(trim($title));
		$seoUrl=str_replace(' ', '-',$seoUrl);
		$seoUrl=preg_replace('/[^a-z0-9\-]/', '', $seoUrl);
		$seoUrl=str_replace('---', '-',$seoUrl);
		$seoUrl=str_replace('--', '-',$seoUrl);
			
		$query="UPDATE products SET 
		product_title='".$title."',
		fk_category='".$category."',
		fk_colour='".$colour."',
		product_description='".$description."',
		product_price='".$price."',
		seo_url='".$seoUrl."'
		WHERE pk_id=".$id."";
		
		$updateResult=$db->executeQuery($query);

		$mainImage="";
		$imageTwo="";
		$imageThree="";
		$imageRow=$this->getImage($id);
		if(!empty($imageRow[0]['images'])){
			$mainImage=$imageRow[0]['images'];
		}
		if(!empty($imageRow[1]['images'])){
			$imageTwo=$imageRow[1]['images'];
		}
		if(!empty($imageRow[2]['images'])){
			$imageThree=$imageRow[2]['images'];
		}
		
		if(!empty($_FILES['image']['name'])){
			if(isset($_POST["deleteImage"])){
				$editImage=$_POST['deleteImage'];
			}
			$path=$_FILES['image']['name'];
			$ext=pathinfo($path,PATHINFO_EXTENSION);
			$productImageName='product_image'.$id.".".$ext;
			if($editImage==1){
				$filename='uploads/'.$mainImage;
				if(file_exists($filename)){
					unlink($filename);
				}
			}
			$mainImageId=$_POST['mainImageId'];
			$file=new Upload($_FILES['image']);
			$file->file_new_name_body="product_image".$id;
			if($file->uploaded){
				$file->process('uploads');
				if($file->processed){
					$imageUpdate="UPDATE products_image SET images='".$productImageName."' WHERE pk_id=".$mainImageId."";
					$imageUpdateResult=$db->executeQuery($imageUpdate);
				}
			}
		}

		if(!empty($_FILES["imageTwo"]["name"])){
			if(isset($_POST["deleteImageTwo"])){
				$editImageTwo=$_POST["deleteImageTwo"];
			}
			$path=$_FILES["imageTwo"]["name"];
			$ext=pathinfo($path,PATHINFO_EXTENSION);
			$productImageName='product_second_image'.$id.".".$ext;
			if($editImageTwo==1){
				$filename='uploads/'.$imageTwo;
				if(file_exists($filename)){
					unlink($filename);
				}
			}
		
			$imageTwoId=$_POST['imageTwoId'];
			$file=new Upload($_FILES['imageTwo']);
			$file->file_new_name_body="product_second_image".$id;
			if($file->uploaded){
				$file->process('uploads');
				if($file->processed){
					if(isset($_POST["deleteImageTwo"])){
						$imageUpdate="UPDATE products_image SET images='".$productImageName."' WHERE pk_id=".$imageTwoId."";
					}else {
						$imageUpdate="INSERT INTO products_image(fk_product_id,images)VALUES('".$id."','".$productImageName."')";
					}
					$imageUpdateResult=$db->executeQuery($imageUpdate);
				}
			}
		}
		
		if(!empty($_FILES["imageThree"]["name"])){
			
			if(isset($_POST["deleteImageThree"])){
				$editImageThree=$_POST["deleteImageThree"];
			}
			$path=$_FILES["imageThree"]["name"];
			$ext=pathinfo($path,PATHINFO_EXTENSION);
			$productImageName='product_third_image'.$id.".".$ext;
			if($editImageThree==1){
				$filename='uploads/'.$imageThree;
				if(file_exists($filename)){
					unlink($filename);
				}
			}
		
			$imageThreeId=$_POST['imageThreeId'];
			$file=new Upload($_FILES['imageThree']);
			$file->file_new_name_body="product_third_image".$id;
			if($file->uploaded){
				$file->process('uploads');
				if($file->processed){
					if(isset($_POST["deleteImageThree"])){
						$imageUpdate="UPDATE products_image SET images='".$productImageName."' WHERE pk_id=".$imageThreeId."";
					}else {
						$imageUpdate="INSERT INTO products_image(fk_product_id,images)VALUES('".$id."','".$productImageName."')";
					}
					$imageUpdateResult=$db->executeQuery($imageUpdate);
				}
			}
		}
		
		return $updateResult;
	}
	
	function getImage($id){
		global $db;
		$query="SELECT pk_id,images FROM products_image WHERE fk_product_id=".$id." AND delete_id=0";
		$getImages=$db->runQuery($query);
		return $getImages;
	}


	function insertSize($size,$id){
		global $db;
		$query="INSERT INTO products_size (fk_product_id,size) VALUES('".$id."','".$size."')";
		$insertSizeResult=$db->insertQuery($query);
		return $insertSizeResult;
	}	
}
?>