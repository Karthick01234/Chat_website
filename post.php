<?php
  session_start();
  require_once("db.php");
  $db_handle = new DBController();
  $mysqli = new mysqli('127.0.0.1','root',"",'sign up');
  if(!isset($_SESSION["em"])) {
	  header("location: vc.php");
	  exit();
  }
 $email=$_SESSION["em"];
 $product_array = $db_handle->runQuery("SELECT pname, img1 FROM `".$email."` where id='1'");
  if (!empty($product_array)) { 
	 foreach($product_array as $key=>$value){
		$id = $product_array[$key]['pname'];
		$id0 = $product_array[$key]['img1'];
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $id2 = mysql_real_escape_string($_POST['description']);
     $id3 = mysql_real_escape_string('post/'.$_FILES['img1']['name']);
  if(copy($_FILES['img1']['tmp_name'], $id3)){   
  if(end(explode(".",$_FILES['img1']['name'])) == "jpg" OR end(explode(".",$_FILES['img1']['name'])) == "jpeg" OR end(explode(".",$_FILES['img1']['name'])) == "png" OR end(explode(".",$_FILES['img1']['name'])) == "gif" OR end(explode(".",$_FILES['img1']['name'])) == "JPG" OR end(explode(".",$_FILES['img1']['name'])) == "JPEG" OR end(explode(".",$_FILES['img1']['name'])) == "PNG" OR end(explode(".",$_FILES['img1']['name'])) == "GIF" ) {
    $sql = "INSERT INTO `".$email."` (description,your) "
         . "VALUES ('$id2','$id3')";
		 if($mysqli->query($sql) == true) {
			 $sql = "INSERT INTO post (pname,img,description,your,email) "
                    . "VALUES ('$id','$id0','$id2','$id3','$email')";
					 if($mysqli->query($sql) == true) {
					     $msg = "your post has been successfully posted ! <br> <a href=vc.php> click here for go to main page </a>";
					} 
				     else {
						  $msg = "cannot process contact out team";
					 }
		 }
		 else {
			  $msg = "cannot process contact out team ";
		 }			  
  }
  elseif(end(explode(".",$_FILES['img1']['name'])) == "mp4" OR end(explode(".",$_FILES['img1']['name'])) == "MP4" OR end(explode(".",$_FILES['img1']['name'])) == "webm" OR end(explode(".",$_FILES['img1']['name'])) == "WEBM" OR end(explode(".",$_FILES['img1']['name'])) == "ogg" OR end(explode(".",$_FILES['img1']['name'])) == "OGG" ) {
        $sql = "INSERT INTO `".$email."` (description,video) "
                . "VALUES ('$id2','$id3')";
		if($mysqli->query($sql) == true) {
			 $sql = "INSERT INTO post (pname,img,description,video,email) "
                      . "VALUES ('$id','$id0','$id2','$id3','$email')";
			if($mysqli->query($sql) == true) {
				 $msg = "your post has been successfully posted . <br> <a href=vc.php> click here for go to main page </a>";
			}
			else {
			   $msg = "cannot process contact out team";
			}
		}			
		else {
		  $msg = "cannot process contact out team";
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
 <head> 
 <title> VINTAX vc post </title>   
 </head>
 <body background="c.jpeg">   
 <div id="header">       
 <h3  align="middle"><a style="float:left" href="vc.php"> <button type="button" style="width:100px;height:30px;background-color:#464646;border:1px solid #464646 "> <font size="4"> Main Page </font></button> </a> VINTAX &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </h3>    
 </div>   <br> <br>
 <div id="wrap" align="middle">                
 <h3 style="background-color:green" align="middle"> Post a image are video you want ! </h3>  <br> <br>     
 <?php 
    if(isset($msg)){       
        echo '<div class="statusmsg">'.$msg.'</div>';    
	} 
?>   
 <form class="form" action="post.php" method="post" enctype="multipart/form-data" autocomplete="off"> <br>
 <h1> Upload image and video you want post <h1> <br>
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