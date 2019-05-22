<?php
session_start();
require_once("db.php");
$db_handle = new DBController();
if(!isset($_SESSION["ema"])){
	header("Location: vc.php");
    exit(); }
	$email = $_SESSION["ema"];
?>
<html>
<head>
<style>
*{   
    padding: 0; 
    margin: 0; 
 }
 body {
	font-family: Arial;
	color: #211a1a;
	font-size: 0.9em;
	background-repeat: no-repeat;
	background-attachment: fixed;
    background-size: 1500px 700px;
}
</style>
<script>
  function hi() {
    window.history.back();
	}
</script>
<title> Vintax - Vc </title>
</head>
<body bgcolor="#F8F0FF">
<div align="middle" style="background-color:#3b5998;height:40px" ><button type="button" onclick="hi()" style="width:100px;height:40px;background-color:#3b5998;border:1px solid #3b5998;float:left;"> <font size="4"> Back </font></button> </a> <font color="black" size="6">VINTAX <sub>vc</sub></font>
</div>   
<br>
<?php
	$product_array = $db_handle->runQuery("SELECT * FROM `".$email."` WHERE id != '1' ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
		if (!empty($product_array[$key]["name"]) AND !empty($product_array[$key]["pname"]) AND !empty($product_array[$key]["about"])) {
?>
<br>
<div style="background-color:#B0B0B0;border:# B0B0B0">
<div align="left"> <img src="<?php echo $product_array[$key]["pname"]; ?>" style="width:50px;height:40px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <?php echo $product_array[$key]["about"]; ?> likes your post </div>
<?php
  if(!empty($product_array[$key]["img1"])) {
?>
<div align="middle"> <a href="notification.php?id=<?php echo $product_array[$key]["name"]; ?>"> <img src="<?php echo $product_array[$key]["img1"]; ?>" style="width:50px;height:40px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" />
</a> </div>
</div>
<?php
		}
		else {
?>
<div align="middle"> <a href="notification.php?id=<?php echo $product_array[$key]["name"]; ?>"> <video autoplay muted loop style="width:50px;height:40px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;"><source src="<?php echo $product_array[$key]["img2"]; ?>"/> </video>
</a> </div>
</div>
<?php
		}
		}
		}
	}
	?>