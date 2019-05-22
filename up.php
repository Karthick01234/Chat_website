<?php
  session_start();
  require_once("db.php");
  $db_handle = new DBController();
  $mysqli = new mysqli('127.0.0.1','root',"",'sign up');
  if(!isset($_SESSION["ema"])) {
	  header("location: chat.php");
	  exit();
  }
 $email=$_SESSION["ema"];
 $product_array = $db_handle->runQuery("SELECT pname, img1 FROM `".$email."` where id='1'");
  if (!empty($product_array)) { 
	 foreach($product_array as $key=>$value){
		$id = $product_array[$key]['pname'];
		$id0 = $product_array[$key]['img1'];
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $id2 = mysql_real_escape_string($_POST['description']);
     $id3 = mysql_real_escape_string('status/'.$_FILES['img1']['name']);
  if(copy($_FILES['img1']['tmp_name'], $id3)){
    $check = mysqli_query($mysqli,"select email,active,DATE FROM status WHERE email ='".$email."' AND active='1'  AND DATE >= NOW() - INTERVAL 1 DAY");
	$checkrows = mysqli_num_rows($check);
	if($checkrows > 0) {
		$sql = "INSERT INTO status (pname,pimg,status,des,email) "
               . "VALUES ('$id','$id0','$id3','$id2','$email')";
	    if($mysqli->query($sql) == true) {
			$msg = "your status has been successfully posted ! <br> <a href=chat.php> click here for return to your main page </a>";
		}
		else {
			 $msg = "cannot process contact out team";
		}
	}
	else {	  
  	$sql = "INSERT INTO status (pname,pimg,status,des,email,active) "
            . "VALUES ('$id','$id0','$id3','$id2','$email','1')";
	    if($mysqli->query($sql) == true) {
					     $msg = "your status has been successfully posted ! <br> <a href=chat.php> click here for return to your main page </a>";
					} 
				     else {
						  $msg = "cannot process contact out team .";
					 }
  }	 			
  }
  }
 ?>
 
<?php
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
    background: green; 
    border: 1px solid green;     
    padding: 8px;
} 

 input{   
    background: blue;
	font: normal 16px Georgia;   
    border: 1px solid black;
    padding: 6px; 	
    align="left";
}
 </style>
 <script>
  function hi() {
    window.history.back();
	}
</script>
 <head> 
 <title> VINTAX vc post </title>   
 </head>
 <body background="c.jpeg">   
 <div id="header">       
 <h3  align="middle"><button type="button" onclick="hi()" style="float:left;width:100px;height:30px;background-color:#464646;border:1px solid #464646 "> <font size="4"> RETURN </font></button> VINTAX &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </h3>    
 </div>   <br> <br>
 <div id="wrap" align="middle">                
 <h3 style="background-color:green" align="middle"> Upload a image are video for status ! </h3>  <br> <br>     
 <?php 
    if(isset($msg)){       
        echo '<div class="statusmsg">'.$msg.'</div>';    
	} 
?>   
 <form class="form" action="up.php" method="post" enctype="multipart/form-data" autocomplete="off"> <br>
 <h1> Upload image and video for status <h1> <br>
 <input type="file" name="img1" id="fileToUpload" accept="video/*|image/*" required />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br> <br>
  <input size="55" type="text" name="description" placeholder="Description about your post" required /> <br> <br>
 <input type="submit" value="submit" name="submit" class="btn btn-block btn-primary" /> <br> <br>     
 <br> <br>     
 </form>       
 </div> <br>
 <br>
<h4 align="middle" style="background-color:#000000">
<img align="bottom" src="u.png"  width="580" height="250"/>
</h4>
</body>
</html>