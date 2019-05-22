<?php
session_start();
if(!isset($_SESSION["ema"])){
	header("Location: comment.php");
    exit();
	}
$email = $_SESSION["ema"];
require_once("db.php");
$db_handle = new DBController();
$mysqli = new mysqli('127.0.0.1','root',"",'sign up');
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$id = $_POST["id"];
	$id1 = $_POST["email"];
	$product_array = $db_handle->runQuery("SELECT * FROM `".$email."` WHERE id='1'");
	if (!empty($product_array)) { 
	foreach($product_array as $key=>$value){
    $id3 = $product_array[$key]["pname"];
	$id4 = $product_array[$key]["img1"];
	}
	}
	}
	?>
	<html>
<head>
<style>
*{   
    padding: 0; 
    margin: 0; 
 }
 body {
	font-family: Arial;
	color: #211a1a;
	font-size: 0.9em;
	background-repeat: no-repeat;
	background-attachment: fixed;
    background-size: 1500px 700px;
}
</style>
<title> Vintax - Vc </title>
</head>
<body bgcolor="#F0F0F0">
<div align="middle" style="background-color:#3b5998;height:40px" ><a style="float:left" href="news.php"> <button type="button" style="width:100px;height:40px;background-color:#3b5998;border:1px solid #3b5998"> <font size="4"> News Feed </font></button> </a> </div>   
<br>
<br>
<br>
<form method="post" action="reply1.php"> <input type="text" size="40" name="msg" style="position:absolute;left:50px;border:1px solid #3b5998;background-color:blue;border-radius:10px;height:25px;width:700px" required /> <input type="submit" style="width:200px;height:25px;background-color:blue;border:1px solid blue;border-radius:20px;position:absolute;left:800px;" value="send" />
<input type="hidden" style="display:none" name="email" value="<?php echo $email; ?>" /> <input type="hidden" style="display:none" name="email1" value="<?php echo $id1; ?>" /> <input type="hidden" style="display:none" name="id" value="<?php echo $id ?>" /> <input type="hidden" style="display:none" name="id1" value="<?php echo $id ?>" />
<input type="hidden" style="display:none" name="id3" value="<?php echo $id3 ?>" /><input type="hidden" style="display:none" name="id4" value="<?php echo $id4 ?>" /></form> </div>
