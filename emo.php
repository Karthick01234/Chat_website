<?php
    session_start();
	require_once("db.php");
    $db_handle = new DBController();
	$mysqli = new mysqli('127.0.0.1','root',"",'sign up');
    if(!isset($_SESSION["ema"]) AND !isset($_SESSION["ema1"]) AND !isset($_SESSION["ema2"])){
	header("Location: gif.php");
    exit(); }
	$id = $_SESSION["ema"];
    $email = $_SESSION["ema1"];
	$name = $_SESSION["ema2"];
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	$e = $_GET["value"];
	$product_array = $db_handle->runQuery("SELECT * FROM `".$id."` WHERE id = '1'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
			$name1 = $product_array[$key]["pname"];
	$product_array = $db_handle->runQuery("SELECT * FROM gift WHERE id = '".$e."'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
		$msg = $product_array[$key]["emo"];
    $sql = "INSERT INTO `".$id."` (`".$email."``".$name."`,`".$name."``".$email."`) "
	       . "VALUES ('$msg','0')";
    $sea = "INSERT INTO `".$email."` (`".$id."``".$name1."`,`".$name1."``".$id."`) "
	       . "VALUES ('$msg','1')";
        if($mysqli->query($sql) == true AND $mysqli->query($sea) == true) {
			   header("location: mess.php");
				}
		   }
	}
		}
	}
  }
?>