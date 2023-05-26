<?php include("includes/session-check.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crow Game - Update Prize</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">

    <link rel="stylesheet" href="css/initialize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/form.css">
    
    <?php include("includes/db-connect.php"); ?>

</head>
<body onload="document.body.style.opacity='1'">
    
<?php include("includes/nav.php");?>

<div class="container">

    <?php
    if(isset($_SESSION["roleId"]) && ($_SESSION["roleId"]) == 2){
            
        if(isset($_GET["prizeId"]) == true){
            $prizeId = $_GET["prizeId"]; ?>

            <h1>Update Prize</h1>

            <?php
            $stmt = $pdo->prepare("SELECT * FROM `prize` WHERE `prizeId` = $prizeId");

            //execute
            $stmt->execute();

            //display the prize
            $row = $stmt->fetch();?>

            <form method="POST" action="process-update-prize.php">
                <input type="hidden" name="prizeId" value="<?= $row["prizeId"] ?>">
                <label>Name</label>
                <input type="text" name="item" value="<?= $row["item"] ?>"><br>
                <label>Image</label>
                <input type="text" name="img" value="<?= $row["img"] ?>"><br>
                <label>Details</label><br>
                <textarea name="details" rows="5" cols="75"><?= $row["details"] ?></textarea><br>
                <input type="submit" value="Update">
                <button onclick="window.location.href='prizes.php'">Cancel</button>
            </form> <?php
            
        }
    } else {
        echo("Oops! Looks like you do not have access to this page.");
    }?>
</div>
</body>
</html>