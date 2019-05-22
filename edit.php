<?php
 session_start();
   if(!isset($_SESSION["em"])){
	header("Location: set.php");
    exit(); }
   $mysqli = new mysqli('127.0.0.1','root',"",'sign up');
   $id = $_SESSION["em"];
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $id1 = mysql_real_escape_string($_POST['m/u']);
   $id2 = mysql_real_escape_string($_POST['rs']);
      	$sql = "UPDATE profile SET mu='".$id1."' AND rs='".$id2."' WHERE email='".$id."'";
		$sq = "UPDATE `".$id."` SET mu='".$id1."' AND rs='".$id2."' WHERE id='1'";
		  if($mysqli->query($sql) == true AND $mysqli->query($sq) == true) {
                header("location: set.php");
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
.alert {
  align: middle;
  padding: 20px;
  background-color: #1E1EA9;
  color: violet;
  margin-bottom: 15px;
  opacity: 1;
  transition: opacity 0.6s; /* 600ms to fade out */
  

}

.closebtn {
  margin-left: 15px;
  color: violet;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
<head>
<title> edit profile </title>
</head>
<body background="c.jpeg">
<div id="header">       
<h3  align="middle"> VINTAX <sub> vc </sub> </h3>    
</div><br> <br>
 <div id="wrap" align="middle">                
 <h3 style="background-color:green" align="middle"> edit Profile </h3>  <br>     
<br>
<br>  

 <form class="form" action="ed.php" method="post">  
 <div id="header1"> PROFILE DETAIL <br> <br>
 <input size="55" type="text" name="pname" placeholder="PROFILE NAME" /> <br> <br>
 <input size="55" type="text" name="about" placeholder="FEW LINES ABOUT YOU" /> <br> <br>
 <input type="submit" value="Update" name="submit" class="btn btn-block btn-primary" /> <br> <br>     
 </form>
 
 <form class="form" action="edi.php" method="post"> 
 <h1> UPLOAD A PROFILE IMAGE </h1> <br> <br>
 <input type="file" name="img1" id="fileToUpload" accept="image/*" placeholder="UPLOAD PROFILE PICTURE" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br> <br>
 <h2> UPLOAD A PROFILE BACKGROUND IMAGE </h2> <br> <br>
 <input type="file" name="img2" id="fileToUpload" accept="image/*" placeholder="UPLOAD PROFILE BACKGROUND PICTURE" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br> <br>
 <input type="submit" value="Update" name="submit" class="btn btn-block btn-primary" /> <br> <br>     
 </form>

 <form class="form" action="edit.php" method="post"> 
 <h3 align="middle"> MARITAL STATUS <br> <br>
 <input size="55" type="radio" name="m/u" value="married" required /> <font size="5" color="red"> Married </font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input size="55" type="radio" name="m/u" value="single" required /> <font size="5" color="red"> Single &nbsp;&nbsp;&nbsp;  </font> <input size="55" type="radio" name="m/u" value="other relationship" required /> <font size="5" color="red"> Other Relationship &nbsp;&nbsp;&nbsp;  </font> <br> <br>
 <input size="55" type="text" name="rs" placeholder="FEW LINES ABOUT RELATION SHIP" required /> <br> <br>
 </h3> <br> <br>
 <input type="submit" value="Update" name="submit" class="btn btn-block btn-primary" /> <br> <br>     
 <br> <br>     
 </form>       
 </div> <br>
 <br>
<h4 align="middle" style="background-color:#000000">
<img align="bottom" src="u.png"  width="580" height="250"/>
</h4>
</body>
</html>