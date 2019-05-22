<?php
 session_start();
   if(!isset($_SESSION["email"])){
	header("Location: vcverify.php");
    exit(); }
   $mysqli = new mysqli('127.0.0.1','root',"",'sign up');
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if ($_SESSION["email"] == $_POST['email1']) {
    $id1 = mysql_real_escape_string($_POST['name']);
	$id2 = mysql_real_escape_string($_POST['pname']);
	$id3 = mysql_real_escape_string($_POST['about']);
	$id4 = mysql_real_escape_string('photo/'.$_FILES['img1']['name']); 
	$id5 = mysql_real_escape_string('photo/'.$_FILES['img2']['name']); 
	$id6 = mysql_real_escape_string($_POST['m/f']); 
	$id7 =	mysql_real_escape_string($_POST['m/u']);
	$id8 =	mysql_real_escape_string($_POST['rs']); 
	$id9 =	mysql_real_escape_string($_POST['w/s']); 
	$id10 =	mysql_real_escape_string($_POST['centre']); 
	$id11 =	mysql_real_escape_string($_POST['add']); 
	$id12 =	mysql_real_escape_string($_POST['pos']); 
	$id13 =	mysql_real_escape_string($_POST['s/c']);
	$id14 =	mysql_real_escape_string($_POST['cen']); 
	$id15 =	mysql_real_escape_string($_POST['ad']); 
	$id16 =	mysql_real_escape_string($_POST['po']); 
	$id17 =	mysql_real_escape_string($_POST['number']); 
	$id18 =	mysql_real_escape_string($_POST['email1']); 
	$id19 =	mysql_real_escape_string('photo/'.$_FILES['img3']['name']); 
	$id20 =	mysql_real_escape_string($_POST['my1']); 
	$id21 =	mysql_real_escape_string($_POST['my2']); 
	$id22 =	mysql_real_escape_string($_POST['my3']); 
	   if(strlen($_POST['number']) == 10) {
				if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*.(\.[a-z]{2,3})$", $id18)){
					if(preg_match("!image!",$_FILES['img1']['type']) AND preg_match("!image!",$_FILES['img2']['type']) AND preg_match("!image!",$_FILES['img3']['type'])) {
    				if(copy($_FILES['img1']['tmp_name'], $id4) AND copy($_FILES['img2']['tmp_name'], $id5) AND copy($_FILES['img3']['tmp_name'], $id19)){   
					$sql = "INSERT INTO profile (name,pname,about,img1,img2,mf,mu,rs,ws,sc,email,pnum) "
					       . "VALUES ('$id1','$id2','$id3','$id4','$id5','$id6','$id7','$id8','$id9','$id13','$id18','$id17')";
                    if($mysqli->query($sql) == true) {
					$sql = "INSERT INTO `".$id18."` (name,pname,about,img1,img2,mf,mu,rs,ws,centre,ad,pos1,sc,cen,sd,po,number,email1,img3,my1,my2,my3) "
					       . "VALUES ('$id1','$id2','$id3','$id4','$id5','$id6','$id7','$id8','$id9','$id10','$id11','$id12','$id13','$id14','$id15','$id16','$id17','$id18','$id19','$id20','$id21','$id22')";
					if($mysqli->query($sql) == true) {
                        header("location: vclog.php");
					}
                    else {
						$msg = "Your account is not created fill all fields correctly";
					}
					}
					}
					else {
						$msg = "cannot complete your process contact our team.";
					}
					}
					else {
						$msg = "Upload only JPG , JPEG , PNG format.";
					}
				}
				else {
					$msg = "Email is invalid.";
				}
	   }
	   else {
		   $msg = "Phone number is invalid.";
	   }
   }
   else {
	   $msg = "Enter email that you used for sign up .";
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
<script>
var close = document.getElementsByClassName("closebtn");
var i;


for (i = 0; i < close.length; i++) {
  
  close[i].onclick = function(){

    
    var div = this.parentElement;

    
    div.style.opacity = "0";

    
    setTimeout(function(){ div.style.display = "none"; }, 600);
</script>
<head>
<title> create profile </title>
</head>
<body background="c.jpeg">
<div id="header">       
<h3  align="middle"> VINTAX </h3>    
</div><br> <br>
<div class="alert success"> <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> <strong>Success!</strong> &nbsp;&nbsp;&nbsp; */ Welcome /* &nbsp;&nbsp;&nbsp; Your account is created now its time for create profile Enter your present && past details in work and study field like this (studied at),(went from) ! </div>
<br> <br>
 <div id="wrap" align="middle">                
 <h3 style="background-color:green" align="middle"> Create Profile </h3>  <br>     
 <p align="middle"> Enter all details correctly for create profile </p> <br>
<?php 
    if(isset($msg)){       
        echo '<div class="statusmsg">'.$msg.'</div>';    
	} 
?>   
 <form class="form" action="vcmain.php" method="post" enctype="multipart/form-data" autocomplete="off"> 
<div id="header1"> PROFILE DETAIL <br> <br>
 <input size="55" type="text" name="name" placeholder="FULL NAME" required /> <br> <br>         
 <input size="55" type="text" name="pname" placeholder="PROFILE NAME" required /> <br> <br>
 <input size="55" type="text" name="about" placeholder="FEW LINES ABOUT YOU" required /> <br> <br>
 <h1> UPLOAD A PROFILE IMAGE </h1> <br> <br>
 <input type="file" name="img1" id="fileToUpload" accept="image/*" placeholder="UPLOAD PROFILE PICTURE" required /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br> <br>
 <h2> UPLOAD A PROFILE BACKGROUND IMAGE </h2> <br> <br>
 <input type="file" name="img2" id="fileToUpload" accept="image/*" placeholder="UPLOAD PROFILE BACKGROUND PICTURE" required /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br> <br>
 <h3 align="middle"> GENDER <br> <br>
 <input size="55" type="radio" name="m/f" value="male" required /> <font size="5" color="red"> Male </font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input size="55" type="radio" name="m/f" value="female" required /> <font size="5" color="red"> Female &nbsp;&nbsp;&nbsp;  </font> <input size="55" type="radio" name="m/f" value="others" required /> <font size="5" color="red"> Others &nbsp;&nbsp;&nbsp;  </font> <br> <br>
 </h3> <br> <br>
 <h3 align="middle"> MARITAL STATUS <br> <br>
 <input size="55" type="radio" name="m/u" value="married" required /> <font size="5" color="red"> Married </font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input size="55" type="radio" name="m/u" value="single" required /> <font size="5" color="red"> Single &nbsp;&nbsp;&nbsp;  </font> <input size="55" type="radio" name="m/u" value="other relationship" required /> <font size="5" color="red"> Other Relationship &nbsp;&nbsp;&nbsp;  </font> <br> <br>
 <input size="55" type="text" name="rs" placeholder="FEW LINES ABOUT RELATION SHIP" required /> <br> <br>
 </h3> <br> <br>
 <h4 align="middle"> WORK OR STUDY <br> <br>
 <input size="55" type="radio" name="w/s" value="work" required /> <font size="5" color="red"> Work </font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input size="55" type="radio" name="w/s" value="study" required /> <font size="5" color="red"> Study </font> <br> <br>
 <input size="55" type="text" name="centre" placeholder="COMPANY NAME" id="centre" /> <br> <br>
 <input size="55" type="text" name="add" placeholder="COMPANY ADDRESS" id="add" /> <br> <br>
 <input size="55" type="text" name="pos" placeholder="YOUR POSITION IN COMPANY" id="pos" /> <br> <br>
 <input size="55" type="radio" name="s/c" value="school" id="s/c" /> <font id='s/c' size='5' color='red'> School </font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input size='55' type='radio' name='s/c' value='collage' id='s/c' /> <font id='s/c' size='5' color='red'> Collage &nbsp;&nbsp;&nbsp;  </font> <br> <br>
 <input size='55' type='text' name='cen' placeholder='INSTITUTION NAME'  id='cen' /> <br> <br>
 <input size='55' type='text' name='ad' placeholder='INSTITUTION ADDRESS' id='ad' /> <br> <br>
 <input size='55' type='text' name='po' placeholder='YOUR POSITION IN INSTITUTUION' id='po' /> <br> <br> 
 </h4> <br> <br>
 </div> <br> <br>
 <div class="alert success"> <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> <strong>Security!</strong> &nbsp;&nbsp;&nbsp; */ Alert /* &nbsp;&nbsp;&nbsp; Personal detail for only security reason it doesn't display in our account <br> it is stored in our mostly secure database for feature verification
 </div> <br> <br>
 <h5> PERSONAL DETAIL <br> <br> <br>
 <input size="55" type="text" name="number" placeholder="PHONE NUMBER" required /> <br> <br>
<div class="alert success"> <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> <strong>Alert!</strong> &nbsp;&nbsp;&nbsp; */ Enter Email that you used for sign up otherwise you cannot create profile  /*  </div>
<br> <br>
 <input size="55" type="email" name="email1" placeholder="EMAIL" required /> <br> <br>
 <p align="middle"> UPLOAD YOUR ORIGINAl IMAGE <br> <br>
 <input type="file" name="img3" id="fileToUpload" accept="image/*" required /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br> <br>
 </p>
 </h5> <br> <br>
 <div class="alert success"> <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> <strong> This detail necessary if you don't involve any activity simply enter none in below boxes !</strong> </div> <br> <br>
 <h6> OTHER DETAIL <br> <br> <br>
 <input size="55" type="text" name="my1" placeholder="HOBBY" required /> <br> <br>         
 <input size="55" type="text" name="my2" placeholder="EXTRA CURRICULAR ACTIVITIES" required /> <br> <br>
 <input size="55" type="text" name="my3" placeholder="ACHIEVEMENTS" required /> <br> <br>
 </h6> <br> <br>
 <input type="submit" value="CREATE PROFILE" name="submit" class="btn btn-block btn-primary" /> <br> <br>     
 <br> <br>     
 </form>       
 </div> <br>
 <br>
<h4 align="middle" style="background-color:#000000">
<img align="bottom" src="u.png"  width="580" height="250"/>
</h4>
</body>
</html>