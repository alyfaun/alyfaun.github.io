<?php session_start();    

    $prizeId = $_POST["prizeId"];
    $item = $_POST["item"];
    $img = $_POST["img"];
    $details = $_POST["details"];

    //connect
    include("includes/db-connect.php"); 

    //prepare
    $stmt = $pdo->prepare("UPDATE `prize` SET `item` = '$item', `img` = '$img', `details` = '$details' WHERE `prize`.`prizeId` = $prizeId;");

    if($stmt->execute() == true){
        header("Location: prizes.php");
    }else{
        echo("Oops. Something went wrong");
    }
?>