<?php
    session_start();
	$_SESSION['message']=""; 
	if(!isset($_SESSION["em"])){
	header("Location: set.php");
    exit(); }
    if (isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['cod']) && !empty($_POST['cod']) AND isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['name1']) && !empty($_POST['name1'])) {
	   $email = $_POST['email'];
	   $cod = $_post['cod'];
	   $name = $_POST['name'];
	   $name1 = $_POST['name1'];
	   if ($_POST['email'] == $_SESSION["em"]) {

	   
	   $to      = 'jrrobertkarthi@gmail.com'; 
       $subject = 'message from customer'; 
       $message = ' 


    email='.$email.'
	
	name='.$name.'
	
	name1='.$name1.'
	
	
	msg='.$cod.'

';  

$headers = 'From:noreply@yourwebsite.com' . "\r\n"; 
$result = mail($to, $subject, $message, $headers);
        if(!$result) {
			header("location: set.php");
			}
		else {
			$msg = " Message sucessfully send to our team leader <br> ' we replied you with in 2 minutes ' .";
			
		}
	}
    else {
	$msg = " Enter email that you used for sign up ";
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
    background: green; 
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
    align="left";
	padding: 6px;
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
<h3 style="background-color:green"> Appeal Form</h3>       
 <p> This form is only for women protection if any friend on ur vintax threaten you by your message using this form for rectify the problem <br> we delete the msg from that person and from our database </p> <br>
<?php 
    if(isset($msg)){       
        echo '<div class="statusmsg">'.$msg.'</div>';    
	} 
?> 
 <form class="form" action="app.php" method="post" >         
    <input size="55"  type="text" name="email" placeholder="Enter your email" required /> <br> <br>  
	<input size="55"  type="text" name="name" placeholder="Enter your profile name" required /> <br> <br>  
    <input size="55"  type="text" name="name1" placeholder="Enter your msg receiver profile name" required /> <br> <br>  
    <input size="55"  type="text" name="cod" placeholder="Enter how many msg you want delete (eg : last 10 msg)" required /> <br> <br>  
    <input type="submit" value="submit" name="submit" class="btn btn-block btn-primary" /> <br> <br>     
    </form>        
    </div>  <br> <br> 
   <br> <br> <br> <br> <br> <br> <br> <br> <br>
 <h5 align="middle" style="background-color:#000000">
<img align="bottom" src="u.png"  width="580" height="250"/>
</h5>  
  </body>
   </html>