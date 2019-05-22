<?php
session_start();
require_once("db.php");
$db_handle = new DBController();
if(!isset($_SESSION["em"])){
	header("Location: money.php");
    exit(); }
    $mysqli = new mysqli('127.0.0.1','root',"",'sign up');
	$id = $_SESSION["em"];
	$_SESSION["ema"] = $id;
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
	 window.location="money.php";	
	}
	function hi(objButton) {
		var a = objButton.value;
		document.getElementById(a+'c').style="display:j";
		document.getElementById(a+'b').style="display:none";
	}
	function oi(objButton) {
		var k = objButton.value;
		document.getElementById(k+'c').style="display:none";
		document.getElementById(k+'b').style="display:j";
	}
	
</script>
<body>
<div align="middle" style="background-color:#3b5998;height:40px" ><button type="button" onclick="my()" style="width:100px;height:30px;background-color:#3b5998;border:1px solid #3b5998;float:left;padding:6px 10px"> <font size="5"> Back </font></button> <h1> vintax <sub> vc </sub> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </h1> </div> <br> 
<br>
<?php
$product_array = $db_handle->runQuery("SELECT * FROM passbook WHERE email ='".$id."'");
	if (!empty($product_array)) { 
	foreach($product_array as $key=>$value){
		if(!empty($product_array[$key]["photo"])) {
			if($product_array[$key]["star"] >= '4' AND $product_array[$key]["rate"] >= '90') {
				$my = explode('&',trim($product_array[$key]["skill"]));
				$a = $my[0];
				$a1 = $my[1];
				$a2 = $my[2];
				$a3 = $my[3];
?> 
<?php
$product_array = $db_handle->runQuery("SELECT * FROM project WHERE email ='company' ORDER BY id DESC");
	if (!empty($product_array)) { 
	foreach($product_array as $key=>$value){
    $check = mysqli_query($mysqli,"select * from bids WHERE email='".$id."' AND p1='".$product_array[$key]["value"]."' AND p2='".$product_array[$key]["email"]."'");
	$checkrows = mysqli_num_rows($check);
	if($checkrows > 0) {
	}
	else {
		if($a == $product_array[$key]["category"] OR $a1 == $product_array[$key]["category"] OR $a2 == $product_array[$key]["category"] OR $a3 == $product_array[$key]["category"]) {
?>
<div>
<div align="left" style="border-bottom:1px solid grey"><p style="border:3px solid grey;width:400px;background-color:grey"> <font size="5"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Category&nbsp; :&nbsp;&nbsp;</font> <font color="green" size="5"><?php echo $product_array[$key]["category"]; ?> </font> </p> </div>
<font size="5"> 
<div style="background:linear-gradient(to bottom, blue 9%, pink 45%, green 103%);border:1px solid grey">
<div>
<div align="middle"> <font size="4" color="pink"> /&nbsp;&nbsp;*&nbsp;&nbsp;This work matches your skills&nbsp;&nbsp;*&nbsp;&nbsp;/ </font></div> <br>
<div style="float:left"> &nbsp;Work Title &nbsp;: &nbsp;<?php echo $product_array[$key]["title"]; ?></div> <div style="float:right">&nbsp;Salary Range &nbsp;: &nbsp;<?php echo $product_array[$key]["amount"]; ?>&nbsp; </div></div> <br> <br>  <br>
<div style="border-bottom:1px solid black;width:500px"> &nbsp;Description</div>
<div><br> &nbsp; <?php echo $product_array[$key]["description"]; ?> <br> <br> <br></div> <br>
<div>&nbsp;Skills Required : &nbsp; <?php echo $product_array[$key]["skills"]; ?></div> <br>
<div><a href="<?php echo $product_array[$key]["file"]; ?>#jkgkh=hvhkgkhg.klghkj&toolbar=0&jkgkh=hvhkgkhg.klghkj"><p style="float:left">&nbsp; </p><p style="float:left;border:1px solid green;border-radius:30%;"> <font color="green"> + </font> </p></a>&nbsp;&nbsp;&nbsp;&nbsp; Attached File  </div> <br>
<object data="<?php echo $product_array[$key]["file"]; ?>" type="application/pdf" width="100%" height="100%" controls></object><br>
<br>
<div align="right" id="<?php echo $product_array[$key]["id"]; ?>b" style="display:j"><button  value="<?php echo $product_array[$key]["id"]; ?>" onclick="hi(this)"  style="background-color:green;border:1px solid green;padding:15px 15px;border-radius:5px"> Bid Project </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div> <br>
<div id="<?php echo $product_array[$key]["id"]; ?>c" style="display:none">
<div style="background:linear-gradient(to bottom, #228B22)">
<br>
<div align="right"> <button style="background-color:#228B22;border:#228B22;border-radius:50%;padding:5px 5px" value="<?php echo $product_array[$key]["id"]; ?>" onclick="oi(this)" > <font size="4"> X </font> </button> &nbsp;&nbsp;&nbsp; </div>
<form action="bite1.php" method="post">
<input type="hidden" value="<?php echo $product_array[$key]["value"]; ?>" name="a" />
<input type="hidden" value="<?php echo $product_array[$key]["email"]; ?>" name="b" />
&nbsp;&nbsp;&nbsp;&nbsp;<input style="height:40px;border-radius:5%;" size="50" type="text" name="c" placeholder="Bidding amount" required /> &nbsp;&nbsp;&nbsp;&nbsp;
<input style="height:40px;border-radius:5%;" size="50" type="text" name="d" placeholder="Your proposal" required /> &nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" value="Bid Project" style="background-color:green;border:1px solid green;padding:15px 15px;border-radius:5px" /> &nbsp;&nbsp;
</form>
<br> <br>
</div>
</div>
<br>
</font>
</div> </div> <br> <br>
<?php
		}
		else {
?>
<div>
<div align="left" style="border-bottom:1px solid grey"><p style="border:3px solid grey;width:400px;background-color:grey"> <font size="5"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Category&nbsp; :&nbsp;&nbsp;</font> <font color="green" size="5"><?php echo $product_array[$key]["category"]; ?> </font> </p></div>
<font size="5"> 
<div style="background:linear-gradient(to bottom, blue 9%, pink 45%, green 103%);border:1px solid grey">
<br>
<div>
<div style="float:left"> &nbsp;Work Title &nbsp;: &nbsp;<?php echo $product_array[$key]["title"]; ?></div> <div style="float:right">&nbsp;Salary Range &nbsp;: &nbsp;<?php echo $product_array[$key]["amount"]; ?>&nbsp; </div></div> <br> <br>  <br>
<div style="border-bottom:1px solid black;width:500px"> &nbsp;Description</div>
<div><br> &nbsp; <?php echo $product_array[$key]["description"]; ?> <br> <br> <br></div> <br>
<div>&nbsp;Skills Required : &nbsp; <?php echo $product_array[$key]["skills"]; ?></div> <br>
<div><a href="<?php echo $product_array[$key]["file"]; ?>#jkgkh=hvhkgkhg.klghkj&toolbar=0&jkgkh=hvhkgkhg.klghkj"><p style="float:left">&nbsp; </p><p style="float:left;border:1px solid green;border-radius:30%;"> <font color="green"> + </font> </p></a>&nbsp;&nbsp;&nbsp;&nbsp; Attached File  </div> <br>
<object data="<?php echo $product_array[$key]["file"]; ?>" type="application/pdf" width="100%" height="100%" controls></object><br>
<br>
<div align="right" id="<?php echo $product_array[$key]["id"]; ?>b" style="display:j"><button  value="<?php echo $product_array[$key]["id"]; ?>" onclick="hi(this)"  style="background-color:green;border:1px solid green;padding:15px 15px;border-radius:5px"> Bid Project </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div> <br>
<div id="<?php echo $product_array[$key]["id"]; ?>c" style="display:none">
<div style="background:linear-gradient(to bottom, #228B22)">
<br>
<div align="right"> <button style="background-color:#228B22;border:#228B22;border-radius:50%;padding:5px 5px" value="<?php echo $product_array[$key]["id"]; ?>" onclick="oi(this)" > <font size="4"> X </font> </button> &nbsp;&nbsp;&nbsp; </div>
<form action="bite1.php" method="post">
<input type="hidden" value="<?php echo $product_array[$key]["value"]; ?>" name="a" />
<input type="hidden" value="<?php echo $product_array[$key]["email"]; ?>" name="b" />
&nbsp;&nbsp;&nbsp;&nbsp;<input style="height:40px;border-radius:5%;" size="50" type="text" name="c" placeholder="Bidding amount" required /> &nbsp;&nbsp;&nbsp;&nbsp;
<input style="height:40px;border-radius:5%;" size="50" type="text" name="d" placeholder="Your proposal" required /> &nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" value="Bid Project" style="background-color:green;border:1px solid green;padding:15px 15px;border-radius:5px" /> &nbsp;&nbsp;
</form>
<br> <br>
</div>
</div>
<br>
</font>
</div> </div> <br> <br>
<?php
	}
	}
	}
	}
			}
			else {
				?>
<div align="middle"> <font color="pink" size="4">Sorry ! <br> <br> / *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; you don't have enough reviews for work for vintax &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; * / </font> </div>
<?php
			}
		}
	}
	}
	?>
	</body>
	</html>