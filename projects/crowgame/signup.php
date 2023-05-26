<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crow Game - Sign Up</title>
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
    <link rel="stylesheet" href="css/login-signup.css">

</head>
<body onload="document.body.style.opacity='1'">

<?php include("includes/nav.php"); ?>

<main class="wrapper">

    <div class="container">


        <h1>Welcome to</h1>
        <img src="assets/crow-logo.png"/>

        <div id="signupForm">
            <h2>create an account to gain full access!</h2>

            <form method="POST" action="process-signup.php">
                <div class="lbl"><label>Email</label></div><br>
                <input type="email" name="email" required><br>
                <div class="lbl"><label>Username</label></div><br>
                <input type="text" name="username" required><br>
                <div class="lbl"><label>Nickname</label></div><br>
                <input type="text" name="display"><br>
                <div class="lbl"><label>Password</label></div><br>
                <input type="password" name="password" id="pWord" required><br>
                <div class="lbl" style="margin-top:0px;"><input type="checkbox" onclick="showPass()"><label> Show Password</label></div><br>
                <input type="submit" value="Sign Up">
            </form>

            <p>Already have an account? <a href="login.php">Log in</a></p>
        </div>

        <img src="assets/banner2.jpg" class="banner" onclick="window.location.href='prizes.php'"/></a>
        
    </div>
</main>

<script src="js/main.js"></script>

</body>
</html>