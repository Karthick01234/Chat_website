<?php
    session_start();
	require_once("db.php");
    $db_handle = new DBController();
	$mysqli = new mysqli('127.0.0.1','root',"",'sign up');
    if(!isset($_SESSION["em"]) AND !isset($_SESSION["em1"]) AND !isset($_SESSION["em2"])){
	header("Location: mess.php");
    exit(); }
	$id = $_SESSION["em"];
	$_SESSION["ema"] = $id;
    $email = $_SESSION["em1"];
	$_SESSION["ema1"] = $email;
	$name = $_SESSION["em2"];
	$_SESSION["ema2"] = $name;
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$msg = $mysqli->real_escape_string('msg/'.$_FILES['img1']['name']);
	if(copy($_FILES['img1']['tmp_name'], $msg)){
	$product_array = $db_handle->runQuery("SELECT * FROM `".$id."` WHERE id = '1'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
			$name1 = $product_array[$key]["pname"];
	    $sql = "INSERT INTO `".$id."` (`".$email."``".$name."`) "
	       . "VALUES ('$msg')";
    $sea = "INSERT INTO `".$email."` (`".$id."``".$name1."`,active) "
	       . "VALUES ('$msg','1')";
	$sq = "INSERT INTO `".$id."` (`".$name."``".$email."`) "
	       . "VALUES ('$msg')";
    $se = "INSERT INTO `".$email."` (`".$name1."``".$id."`,active) "
	       . "VALUES ('$msg','1')";
        if($mysqli->query($sql) == true AND $mysqli->query($sea) == true AND $mysqli->query($sq) == true AND $mysqli->query($se) == true) {
			   header("location: mess.php");
				}
		   }
	}
  }
	}
	
?>
 <!DOCTYPE html>
 <html>
 <style>
    
*{   
    padding: 0; 
    margin: 0; 
 }
 body{
	font: 14px "Lucida Grande";  
	color: #464646;
	background-repeat: no-repeat;
	background-attachment: fixed;
    background-size: 1500px 700px;
}	
p{
	 margin: 10px 0px 10px 0px; 
}
 
 
 #header{ 
    height: 45px; 
    background: #464646; 
	} 
 
 #header h3{
	color: #FFFFF3;  
    padding: 10px; 
    font-weight: normal; 
	} 
 
 
 
#wrap h3{ 
    font: italic 22px Georgia; 
} 
#wrap .statusmsg{ 
    font-size: 12px; 
    padding: 3px; 
    background: #EDEDED; 
    border: 1px solid #DFDFDF; 
 } 

 form{    
    margin-top: 10px; 
 } 
 
 form .submit_button{ 
    background: #3b5998; 
    border: 1px solid #3b5998;     
    padding: 8px; 
 } 

 input{   
    background: #3b5998;
	font: normal 16px Georgia;   
    border: 1px solid black; 
    padding: 6px; 
    align="left";
}
 
 </style>

<head>    
<title> vintax </title>   
</head>
<body bgcolor="#3b5998">    
  <div id="header">       
 <h3 align="middle"> VINTAX <sub> vc </sub> </h3>   
 </div> <br>
 <div align="middle">
 <h1 align="middle"> SEND VIDEO OR AUDIO OR IMAGE </h1> <br>
 <form class="form" action="gif1.php" method="post" enctype="multipart/form-data" autocomplete="off"> <br>
 <input type="file" name="img1" id="fileToUpload" accept="video/*|image/*|audio/*" required /><br> <br>
 <input type="submit" value="submit" name="submit" class="btn btn-block btn-primary" /> <br> <br>      
 </form>
 </div>
<br> 
<div align="middle" style="background-color:blue"> <font color="green" size="5"> GIFS AND EMOJI </font> </div>
<br> <br>
<div>
<?php
	$product_array = $db_handle->runQuery("SELECT * FROM gift ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
?>
    <div style="display:inline-block"> <a href="emo.php?value=<?php echo $product_array[$key]["id"]; ?>"> <p> <font size="8" color="#FFDAB9"> <?php echo $product_array[$key]["img"]; ?> </font> </p> </a>
    </div>
	<?php
		}
	}
	?>
	</div>
  </body>
 </html>
 