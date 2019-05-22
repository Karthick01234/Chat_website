<?php
   session_start();
   $_SESSION['message'] = '';
   $mysqli = new mysqli('127.0.0.1','root',"",'sign up');
   $email='table_name';
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	                     $name = $mysqli->real_escape_string($_POST['name']);
			             $email = $mysqli->real_escape_string($_POST['email']);
			             $password = md5($_POST['password']);
			             $address = $mysqli->real_escape_string($_POST['address']);
			             $district = $mysqli->real_escape_string($_POST['district']);
			             $pincode = $mysqli->real_escape_string($_POST['pincode']);
			             $state = $mysqli->real_escape_string($_POST['state']);
			             $country = $mysqli->real_escape_string($_POST['country']);
			             $phonenumber = $mysqli->real_escape_string($_POST['phonenumber']);
	    if ($_POST['password'] == $_POST['confirmpassword']) {
		   if($_POST['yes/no'] == 'yes') {
			   if(strlen($_POST['phonenumber']) == 10) {
					if(strlen($_POST['password']) >= 8 ) {
						if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*.(\.[a-z]{2,3})$", $email)){
						         $hash = md5( rand(0,1000) );  
                                 $sql = "INSERT INTO form (name,email,password,address,district,pincode,state,country,phonenumber,hash) "
				                     . "VALUES ('$name','$email','$password','$address','$district','$pincode','$state','$country','$phonenumber','$hash')";
				                    if($mysqli->query($sql) == true) {
						               $create = "CREATE TABLE `".$email."` (id INT(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
							                     name VARCHAR(32) NOT NULL,
							                     pname VARCHAR(32) NOT NULL,
							                     about VARCHAR(80) NOT NULL,
							                     img1 VARCHAR(32) NOT NULL,
							                     img2 VARCHAR(32) NOT NULL,
							                     mf VARCHAR(32) NOT NULL,
							                     mu VARCHAR(32) NOT NULL,
							                     rs VARCHAR(255) NOT NULL,
							                     ws VARCHAR(32) NOT NULL,
							                     centre VARCHAR(32) NOT NULL,
							                     ad VARCHAR(32) NOT NULL,
							                     pos1 VARCHAR(32) NOT NULL,
							                     sc VARCHAR(32) NOT NULL,
							                     cen VARCHAR(32) NOT NULL,
							                     sd VARCHAR(32) NOT NULL,
							                     po VARCHAR(32) NOT NULL,
							                     number VARCHAR(15) NOT NULL,
							                     email1 TEXT NOT NULL,
							                     img3 VARCHAR(32) NOT NULL,
							                     my1 VARCHAR(32) NOT NULL,
							                     my2 VARCHAR(32) NOT NULL,
							                     my3 VARCHAR(32) NOT NULL,
												 description VARCHAR(255) NOT NULL,
												 video VARCHAR(50) NOT NULL,
												 your VARCHAR(50) NOT NULL,
												 id1 VARCHAR(32) NOT NULL,
												 id2 VARCHAR(32) NOT NULL,
												 id3 VARCHAR(32) NOT NULL,
												 id4 VARCHAR(32) NOT NULL,
												 id5 VARCHAR(32) NOT NULL,
												 id6 VARCHAR(32) NOT NULL,
												 id7 VARCHAR(32) NOT NULL,
												 id8 VARCHAR(32) NOT NULL,
												 id9 VARCHAR(32) NOT NULL,
												 id10 VARCHAR(32) NOT NULL,
												 e TEXT NOT NULL,
												 id11 VARCHAR(32) NOT NULL,
												 id12 VARCHAR(32) NOT NULL,
												 id13 VARCHAR(32) NOT NULL,
												 id14 VARCHAR(32) NOT NULL,
												 id15 VARCHAR(32) NOT NULL,
												 id16 VARCHAR(32) NOT NULL,
												 id17 VARCHAR(32) NOT NULL,
												 id18 VARCHAR(32) NOT NULL,
												 id19 VARCHAR(32) NOT NULL,
												 id20 VARCHAR(32) NOT NULL,
												 e1 TEXT NOT NULL,
												 active INT(1) DEFAULT 0) ENGINE=MyISAM";
							             if($mysqli->query($create )== true) {
										  $sq = "ALTER TABLE post ADD `".$email."` VARCHAR(32) NOT NULL after your";
										 if($mysqli->query($sq)== true) { 
						                   $_SESSION["email"] = $email;
						                   $_SESSION['message'] = "Your account is created! Added $name to the database!";
						                   header("location: welcome.php");
										 }
										 }
					                      else {
						                     $_SESSION['message'] = "Your account is not created fill all fields correctly";
						                     $msg = "Your account is not created fill all fields correctly <br> or <br> the email has already have an account";
										  }
									}
					  }
					  else {
				       $_SESSION['message'] = "Enter a valid email";
				       $msg = "Enter a valid email or email is already have an account"; 
					  }
					}
				    else {
					$msg = "Password require 8 digit fill password with 8 character";
					}
			   }
		       else {
			    $_SESSION['message'] = "Enter valid mobile number";
			    $msg = "Enter valid mobile number";
			   }
		   }
			else {
			   $_SESSION['message'] = "Give correct answer in yes/no fields";
			   $msg = "Give correct answer in yes/no fields";
		   }
	   }
	   else {
		   $_SESSION['message'] = "Password doesn't match"; 
		   $msg = "Password doesn't match";
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
    
}
 
</style>
<head> 
<title> VINTAX > Sign up</title>   
</head>
<body background="c.jpeg">   
<div id="header" >       
<h3  align="middle"> VINTAX VC <sub> chat <sub> </h3>   
</div>   
<div id="wrap" align="middle" > <br>               
<h3 style="background-color:green">Sign up Form</h3> <br>
<p> <font color="black"> Enter your valid email address to create your account </font> </p>  
<?php 
    if(isset($msg)){       
        echo '<div class="statusmsg">'.$msg.'</div>';    
	} 
?>              
<p> <font size="4" color="white"> Create a new account &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  </font> </p>    
<form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">        
<input size="55" type="text" name="name"  placeholder="User Name" required /> <br> <br> 
<input size="55" type="email" name="email" placeholder="Email" required /> <br> <br>
<input size="55" type="password" name="password"  placeholder="Password" autocomplete="new-password" required /> <br> <br>
<input size="55" type="password" name="confirmpassword" placeholder="Confirm  password" autocomplete="new-password" required /> <br> <br>
<input size="55" type="text" name="address" placeholder="Address" required /> <br> <br>
<input size="55" type="text" name="district" placeholder="District" required /> <br> <br>
<input size="55" type="text" name="pincode" placeholder="Pin-code" required /> <br> <br>
<input size="55" type="text" name="state" placeholder="State" required />  <br> <br> 
<input size="55" type="text" name="country" placeholder="Country" required /> <br> <br>
<input size="55" type="text" name="phonenumber" placeholder="mobile number" required /> <br> <br>
<input size="55" type="radio" name="yes/no" value="yes" required /> <font size="5" color="red"> yes </font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input size="55" type="radio" name="yes/no" value="no" required /> <font size="5" color="red"> no &nbsp;&nbsp;&nbsp;  </font> <br> <br>
<a href="term.html"> <font size="3" color="red"> Terms and conditions&nbsp;&nbsp; </font> </a> <br> <br>
<input type="submit" value="sign up" name="sign up" class="btn btn-block btn-primary" /> <br> <br>     
</form>
</div> <br>
<br>
<h4 align="middle">
<font size="6" style="border:thick solid green;background-color:green"> Already have an account </font>
<a href="logvc.php" style="text-align:middle"> <br> <br>
<font size="4" align="middle" color="green"> login </font> 
</a>
</h4> <br> <br>
<h5 align="middle" style="background-color:#000000">
<img align="bottom" src="u.png"  width="580" height="250"/>
</h5>
</body>
</html>