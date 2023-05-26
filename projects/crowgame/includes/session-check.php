<?php
session_start();
if (!isset($_SESSION["userId"])) {

    // makes the code stop right here
    // exit();
    header("Location: login.php");
}