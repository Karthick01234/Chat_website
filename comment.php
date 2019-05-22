<?php
session_start();
require_once("db.php");
$db_handle = new DBController();
$mysqli = new mysqli('127.0.0.1','root',"",'sign up');
  if(!isset($_SESSION["em"])){
	header("Location: news.php");
    exit();
	}
	$id = $_SESSION["em"];
	$_SESSION["ema"] = $id;
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
<title> Vintax - Vc </title>
</head>
<body bgcolor="#F0F0F0">
<div align="middle" style="background-color:#3b5998;height:40px" ><a style="float:left" href="news.php"> <button type="button" style="width:100px;height:40px;background-color:#3b5998;border:1px solid #3b5998"> <font size="4"> News Feed </font></button> </a> </div>   
<br>
<br>	
<?php
    $product_array = $db_handle->runQuery("SELECT * FROM comment ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
			if(!empty($product_array[$key]["msg"])) {
				if($product_array[$key]["receiveremail"] == $id) {
	?>
    <div class="name" > <img src="<?php echo $product_array[$key]["img2"]; ?>" style="width:60px;height:60px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;">
    <font size="4"> <?php echo $product_array[$key]["name"]; ?> Message you - > [<?php echo $product_array[$key]["msg"] ?>] </font> </div> <form style="float:left" action="reply.php" method="post"> <input type="submit" style="width:200px;height:25px;background-color:#3b5998;border:1px solid #3b5998" value="Reply" class="btnAddAction" /> <input type="hidden" style="display:none" name="email" value="<?php echo $product_array[$key]["senderemail"]; ?>" /> <input type="hidden" style="display:none" name="id" value="<?php echo $product_array[$key]["id"]; ?>" /> </form> <br>
	<br> <br>
	<?php
			}
			else if($product_array[$key]["senderemail"] == $id){
				?>
	<div align="right" class="name" > <img src="<?php echo $product_array[$key]["img2"]; ?>" style="width:60px;height:60px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;">
    <font size="4"> You Message to <?php echo $product_array[$key]["pname"]; ?> - > [<?php echo $product_array[$key]["msg"] ?>] </font> &nbsp;&nbsp;&nbsp;</div> <br>
<?php
			}
			else {
			}
			}
		}
	}
?>
 </body>
