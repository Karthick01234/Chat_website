<?php
session_start();
if(!isset($_SESSION["ema"])){
	header("Location: vc.php");
    exit(); }
	$id = $_SESSION["ema"];
	$_SESSION["em"] = $id;
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
<div align="middle" style="background-color:#3b5998;height:40px" > <a style="float:left" href="vc.php"> <button type="button" style="width:100px;height:40px;background-color:#3b5998;border:1px solid #3b5998"> <font size="4"> Main Page </font></button> </a>  <font color="black" size="6">VINTAX<sub>vc</sub> &nbsp; &nbsp; &nbsp;</font>
</div>   
<br>
<br>
<div id="nam1" style="background-color:#A9A9A9"> <a href="edit.php"> <button type="button" style="width:1366px;height:40px;background-color:#B0B0B0;border:1px solid # B0B0B0;text-align:left;padding-left:6px"><img src="setting.jpeg" style="width:40px;height:30px;border-radius:40%;padding:5px;vertical-align:middle;margin-right:15px;" /> Edit Profile </button> </a> </div> <br> <br>
<div id="nam1" style="background-color:#A9A9A9"> <a href="pass.php"> <button type="button" style="width:1366px;height:40px;background-color:#B0B0B0;border:1px solid # B0B0B0;text-align:left;padding-left:6px"><img src="setting.jpeg" style="width:40px;height:30px;border-radius:40%;padding:5px;vertical-align:middle;margin-right:15px;" /> Change Password </button> </a> </div> <br> <br>
<div id="nam2" style="background-color:#A9A9A9"> <a href="app.php"> <button type="button" style="width:1366px;height:40px;background-color:#B0B0B0;border:1px solid # B0B0B0;text-align:left;padding-left:6px"><img src="setting.jpeg" style="width:40px;height:30px;border-radius:40%;padding:5px;vertical-align:middle;margin-right:15px;" /> Appeal Form </button> </a> </div> <br> <br>
<div id="nam3" style="background-color:#A9A9A9"> <a href="com.php"> <button type="button" style="width:1366px;height:40px;background-color:#B0B0B0;border:1px solid # B0B0B0;text-align:left;padding-left:6px"><img src="setting.jpeg" style="width:40px;height:30px;border-radius:40%;padding:5px;vertical-align:middle;margin-right:15px;" /> Complaint Form </button> </a> </div> <br> <br>
<div id="nam4" style="background-color:#A9A9A9"> <a href="help.php"> <button type="button" style="width:1366px;height:40px;background-color:#B0B0B0;border:1px solid # B0B0B0;text-align:left;padding-left:6px"><img src="setting.jpeg" style="width:40px;height:30px;border-radius:40%;padding:5px;vertical-align:middle;margin-right:15px;" />Help Centre </button> </a> </div> <br> <br>
<div id="nam5" style="background-color:#A9A9A9"> <a href="mal.php"> <button type="button" style="width:1366px;height:40px;background-color:#B0B0B0;border:1px solid # B0B0B0;text-align:left;padding-left:6px"><img src="setting.jpeg" style="width:40px;height:30px;border-radius:40%;padding:5px;vertical-align:middle;margin-right:15px;" />Malware Protection </button> </a> </div> <br> <br>
<div id="nam6" style="background-color:#A9A9A9"> <a href="sec.php"> <button type="button" style="width:1366px;height:40px;background-color:#B0B0B0;border:1px solid # B0B0B0;text-align:left;padding-left:6px"><img src="setting.jpeg" style="width:40px;height:30px;border-radius:40%;padding:5px;vertical-align:middle;margin-right:15px;" /> Security Gard </button> </a> </div> <br> <br>
<div id="nam6" style="background-color:#A9A9A9"> <a href="accountdel.php"> <button type="button" style="width:1366px;height:40px;background-color:#B0B0B0;border:1px solid # B0B0B0;text-align:left;padding-left:6px"><img src="setting.jpeg" style="width:40px;height:30px;border-radius:40%;padding:5px;vertical-align:middle;margin-right:15px;" /> Delete Account </button> </a> </div> <br> <br>
</body>
</html>