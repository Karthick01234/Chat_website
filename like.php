<?php
session_start();
require_once("db.php");
$db_handle = new DBController();
if(!isset($_SESSION["em"])){
	header("Location: news.php");
    exit();
	}
	$mysqli = new mysqli('127.0.0.1','root',"",'sign up');
	    $email = $_SESSION["em"];
		$id = $_GET["id"];
		$product_array = $db_handle->runQuery("SELECT * FROM `".$email."` WHERE id='1'");
	    if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
        $a1 = $product_array[$key]["pname"];
		$a2 = $product_array[$key]["img1"];
		$product_array = $db_handle->runQuery("SELECT * FROM post WHERE id='".$id."'");
	    if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
			$my = $product_array[$key]["email"]; 
			if(!empty($product_array[$key]["your"])) {
			$a = $product_array[$key]["your"]; 
			$like = $product_array[$key]["love"] + 1;
			$sql = "UPDATE post SET `".$email."`='1' WHERE id='".$id."'";
			$se = "UPDATE post SET love='".$like."' WHERE id='".$id."'";
			$entry = "INSERT INTO `".$my."` (name,pname,about,img1) "
			         . "VALUES ('$id','$a2','$a1','$a')";
             if($mysqli->query($sql) == TRUE AND $mysqli->query($se) == TRUE AND $mysqli->query($entry) == TRUE) {
                header("location: news.php");
			 }
			}
			else {
		    $a = $product_array[$key]["video"]; 
			$like = $product_array[$key]["love"] + 1;
			$sql = "UPDATE post SET `".$email."`='1' WHERE id='".$id."'";
			$se = "UPDATE post SET love='".$like."' WHERE id='".$id."'";
			$entry = "INSERT INTO `".$my."` (name,pname,about,img2) "
			         . "VALUES ('$id','$a2','$a1','$a')";
             if($mysqli->query($sql) == TRUE AND $mysqli->query($se) == TRUE AND $mysqli->query($entry) == TRUE) {
                header("location: news.php");
			 }
			}
		}	 
		}
		}
		}
?>