<?php
    session_start();
    require "../config.php";
    session_destroy();
    $_SESSION = array();
    header("location: " . ROOT . "/templates/login.php");
?>
