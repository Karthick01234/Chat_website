<?php
    session_start();
	require_once("db.php");
    $db_handle = new DBController();
	$mysqli = new mysqli('127.0.0.1','root',"",'sign up');
    if(!isset($_SESSION["em"]) AND !isset($_SESSION["em1"]) AND !isset($_SESSION["em2"])){
	header("Location: mess.php");
    exit(); }
	$id = $_SESSION["em"];
	$_SESSION["e"] = $id;
	$email = $_SESSION["em1"];
	$_SESSION["e"] = $id;
	$_SESSION["e1"] = $email;
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
<title> Block </title>
</head>
<body background="c.jpeg">
<h1 align="middle" style="background-color:black" > <font color="white">VINTAX <sub> vc </sub> </font> </h1> <br> <br> 
<h2 align="middle" style="background-color:green"> Blocking </h2> <br> <br> <br>
<p align="middle"> <font size="4" color="green">
   " If YOU BLOCK A PERSON YOU CANNOT ABLE TO UNBLOCK HIM OR YOU WANT COMPLAINT ABOUT THAT PERSON USING COMPLAINT FORM WE WILL DEFINITELY TAKE AN ACTION "
</font> <br> <br>
<a href="blocking.php"> <button style="background-color:#3b5998;border:;padding:10px 20px"> Block </button> </a>
</p>
</body>
</html>