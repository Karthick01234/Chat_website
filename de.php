<?php
    session_start();
	require_once("db.php");
    $db_handle = new DBController();
	$mysqli = new mysqli('127.0.0.1','root',"",'sign up');
    if(!isset($_SESSION["ema"])){
	header("Location: friend.php");
    exit(); }
	$id = $_SESSION["ema"];
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = $_POST["email"];
			$sql = "DELETE FROM `".$id."` WHERE e1='".$email."' AND active='2'";
			$search = "DELETE FROM `".$email."` WHERE e='".$id."' AND active='2'";
              	if($mysqli->query($sql) == true AND $mysqli->query($search) == true) {
      					  header("location: friend.php");					
					  }
					  else {			   
					  }		
		   }
?>