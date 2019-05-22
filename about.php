<?php
session_start();
require_once("db.php");
$db_handle = new DBController();
if(!isset($_SESSION["em"])){
	header("Location: vc.php");
    exit(); }
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
<body bgcolor="#F8F0FF">
<div align="middle" style="background-color:#3b5998;height:40px" > <a style="float:left" href="vc.php"> <button type="button" style="width:100px;height:40px;background-color:#3b5998;border:1px solid #3b5998"> <font size="4"> Main Page </font></button> </a>  <font color="black" size="6">VINTAX<sub>vc</sub> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
</div>   
	<?php
	$email=$_SESSION["em"];
	$product_array = $db_handle->runQuery("SELECT * FROM `".$email."` WHERE id='1'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
			$_SESSION["em"] = $email;
	    
	?>
			<div class="vcmain">
			<h1 align="middle"> <font color="red"> Personal Detail </font> </h1> <br>
			<font size="4">
			<div class="nam">Name :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["name"]; ?> &nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
            <div align="left">Gender :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["mf"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
            <div align="left">RelationShip Status :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["mu"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
			<div align="left">Few Lines About RelationShip :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["rs"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
			<div align="left">Qualification:&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["ws"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;<br> </p> </div> <br>
            <div align="left">&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["sc"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
			<details style="background-color:#F8F0FF;"> <summary align="middle" style="background-color:#3b5998;border:1px solid #3b5998"> Working detail </summary> <br>
			<div align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["centre"]; ?> </div> <br>
			<div align="right"style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["ad"]; ?> </div> <br>
			<div align="right"style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["pos1"]; ?> </div> <br>
			</details> <br> <br>
			<details style="background-color:#F8F0FF"> <summary align="middle" style="background-color:#3b5998;border:1px solid #3b5998"> studying detail </summary> <br>
			<div align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["cen"]; ?> </div> <br>
			<div align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["sd"]; ?> </div> <br>
			<div align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["po"]; ?> </div> <br>
			</details> <br> <br>
			</font>
			<font size="4">
			<h2 align="middle"> <font color="red"> Other Details </font> </h2> <br>
			<div align="left">Hobby :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["my1"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
            <div align="left">ExtraCurricularActivities :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["my2"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
            <div align="left">Achievements :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["my3"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
            </font>
			<br> <br>

	<?php
		}
	}
	?>
</body>
</html>