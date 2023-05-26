<?php session_start();  

    $userId = $_SESSION["userId"];
	$code = $_POST["code"];

    // echo("$userId");
    // echo("$code");

    //connect
    include("includes/db-connect.php");

    //prepare
    $stmt = $pdo->prepare("UPDATE `user` SET `points`=`points` + 1000 WHERE `user`.`userId`= '$userId';");

	if(isset($_POST["code"]) && ($_POST["code"] == "UUDDLRLRBA")){

        //execute
        if($stmt->execute() == true){
            //echo("success");
            echo('{"success":"true"}');
        }else{
            echo('{"success":"false"}');
        }
    }
?>