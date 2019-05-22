<?php
    session_start();
	require_once("db.php");
    $db_handle = new DBController();
	$mysqli = new mysqli('127.0.0.1','root',"",'sign up');
    if(!isset($_SESSION["em"]) AND !isset($_SESSION["em1"]) AND !isset($_SESSION["em2"])){
	header("Location: mess.php");
    exit(); }
	$id = $_SESSION["em"];
	$_SESSION["e"] = $id;
	$email = $_SESSION["em1"];
	$_SESSION["e1"] = $email;
	$name = $_SESSION["em2"];
	$_SESSION["e2"] = $name;
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
.container {
	border:2px solid #dedede;
	padding: 10px;
	margin: 10px 0;
}
.dropbtn {
  background-color: #3b5998;
  color: white;
  padding: 8px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd}

.show {display:block;}
</style>
<title> message </title>
</head>
<body>
<?php
	   $product_array = $db_handle->runQuery("SELECT * FROM `".$email."` WHERE id='1'");
	   if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
?>
<div class="name" style="background-color:#3b5998"> <img src="<?php echo $product_array[$key]["img1"]; ?>" style="width:60px;height:60px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;">
<font size="4"> <?php echo $product_array[$key]["pname"]; ?> </font> <a style="float:right" href="chat.php"> <img src="g.png" style="width:60px;height:60px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" /> </a> <a style="float:right" href="call.php"> <img src="a.png" style="width:60px;height:60px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" /> </a> <a style="float:right" href="video.php"> <img src="n.png" style="width:60px;height:60px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" /> </a></div>
 <?php
 $email = $_SESSION["msg"];
  $product_array = $db_handle->runQuery("SELECT * FROM `".$id."` ORDER BY id ASC");
	   if (!empty($product_array)) { 
		foreach($product_array as $key=>$value) {
			 if ($product_array[$key][$name.'`'.$email] == '0' AND !empty($product_array[$key][$email.'`'.$name])) { 
?>
<?php if($product_array[$key][$email.'`'.$name] == "&hearts;") {
	?>
<br>
<div align="right"> <font size="13" color="red"> <?php echo $product_array[$key][$email.'`'.$name]; ?> </font> <a href="sd.php?id=<?php echo $product_array[$key]["id"]; ?>"> <img src="j.png" style="width:30px;height:30px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" /> </a> </div> 	
<?php 
}
else if(end(explode(".",$product_array[$key][$email.'`'.$name])) == "mp4" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "MP4" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "webm" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "WEBM" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "ogg" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "OGG" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "jpg" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "jpeg" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "png" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "gif" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "JPG" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "JPEG" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "PNG" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "GIF" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "mp3" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "MP3" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "wav" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "WAV") {
	?>
<?php
  if(end(explode(".",$product_array[$key][$email.'`'.$name])) == "mp4" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "MP4" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "webm" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "WEBM" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "ogg" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "OGG")
 {
	  ?>
<br>
<div align="right"> <video style="width:320;height:240" controls > <source src="<?php echo $product_array[$key][$email.'`'.$name]; ?>" /> </video> <a href="sd.php?id=<?php echo $product_array[$key]["id"]; ?>"> <img src="j.png" style="width:30px;height:30px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" /> </a></div>
<?php
  }
  else if(end(explode(".",$product_array[$key][$email.'`'.$name])) == "jpg" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "jpeg" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "png" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "gif" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "JPG" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "JPEG" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "PNG" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "GIF" ) 
 {
	  ?>
<br>
<div align="right"> <a href="<?php echo $product_array[$key][$email.'`'.$name]; ?>" download> <img src="<?php echo $product_array[$key][$email.'`'.$name]; ?>" width="320" height="240" /> </a> <a href="sd.php?id=<?php echo $product_array[$key]["id"]; ?>"> <img src="j.png" style="width:30px;height:30px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" /> </a> </div>
<?php
 }
 else {
	 ?>
<br>
<div align="right"> <audio controls> <source src="<?php echo $product_array[$key][$email.'`'.$name]; ?>" /> </audio> <a href="sd.php?id=<?php echo $product_array[$key]["id"]; ?>"> <img src="j.png" style="width:30px;height:30px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" /> </a> </div>
<?php 
 }
}
else {
?>
<br>
<div align="right"> <p align="left" style="border:1px solid blue;background-color:blue;border-radius:10px;width:120px"> <font size="4" color="white" > <?php echo $product_array[$key][$email.'`'.$name]; ?> </font> </p> <a href="sd.php?id=<?php echo $product_array[$key]["id"]; ?>"> <img src="j.png" style="width:30px;height:30px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" /> </a></div>
<?php
}
			 }
	         else if ($product_array[$key][$name.'`'.$email] == '1' AND !empty($product_array[$key][$email.'`'.$name])) { 
?>
<?php if($product_array[$key][$email.'`'.$name] == "&hearts;") {
	?>
<br>
<div align="left"> <font size="13" color="red"> <?php echo $product_array[$key][$email.'`'.$name]; ?> </font> <a href="sd.php?id=<?php echo $product_array[$key]["id"]; ?>"> <img src="j.png" style="width:30px;height:30px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" /> </a> </div>
<?php 
}
else if(end(explode(".",$product_array[$key][$email.'`'.$name])) == "mp4" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "MP4" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "webm" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "WEBM" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "ogg" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "OGG" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "jpg" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "jpeg" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "png" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "gif" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "JPG" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "JPEG" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "PNG" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "GIF" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "mp3" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "MP3" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "wav" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "WAV") {
	?>
<?php
  if(end(explode(".",$product_array[$key][$email.'`'.$name])) == "mp4" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "MP4" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "webm" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "WEBM" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "ogg" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "OGG")
 {
	  ?>
<br>
<div align="left"> <video style="width:320;height:240" controls > <source src="<?php echo $product_array[$key][$email.'`'.$name]; ?>" /> </video> <a href="sd.php?id=<?php echo $product_array[$key]["id"]; ?>"> <img src="j.png" style="width:30px;height:30px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" /> </a> </div>
<?php
  }
  else if(end(explode(".",$product_array[$key][$email.'`'.$name])) == "jpg" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "jpeg" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "png" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "gif" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "JPG" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "JPEG" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "PNG" OR end(explode(".",$product_array[$key][$email.'`'.$name])) == "GIF" ) 
 {
	  ?>
<br> 
<div align="left"> <a href="<?php echo $product_array[$key][$email.'`'.$name]; ?>" download> <img src="<?php echo $product_array[$key][$email.'`'.$name]; ?>" width="320" height="240" /> </a> <a href="sd.php?id=<?php echo $product_array[$key]["id"]; ?>"> <img src="j.png" style="width:30px;height:30px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" /> </a> </div>
<?php
 }
 else {
	 ?>
<br>
<div align="left"> <audio controls> <source src="<?php echo $product_array[$key][$email.'`'.$name]; ?>" /> </audio> <a href="sd.php?id=<?php echo $product_array[$key]["id"]; ?>"> <img src="j.png" style="width:30px;height:30px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" /> </a> </div>
<?php 
 }
}
else {
?>
<br>
<div align="left"> <p align="left" style="border:1px solid blue;background-color:blue;border-radius:10px;width:140px;"> <font size="4" color="white"> <?php echo $product_array[$key][$email.'`'.$name]; ?> </font> </p> <a href="sd.php?id=<?php echo $product_array[$key]["id"]; ?>"> <img src="j.png" style="width:30px;height:30px;border-radius:50%;padding:5px;vertical-align:middle;margin-right:15px;" /> </a></div>
<?php
			 }
			 }
             else {
			 }
	   }
		}
	   ?>
<br>
<div style="border:1px solid #3b5998;background-color:#3b5998;height:50px">
&nbsp;
<form method="post" action="mess.php"> <input type="text" size="40" name="message" style="position:absolute;left:50px;border:1px solid #3b5998;background-color:blue;border-radius:10px;height:25px;width:700px" required /> <input type="submit" style="width:200px;height:25px;background-color:blue;border:1px solid blue;border-radius:20px;position:absolute;left:800px;" value="send" />
<input type="hidden" style="display:none" name="email" value="$email" /> </form> <a style="float:left;" href="gif.php"> <button style="border:1px solid blue;background-color:blue;border-radius:40px;height:25;width:35px;"> <font color="white" size="4"> + </font> </button> </a> <a style="position:absolute;left:1030" href="mess1.php?value=&hearts;"> <img src="i.png" style="width:35px;height:18px;border-radius:40%;padding:5px;vertical-align:middle;margin-right:15px;" />  </a> 
  <?php
		}
	   }
?>
</div>