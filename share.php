<?php
session_start();
require_once("db.php");
$db_handle = new DBController();
if(!isset($_SESSION["em"])){
	header("Location: news.php");
    exit();
	}
	$email = $_SESSION["em"];
	$id = $_GET["id"];
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
 function my() {
	 var copyText = document.getElementById("myInput");
	 copyText.select();
	 document.execCommand("copy");
	 alert("Copied the text: " +copyText.value);
 }
</script>
<title> Vintax - Vc </title>
</head>
<body bgcolor="#989898">
<div align="middle" style="background-color:#3b5998;height:40px" ><a style="float:left" href="news.php"> <button type="button" style="width:100px;height:40px;background-color:#3b5998;border:1px solid #3b5998"> <font size="4"> News Feed </font></button> </a> </div>   
	<br>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM post WHERE id='".$id."' ");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	    if (!empty($product_array[$key]["video"])) { 
		?> <br>
	<div class="name" > <img src="<?php echo $product_array[$key]["img"]; ?>" style="width:60px;height:60px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;">
    <font size="4"> <?php echo $product_array[$key]["pname"]; ?> </font> </div> <br>
	<div id="des"> <font size="4" color="blue"> description:   <?php echo $product_array[$key]["description"]; ?> </font>  </div>
    <br>
	<div align="middle" style="background-color:#464646"> <video loop width="420" height="320" controls> <source src="<?php echo $product_array[$key]["video"]; ?>"> </video> </div> <br> 
    <br>
	<div align="right"> <input style="background-color:#989898;border:3px solid #C0C0C0" size="55" type="text" value="localhost/vintax/share.php?id=<?php echo $product_array[$key]["id"]; ?>" id="myInput"> </div> <br>
	<div align="right"> <button style="height:30;width:120;background-color:#989898;border:3px solid #C0C0C0" onclick="my()"> Copy Link </button> </div> <br>
<?php
		}		
		}
	}
	?>
	
<?php
	$product_array = $db_handle->runQuery("SELECT * FROM post WHERE id='".$id."'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	    if (!empty($product_array[$key]["your"])) {
	?> <br>
	<div class="name"> <img src="<?php echo $product_array[$key]["img"]; ?>" style="width:60px;height:60px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;">
    <font size="4"> <?php echo $product_array[$key]["pname"]; ?> </font> </div> <br>
	<div id="des"> <font size="4" color="blue"> description:  <?php echo $product_array[$key]["description"]; ?> </font> </div>
    <br>
	<div align="middle" style="background-color:#464646"> <img src="<?php echo $product_array[$key]["your"]; ?>" style="width:420;height:320"> </div>  <br>  
    <br>
	<div align="right"> <input style="background-color:#989898;border:3px solid #C0C0C0" size="55" type="text" value="localhost/vintax/share.php?id=<?php echo $product_array[$key]["id"]; ?>" id="myInput"> </div> <br>
	<div align="right"> <button style="height:30;width:120;background-color:#989898;border:3px solid #C0C0C0" onclick="my()"> Copy Link </button> </div> <br>
	<?php
		}
		}
		}
	?>
