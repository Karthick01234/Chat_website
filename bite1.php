<?php
session_start();
require_once("db.php");
$db_handle = new DBController();
if(!isset($_SESSION["ema"])){
	header("Location: company.php");
    exit(); }
    $mysqli = new mysqli('127.0.0.1','root',"",'sign up');
	$id = $_SESSION["ema"];
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id1 = $_POST["a"];
		$id2 = $_POST["b"];
		$id3 = $_POST["c"];
		$id4 = $_POST["d"];
		$product_array = $db_handle->runQuery("SELECT * FROM project WHERE email ='".$id2."' AND value='".$id1."'");
	        if (!empty($product_array)) { 
		    foreach($product_array as $key=>$value){
            $h = $product_array[$key]["category"];
			$h1 = $product_array[$key]["title"];
			$h2 = $product_array[$key]["amount"];
			$h3 = $product_array[$key]["description"];
			$h4 = $product_array[$key]["skills"];
			$h5 = $product_array[$key]["file"];
		$check = mysqli_query($mysqli,"select * from bids  WHERE email ='".$id."'");
	    $checkrows = mysqli_num_rows($check);
	    if($checkrows > 0) {
		    $sql = "INSERT INTO bids (email,p1,p2,price,proposal,category,title,amount,description,skills,file) "
		           . "VALUES ('$id','$id1','$id2','$id3','$id4','$h','$h1','$h2','$h3','$h4','$h5')";
			   if($mysqli->query($sql) == TRUE) {
				echo "<script>window.history.back();
				alert(\"Bidding Successfull .\")</script>";
			   }
	}
	else {
		$sql = "INSERT INTO bids (email,p1,p2,price,proposal,category,title,amount,description,skills,file) "
		        . "VALUES ('$id','$id1','$id2','$id3','$id4','$h','$h1','$h2','$h3','$h4','$h5')";
			if($mysqli->query($sql) == TRUE) {
				echo "<script>window.history.back();
				alert(\"Bidding Successfull\")</script>";
			}
	}
	}
			}
	}
	?>