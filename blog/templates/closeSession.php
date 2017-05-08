<?php
    session_start();
    require "../config.php";

    session_unset(); //remove all session variables
    session_destroy(); //remove the session
    header("location: " . ROOT . "/templates/login.php");
?>
