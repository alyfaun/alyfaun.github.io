<?php session_start();    

$email = $_POST["email"];
$username = $_POST["username"];
$display = $_POST["display"];
$password = $_POST["password"];
$points = "0";
$roleId = "1";

include("includes/db-connect.php");

$stmt = $pdo->prepare("INSERT INTO `user` (`userId`, `email`, `username`, `display`, `password`, `points`, `roleId`) VALUES (NULL, '$email', '$username', '$display', '$password', '$points', '$roleId');");

if($stmt->execute() == true){
	header("Location: login.php");
}else{
	echo("Oops! Something went wrong, please try signing up again.");
}
?>