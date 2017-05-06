<?php
    session_start();
    require "../config.php";

    checkSession(); //Check if start session

    //Connect to db
    $dbConnection = connectDB();
    checkConnection($dbConnection);

    $blogs = getBlogs($dbConnection); //Get blogs
    $currentPage = currentPage(); //Set current page number
    require "../views/admin.view.php";
?>
