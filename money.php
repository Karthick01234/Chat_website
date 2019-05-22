<?php
session_start();
require_once("db.php");
$db_handle = new DBController();
if(!isset($_SESSION["ema"])){
	header("Location: vc.php");
    exit(); }
	$mysqli = new mysqli('127.0.0.1','root',"",'sign up');
	$id = $_SESSION["ema"];
	$_SESSION["em"] = $id;
	?>
<!DOCTYPE html>
<html>
<head>
<title> money context </title>
</head>
<style>
*{   
    padding: 0; 
    margin: 0; 
 }
</style>
<script>
    function my() {
	 window.location="vc.php";	
	}
	function hi() {
		document.getElementById("hi").style="display:none";
		document.getElementById("my").style="display:j";
	}
	function me() {
		document.getElementById("hi").style="display:j";
		document.getElementById("my").style="display:none";
	}
	function me1() {
		document.getElementById("hi").style="display:none";
		document.getElementById("my").style="display:none";
		document.getElementById("my1").style="display:j";
	}
	function ge() {
		document.getElementById("hi").style="display:none";
		document.getElementById("my").style="display:j";
		document.getElementById("my1").style="display:none";
	}
</script>
<body>
<div align="middle" style="background-color:#3b5998;height:40px" ><button type="button" onclick="my()" style="width:100px;height:30px;background-color:#3b5998;border:1px solid #3b5998;float:left;padding:6px 10px"> <font size="5"> Back </font></button> <h1> vintax <sub> vc </sub> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </h1> </div> <br> <br>
<?php
	$match = mysqli_query($mysqli,"select * from passbook  WHERE email ='".$id."'");
	$mat = mysqli_num_rows($match);
	if($mat > 0) {
	$product_array = $db_handle->runQuery("SELECT * FROM passbook WHERE email ='".$id."'");
	if (!empty($product_array)) { 
	foreach($product_array as $key=>$value){
		if(!empty($product_array[$key]["photo"])) {
?> 
<div align="right"> <img src="u.svg" style="width:70px;height:50px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" /> <br> 
<font color="green"><?php echo $product_array[$key]["price"]; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </font></div>  <br> <br>
<div id="hi" style="display:j" align="middle">
<div style="background-color:#A9A9A9;width:1200px;height:300px;border:1px solid black;padding:0;margin:0;border-radius:5%">
<div align="left" style="position:absolute;top:200px;left:100px"> <img src="<?php echo $product_array[$key]["photo"]; ?>" width="140" height="140" /> </div>
<h1 style="border-bottom:1px solid #E0E0E0;position:absolute;top:200px;left:300px"> Name : <?php echo $product_array[$key]["name"]; ?> </h1>
<h2 style="border-bottom:1px solid #E0E0E0;position:absolute;top:270px;left:300px"> Account no : <?php echo $product_array[$key]["accno"]; ?> </h2>
<p style="position:absolute;top:365px;left:1080px"> Signature : </p>
<p style="position:absolute;top:405px;left:100px"> Account Balance : <?php echo $product_array[$key]["price"]; ?> </p>
<p style="position:absolute;top:435px;left:100px"> Total Amount Earned : <?php echo $product_array[$key]["total price"]; ?> </p>
<p> <img src="<?php echo $product_array[$key]["sign"]; ?>" style="position:absolute;top:400px;left:1080px" width="140" height="40" /> </p> 
</div> <br>
<div> <button onclick="hi()" style="padding:10px 10px;background-color:#A9A9A9;border:# B0B0B0;border-radius:50%;position:absolute;left:1200px"> -> </button></div>
</div> 
<div id="my" style="display:none;background-color:#A9A9A9">
<table style="background-color:#A9A9A9">
<tr>
<td style="padding:4px 130px"> <h1> <font color="blue"> Project status </font> </h1> </td>
<td style="padding:4px 160px"> <h2> <font color="blue"> Counts </font> </h2> </td>
<td style="padding:4px 185px"> <h3> <font color="blue"> See Lists </font> </h3></td>
</tr>
<tr>
<td style="padding:6px 180px"> <font color="blue"> Total Bids : </font> </td>
<td style="padding:6px 188px"> <font color="blue"> <?php echo $product_array[$key]["bid"]; ?> </font> </td>
<td style="padding:6px 190px">  <a href="bid.php"><button type="button" style="background-color:#A9A9A9;border:# B0B0B0;padding:10px 20px"> <font color="blue">See Bids </font> </button> </a></td>
</tr>
<tr>
<td style="padding:6px 180px"> <font color="blue"> Post Project : </font> </td>
<td style="padding:6px 188px"> <font color="blue"> <?php echo $product_array[$key]["post"]; ?> </font> </td>
<td style="padding:6px 190px"> <a href="popo.php"><button type="button" style="background-color:#A9A9A9;border:# B0B0B0;padding:10px 20px"> <font color="blue">See Post </font> </button> </a></td></tr>
<tr>
<td style="padding:6px 180px"> <font color="blue"> Worked Project : </font> </td>
<td style="padding:6px 188px"> <font color="blue"> <?php echo $product_array[$key]["workedproject"]; ?> </font> </td>
<td style="padding:6px 190px"> <a href="wkp.php"><button type="button" style="background-color:#A9A9A9;border:# B0B0B0;padding:10px 15px"> <font color="blue">See Works </font> </button> </a></td></tr>
</table> 
<br> <br>
<div align="left"><button onclick="me()" style="padding:10px 10px;background-color:#A9A9A9;border:# B0B0B0;border-radius:50%;position:absolute;left:100px"> <- </button> </div>
<div align="right"> <button onclick="me1()" style="padding:10px 10px;background-color:#A9A9A9;border:# B0B0B0;border-radius:50%;position:absolute;left:1200px"> -> </button>	</div> 
</div>
<div id="my1" style="background-color:#A9A9A9;display:none">
<h1 align="middle" style="background-color:#A9A9A9;border-bottom:1px solid grey"> <font color="green"> Withdraw Status </h1>
<table style="background-color:#A9A9A9">
<tr>
<td style="padding:6px 182px"> Status </td>
<td style="padding:6px 147px"> Date & Time </td>
<td style="padding:6px 182px"> Amount </td>
<?php
$product_array = $db_handle->runQuery("SELECT * FROM passbook WHERE email ='".$id."' ORDER BY id ASC");
	if (!empty($product_array)) { 
	foreach($product_array as $key=>$value){
		if(empty($product_array[$key]["photo"])) {
			if(!empty($product_array[$key]["withdrawrequest"]) AND !empty($product_array[$key]["withdrawrequestamount"])) {
?> 
<tr>
<td style="padding:6px 182px"> Withdraw Request : </td>
<td style="padding:6px 147px"> <?php echo $product_array[$key]["withdrawrequest"]; ?> </td> 
<td style="padding:6px 182px"> <?php echo $product_array[$key]["withdrawrequestamount"]; ?> </td> 
</tr>
<?php
		}
		else {
			if(!empty($product_array[$key]["withdrawaccept"]) AND !empty($product_array[$key]["withdrawacceptamout"])) {
?>
<tr>
<td style="padding:6px 182px"> Withdraw Accept : </td>
<td style="padding:6px 147px"> <?php echo $product_array[$key]["withdrawaccept"]; ?> </td> 
<td style="padding:6px 182px"> <?php echo $product_array[$key]["withdrawacceptamout"]; ?> </td> 
</tr>
<?php
			}
		}
		}
	}
	}
?>
</table>
<br> <br>
<div align="left"> <button onclick="ge()" style="padding:10px 10px;background-color:#A9A9A9;border:# B0B0B0;border-radius:50%;position:absolute;left:100px"> <- </button> </div>
</div>
<br> <br> <br> <br>
<div style="background-color:#A9A9A9"> <p align="middle" style="border-bottom:1px solid grey"> <font color="green" size="5"> Ratings Based On Your Success </font></p> <br>
<?php
  $product_array = $db_handle->runQuery("SELECT * FROM passbook WHERE email ='".$id."'");
	if (!empty($product_array)) { 
	foreach($product_array as $key=>$value){
		if(!empty($product_array[$key]["photo"])) {
			if($product_array[$key]["star"] == '5') {
?>
<div> <p style="float:left"> <font color="green" size="5"> &nbsp;&nbsp;&nbsp;&nbsp; &#9733 &#9733 &#9733 &#9733 &#9733 </font> </p>  <p style="float:right"> <font color="green" size="5"> Percentage : <?php echo $product_array[$key]["rate"]; ?>&nbsp;%&nbsp;&nbsp;&nbsp;&nbsp; </font> </p> </div> <br> <br>
<?php 
			}
			else if($product_array[$key]["star"] == '4') {
?>
<div> <p style="float:left"> <font color="green" size="5"> &nbsp;&nbsp;&nbsp;&nbsp; &#9733 &#9733 &#9733 &#9733 </font> </p>  <p style="float:right"> <font color="green" size="5"> Percentage : <?php echo $product_array[$key]["rate"]; ?>&nbsp;%&nbsp;&nbsp;&nbsp;&nbsp; </font> </p> </div> <br> <br>
<?php
			}
			else {
				if($product_array[$key]["star"] == '3') {
?>
<div> <p style="float:left"> <font color="green" size="5"> &nbsp;&nbsp;&nbsp;&nbsp; &#9733 &#9733 &#9733  </font> </p>  <p style="float:right"> <font color="green" size="5"> Percentage : <?php echo $product_array[$key]["rate"]; ?>&nbsp;%&nbsp;&nbsp;&nbsp;&nbsp; </font> </p> </div> <br> <br>
<?php
				}
				else if($product_array[$key]["star"] == '2') {
?>
<div> <p style="float:left"> <font color="green" size="5"> &nbsp;&nbsp; &#9733 &#9733  </font> </p>  <p style="float:right"> <font color="green" size="5"> Percentage : <?php echo $product_array[$key]["rate"]; ?>&nbsp;%&nbsp;&nbsp;&nbsp;&nbsp; </font> </p> </div> <br> <br>
<?php
				}
				else {
					 if($product_array[$key]["star"] == '1') {
 ?>
<div> <p style="float:left"> <font color="green" size="5"> &nbsp;&nbsp;&nbsp;&nbsp; &#9733 </font> </p>  <p style="float:right"> <font color="green" size="5"> Percentage : <?php echo $product_array[$key]["rate"]; ?>&nbsp;%&nbsp;&nbsp;&nbsp;&nbsp; </font> </p> </div> <br> <br>
<?php
					 }
					 else {
 ?>
<div> <p align="middle"> <font color="green" size="4"> --------------- </font> </p> </div> <br> <br>
<?php
					 }
				}
			}
?>

<?php
		}
	}
	}
	?>
</div>
<br> <br>
<div style="background-color:#A9A9A9"> <a style="float:left" href="postwork.php"> <button type="button" style="width:400px;height:40px;background-color:#B0B0B0;border:1px solid # B0B0B0;"> Post Project </button> </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a style="float:centre" href="workedproject.php"> <button type="button" style="width:400px;height:40px;background-color:#B0B0B0;border:1px solid # B0B0B0"> Bid Projects </button> </a> 
<a style="float:right" href="company.php"> <button type="button" style="width:400px;height:40px;background-color:#B0B0B0;border:1px solid # B0B0B0"> Work For Vintax </button> </a></div> <br>
<br> 
<?php
		}
	}
	}
	}
	else {
?>
<div align="middle" style="background-color:#3b5998;border:1px solid #3b5998">
<br> <br> 
<p align="middle"> For earning money create your passbook <br> <br> /*&nbsp;&nbsp;&nbsp; Passbook is not created &nbsp;&nbsp;&nbsp;*/</p>  <br>
<form action="passbook.php" method="post">
<input type="hidden" value="<?php echo $id; ?>" name="email" />
<input type="submit" value="Create Passbook" style="background-color:green;border:green;padding:20px 20px" />
</form>
</div>
<?php
	}
	?>
</body>
</html>