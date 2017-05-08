<?php
    require "../config.php";

    $dbConnection = connectDB(); //Connect to db
    $blogID = (int)clearInputData($_GET["id"]); //Clear id data gotten from url
    $blog = getBlogByID($dbConnection, $blogID); //Get blog by id

    //Redirect to index.php if not find the blog searched
    if (!$blog) {
        header("location: " . ROOT . "/index.php");
    }

    require "../views/single.view.php";
?>
