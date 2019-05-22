<?php
 session_start();
   if(!isset($_SESSION["em"])){
	header("Location: set.php");
    exit(); }
   $mysqli = new mysqli('127.0.0.1','root',"",'sign up');
   $id = $_SESSION["em"];
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $id1 = mysql_real_escape_string('photo/'.$_FILES['img1']['name']); 
   $id2 = mysql_real_escape_string('photo/'.$_FILES['img2']['name']); 
    if(!empty($_POST['img1']) AND !empty($_POST['img2'])) {
      if(copy($_FILES['img1']['tmp_name'], $id1) AND copy($_FILES['img2']['tmp_name'], $id2)) {
		$sql = "UPDATE profile SET img1='".$id1."' AND img2='".$id2."' WHERE email='".$id."'";
		$sq = "UPDATE `".$id."` SET img1='".$id1."' AND img2='".$id2."' WHERE id='1'";
		  if($mysqli->query($sql) == true AND $mysqli->query($sq) == true) {
                header("location: set.php");
		  }
	}
   }
   else if(!empty($_POST['img1'])) {
	   if(copy($_FILES['img1']['tmp_name'], $id1)) {  
        $sql = "UPDATE profile SET img1='".$id1."' WHERE email='".$id."'";
		$sq = "UPDATE `".$id."` SET img1='".$id1."' WHERE id='1'";
				  if($mysqli->query($sql) == true AND $mysqli->query($sq) == true) {
                header("location: set.php");
		  }
		}
   }
   else {
	  if(copy($_FILES['img2']['tmp_name'], $id2)) { 
	   $sql = "UPDATE profile SET img2='".$id2."' WHERE email='".$id."'";
		$sq = "UPDATE `".$id."` SET img2='".$id2."' WHERE id='1'";
		  if($mysqli->query($sql) == true AND $mysqli->query($sq) == true) {
                header("location: set.php");
		  }
	  }
   }
   }
?>