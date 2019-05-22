<?php
session_start();
require_once("db.php");
$db_handle = new DBController();
if(!isset($_SESSION["em"])){
	header("Location: notification.php");
    exit();
	}
	$mysqli = new mysqli('127.0.0.1','root',"",'sign up');
	    $email = $_SESSION["em"];
		$id = $_GET["id"];
		$product_array = $db_handle->runQuery("SELECT * FROM post WHERE id='".$id."'");
	    if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
			$my = $product_array[$key]["email"];
			$like = $product_array[$key]["love"] + 1;
			$sql = "UPDATE post SET `".$email."`='1' WHERE id='".$id."'";
			$se = "UPDATE post SET love='".$like."' WHERE id='".$id."'";
			if($mysqli->query($sql) == TRUE AND $mysqli->query($se) == TRUE) {
                header("location: notify.php");
			 }
		}	 
		}
?>