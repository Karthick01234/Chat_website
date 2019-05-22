<?php
    session_start();
	require_once("db.php");
    $db_handle = new DBController();
	$mysqli = new mysqli('127.0.0.1','root',"",'sign up');
?>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
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
#my {
    position: relative;
	top: 106px;
	cursor: pointer;
	}
</style>
<script>
  function hi() {
    window.history.back();
	} 
</script>
<title> Vintax - Vc </title>
</head>
<body bgcolor="black">
<div align="middle" style="background-color:#3b5998;height:40px" ><button type="button" onclick="hi()" style="width:100px;height:40px;background-color:#3b5998;border:1px solid #3b5998;float:left;"> <font size="4"> Back </font></button> </a> <font color="black" size="6">VINTAX <sub>vc</sub></font>
</div>   
<br>
<div align="middle">
<?php
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		$my = $_GET["id"];
	$product_array = $db_handle->runQuery("SELECT * FROM status WHERE id = '".$my."'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
          $id = $product_array[$key]["email"];
	$product_array = $db_handle->runQuery("SELECT * FROM status WHERE email = '".$id."' AND DATE >= NOW() - INTERVAL 1 DAY");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
			if(end(explode(".",$product_array[$key]["status"])) == "mp4" OR end(explode(".",$product_array[$key]["status"])) == "MP4" OR end(explode(".",$product_array[$key]["status"])) == "webm" OR end(explode(".",$product_array[$key]["status"])) == "WEBM" OR end(explode(".",$product_array[$key]["status"])) == "ogg" OR end(explode(".",$product_array[$key]["status"])) == "OGG") {
		?>
	<div id="my">
	<br>
	<div> &nbsp;&nbsp; <video loop width="420" height="320" controls> <source src="<?php echo $product_array[$key]["status"]; ?>"> </video> <br> 
   	<font size="4" color="blue"> <?php echo $product_array[$key]["des"]; ?> </font> </div>
	<br>
    </div>
<?php
		}
        else {
?>
    <div id="my"> 
	<br>
	<div> &nbsp;&nbsp; <img src="<?php echo $product_array[$key]["status"]; ?>" style="width:420;height:320" /> <br> 
   	<font size="4" color="blue"> <?php echo $product_array[$key]["des"]; ?> </font> </div>
	<br>
    </div>
<?php
				
		}
	}
		}
	}
	}
	}
	?>
	</div>
</body>
</html>