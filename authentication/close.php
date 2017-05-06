<?php
    session_start();
    require "mixin.php";

    session_destroy();
    $_SESSION = array();
    header("location: " . ROOT . "/index.php");
?>
