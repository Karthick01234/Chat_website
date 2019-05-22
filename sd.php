<?php
    session_start();
	require_once("db.php");
    $db_handle = new DBController();
    if(!isset($_SESSION["e"]) AND !isset($_SESSION["e1"]) AND !isset($_SESSION["e2"])){
	header("Location: singledel.php");
    exit(); }
	$mysqli = new mysqli('127.0.0.1','root',"",'sign up');
	$email = $_SESSION["e"];
	$id = $_SESSION["e1"];
	$name = $_SESSION["e2"];
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		$id1 = $_GET["id"];
		$sql = "UPDATE `".$email."` SET `".$name."``".$id."`='3' WHERE id='".$id1."'";
		if($mysqli->query($sql) == TRUE) {
		header("location: mess.php");
	}
	}
	