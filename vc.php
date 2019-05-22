<?php
session_start();
require_once("db.php");
$db_handle = new DBController();
if(!isset($_SESSION["email"])){
	header("Location: logvc.php");
    exit(); }
	$id = $_SESSION["email"];
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
<body bgcolor="#F8F0FF">
<div align="middle" style="background-color:#3b5998;height:40px" > <a style="float:left" href="post.php"> <button type="button" style="width:100px;height:40px;background-color:#3b5998;border:1px solid #3b5998"> <font size="4"> POST </font></button> </a>  <a style="float:left" href="notify.php"> <img src="o.jpeg" style="width:40px;height:30px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" /> </a><a style="float:left" href="chat.php"> <img src="ch.png" style="width:40px;height:30px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" /> </a> <font color="black" size="6"> VINTAX <sub> vc </sub> </font>
<a style="float:right" href="logo.php"><button type="button" style="width:100px;height:40px;background-color:#3b5998;border:1px solid #3b5998">  <font size="4"> LOGOUT </font> </button> </a> <a style="float:right" href="set.php"> <img src="setting.jpeg" style="width:40px;height:30px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" /> </a>
  &nbsp;&nbsp;&nbsp;&nbsp; <a style="float:right" href="money.php"> <img src="o.svg" style="width:40px;height:30px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" /> </a></div>   
	<?php
	$email=$_SESSION["email"];
	$product_array = $db_handle->runQuery("SELECT * FROM `".$email."` WHERE id='1'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
			$_SESSION["em"] = $email;
	    
	?>
			<div class="vcmain">
			<div align="middle"  style="background-color:#464646;" class="background-image"> <br>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo $product_array[$key]["img2"]; ?>" style="height:240;width:720;"> <br> </div>
			<div align="middle"  class="profile-image" style="position:absolute;top:180px;left:550px">&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo $product_array[$key]["img1"]; ?>" style="height:240;width:240;"></div> 
			<br> <br> <br> <br><br> <br> <br> <br> <br><br>
			<div align="middle">&nbsp;&nbsp;&nbsp;&nbsp; <font size="4"><?php echo $product_array[$key]["pname"]; ?></font></div>
			<br>
			<div align="middle">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product_array[$key]["about"]; ?> </div>
			<br> <br>
			<details style="background-color:#F8F0FF;"> <summary align="middle" style="background-color:#3b5998;border:1px solid #3b5998"> Details </summary> <br>
			<h1 align="middle"> <font color="red"> Personal Detail </font> </h1> <br>
			<font size="4">
			<div class="nam">Name :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["name"]; ?> &nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
            <div align="left">Gender :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["mf"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
            <div align="left">RelationShip Status :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["mu"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
			<div align="left">Few Lines About RelationShip :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["rs"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
			<div align="left">Qualification:&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["ws"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
            <div align="left">&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["sc"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
            </font>
			<font size="4">
			<h2 align="middle"> <font color="red"> Other Details </font> </h2> <br>
			<div align="left">Hobby :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["my1"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
            <div align="left">ExtraCurricularActivities :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["my2"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
            <div align="left">Achievements :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["my3"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
            </font>
			</details>
			<br> <br>

	<?php
		}
	}
	?>
<div style="background-color:#A9A9A9"> <a style="float:left" href="about.php"> <button type="button" style="width:400px;height:40px;background-color:#B0B0B0;border:1px solid # B0B0B0;"> About </button> </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a style="float:centre" href="friend.php"> <button type="button" style="width:400px;height:40px;background-color:#B0B0B0;border:1px solid # B0B0B0"> Friends </button> </a> 
<a style="float:right" href="find.php"> <button type="button" style="width:400px;height:40px;background-color:#B0B0B0;border:1px solid # B0B0B0"> Find Friends </button> </a></div> <br>
</div> <br> <br>
<div align="middle" style="background-color:A9A9A9"><a href="news.php"> <font size="4"> Click here for go to your news feed </font> </a> </div> <br> <br>
<div align="middle" style="background-color:#3b5998"> <font size="5" color="pink"> Posts of you ! </font></div> <br>
<br>
<?php
	$product_array = $db_handle->runQuery("SELECT your FROM `".$email."` WHERE id != '1'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
			if (!empty($product_array[$key]["your"])) { 
			?>
			  <div style="display:inline-block" class="your">&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo $product_array[$key]["your"]; ?>" style="height:240;width:240;"> </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
			}
		}
	}
	?>
<?php
	$product_array = $db_handle->runQuery("SELECT video FROM `".$email."` WHERE id != '1'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
			if (!empty($product_array[$key]["video"])) { 
?>
     <div style="display:inline-block" class="your"> <video autoplay muted loop id="my video" width="320" height="200" > <source src="<?php echo $product_array[$key]["video"]; ?>" type="video/mp4"> </video></div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
		}
		}
	}
	
	?>
	<br>
<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> 
</body>
</html>