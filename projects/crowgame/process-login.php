<?php session_start(); 

$username = $_POST["username"];
$password = $_POST["password"];

include("includes/db-connect.php");

$stmt = $pdo->prepare("SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$password'");

$stmt->execute();

if($row = $stmt->fetch()){
	$_SESSION["userId"] = $row["userId"];
	$_SESSION["display"] = $row["display"];
	$_SESSION["roleId"] = $row["roleId"];

	header("Location:index.php");
}else{
	echo("Incorrect username or password.");
}
?>