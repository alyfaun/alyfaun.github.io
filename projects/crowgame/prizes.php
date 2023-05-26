<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crow Game - Prizes</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">

    <!-- meta tags -->
    <meta name="description" content="Crow Pixel Game">
    <meta name="keywords" content="crow, game, browser, pixel, art, gacha, gachapon, prizes">
    <meta name="author" content="Aly Sernoskie">

    <!-- social media -->
    <meta property="og:title" content="Crow Game">
    <meta property="og:type" content="broswer game" />
    <meta property="og:description" content="Play as a crow to earn points and get prizes">
    <meta property="og:image" content="http://sernoski.dev.fast.sheridanc.on.ca/IMM2022/crowgame/assets/crowgame-social.jpg">
    <meta property="og:url" content="http://sernoski.dev.fast.sheridanc.on.ca/IMM2022/crowgame/">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="stylesheet" href="css/initialize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/prizes.css">
    
    <?php include("includes/db-connect.php"); ?>

</head>
<body onload="document.body.style.opacity='1'">
    
<?php include("includes/nav.php");?>

<div class="container">

    <h1>Prize List</h1>

    <section id="prizeTop">

        <h2 class="h2spec"> December prizes are here!</h2>
        <p>
            Welcome to Crow Game! Below you can see the available prizes to be won by spending points you gain from playing the game. Each prize has an equal chance of being won, so do your best to collect them all!
        </p>
    
        <?php
        //link to a form for admins only to add more prizes
        if(isset($_SESSION["roleId"]) && ($_SESSION["roleId"]) == 2){
            ?><a href="insert-prize-form.php">Add New Prize</a><br>
        <?php } ?>

    </section>
    
    <!-- make this use flex box and flex wrap? so that its a 3-4 column gridd thatll go to single or double column when mobile. -->

    <section id="prizeBtm">
        <?php

        //Show all the available awards that can be got from the gacha
        $stmt = $pdo->prepare("SELECT * FROM `prize`");

        //execute
        $stmt->execute();

        //display prizes
        while($row = $stmt->fetch()) { ?>
            <div id="prizeList">
                <img src="assets/<?php echo($row["img"]);?>"><?php
                echo("<br/>");
                ?><h3><?php echo($row["item"]); ?></h3><?php
                echo("<br/>");
                ?><p><?php echo($row["details"]);
                echo("<br/>");

                if(isset($_SESSION["roleId"]) && ($_SESSION["roleId"]) == 2){?>
                    <a href="update-prize-form.php?prizeId=<?php echo($row["prizeId"]); ?>">Edit </a>
                    <a href="process-delete-prize.php?prizeId=<?php echo($row["prizeId"]); ?>" onclick="return confirm('Are you sure you want to permanently delete this prize?')"> &#10005;Delete</a>
                <?php } ?>
                </p>
            </div>
            <?php    
        }?>

    </section>

</div>
</body>
</html>