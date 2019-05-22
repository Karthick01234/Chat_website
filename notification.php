<?php
session_start();
require_once("db.php");
$db_handle = new DBController();
if(!isset($_SESSION["ema"])){
	header("Location: vc.php");
    exit();
	}
	$id = $_SESSION["ema"];
	$_SESSION["em"] = $id;
if($_SERVER['REQUEST_METHOD'] == 'GET') {
	$my = $_GET["id"];
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
<body bgcolor="#F0F0F0">
<div align="middle" style="background-color:#3b5998;height:40px" ><button type="button" onclick="hi()" style="width:100px;height:40px;background-color:#3b5998;border:1px solid #3b5998;float:left;"> <font size="4"> Back </font></button> </a> <font color="black" size="6">VINTAX <sub>vc</sub></font>
</div>
<br>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM post WHERE id = '".$my."'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	    if (!empty($product_array[$key]["video"])) { 
		 if($product_array[$key][$id] == '1') {
	?>
	<div class="name" > <img src="<?php echo $product_array[$key]["img"]; ?>" style="width:60px;height:60px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;">
    <font size="4"> <?php echo $product_array[$key]["pname"]; ?> </font> </div> <br>
	<div id="des"> <font size="4" color="blue"> description:   <?php echo $product_array[$key]["description"]; ?> </font>  </div>
	<div align="middle" style="background-color:#464646"> <video loop width="420" height="320" controls> <source src="<?php echo $product_array[$key]["video"]; ?>"> </video> </div> <br> 
    <br>
	<div align="left"> <img src="f.jpeg" style="width:40px;height:30px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" /> <a style="float:right" href="share.php?id=<?php echo $product_array[$key]["id"]; ?>"> <img src="s.png" style="width:40px;height:30px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" />  </a>
	</div>
	<br>
    <div> &nbsp;&nbsp;&nbsp;<?php echo $product_array[$key]["love"]; ?> &nbsp;&nbsp; views </div>
	<br> <br>
	<?php
		}
	    else {
			?> <br>
    <div class="name" > <img src="<?php echo $product_array[$key]["img"]; ?>" style="width:60px;height:60px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;">
    <font size="4"> <?php echo $product_array[$key]["pname"]; ?> </font> </div> <br>
	<div id="des"> <font size="4" color="blue"> description:   <?php echo $product_array[$key]["description"]; ?> </font> </div>
	<div align="middle" style="background-color:#464646"> <video loop width="420" height="320" controls> <source src="<?php echo $product_array[$key]["video"]; ?>"> </video> </div> <br> 
    <br>
	<div align="left"> <a href="likeyp1.php?id=<?php echo $product_array[$key]["id"]; ?>"> <img src="p.png" style="width:40px;height:30px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" /> </a> <a style="float:right" href="share.php?id=<?php echo $product_array[$key]["id"]; ?>"> <img src="s.png" style="width:40px;height:30px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" />  </a> 
	</div>
	<br>
	<div> &nbsp;&nbsp;&nbsp;<?php echo $product_array[$key]["love"]; ?> &nbsp;&nbsp; views </div>
	<br>
<?php
		}		
		}
	}
	}
	?>
	
<?php
	$product_array = $db_handle->runQuery("SELECT * FROM post WHERE id = '".$my."'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	    if (!empty($product_array[$key]["your"])) {
		 if($product_array[$key][$id] == '1') {			
	?> <br>
	<div class="name"> <img src="<?php echo $product_array[$key]["img"]; ?>" style="width:60px;height:60px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;">
    <font size="4"> <?php echo $product_array[$key]["pname"]; ?> </font> </div> <br>
	<div id="des"> <font size="4" color="blue"> description:  <?php echo $product_array[$key]["description"]; ?> </font> </div>
	<div align="middle" style="background-color:#464646"> <img src="<?php echo $product_array[$key]["your"]; ?>" style="width:420;height:320"> </div>  <br>  
    <br>
	<div align="left"> <img src="f.jpeg" style="width:40px;height:30px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" />  <a style="float:right" href="share.php?id=<?php echo $product_array[$key]["id"]; ?>"> <img src="s.png" style="width:40px;height:30px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" />  </a>    
	</div> <br>
	<div> &nbsp;&nbsp;&nbsp;<?php echo $product_array[$key]["love"]; ?> &nbsp;&nbsp; views </div>
	<br>
<?php
		 }
		else {
			?> <br>
	<div class="name"> <img src="<?php echo $product_array[$key]["img"]; ?>" style="width:60px;height:60px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;">
    <font size="4"> <?php echo $product_array[$key]["pname"]; ?> </font> </div> <br>
	<div id="des"> <font size="4" color="blue"> description:  <?php echo $product_array[$key]["description"]; ?> </font> </div>
	<div align="middle" style="background-color:#464646"> <img src="<?php echo $product_array[$key]["your"]; ?>" style="width:420;height:320"> </div>  <br>  
    <br>
	<div align="left"> <a href="likeyp1.php?id=<?php echo $product_array[$key]["id"]; ?>"> <img src="p.png" style="width:40px;height:30px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" /> </a>  <a style="float:right" href="share.php?id=<?php echo $product_array[$key]["id"]; ?>"> <img src="s.png" style="width:40px;height:30px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" />  </a>    
	</div> <br>
	<div> &nbsp;&nbsp;&nbsp;<?php echo $product_array[$key]["love"]; ?> &nbsp;&nbsp; views </div>
	<br> 
	<?php
		}
		}
		}
	}
}
	?>	
</body>
</html>