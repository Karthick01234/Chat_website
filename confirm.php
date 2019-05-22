<?php
    session_start();
	require_once("db.php");
    $db_handle = new DBController();
	$mysqli = new mysqli('127.0.0.1','root',"",'sign up');
    if(!isset($_SESSION["e"]) AND !isset($_SESSION["ema"])){
	header("Location: view.php");
    exit(); }
	$id = $_SESSION["ema"];
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$product_array = $db_handle->runQuery("SELECT * FROM `".$id."` WHERE id = '1'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
			$name1 = $product_array[$key]["pname"];
    $email = $_POST["email"];
	$name = $_POST["name"];
	$sql = "UPDATE `".$id."` SET active='2' WHERE e1='".$email."'";
	$search = "ALTER TABLE `".$id."` ADD `".$email."``".$name."` VARCHAR(1000) NOT NULL AFTER `active`";
	$sea = "ALTER TABLE `".$id."` ADD `".$name."``".$email."` VARCHAR(1000) NOT NULL AFTER `active`";
      	if($mysqli->query($sql) == TRUE AND $mysqli->query($search) == TRUE AND $mysqli->query($sea) == TRUE) {
	      $sql = "UPDATE `".$email."` SET active='2' WHERE e='".$id."'";
		  $search = "ALTER TABLE `".$email."` ADD `".$id."``".$name1."` VARCHAR(1000) NOT NULL AFTER `active`";
		  $sea = "ALTER TABLE `".$email."` ADD `".$name1."``".$id."` VARCHAR(1000) NOT NULL AFTER `active`"; 
		   if($mysqli->query($sql) == TRUE AND $mysqli->query($search) == TRUE AND $mysqli->query($sea) == TRUE) {
                header("location: view.php");
			}
	   }
		}
	}
	}
	
		