<?php
use Verot\Upload\Upload;
include('lib/class.upload.php');

class General{
	function addCustomer(){
		global $db;
		
		$email=test_input($_POST["username"]);
		$query="INSERT into newsletter (email) VALUES('".$email."')";
		$insertEmail=$db->insertQuery($query);
		return $insertEmail;
	}
	
	/*function validateCustomer(){
		global $db;
		$email=test_input($_POST["username"]);
		$query="SELECT * FROM newsletter WHERE email='".$email."' AND live=1 AND delete_id=0";
		$validateCustomer=$db->numRows($query);
		return $validateCustomer;
	}*/
	
	function checkEmail($username){
		global $db;
		$query="SELECT * FROM newsletter WHERE email='".$username."' AND live=1 AND delete_id=0";
		$checkEmailResult=$db->runQuery($query);
		return $checkEmailResult;
	}
	
	function getParentCategory(){
		global $db;
		$query="SELECT * FROM categories WHERE pcid=0 AND live=1 AND delete_id=0";
		$parentCategoryResult=$db->runQuery($query);
		return $parentCategoryResult;
	}
	
	function getSubCategory($mcid){
		global $db;
		$query="SELECT * FROM categories WHERE pcid='".$mcid."' AND live=1 AND delete_id=0";
		$subCategoryResult=$db->runQuery($query);
		return $subCategoryResult;
	}
	
	function getSubSubCategory($scid){
		global $db;
		$query="SELECT * FROM categories WHERE pcid='".$scid."' AND live=1 AND delete_id=0";
		$subCategoryResult=$db->runQuery($query);
		return $subCategoryResult;
	}
	
	function getCategoryDetailsByPCID($id){
		global $db;
		$query="SELECT * FROM categories WHERE pcid='".$id."' AND live=1 AND delete_id=0";
		$categoryRow=$db->runQueryOne($query);
		return $categoryRow;
	}
	
	function getBanner(){
		global $db;
		$query="SELECT * FROM banners WHERE live=1 AND delete_id=0";
		$bannerResult=$db->runQuery($query);
		return $bannerResult;
	}
	
	function getMainCategory(){
		global $db;
		$query="SELECT pk_id,title,pcid,image,seo_url FROM categories WHERE pcid=0 AND live=1 AND delete_id=0";
		$result=$db->runQuery($query);
		return $result;
	}
	
	function getProducts(){
		global $db;
		$query="SELECT pk_id,fk_category,seo_url,product_title,product_price FROM products WHERE live=1 AND delete_id=0 ORDER BY pk_id DESC LIMIT 0,4 ";
		$result=$db->runQuery($query);
		return $result;
	}
	
	function getAllProducts(){
		global $db;
		$query="SELECT * FROM products WHERE live=1 AND delete_id=0";
		$result=$db->runQuery($query);
		return $result;
	}
	
	/*function getSingleProduct($id){
		global $db;
		$query="SELECT * FROM products WHERE pk_id=".$id." AND live=1 AND delete_id=0";
		$result=$db->runQueryOne($query);
		return $result;
	}*/
	
	function getSingleProductDetail($productSeoUrl){
		global $db;
		$query="SELECT pk_id,product_title,product_description,product_price FROM products WHERE seo_url='".$productSeoUrl."' AND live=1 AND delete_id=0";
		$result=$db->runQueryOne($query);
		return $result;
	}
	
	function getProductBySeoUrl($mainCategorySeoUrl,$subCategorySeoUrl,$subSubCategorySeoUrl){                                                                                                                                                        
		global $db;
		
		if(!empty($mainCategorySeoUrl)){
			$query="SELECT * FROM categories WHERE seo_url='".$mainCategorySeoUrl."'";
			$mainCategoryResult=$db->runQueryOne($query);
			
			$query="SELECT * FROM categories WHERE pcid='".$mainCategoryResult['pk_id']."'";
			$productResult=$db->runQuery($query);
			
			//$query="SELECT * FROM products WHERE fk_category=".$mainCategoryResult['pk_id']." AND live=1 AND delete_id=0";
			//$productResult=$db->runQuery($query);
		}
		if(!empty($subCategorySeoUrl)){
			$query="SELECT * FROM categories WHERE pcid='".$mainCategoryResult['pk_id']."' AND seo_url='".$subCategorySeoUrl."'";
			$subCategoryResult=$db->runQueryOne($query);

			$query="SELECT * FROM categories WHERE pcid='".$subCategoryResult['pk_id']."'";
			$productResult=$db->runQuery($query);
			
			//$query="SELECT * FROM products WHERE fk_category=".$subCategoryResult['pk_id']." AND live=1 AND delete_id=0";
			//$productResult=$db->runQuery($query);
		}
		if(!empty($subSubCategorySeoUrl)){
			$query="SELECT * FROM categories WHERE pcid='".$subCategoryResult['pk_id']."' AND seo_url='".$subSubCategorySeoUrl."'";
			$subSubCategoryResult=$db->runQueryOne($query);
			
			$query="SELECT * FROM products WHERE fk_category=".$subSubCategoryResult['pk_id']." AND live=1 AND delete_id=0";
			$productResult=$db->runQuery($query);
		}
		
		return $productResult;
	}
	
	function getCategoryDetailsByID($id){
		global $db;
		$query="SELECT * FROM categories WHERE pk_id='".$id."' AND live=1 AND delete_id=0";
		$categoryRow=$db->runQueryOne($query);
		return $categoryRow;
	}
	
	function getCategoryDetails($parentId){
		global $db;
		$query="SELECT * FROM categories WHERE pcid='".$parentId."' AND live=1 AND delete_id=0";
		$categoryRow=$db->runQuery($query);
		return $categoryRow;
	}
	
	
	/*function getProductBySeoUrl($subSubProductSeoUrl){
		global $db;	
		$query="SELECT * FROM products INNER JOIN categories on products.fk_category=categories.pk_id AND categories.seo_url='".$subSubProductSeoUrl."' LIMIT 0,1";
		$query=$db->runQuery($query);
		return $query;
	}*/
	
	function getSub($id){
		global $db;
		$query="select * from categories WHERE pcid='".$id."' AND live=1 AND delete_id=0";
		$subCat=$db->runQuery($query);
		return $subCat;
	}
	
	/*function registerUser(){
		global $db;
		
		$email=$_POST["email"];
		$password=$_POST["password"];
		$hashedPassword=password_hash($password,PASSWORD_DEFAULT);
		
		$query="INSERT INTO register(email,password) VALUES('".$email."','".$hashedPassword."')";
		$registerResult=$db->insertQuery($query);
		return $registerResult;
	}*/
	
	function registerUser(){
		global $db;
		
		$title=$_POST["title"];
		$firstName=$_POST["firstName"];
		$lastName=$_POST["lastName"];
		$email=$_POST["email"];
		$password=$_POST["password"];
		$addressOne=$_POST["addressOne"];
		$addressTwo=$_POST["addressTwo"];
		$city=$_POST["city"];
		$state=$_POST["state"];
		$country=$_POST["country"];
		$postalCode=$_POST["postalCode"];
		$hashedPassword=password_hash($password,PASSWORD_DEFAULT);
		
		$query="INSERT INTO customers SET 
		title='".$title."',
		firstname='".$firstName."',
		lastname='".$lastName."',
		username='".$email."',
		password='".$hashedPassword."',
		address_one='".$addressOne."',
		address_two='".$addressTwo."',
		city='".$city."',
		state='".$state."',
		country='".$country."',
		postalcode='".$postalCode."'";
		
		$insertResult=$db->insertQuery($query);
		return $insertResult;
		
	}
	
	function checkRegisteredEmail(){
		global $db;
		$email=$_POST["email"];
		$query="SELECT * FROM customers WHERE username='".$email."' AND live=1 AND delete_id=0";
		$existUserResult=$db->numRows($query);
		return $existUserResult;
	}
	
	function loginUser($email){
		global $db;
		$query="SELECT * FROM customers WHERE username='".$email."' AND live=1 AND delete_id=0";
		$loginResult=$db->runQuery($query);
		return $loginResult;	
	}
	
	function getAllCountries(){
		global $db;
		$query="SELECT * FROM countries";
		$countries=$db->runQuery($query);
		return $countries;
	}
	
	function fetchShoeColour($id){
		global $db;
		$query="SELECT * FROM shoe_colour WHERE pk_id='".$id."' AND live=1 AND delete_id=0";
		$shoeColour=$db->runQueryOne($query);
		return $shoeColour;
	}
	
	function fetchShoeSize($id){
		global $db;
		$query="SELECT size FROM products_size where fk_product_id='".$id."' AND live=1 AND delete_id=0";
		$shoeSize=$db->runQuery($query);
		return $shoeSize;
	}
	
}
?>