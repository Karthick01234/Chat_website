<?php
   if(!isset($_SESSION["ema"])){
	header("Location: chat.php");
    exit(); }
	$id = $_SESSION["ema"];
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = $_POST["email"];
	$name = $_POST["name"];
	$_SESSION["em"] = $id;
    $_SESSION["msg"] = $email;
    $_SESSION["msg1"] = $name;
	header("location: mess.php");
	}
	?>