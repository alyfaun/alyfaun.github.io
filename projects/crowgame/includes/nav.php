<div class="sidebar">
    <img src="assets/crow-logo.png">
    <ul>

    <?php
    if(isset($_SESSION["userId"])){
        $userId = $_SESSION["userId"]
        ?>
        <li><a href="index.php">Play Game</a></li>
        <li><a href="gacha.php">Gacha</a></li>
        <li><a href="prizes.php">Prizes</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="logout.php">Logout</a></li>
        <?php
    } else { 
        ?>
        <li><a href="login.php">Log In</a></li>
        <li><a href="signup.php">Sign Up</a></li>
        <li><a href="index.php">Play Game</a></li>
        <li><a href="prizes.php">Prizes</a></li>
    <?php } ?>

    </ul>
</div>
<div id="credits">&copy; Crow Game 2021 v1.0</div>