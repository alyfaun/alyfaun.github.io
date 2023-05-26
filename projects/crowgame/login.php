<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crow Game - Log In</title>
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

<main class="wrapper">

<?php include("includes/nav.php"); ?>
    
    <div class="container">

        <h1>Welcome back!</h1>

            <div id="loginForm">
                <h2>Log in to your account below</h2>

                <form action="process-login.php" method="POST">
                    <div class="lbl"><label>Username</label> </div><br>
                    <input type="text" name="username" required/><br>
                    <div class="lbl"><label>Password</label></div><br>
                    <input type="password" name="password" id="pWord" required/><br>
                    <div class="lbl" style="margin-top:0px;"><input type="checkbox" onclick="showPass()"><label> Show Password</label></div><br> <!-- maybe make this an eye icon instead src="img"-->
                    <input type="submit" value="Log In" />
                </form>

                <p>Don't have an account? <a href="signup.php">Sign up</a></p>
            </div>

        
        <img src="assets/banner.jpg" class="banner" onclick="window.location.href='prizes.php'"/>
        
    </div>
</main>

<script src="js/main.js"></script>

</body>
</html>