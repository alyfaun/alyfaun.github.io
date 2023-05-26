<?php session_start();    

include("includes/db-connect.php"); 

$userId = $_SESSION["userId"];

//remove points
$stmt = $pdo->prepare("UPDATE `user` SET `points`=`points` - 1000 WHERE `user`.`userId`= '$userId';"); 

if($stmt->execute() == true){

    //select rand
    $stmtSe = $pdo->prepare("SELECT * FROM `prize` ORDER BY RAND() LIMIT 1;"); 
    $stmtSe->execute();
    $rowSe = $stmtSe->fetch();

    //get variables
    $prizeId = $rowSe["prizeId"];
    $item = $rowSe["item"];
    $img = $rowSe["img"];
    $details = $rowSe["details"];
}

//insert
$stmtIn = $pdo->prepare("INSERT INTO `user-prize` (`userId`, `prizeId`, `item`, `img`, `details`) VALUES ('$userId', '$prizeId', '$item', '$img', '$details');");

//ajax needed
if($stmtIn->execute() == true){
    echo('{"success":"true"}');
}else{
    echo('{"success":"false"}');
}

?>