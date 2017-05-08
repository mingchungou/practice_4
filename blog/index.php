<?php
    require "config.php";

    $dbConnection = connectDB(); //Connect to db
    $blogs = getBlogs($dbConnection); //Get blogs
    $currentPage = currentPage(); //Set current page number
    require "views/index.view.php";
?>
