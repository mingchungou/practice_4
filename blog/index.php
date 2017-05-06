<?php
    require "config.php";

    //Connect to db
    $dbConnection = connectDB();
    checkConnection($dbConnection);

    $blogs = getBlogs($dbConnection); //Get blogs
    $currentPage = currentPage(); //Set current page number
    require "views/index.view.php";
?>
