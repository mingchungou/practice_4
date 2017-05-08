<?php
    session_start();
    require "../config.php";

    checkSession(); //Check if start session

    $dbConnection = connectDB(); //Connect to db
    $blogs = getBlogs($dbConnection); //Get blogs
    $currentPage = currentPage(); //Set current page number
    require "../views/admin.view.php";
?>
