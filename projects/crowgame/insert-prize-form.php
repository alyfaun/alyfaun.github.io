<?php include("includes/session-check.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crow Game - Add Prize</title>
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
    <link rel="stylesheet" href="css/form.css">
    
    <?php include("includes/db-connect.php"); ?>

</head>
<body onload="document.body.style.opacity='1'">
    
<?php include("includes/nav.php"); ?>

<div class="container">

    <?php
    if(isset($_SESSION["roleId"]) && ($_SESSION["roleId"]) == 2){ ?>
    
        <h1>Add new Prize</h1>
    
        <form method="POST" action="process-prize-form.php">
            <label>Name</label>
            <input type="text" name="item" required><br>
            <label>Image</label>
            <input type="text" name="img" required><br>
            <label>Details</label><br>
            <textarea name="details" rows="5" cols="75"></textarea><br>
            <input type="submit" value="Add Prize">
            <button onclick="window.location.href='prizes.php'">Cancel</button>
        </form> <?php

    } else {
        echo("Oops! Looks like you do not have access to this page.");
    } ?>

</div>
</body>
</html>