<?php
    session_start();
	require_once("db.php");
    $db_handle = new DBController();
	$mysqli = new mysqli('127.0.0.1','root',"",'sign up');
    if(!isset($_SESSION["ema"])){
	header("Location: find.php");
    exit(); }
	$id = $_SESSION["ema"];
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = $_POST["email"];
	$product_array = $db_handle->runQuery("SELECT * FROM profile WHERE email ='".$email."'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
          $id1 = mysql_real_escape_string($product_array[$key]["name"]);
	      $id2 = mysql_real_escape_string($product_array[$key]["pname"]);
	      $id3 = mysql_real_escape_string($product_array[$key]["about"]);
          $id4 = mysql_real_escape_string($product_array[$key]["img1"]);
          $id5 = mysql_real_escape_string($product_array[$key]["img2"]);
	      $id6 = mysql_real_escape_string($product_array[$key]["mf"]);
	      $id7 = mysql_real_escape_string($product_array[$key]["mu"]);
	      $id8 = mysql_real_escape_string($product_array[$key]["rs"]);
	      $id9 = mysql_real_escape_string($product_array[$key]["ws"]);
	      $id10 = mysql_real_escape_string($product_array[$key]["sc"]);
		  $e = mysql_real_escape_string($product_array[$key]["email"]);
         $sql = "INSERT INTO `".$id."` (id1,id2,id3,id4,id5,id6,id7,id8,id9,id10,e,active)"
		        . "VALUES('$id1','$id2','$id3','$id4','$id5','$id6','$id7','$id8','$id9','$id10','$e','1') ";
		   if($mysqli->query($sql) == true) {
			$product_array = $db_handle->runQuery("SELECT * FROM `".$id."` WHERE id ='1'");
	         if (!empty($product_array)) { 
		       foreach($product_array as $key=>$value){
				   $id11 = mysql_real_escape_string($product_array[$key]["name"]);
	               $id12 = mysql_real_escape_string($product_array[$key]["pname"]);
	               $id13 = mysql_real_escape_string($product_array[$key]["about"]);
                   $id14 = mysql_real_escape_string($product_array[$key]["img1"]);
                   $id15 = mysql_real_escape_string($product_array[$key]["img2"]);
	               $id16 = mysql_real_escape_string($product_array[$key]["mf"]);
	               $id17 = mysql_real_escape_string($product_array[$key]["mu"]);
	               $id18 = mysql_real_escape_string($product_array[$key]["rs"]);
	               $id19 = mysql_real_escape_string($product_array[$key]["ws"]);
	               $id20 = mysql_real_escape_string($product_array[$key]["sc"]);
		           $e1 = mysql_real_escape_string($product_array[$key]["email1"]);

                $sql = "INSERT INTO `".$email."` (id11,id12,id13,id14,id15,id16,id17,id18,id19,id20,e1,active)"
		               . "VALUES('$id11','$id12','$id13','$id14','$id15','$id16','$id17','$id18','$id19','$id20','$e1','1') ";
					if($mysqli->query($sql) == true) {
						 header("location: find.php");					
					  }
					else {
						$msg = "cannot send request";
					}
		   }
			 }
		   }
		   ?>
		   
		<?php
		}
	}
	}
	?>
		   


				
		 