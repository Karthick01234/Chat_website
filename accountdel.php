<?php
session_start();
if(!isset($_SESSION["em"])){
	header("Location: set.php");
    exit(); }
	$id = $_SESSION["em"];
	$_SESSION["ema"] = $id;
?>
<!DOCTYPE html>
<html>
<style>
*{   
    padding: 0; 
    margin: 0; 
 }
 body{
	font: 14px "Lucida Grande";  
	color: #464646;
	background-repeat: no-repeat;
	background-attachment: fixed;
    background-size: 1500px 700px;
}
</style>
<head>
<title> delete </title>
</head>
<body background="c.jpeg">
<h1 align="middle" style="background-color:black" > <font color="white">VINTAX <sub> vc </sub> </font> </h1> <br> <br> 
<h2 align="middle" style="background-color:green"> Delete Account </h2> <br> <br> <br>
<p align="middle"> <font size="4" color="green">
   " You regain your account within 24 days otherwise your account is permanently deleted " <br>
   <p align="middle"> Are you sure <p>
</font> <br> <br>
<p align="middle"> <a href="delene.php"> <button style="background-color:#3b5998;border:;padding:10px 20px"> Delete Account </button> </a> </p>
</p>
</body>
</html>