<?php
session_start();
require_once("db.php");
$db_handle = new DBController(); 
$mysqli = new mysqli('127.0.0.1','root',"",'sign up');
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$id = $_POST["email"];
	$my = 'passbook/'.$_FILES['img1']['name'];
    $my1 = 'passbook/'.$_FILES['img2']['name'];
    if(copy($_FILES['img1']['tmp_name'], $my) AND copy($_FILES['img2']['tmp_name'], $my1)){   	
    $product_array = $db_handle->runQuery("SELECT * FROM `".$id."` WHERE id = '1'");
	if (!empty($product_array)) { 
	foreach($product_array as $key=>$value){
    $name = $product_array[$key]["pname"];
	}
	}
	$num = '123456';
	$acc = $name.$id.$num;
	$sql = "INSERT INTO passbook (name,accno,photo,sign,email,active) "
		   . "VALUES ('$name','$acc','$my','$my1','$id','1')";
		   if($mysqli->query($sql) == TRUE) {
			header("location: money.php");
		   }
	}
}
?>