<?php
session_start();
require_once("db.php");
$db_handle = new DBController();
if(!isset($_SESSION["ema"])){
	header("Location: workedproject.php");
    exit(); }
    $mysqli = new mysqli('127.0.0.1','root',"",'sign up');
	$id = $_SESSION["ema"];
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
	   $h1 = $_POST["s"];
	   $h2 = $_POST["s1"];
	   $h3 = $_POST["s2"];
	   $h4 = $_POST["s3"];
       $me = $h1.'&'.$h2.'&'.$h3.'&'.$h4;	
       $sql = "UPDATE passbook SET skill='".$me."' WHERE email='".$id."' AND photo !=''";
       if($mysqli->query($sql) === TRUE) {
        header("location: workedproject.php");
	   }
       else {
         $msg = " cannot update skill ";
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
    height: 30px; 
    background: linear-gradient(to left, blue 9%, pink 45%, green 103%);
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
    background: #D3D3D3;
	font: normal 16px Georgia;   
    border: 1px solid grey;
    padding: 6px; 	
    align="left";
}
 </style>
 <script>
  function my() {
    window.history.back();
	}
  function s1() {
	var h=document.getElementById("p").value;
	document.getElementById("b1").value=h;
    document.getElementById("a1").style="display:j"
	document.getElementById("a").style="display:none"
	document.getElementById("b").style="display:j"
  }
  function s2() {
	var h=document.getElementById("p1").value;
	document.getElementById("b2").value=h;
    document.getElementById("a2").style="display:j"
	document.getElementById("b").style="display:none"
	document.getElementById("c").style="display:j"
  }
  function s3() {
	var h=document.getElementById("p2").value;
	document.getElementById("b3").value=h;
    document.getElementById("a3").style="display:j"
	document.getElementById("c").style="display:none"
	document.getElementById("d").style="display:j"
  }
  function s4() {
	var h=document.getElementById("p3").value;
	document.getElementById("b4").value=h;
    document.getElementById("a4").style="display:j"
	document.getElementById("d").style="display:none"
  }
</script>
 <head> 
 <title> VINTAX </title> 
<meta name="viewport" content="width=device-width, initial-scale=0.0">  
 </head>
 <body bgcolor="white">   
 <div id="header" align="middle"> <button type="button" style="background-color:green;border:green;float:left" onclick="my()"> <font size="5" color="white"> &nbsp;&nbsp;&nbsp;&nbsp;Back </font> </button>      
 <font size="5" color="white"> VINTAX <sub> vc </sub></font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
 </div>   <br> <br>
 <div align="middle">
 <div id="wrap" style="background:linear-gradient(to bottom, blue 9%, pink 45%, green 103%);border:1px solid black;width:600px">                
 <h3 style="background-color:#D3D3D3" align="middle"> Update Skill </h3>  <br>     
<?php 
    if(isset($msg)){       
        echo '<div class="statusmsg">'.$msg.'</div>';    
	} 
?>  
 <div id="a" style="display:j;">
 <select onchange="s1()" id="p" style="display:j;width:460px;background-color:#D3D3D3;height:30px">
 <option value="web programming">Web Programming </option>
 <option value="android programming">Android Programming </option>
 <option value="ios development">Ios Development </option>
 <option value="other programming">Other Programming </option>
 <option value="electrical and electronics">Electrical And Electronics </option>
 <option value="research types">Research Types </option>
 <option value="network marketing">Network Marketing </option>
 <option value="data entry">Data Entry </option>
 <option value="writing and reading works">Writing And Reading Works</option>
 <option value="editing and creating works">Editing And Creating Works</option>
 <option value="other works">Other Works </option>
 </select> </div><br> <br>
  <div id="b" style="display:none;">
 <select onchange="s2()" id="p1" name="w" style="width:460px;background-color:#D3D3D3;height:30px">
 <option value="web programming">Web Programming </option>
 <option value="android programming">Android Programming </option>
 <option value="ios development">Ios Development </option>
 <option value="other programming">Other Programming </option>
 <option value="electrical and electronics">Electrical And Electronics </option>
 <option value="research types">Research Types </option>
 <option value="network marketing">Network Marketing </option>
 <option value="data entry">Data Entry </option>
 <option value="writing and reading works">Writing And Reading Works</option>
 <option value="editing and creating works">Editing And Creating Works</option>
 <option value="other works">Other Works </option>
 </select> </div>  <br> <br>
  <div id="c" style="display:none;">
 <select onchange="s3()" id="p2" name="w" style="width:460px;background-color:#D3D3D3;height:30px">
 <option value="web programming">Web Programming </option>
 <option value="android programming">Android Programming </option>
 <option value="ios development">Ios Development </option>
 <option value="other programming">Other Programming </option>
 <option value="electrical and electronics">Electrical And Electronics </option>
 <option value="research types">Research Types </option>
 <option value="network marketing">Network Marketing </option>
 <option value="data entry">Data Entry </option>
 <option value="writing and reading works">Writing And Reading Works</option>
 <option value="editing and creating works">Editing And Creating Works</option>
 <option value="other works">Other Works </option>
 </select> </div>  <br> <br>
 <div id="d" style="display:none;">
 <select onchange="s4()" id="p3" name="w" style="width:460px;background-color:#D3D3D3;height:30px">
 <option value="web programming">Web Programming </option>
 <option value="android programming">Android Programming </option>
 <option value="ios development">Ios Development </option>
 <option value="other programming">Other Programming </option>
 <option value="electrical and electronics">Electrical And Electronics </option>
 <option value="research types">Research Types </option>
 <option value="network marketing">Network Marketing </option>
 <option value="data entry">Data Entry </option>
 <option value="writing and reading works">Writing And Reading Works</option>
 <option value="editing and creating works">Editing And Creating Works</option>
 <option value="other works">Other Works </option>
 </select> </div> <br> <br>
 <form class="form" action="updateskill.php" method="post" enctype="multipart/form-data" autocomplete="off">  
 <div id="a1" style="display:none">
 <input id="b1" size="55"  type="text" name="s" required /> <br> <br>
 </div> <br> <br>
 <div id="a2" style="display:none">
 <input id="b2" size="55"  type="text" name="s1" required /> <br> <br>
 </div> <br> <br>
 <div id="a3" style="display:none">
 <input id="b3" size="55"  type="text" name="s2" required /> <br> <br>
 </div> <br> <br>
 <div id="a4" style="display:none">
 <input id="b4" size="55"  type="text" name="s3" required /> <br> <br>
 <input type="submit" value="submit" name="submit" class="btn btn-block btn-primary" style="background:linear-gradient(to bottom, blue 10%, pink 70%, green 104%);border:1px solid grey;" /> <br> <br>     
 </div> <br> <br>
 </form>
 </div>
 </div>