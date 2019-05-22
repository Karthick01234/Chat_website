<?php
session_start();
require_once("db.php");
$db_handle = new DBController();
if(!isset($_SESSION["ema"])){
	header("Location: find.php");
    exit(); }
	$id = $_SESSION["ema"];
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
<div style="background-color:#A9A9A9"> <a style="float:left" href="find.php"> <button type="button" style="width:400px;height:40px;background-color:#B0B0B0;border:1px solid # B0B0B0;"> Find Friends </button> </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a style="float:centre" href="view.php"> <button type="button" style="width:400px;height:40px;background-color:#B0B0B0;border:1px solid # B0B0B0"> Friend Request </button> </a> 
<a style="float:right" href="send.php"> <button type="button" style="width:400px;height:40px;background-color:#B0B0B0;border:1px solid # B0B0B0"> View Sent Request </button> </a></div> <br>
</div> <br> <br>
<?php
	$email = $_SESSION["ema"];
    $product_array = $db_handle->runQuery("SELECT * FROM `".$email."` WHERE active='1'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
			if(!empty($product_array[$key]["id1"]) AND !empty($product_array[$key]["id2"]) AND !empty($product_array[$key]["id3"]) AND !empty($product_array[$key]["id4"]) AND !empty($product_array[$key]["id5"]) AND !empty($product_array[$key]["id6"]) AND !empty($product_array[$key]["id7"]) AND !empty($product_array[$key]["id8"])  AND !empty($product_array[$key]["id9"])) {
			?>
			<div style="background-color:#A9A9A9">
			<details style="background-color:#A9A9A9"> <summary align="middle" style="background-color:#3b5998;border:1px solid #3b5998;width:1364px"> Details </summary> <br>
			<h1 align="middle"> <font color="red"> Personal Detail </font> </h1> <br>
			<font size="4">
			<div class="nam">Name :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["id1"]; ?> &nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
            <div align="left">About :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["id3"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
			<div align="left">Gender :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["id6"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
            <div align="left">RelationShip Status :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["id7"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
			<div align="left">Few Lines About RelationShip :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["id8"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
			<div align="left">Qualification:&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["id9"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
            <div align="left">&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["id10"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
   			</font>
			</details>
			</div>
			<div style="background-color:#A9A9A9">
			<div class="img">
			<img src="<?php echo $product_array[$key]["id4"]; ?>" style="width:240;height:240"> </div> <br>
			<div> <p>&nbsp; <font color="pink" size="4"><?php echo $product_array[$key]["id2"]; ?> </font> </p> </div> <br>
            <div> <p>&nbsp; <font color="pink" size="4"><?php echo $product_array[$key]["id3"]; ?> </font> </p> </div> <br>
			<div><form method="post" action="un.php">&nbsp; <input type="submit" style="width:200px;height:25px;background-color:#3b5998;border:1px solid #3b5998" value="UNDO" /> <input type="hidden" style="display:none" name="email" value="<?php echo $product_array[$key]["e"]; ?>" /></form>
			</div>
			<br>
			</div> 
			<br>
<?php
			 }		
		}
	}
	?>
			

</body>
</html>