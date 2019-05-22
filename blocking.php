<?php
    session_start();
	require_once("db.php");
    $db_handle = new DBController();
	$mysqli = new mysqli('127.0.0.1','root',"",'sign up');
    if(!isset($_SESSION["e"]) AND !isset($_SESSION["e1"])){
	header("Location: block.php");
    exit(); }
	$id = $_SESSION["e"];
	$email = $_SESSION["e1"];
    $sql = "UPDATE `".$id."` SET active='3' WHERE e='".$email."' AND active='2'";
		if($mysqli->query($sql) == true) {
		    $sql = "UPDATE `".$email."` SET active='3' WHERE e1='".$id."' AND active='2'";
			    if($mysqli->query($sql) == true) {
      					  header("location: friend.php");					
					  }
					  else {			   
					  }
		}
		else {
	   $sql = "UPDATE `".$id."` SET active='3' WHERE e1='".$email."' AND active='2'";
			$search = "UPDATE `".$email."` SET active='3' WHERE e='".$id."' AND active='2'";
              	if($mysqli->query($sql) == true AND $mysqli->query($search) == true) {
      					  header("location: friend.php");					
					  }
					  else {			   
					  }		
		   }
		   ?>