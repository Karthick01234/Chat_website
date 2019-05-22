<?php
session_start();
require_once("db.php");
$db_handle = new DBController();
$mysqli = new mysqli('127.0.0.1','root',"",'sign up');
if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST["email"];
}
?>
<!DOCTYPE html>
 <html>
 <style>
*{   
    padding: 0; 
    margin: 0; 
 }
 #f1 {
	position: relative;
	top: 265px;
	cursor: pointer; 
 }
 #f2 {
	position: relative;
	top: 545px;
	cursor: pointer;
	 
 }
 </style>
 <script>
    function my() {
	 window.history.back();	
	}
 </script>
 <head> 
 <title> VINTAX vc post </title>   
 </head>
 <body background="#f0f0f0">   
 <div align="middle" style="background-color:#3b5998;height:40px" ><button type="button" onclick="my()" style="width:100px;height:30px;background-color:#3b5998;border:1px solid #3b5998;float:left;padding:6px 10px"> <font size="5"> Back </font></button> <h1> vintax <sub> vc </sub> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </h1> </div> <br> <br>
 <div align="middle">
 <h1> Upload your original photo this photo only for your passbook (it is only visible to you not for others !) </h1> <br>
 <div id="my" style="background-color:#A9A9A9;width:200px;height:200px;border:1px solid black;padding:0;margin:0;border-radius:10%">
 </div> <br> <br>
 <h2> Upload your sign as photo this photo only for your passbook (it is only visible to you not for others !) </h2> <br>
 <div id="hi" style="background-color:#A9A9A9;width:200px;height:200px;border:1px solid black;padding:0;margin:0;border-radius:10%">
 </div> <br> <br>
<form action="passup.php" method="post" enctype="multipart/form-data">
<input style="position:absolute;left:600px" type="file" name="img1" id="f1" accept="image/*" required />
<input style="position:absolute;left:600px" type="file" name="img2" id="f2" accept="image/*" required />
<input type="hidden" value="<?php echo $id; ?>" name="email" />
<input type="submit" value="Create Passbook" style="background-color:green;border:green;padding:10px 10px" />
 </form>
 </div>
 </body>
 </html>