<?php
 session_start();
   if(!isset($_SESSION["em"])){
	header("Location: set.php");
    exit(); }
   $mysqli = new mysqli('127.0.0.1','root',"",'sign up');
   $id = $_SESSION["em"];
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $id1 = mysql_real_escape_string($_POST['pname']);
   $id2 = mysql_real_escape_string($_POST['about']);
    if(!empty($_POST['pname']) AND !empty($_POST['about'])) {
      	$sql = "UPDATE profile SET pname='".$id1."' AND about='".$id2."' WHERE email='".$id."'";
		$sq = "UPDATE `".$id."` SET pname='".$id1."' AND about='".$id2."' WHERE id='1'";
		  if($mysqli->query($sql) == true AND $mysqli->query($sq) == true) {
                header("location: set.php");
		  }
   }
   else if(!empty($_POST['pname'])) {
	   $sql = "UPDATE profile SET pname='".$id1."' WHERE email='".$id."'";
		$sq = "UPDATE `".$id."` SET pname='".$id1."' WHERE id='1'";
		  if($mysqli->query($sql) == true AND $mysqli->query($sq) == true) {
                header("location: set.php");
		  }
   }
   else {
	   $sql = "UPDATE profile SET about='".$id2."' WHERE email='".$id."'";
		$sq = "UPDATE `".$id."` SET about='".$id2."' WHERE id='1'";
		  if($mysqli->query($sql) == true AND $mysqli->query($sq) == true) {
                header("location: set.php");
		  }
   }
   }
?>