<?php include("includes/session-check.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crow Game - Profile</title>
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

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/profile.css">
    
    <?php include("includes/db-connect.php");
    $userId = $_SESSION["userId"];
    $display = $_SESSION["display"];
    ?>

</head>
<body onload="document.body.style.opacity='1'">
    
<?php include("includes/nav.php"); ?>

<div class="container">

    <?php 
    //this is so points are determined by DB and NOT session
    $stmt = $pdo->prepare("SELECT * FROM `user` WHERE `userId` = $userId");
    $stmt->execute();
    $row = $stmt->fetch(); ?>

    <h1>User Profile</h1>

    <!-- nickname and total points will be displayed -->
    <section id="profTop">

        <section id="pInfo">
            <div id="pfp"><img src="assets/crow-pfp.png"></div>

            <!-- display user summary -->
            <h2 class="h2spec"><?php echo("$display"); ?></h2> <?php
            echo("<br/>"); ?>
            <h3><?php echo($row["points"]); ?>pts</h3> <?php
            echo("<br/>");?>
        </section>

    <!-- TWO tabs. first will be inventory tab which will be on display by default.-->
        <section id="invAcc">
            <button class="tabs" id="invTab">Inventory</button>
            <button class="tabs" id="accTab">Account</button>
        </section>

    </section>

    <section id="profBtm">
    <!-- INVENTORY -->    
        <div id="inventory">

            <?php 
            $stmtInv = $pdo->prepare("SELECT DISTINCT `prizeId`, `item`, `img`, `details` FROM `user-prize` WHERE `userId` = $userId");

            //execute
            $stmtInv->execute();

            //display prizes
            while($rowInv = $stmtInv->fetch()) { ?>
                <div id="invItems">
                    <img src="assets/<?php echo($rowInv["img"]);?>"><?php
                    echo("<br/>");
                    ?><h3><?php echo($rowInv["item"]); ?></h3><?php

                    //get prizeId being fetched
                    $prizeId = $rowInv["prizeId"];

                    //get the total count
                    $stmtCount = $pdo->prepare("SELECT COUNT(*) FROM `user-prize` WHERE `prizeId` = '$prizeId' AND `userId` = $userId;");
                    $stmtCount->execute();
                    $rowCount = $stmtCount->fetch();

                    //display the total count
                    ?><p>Qty: <?php print_r($rowCount["COUNT(*)"]);?><br>

                    <a href="process-delete-inv.php?prizeId=<?php echo($rowInv["prizeId"]); ?>" onclick="return confirm('Are you sure? This will remove 1 from your quantity.')">&#10005; Delete</a>
                    </p>
                </div>
            <?php } ?>
        </div>

        <!-- USER ACCOUNT -->

        <div id="account" style="display:none;">
            <h2>Account Information</h2>
            
            <p>

                <!-- display user account info --> <?php
                $stmtAcc = $pdo->prepare("SELECT * FROM `user` WHERE `userId` = $userId");
                $stmtAcc->execute();
                while($rowAcc = $stmtAcc->fetch()) { ?>
                    <label>Email: </label><?php echo($rowAcc["email"]);
                    echo("<br/>"); ?>
                    <label>Username: </label><?php echo($rowAcc["username"]);
                    echo("<br/>"); ?>
                    <label>Nickname: </label><?php echo($rowAcc["display"]);
                    echo("<br/>"); ?>
                    <label>Password: </label><?php echo($rowAcc["password"]);
                }?>

            </p>
        </div>
    </section>
</div>

    <script src="js/main.js"></script>
</body>
</html>