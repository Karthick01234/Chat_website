<?php
session_start();
require_once("db.php");
$db_handle = new DBController();
$mysqli = new mysqli('127.0.0.1','root',"",'sign up');
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST["email"];
		$id1 = $_POST["email1"];
		$id2 = $_POST["id"];
		$msg = $_POST["msg"];
        $id3 = $_POST["id1"];
	    $id4 = $_POST["id2"];
	$product_array = $db_handle->runQuery("SELECT * FROM `".$id."` WHERE id='1'");
	if (!empty($product_array)) { 
	foreach($product_array as $key=>$value){
    $id5 = $product_array[$key]["pname"];
	$id6 = $product_array[$key]["img1"];
	$sql = "INSERT INTO comment (senderemail,receiveremail,msg,guest,pname,img,name,img2,active) "
	       . "VALUES ('$id','$id1','$msg','$id2','$id3','$id4','$id5','$id6','0')";
		   if($mysqli->query($sql) == TRUE) {
			   header("location: news.php");
		   }
	}
	}
	}
	?>