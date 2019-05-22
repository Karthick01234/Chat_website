<?php
  session_start();
  if(!isset($_SESSION["ema"])){
	header("Location: vc.php");
    exit(); }
  $email = $_SESSION["ema"];
  $mysqli = new mysqli('127.0.0.1','root',"",'sign up');
  $sql = "UPDATE profile SET active='offline' WHERE email='".$email."'";
        if($mysqli->query($sql) == TRUE) {
  if(session_destroy()){
	       header("Location: logvc.php");
		}
  }
	?>