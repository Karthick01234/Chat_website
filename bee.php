<?php
session_start();
require_once("db.php");
$db_handle = new DBController();
if(!isset($_SESSION["k"])){
	header("Location: bid.php");
    exit(); }
    $mysqli = new mysqli('127.0.0.1','root',"",'sign up');
	$id = $_SESSION["k"];
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id1 = $_POST["a"];
		$sql = "UPDATE bids SET active='1' WHERE id='".$id1."'";
        if($mysqli->query($sql) == TRUE) {
				echo "<script>window.history.back();
				alert(\"Submission sucess\")</script>";
			   }
	}
?>