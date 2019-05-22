<?php
    session_start();
	require_once("db.php");
    $db_handle = new DBController();
	$mysqli = new mysqli('127.0.0.1','root',"",'sign up');
    if(!isset($_SESSION["em"]) AND !isset($_SESSION["em1"]) AND !isset($_SESSION["em2"])){
	header("Location: mess.php");
    exit(); }
	$id = $_SESSION["em"];
	$email = $_SESSION["em1"];
	$name = $_SESSION["em2"];
	$sql = "UPDATE `".$id."` `".$name."``".$email."` ='3' WHERE `".$email."`".$name"` != ''";
	if($mysqli->query($sql == TRUE) {
		header("location: mess.php");
	}