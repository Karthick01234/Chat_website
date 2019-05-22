<?php
    session_start();
	mysql_connect("127.0.0.1","root","");
	mysql_select_db("sign up");
	
	
	if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {
		$email = mysql_real_escape_string($_GET['email']);
		$hash = mysql_real_escape_string($_GET['hash']);
		$search = mysql_query("SELECT email,hash, active FROM form WHERE email='".$email."' AND hash='".$hash."' AND active='1'");
		$match  = mysql_num_rows($search);
		
		if($match > 0) {
			$hash1 = md5( rand(0,1000) );
			mysql_query("UPDATE form SET hash='".$hash1."' WHERE email='".$email."' AND hash='".$hash."' AND active='1'");
			header("location: re.php");
		}
		else {
			   $msg = "your are not verify contact out team <br> or <br> ' already verified '.";
		}
	}
	else {
		$msg = "your are not verify contact out team.";
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
</style>
<head>    
<title> vintax </title>   
</head>
<body background="c.jpeg">    
<div id="header">       
<h3 align="middle"> VINTAX <sub> vc </sub> </h3>   
</div>   
<div id="wrap" align="middle"> <br>             
<h3 style="background-color:green"> Verification </h3>       
<br>  <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
<?php 
    if(isset($msg)){       
        echo '<div class="statusmsg">'.$msg.'</div>';    
	} 
?>  
<br>  <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
</div>
<h5 align="middle" style="background-color:#000000">
<img align="bottom" src="u.png"  width="580" height="250"/>
</h5>  
</body>
</html>