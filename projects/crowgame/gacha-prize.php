<?php include("includes/session-check.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crow Game - Gacha</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">

    <link rel="stylesheet" href="css/initialize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/gacha.css">
    
    <?php include("includes/db-connect.php"); ?>

</head>
<body onload="document.body.style.opacity='1'">

<main class="glitter">

<?php include("includes/nav.php"); ?>

<div class="container">

    <?php 
    if(isset($_SESSION["userId"])){ 

        $stmt = $pdo->prepare("SELECT `received`, `item`, `img`, `details` FROM `user-prize` WHERE `userId` = '$userId' ORDER BY `received` DESC LIMIT 1");
        $stmt->execute();
        while($row = $stmt->fetch()){ ?>
        
            <img src="assets/<?php echo($row["img"]);?>" id="imgWon"><?php
            echo("<br/>"); ?>
            <h2><?php echo($row["item"]); ?></h2><?php
            echo("<br/>"); ?>
            <p class="details"><?php echo($row["details"]);?></p><?php
        
        }?>
        <br>
        <button onclick="window.location.href='gacha.php'">Win More</button>
        <button onclick="window.location.href='profile.php'">See Inventory</button>

    <?php
    } else { ?>
            <p>Hey.. what are you doing here? Please sign up to use the Gacha feature!</p> <?php
    } ?>
</div>
</main>
</body>
</html>