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
<!-- this is locked by a session check -->

<?php include("includes/nav.php"); ?>

<div class="container">

    <div id="gachaMach">

        <img src="assets/gacha-mach.png" id="machine"/>

        <div id="prizeWon" style="display:none;">

            <button onclick="window.location.href='gacha-prize.php'">Open Prize</button>

        </div>
    
    </div>

    <?php if(isset($_SESSION["userId"])){ 
        
        $stmt = $pdo->prepare("SELECT `points` FROM `user` WHERE `userId` = $userId");
        $stmt->execute();
        $row = $stmt->fetch();
        ?>

        <div id="gachaButtons">
        
            <?php if(($row["points"]) > 1000){ 
                
                $row = $stmt->fetch();?>
                
                <form method="POST" action="process-gacha.php" id="rollGacha">
                    <input type="hidden" name="userId" value="<?= $row["userId"] ?>" id="userId">
                    <input type="Submit" value="Roll Gacha!" id="submit">
                </form>

            <?php
            } else { ?>

                <button type="button" disabled>Roll Gacha!</button> <br>
                <p>
                    You do not have enough points. <a href="index.php">Play </a>to gain more points!
                </p>
            
            <?php
            } ?>
        </div>
    <?php
    } else { ?>
        <p>Hey.. what are you doing here? Please sign up to use the Gacha feature!</p> <?php
    } ?>

</div>
    <script src="js/gacha-ajax.js"></script>
</body>
</html>