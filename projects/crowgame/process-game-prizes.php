<?php session_start();  

    $userId = $_SESSION["userId"];
	$score = $_POST["score2"];

    // echo("$userId");
    // echo("$score");

    //connect
    include("includes/db-connect.php");

    //prepare
    $stmt = $pdo->prepare("UPDATE `user` SET `points`=`points` + '$score' WHERE `user`.`userId`= '$userId';");

    if(isset($_SESSION["userId"])){

        //execute
        if($stmt->execute() == true){
            //echo("success");
            header("Location:gacha.php");
        }else{
            echo("Something went wrong.");
        }

    } else {
        header("Location:signup.php");
    }
?>