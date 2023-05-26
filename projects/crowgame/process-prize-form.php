<?php session_start();    

	$item = $_POST["item"];
	$img = $_POST["img"];
	$details = $_POST["details"];

	// $uploaddir = "assets/";
	// $uploadfile = $uploaddir . basename($_FILES["img"]["name"]);

	// $filename = $_FILES['img']['name'];
 
  	// Upload file
	// move_uploaded_file($_FILES['img']['tmp_name'],'assets/'.$filename);

	//connect
	include("includes/db-connect.php");

	//prepare
	$stmt = $pdo->prepare("INSERT INTO `prize` (`prizeId`, `item`, `img`, `details`) VALUES (NULL, '$item', '$img', '$details');");

	//execute
	if($stmt->execute() == true){
		header("Location: prizes.php");
	}else{
		echo("Oops. Something went wrong, failed to upload prize.");
	}
?>