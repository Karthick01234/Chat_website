<?php
    session_start();
	require_once("db.php");
    $db_handle = new DBController();
	$mysqli = new mysqli('127.0.0.1','root',"",'sign up');
    if(!isset($_SESSION["em"]) AND !isset($_SESSION["em1"]) AND !isset($_SESSION["em2"])){
	header("Location: mess.php");
    exit(); }
	$id = $_SESSION["em"];
	$_SESSION["ema"] = $id;
    $email = $_SESSION["em1"];
	$_SESSION["ema1"] = $email;
	$name = $_SESSION["em2"];
	$_SESSION["ema2"] = $name;
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	$product_array = $db_handle->runQuery("SELECT * FROM `".$id."` WHERE id = '1'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
			$name1 = $product_array[$key]["pname"];
	$msg = "&hearts;";
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
?>