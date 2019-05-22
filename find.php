<?php
session_start();
require_once("db.php");
$db_handle = new DBController();
if(!isset($_SESSION["em"])){
	header("Location: vc.php");
    exit(); }
	$id = $_SESSION["em"];
	$_SESSION["ema"] = $id;
	$mysqli = new mysqli('127.0.0.1','root',"",'sign up');
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
<div align="middle" style="background-color:#3b5998;height:40px" > <a style="float:left" href="vc.php"> <button type="button" style="width:100px;height:40px;background-color:#3b5998;border:1px solid #3b5998"> <font size="4"> Main Page </font></button> </a> <font color="black" size="6">VINTAX<sub>vc</sub> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
</div>   
<br>
<div style="background-color:#A9A9A9"> <a style="float:left" href="find.php"> <button type="button" style="width:400px;height:40px;background-color:#B0B0B0;border:1px solid # B0B0B0;"> Find Friends </button> </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a style="float:centre" href="view.php"> <button type="button" style="width:400px;height:40px;background-color:#B0B0B0;border:1px solid # B0B0B0"> Friend Request </button> </a> 
<a style="float:right" href="send.php"> <button type="button" style="width:400px;height:40px;background-color:#B0B0B0;border:1px solid # B0B0B0"> View Sent Request </button> </a></div> <br>
</div> <br>
<form method="post" action="engine.php"> <input type="text" size="40" name="msg" style="position:absolute;left:50px;border:1px solid #3b5998;background-color:blue;border-radius:10px;height:25px;width:1000px" required /> <input type="submit" style="width:200px;height:25px;background-color:blue;border:1px solid blue;border-radius:20px;position:absolute;left:1100px;" value="search" /> </form>
<br> <br> <br>
<?php
    $email = $_SESSION["em"];
	$elx = "";
	$elx1 = "";
    $product_array = $db_handle->runQuery("SELECT * FROM profile WHERE email !='".$email."'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
			 $code = $product_array[$key]["email"]; 
			 $match = mysqli_query($mysqli,"select * from `".$email."`  WHERE e ='".$code."'");
	         $mat = mysqli_num_rows($match);
	         $match1 = mysqli_query($mysqli,"select * from `".$email."`  WHERE e1 ='".$code."'");
	         $mat1 = mysqli_num_rows($match1);
			if($mat > 0 OR $mat1 > 0) {
			}
			else {
?>
			<div style="background-color:#A9A9A9">
			<details style="background-color:#A9A9A9"> <summary align="middle" style="background-color:#3b5998;border:1px solid #3b5998;width:1344px"> Details </summary> <br>
			<h1 align="middle"> <font color="red"> Personal Detail </font> </h1> <br>
			<font size="4">
			<div class="nam">Name :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["name"]; ?> &nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
            <div align="left">About :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["about"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
			<div align="left">Gender :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["mf"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
            <div align="left">RelationShip Status :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["mu"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
			<div align="left">Few Lines About RelationShip :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["rs"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
			<div align="left">Qualification:&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["ws"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
            <div align="left">&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["sc"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
   			</font>
			</details>
			</div>
			<div style="background-color:#A9A9A9">
			<div class="img">
			<img src="<?php echo $product_array[$key]["img1"]; ?>" style="width:240;height:240"> </div> <br>
			<div> <p>&nbsp; <font color="pink" size="4"><?php echo $product_array[$key]["pname"]; ?> </font> </p> </div> <br>
            <div> <p>&nbsp; <font color="pink" size="4"><?php echo $product_array[$key]["about"]; ?> </font> </p> </div> <br>
			<div><form method="post" action="add.php">&nbsp; <input type="submit" style="width:200px;height:25px;background-color:#3b5998;border:1px solid #3b5998" value="Add Friend" class="btnAddAction" /> <input type="hidden" style="display:none" name="email" value="<?php echo $product_array[$key]["email"]; ?>" /> </form>
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