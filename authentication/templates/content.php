<?php
    session_start();
    require "../mixin.php";

    avoidAccessWithoutLogin();

    require "../views/content.view.php";
?>
