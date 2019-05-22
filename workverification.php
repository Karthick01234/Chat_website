<?php
    session_start();
	mysql_connect("127.0.0.1","root","");
	mysql_select_db("sign up");
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		$email = mysql_real_escape_string($_GET['email']);
		$value = mysql_real_escape_string($_GET['value']);
		$search = mysql_query("SELECT email,value, active FROM project WHERE email='".$email."' AND value='".$value."' AND active='0'");
		$match  = mysql_num_rows($search);
		
		if($match > 0) {
			mysql_query("UPDATE project SET active='1' WHERE email='".$email."' AND value='".$value."' AND active='0'");
			header("location: pip.php");
		}
		else {
			   $msg = "your posted work is not verified contact out team for your verification <br> or <br> ' your posted work is already verified ' .";
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
 } 
</style>
<head>    
<title> vintax-vc </title>   
</head>
<body>    
<div id="header">       
<h3 align="middle"> VINTAX <sub> vc </sub> </h3>   
</div>  <br>
<div align="middle">  
<div id="wrap" style="background:linear-gradient(to bottom, pink 30%, orange 103%);border:1px solid grey;width:600px"> <br>             
<h3 style="background-color:green"> Verification </h3>       
<br>  <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
<?php 
    if(isset($msg)){       
        echo '<div class="statusmsg">'.$msg.'</div>';    
	} 
?>  
<br>  <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> 
</body>
</html>