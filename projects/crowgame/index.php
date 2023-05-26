<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crow Game</title>
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
    <link rel="stylesheet" href="css/index.css">

    <?php include("includes/db-connect.php"); ?>

</head>
<body onload="document.body.style.opacity='1'">

<?php include("includes/nav.php"); ?>

<div class="container">

    <section id="homeLeft">

        <h1>Crow Game</h1>

        <div id="gameHolder">
        <!-- once game ends, it will have 2 buttin options. -->

        <!-- one to play again which will send points variable to update DB and then just header to the same page (basically refreshes the page) -->
            <form method="POST" action="process-game-replay.php" id="replayGame" style="display:none">
                <input type="hidden" name="score1" id="score1">
                <input type="submit" value="Play Again">
            </form>

        <!-- the other will be a redirect link, itll send user to the gacha page after sending points variable to db -->
            <?php
            if(isset($_SESSION["userId"])){?>
                <form method="POST" action="process-game-prizes.php" id="getPrizes" style="display:none">
                    <input type="hidden" name="score2" id="score2">
                    <input type="submit" value="Get Prizes">
                </form>
            <?php } ?>
            <br>

            <p class="caption" id="toSave" style="display:none;"> *You must click on one of these options to save your points to your account!*</p>
            

            <canvas id="holder"></canvas>
        
        </div>

        <!-- below the game have a link to current available prizes -->
        <img src="assets/banner.jpg" class="banner" onclick="window.location.href='prizes.php'"/>

    </section>

    <section id="homeRight">
        <h2>Controls</h2>

        <div id="ctrls">
            
            <img src="assets/controls.png"/>
            <p class="caption"> For the best game experience, please play on desktop.</p>

        <!-- to the right of the game, have an image that tells you the controls -->
        </div>

        <!-- if user is logged in, display "enter bonus points code" -->
        <!-- if not, tell them to sign up to be able to keep their score -->
        <div id="bonusLog">

            <?php
            if(isset($_SESSION["userId"])){?>

                <h2>Bonus Points</h2>
                <div id="bonus">
                    <p>If you have a secret code, enter it below to receive some bonus points!</p>
                    <form method="POST" action="process-bonus.php" id="bonusCode">
                        <input type="text" name="code" placeholder="Enter Code" required id="code">
                        <input type="Submit" value="Submit">
                    </form>
                </div>

                <?php
            } else { ?>

                <h2>Join Us!</h2>
                <div id="joinUs">
                    <p>Don't have an account? Create one so you can save points to earn prizes!</p>
                    <button onclick="window.location.href='signup.php'">
                        Sign Up
                    </button>
                </div>

            <?php } ?>
        
        </div>
    </section>
</div>

    <script src="https://zimjs.org/cdn/nft/00/zim.js"></script>
    <!-- <script src="https://zimjs.org/cdn/nft/00/zim_game.js"></script> -->
    <script src="js/crowgame.js"></script>
    <script src="js/bonus-ajax.js"></script>
  
</body>
</html>