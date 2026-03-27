<?php
//$selectUsite =  'server_database_user_name';
//$selectPsite =  'server_database_user_password';
$selectUsite =  'root';
$selectPsite =  '';
$connection = mysqli_connect('127.0.0.1', $selectUsite, $selectPsite, 'ecommerce', 3307);
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'ecommerce');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}

class DBController {
	private $host = "127.0.0.1";
	//private $user = "server_database_user_name";
	//private $password = "server_database_user_password";
	private $user = "root";
	private $password = "";
	private $database = "ecommerce"; 
	private $port = 3307;                                                                                                                                                            
	private $connection = "";

	function __construct() {
		$conn = $this->connectDB();
		$this->connection = $conn;
		mysqli_set_charset( $this->connection, 'utf8');
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database,$this->port);
		return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->connection,$query);
		if($result){
			while($row=mysqli_fetch_assoc($result)) {
				$resultset[] = $row;
			}	
		}		
		if(!empty($resultset))
			return $resultset;
	}
	function runQueryOne($query) {
		$result = mysqli_query($this->connection,$query);
		if($result){
			while($row=mysqli_fetch_assoc($result)) {
				$resultset[] = $row;
			}		
		}
		if(!empty($resultset))
			return $resultset[0];
	}
	function insertQuery($query) {
		$result = mysqli_query($this->connection,$query);	
		return mysqli_insert_id($this->connection);
	}
	function executeQuery($query) {
		$result = mysqli_query($this->connection,$query);
		return $result;	
	}
	function numRows($query) {
		$rowcount=0;
		$result  = mysqli_query($this->connection,$query);
		if($result){
		$rowcount = mysqli_num_rows($result);}
		return $rowcount;	
	}
	function realEscapeString($str){
		return(mysqli_real_escape_string($this->connection,$str));
	}
}
?>