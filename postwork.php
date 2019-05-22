<?php 
session_start();
require_once("db.php");
$db_handle = new DBController();
if(!isset($_SESSION["em"])){
	header("Location: money.php");
    exit(); }
    $mysqli = new mysqli('127.0.0.1','root',"",'sign up');
	$id = $_SESSION["em"];
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
		if($_POST["yes/no"] == 'yes') {
        $a = $id;
		$a1 = $_POST["w"];
		$a2 = $_POST["w1"];
		$a3 = $_POST["w2"];
		$a4 = $_POST["w3"];
		$a5 = $_POST["w4"];
		$a6 = 'app/'.$_FILES['img1']['name'];
		if(copy($_FILES['img1']['tmp_name'], $a6)) {
			foreach($mysqli->query("SELECT COUNT(email) FROM project WHERE email= '".$id."'") as $row) {
				$my = $row['COUNT(email)'];
		$a7 = $my + 1;
		$sql = "INSERT INTO project (value,email,category,title,amount,description,skills,file) "
		       . "VALUES ('$a7','$a','$a1','$a2','$a3','$a5','$a4','$a6')";
			   if($mysqli->query($sql) === true) {
				$msg = " Success! Your work is successfully posted <br><br> /*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Now it's time for verification link is send to ur email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp */ <br><br> <a href=\"money.php\"><button style=\"background-color:blue;border:1px solid grey;padding:10px 10px\"> Main Page </button> </a>";
			   }
			   else {
				   $msg = $a7;
			   }
		}
		}
	}
	else {
		$msg = "  Enter correct answer in yes or no field ";
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
    window.location="money.php";	
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
 <h3 style="background-color:#D3D3D3" align="middle"> Post Work </h3>  <br>     
<?php 
    if(isset($msg)){       
        echo '<div class="statusmsg">'.$msg.'</div>';    
	} 
?>   
 <form class="form" action="postwork.php" method="post" enctype="multipart/form-data" autocomplete="off">  
 <h3> CATEGORY </h3> <br> <br>
 <select name="w" style="width:460px;background-color:#D3D3D3;height:30px">
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
 </select> <br> <br>
 <h4> DETAILS </h4> <br> <br>
 <input size="55" type="text" name="w1" placeholder="WORK TITLE" required /> <br> <br>
 <input size="55" type="text" name="w2" placeholder="SALARY YOU GIVE FOR YOUR WORK IT INCLUDE 10% TAX" required /> <br> <br>
 <input size="55" type="text" name="w3" placeholder="SKILLS REQUIRED FOR THIS WORK" required /> <br> <br>
 <h1> DESCRIPTION ABOUT WORK </h1> <br> <br> 
 <textarea style="width:460px;background-color:#D3D3D3" name="w4" cols="50" rows="10"> </textarea> <br> <br>
 <h4> UPLOAD DETAILS ABOUT WORK AS PDF FORMAT NOT NECESSARY </h4> <br> <br>
 <input type="file" name="img1" id="fileToUpload" accept="application/pdf" required /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br> <br>
 <h5 align="middle"> Accept terms and condition 
 <p> Read the terms and condition given below carefully and give appropriate answer in given box <p>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input size="55" type="radio" name="yes/no" value="yes" required /> <font size="5" color="red"> yes </font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input size="55" type="radio" name="yes/no" value="no" required /> <font size="5" color="red"> no &nbsp;&nbsp;&nbsp;  </font> <br> <br>
 <a href="term.html"> <font size="4" color="red"> Terms and condition </font> </a>
 </h5> <br> <br>
 <input type="submit" value="submit" name="submit" class="btn btn-block btn-primary" style="background:linear-gradient(to bottom, blue 10%, pink 70%, green 104%);border:1px solid grey;" /> <br> <br>     
 <br> <br>     
 </form>       
 </div> </div><br>
 <br>
 </body>
 </html>