<?php 
	session_start();
	if ($_FILES["file"]["error"] > 0){
  		echo "Error: " . $_FILES["file"]["error"] . "<br />";
  	}else{	  
		$userName = "alexddo";
	  	$extension = ".png";
	  	$url = "img/".$userName.$extension;			
	  	move_uploaded_file($_FILES["file"]["tmp_name"], $url);
	  	$_SESSION['user'] = "alexddo";
	  	$_SESSION['img'] = $url;
	  	header("location: index.php");
  	}
?>