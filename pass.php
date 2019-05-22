<?php
    session_start();
	if(!isset($_SESSION["em"])){
	header("Location: set.php");
    exit(); }
	mysql_connect("127.0.0.1","root","");
	mysql_select_db("sign up");
	$_SESSION['message'] = '';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	 if ($_POST['email'] == $_SESSION["em"]) {
        if($_POST['password1'] == $_POST['password2']) {
		       $email = mysql_real_escape_string($_POST['email']);
		       $password1 = md5($_POST['password1']);
		       $search = mysql_query("SELECT email, active FROM form WHERE email='".$email."' AND active='1'");
               $match  = mysql_num_rows($search);
				if($match > 0) {
			            mysql_query("UPDATE form SET password='".$password1."' WHERE email='".$email."'  AND active='1'");
						$_SESSION["msg"] = "password successfully changed";
						header("location : set.php");
				}
				else {
					$msg = " password not update contact our team ! ";
				}
		}
	    else {
        $msg = " ' your password doesn't match ' !.";
		}
	 }
	 else {
		 $msg = "Enter email that you used for sign up !.";
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
<h3 style="background-color:green"> Reset Form</h3>       
 <p>Please enter your new password for reset </p> 
<?php 
    if(isset($msg)){       
        echo '<div class="statusmsg">'.$msg.'</div>';    
	} 
?> 
 <form class="form" action="pass.php" method="post" > 
    <input size="55" type="email" name="email" placeholder="Enter Email" required /> <br> <br>     
    <input size="55" type="password" name="password1" placeholder="Enter new Password" required /> <br> <br>      
    <input size="55" type="password" name="password2" placeholder="Confirm Password" required />  <br> <br>                    
    <input type="submit" value="submit" name="submit" class="btn btn-block btn-primary" /> <br> <br>     
    </form>        
    </div>  <br> <br> 
   <br> <br>
 <h5 align="middle" style="background-color:#000000">
<img align="bottom" src="u.png"  width="580" height="250"/>
</h5>  
  </body>
   </html>