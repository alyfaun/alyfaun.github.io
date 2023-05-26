<?php session_start();    

if(isset($_GET["prizeId"]) == false){
	echo("Invalid Request.");

}else{

    $userId = $_SESSION["userId"];
    $prizeId = $_GET["prizeId"];

    include("includes/db-connect.php"); 

    $stmt = $pdo->prepare("DELETE FROM `user-prize` WHERE `prizeId` = '$prizeId' AND `userId` = '$userId' LIMIT 1;");

    if($stmt->execute() == true){
        header("Location: profile.php");
    }}
    ?>
