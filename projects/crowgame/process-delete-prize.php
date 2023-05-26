<?php session_start();    

if(isset($_GET["prizeId"]) == false){
	echo("Invalid Request.");
}else{

$prizeId = $_GET["prizeId"];

include("includes/db-connect.php"); 

$stmt = $pdo->prepare("DELETE FROM `prize` WHERE `prizeId` = $prizeId;");

if($stmt->execute() == true){
	header("Location: prizes.php");
}}
?>