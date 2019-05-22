<?php
session_start();
require_once("db.php");
$db_handle = new DBController();
if(!isset($_SESSION["em"])){
	header("Location: vc.php");
    exit(); }
	$id = $_SESSION["em"];
	$_SESSION["ema"] = $id;
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = $_POST["email"];
	$email1 = $_POST["email1"];
	$name = $_POST["name"];
    $name1 = $_POST["name1"];
    if(!empty($email) AND !empty($name)) {
    $_SESSION["msg"] = $email;
    $_SESSION["msg1"] = $name;
	header("location: mess.php");
	}
	else {
	$_SESSION["msg"] = $email1;
	$_SESSION["msg1"] = $name1;
	header("location: mess.php");
    }
	}
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
<div align="middle" style="background-color:#3b5998;height:40px" > <a style="float:left" href="vc.php"> <button type="button" style="width:100px;height:40px;background-color:#3b5998;border:1px solid #3b5998"> <font size="4"> Main Page </font></button> </a><font color="black" size="6">VINTAX<sub>vc</sub></font>
&nbsp;&nbsp;&nbsp;&nbsp; <a style="float:right" href="up.php"> <button type="button" style="width:100px;height:40px;background-color:#3b5998;border:1px solid #3b5998"> <font size="4"> STATUS </font></button> </a></div> <br>  
<?php 
    $product_array = $db_handle->runQuery("SELECT * FROM status WHERE active='1' AND email='".$id."' AND DATE >= NOW() - INTERVAL 1 DAY");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
?>  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div style="display:inline-block"> <a href="status.php?id=<?php echo $product_array[$key]["id"]; ?>"> <img src="<?php echo $product_array[$key]["pimg"]; ?>" style="width:70px;height:70px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" />  </a> </div>
<div style="display:inline-block"><font color="green"> Your status </font> </div>
<?php
			}
		}
	?>
<?php
	$mysqli = new mysqli('127.0.0.1','root',"",'sign up');
    $product_array = $db_handle->runQuery("SELECT * FROM status WHERE active='1'  AND DATE >= NOW() - INTERVAL 1 DAY ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
			$code = $product_array[$key]["email"];
			$match = mysqli_query($mysqli,"select * from `".$id."`  WHERE e1 ='$code' AND active='2'");
	        $mat = mysqli_num_rows($match);
            $check = mysqli_query($mysqli,"select * from `".$id."`  WHERE e ='$code' AND active='2'");
	        $checkrows = mysqli_num_rows($check);
	        if($checkrows > 0) {
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div style="display:inline-block"> <a href="status.php?id=<?php echo $product_array[$key]["id"]; ?>"> <img src="<?php echo $product_array[$key]["pimg"]; ?>" style="width:70px;height:70px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" /> </a> </div>
<div style="display:inline-block"><font color="blue"> <?php echo $product_array[$key]["pname"]; ?> </font> </div>
<?php
			}
			else if($mat > 0) {
				?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div style="display:inline-block"> <a href="status.php?id=<?php echo $product_array[$key]["id"]; ?>"> <img src="<?php echo $product_array[$key]["pimg"]; ?>" style="width:70px;height:70px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" /> </a> </div>
<div style="display:inline-block"><font color="blue"> <?php echo $product_array[$key]["pname"]; ?> </font> </div>				
<?php
		}
		else {
		}
	}
		}
?>
	
<?php
	$email = $_SESSION["em"];
    $product_array = $db_handle->runQuery("SELECT * FROM `".$email."` WHERE active='2'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
			if(!empty($product_array[$key]["id1"]) AND !empty($product_array[$key]["id2"]) AND !empty($product_array[$key]["id3"]) AND !empty($product_array[$key]["id4"]) AND !empty($product_array[$key]["id5"]) AND !empty($product_array[$key]["id6"]) AND !empty($product_array[$key]["id7"]) AND !empty($product_array[$key]["id8"])  AND !empty($product_array[$key]["id9"])) {
                $my = $product_array[$key]["e"];
			    $my1 = mysqli_query($mysqli,"select email, active FROM profile WHERE email ='$my' AND active = 'online'");
	            $my2 = mysqli_num_rows($my1);
                if($my2 > 0) {

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
			<img src="<?php echo $product_array[$key]["id4"]; ?>" style="width:240;height:240;border-radius:50px"> <font style="border:1px solid blue;background-color:blue;border-radius:10px;"> online </font></div> <br>
			<div> <p>&nbsp; <font color="pink" size="4"><?php echo $product_array[$key]["id2"]; ?> </font> </p> </div> <br>
            <div> <p>&nbsp; <font color="pink" size="4"><?php echo $product_array[$key]["id3"]; ?> </font> </p> </div> <br>
			<div><form method="post" action="chat.php">&nbsp; <input type="submit" style="width:200px;height:25px;background-color:#3b5998;border:1px solid #3b5998" value="Message" class="btnAddAction" /> <input type="hidden" style="display:none" name="email" value="<?php echo $product_array[$key]["e"]; ?>" /> <input type="hidden" style="display:none" name="name" value="<?php echo $product_array[$key]["id2"]; ?>" /></form>
			</div>
			<br>
			</div> 
			<br>
<?php
				}
				else {
				}
?>
<?php
			}		
		}
	}
	?>

	<?php
	$email = $_SESSION["em"];
    $product_array = $db_handle->runQuery("SELECT * FROM `".$email."` WHERE active='2'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
			if(!empty($product_array[$key]["id11"]) AND !empty($product_array[$key]["id12"]) AND !empty($product_array[$key]["id13"]) AND !empty($product_array[$key]["id14"]) AND !empty($product_array[$key]["id15"]) AND !empty($product_array[$key]["id16"]) AND !empty($product_array[$key]["id17"]) AND !empty($product_array[$key]["id18"])  AND !empty($product_array[$key]["id19"])) {
		        $my = $product_array[$key]["e1"];
			    $my1 = mysqli_query($mysqli,"select email, active FROM profile WHERE email ='$my' AND active = 'online'");
	            $my2 = mysqli_num_rows($my1);
                if($my2 > 0) {
		?>
			<div style="background-color:#A9A9A9">
			<details style="background-color:#A9A9A9"> <summary align="middle" style="background-color:#3b5998;border:1px solid #3b5998;width:1364px"> Details </summary> <br>
			<h1 align="middle"> <font color="red"> Personal Detail </font> </h1> <br>
			<font size="4">
			<div class="nam">Name :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["id11"]; ?> &nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
            <div align="left">About :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["id13"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
			<div align="left">Gender :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["id16"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
            <div align="left">RelationShip Status :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["id17"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
			<div align="left">Few Lines About RelationShip :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["id18"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
			<div align="left">Qualification:&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["id19"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
            <div align="left">&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["id20"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
   			</font>
			</details>
			</div>
			<div style="background-color:#A9A9A9">
			<div class="img">
			<img src="<?php echo $product_array[$key]["id14"]; ?>" style="width:240;height:240;border-radius:50px"> <font style="border:1px solid blue;background-color:blue;border-radius:10px;"> online </font></div> <br>
			<div> <p>&nbsp; <font color="pink" size="4"><?php echo $product_array[$key]["id12"]; ?> </font> </p> </div> <br>
            <div> <p>&nbsp; <font color="pink" size="4"><?php echo $product_array[$key]["id13"]; ?> </font> </p> </div> <br>
			<div><form method="post" action="chat.php">&nbsp; <input type="submit" style="width:200px;height:25px;background-color:#3b5998;border:1px solid #3b5998" value="Message" class="btnAddAction" /> <input type="hidden" style="display:none" name="email1" value="<?php echo $product_array[$key]["e1"]; ?>" /> <input type="hidden" style="display:none" name="name1" value="<?php echo $product_array[$key]["id12"]; ?>" /> </form>
			</div>
			<br>
			</div> 
			<br>
<?php
				}
				else {
				}
?>
<?php
			}		
		}
	}
	?>
<br> <br>	
<?php
	$email = $_SESSION["em"];
    $product_array = $db_handle->runQuery("SELECT * FROM `".$email."` WHERE active='2'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
			if(!empty($product_array[$key]["id1"]) AND !empty($product_array[$key]["id2"]) AND !empty($product_array[$key]["id3"]) AND !empty($product_array[$key]["id4"]) AND !empty($product_array[$key]["id5"]) AND !empty($product_array[$key]["id6"]) AND !empty($product_array[$key]["id7"]) AND !empty($product_array[$key]["id8"])  AND !empty($product_array[$key]["id9"])) {
                $my = $product_array[$key]["e"];
			    $my1 = mysqli_query($mysqli,"select email, active FROM profile WHERE email ='$my' AND active = 'offline'");
	            $my2 = mysqli_num_rows($my1);
                if($my2 > 0) {
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
			<img src="<?php echo $product_array[$key]["id4"]; ?>" style="width:240;height:240;border-radius:50px"> <font style="border:1px solid blue;background-color:blue;border-radius:10px;"> offline </font></div> <br>
			<div> <p>&nbsp; <font color="pink" size="4"><?php echo $product_array[$key]["id2"]; ?> </font> </p> </div> <br>
            <div> <p>&nbsp; <font color="pink" size="4"><?php echo $product_array[$key]["id3"]; ?> </font> </p> </div> <br>
			<div><form method="post" action="chat.php">&nbsp; <input type="submit" style="width:200px;height:25px;background-color:#3b5998;border:1px solid #3b5998" value="Message" class="btnAddAction" /> <input type="hidden" style="display:none" name="email" value="<?php echo $product_array[$key]["e"]; ?>" /> <input type="hidden" style="display:none" name="name" value="<?php echo $product_array[$key]["id2"]; ?>" /></form>
			</div>
			<br>
			</div> 
			<br>
<?php
				}
				else {
				}
?>
<?php
				}
			}		
		}
	?>
	<br>
	<?php
	$email = $_SESSION["em"];
    $product_array = $db_handle->runQuery("SELECT * FROM `".$email."` WHERE active='2'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
			if(!empty($product_array[$key]["id11"]) AND !empty($product_array[$key]["id12"]) AND !empty($product_array[$key]["id13"]) AND !empty($product_array[$key]["id14"]) AND !empty($product_array[$key]["id15"]) AND !empty($product_array[$key]["id16"]) AND !empty($product_array[$key]["id17"]) AND !empty($product_array[$key]["id18"])  AND !empty($product_array[$key]["id19"])) {
		        $my = $product_array[$key]["e1"];
			    $my1 = mysqli_query($mysqli,"select email, active FROM profile WHERE email ='$my' AND active = 'offline'");
	            $my2 = mysqli_num_rows($my1);
                if($my2 > 0) {
		?>
			<div style="background-color:#A9A9A9">
			<details style="background-color:#A9A9A9"> <summary align="middle" style="background-color:#3b5998;border:1px solid #3b5998;width:1364px"> Details </summary> <br>
			<h1 align="middle"> <font color="red"> Personal Detail </font> </h1> <br>
			<font size="4">
			<div class="nam">Name :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["id11"]; ?> &nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
            <div align="left">About :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["id13"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
			<div align="left">Gender :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["id16"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
            <div align="left">RelationShip Status :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["id17"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
			<div align="left">Few Lines About RelationShip :&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["id18"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
			<div align="left">Qualification:&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["id19"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
            <div align="left">&nbsp;&nbsp;&nbsp;&nbsp; <p align="right" style="border-bottom:1px solid #E0E0E0;"><?php echo $product_array[$key]["id20"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;</p> </div> <br>
   			</font>
			</details>
			</div>
			<div style="background-color:#A9A9A9">
			<div class="img">
			<img src="<?php echo $product_array[$key]["id14"]; ?>" style="width:240;height:240;border-radius:50px"> <font style="border:1px solid blue;background-color:blue;border-radius:10px;"> offline </font></div> <br>
			<div> <p>&nbsp; <font color="pink" size="4"><?php echo $product_array[$key]["id12"]; ?> </font> </p> </div> <br>
            <div> <p>&nbsp; <font color="pink" size="4"><?php echo $product_array[$key]["id13"]; ?> </font> </p> </div> <br>
			<div><form method="post" action="chat.php">&nbsp; <input type="submit" style="width:200px;height:25px;background-color:#3b5998;border:1px solid #3b5998" value="Message" class="btnAddAction" /> <input type="hidden" style="display:none" name="email1" value="<?php echo $product_array[$key]["e1"]; ?>" /> <input type="hidden" style="display:none" name="name1" value="<?php echo $product_array[$key]["id12"]; ?>" /> </form>
			</div>
			<br>
			</div> 
			<br>
<?php
				}
				else {
				}
?>
<?php
				}
			}		
		}	
	?>			

</body>
</html>