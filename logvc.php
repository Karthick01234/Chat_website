<?php 
    session_start();
	mysql_connect("127.0.0.1","root","");
	mysql_select_db("sign up");
	$_SESSION['message'] = '';
	$mysqli = new mysqli('127.0.0.1','root',"",'sign up');
	if(isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['password']) && !empty($_POST['password'])) {
		$email = mysql_real_escape_string($_POST['email']);
		$password = mysql_real_escape_string($_POST['password']);
		$search = mysql_query("SELECT email, active FROM form WHERE email='".$email."' AND active='1'");
		$match  = mysql_num_rows($search);
		if($match > 0) {
			$search = mysql_query("SELECT password, active FROM form WHERE password='".md5($password)."' AND active='1'");
		    $match  = mysql_num_rows($search);
               if($match > 0) {
				   $sql = "UPDATE profile SET active='online' WHERE email='".$email."'";
                    if($mysqli->query($sql) == TRUE) {
				    $_SESSION["email"] = $email;
				    $_SESSION["msg"] = "click  VINTAX - SHOPPING CART : More Features For sell your products,gaming and social activities and we offer more more graphics for gaming enjoy it by clicking VINTAX - SHOPPING CART : More Features .";
				    header("location: vc.php");
				  }
			   }
			   else {
		            $msg = "Password is incorrect.";
			   }
		}
	    else {
		      $msg = "Email is invalid .";
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
<title> vintax </title>   
</head>
<body background="c.jpeg">    
  <div id="header">       
 <h3 align="middle"> VINTAX <sub> vc </sub> </h3>   
 </div>   
  <div id="wrap" align="middle"> <br>             
<h3 style="background-color:green">Login Form</h3>       
 <p>Please enter your email and password to login</p> <br> <br>
<?php
    if(isset($msg)){       
        echo '<div class="statusmsg">'.$msg.'</div>';    
	} 
?> 
 <form action="logvc.php" method="post" >         
    <input size="55" type="text" name="email" placeholder="Email" required /> <br> <br>      
    <input size="55" type="password" name="password" placeholder="Password" required />  <br> <br>                    
    <input type="submit" value="Login" name="Login" class="btn btn-block btn-primary" /> <br> <br>     
    </form>        
      </div>  <br> <br> 
   <h4 align="middle"> 
  <a href="ffor.php" style="text-align:middle"> <font size="4" color="green" align="middle"> forgot password? </font> 
  </a> <br> <br>
  <font size="6" style="border:thick solid green;background-color:green"> Are you new too vintax vc </font> 
  <a href="form.php" style="text-align:middle"> <br> <br>
  <font size="4" align="middle" color="green"> sign up </font> 
  </a>
  </h4> <br> <br>
 <h5 align="middle" style="background-color:#000000">
<img align="bottom" src="u.png"  width="580" height="250"/>
</h5>  
  </body>
   </html>