<?php
    require "mixin.php";

    $connection = connectDB("mydb", "mingchung", "admin"); //Connect to db
    $photoPerPage = 4; //Set number of images per page
    $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1; //Set current page number
    //Set from which position we want to get the articles
    $init = ($page > 1) ? ($page * $photoPerPage) - $photoPerPage : 0;

    //Get list of images
    $query = "select SQL_CALC_FOUND_ROWS * from image limit $init, $photoPerPage";
    $statement = $connection->prepare($query);
    $statement->execute();
    $photos = $statement->fetchAll();

    //Get the quantity of images
    $statement = $connection->prepare("select FOUND_ROWS() as total");
    $statement->execute();
    $totalImages = (int)$statement->fetch()["total"];

    $numberPages = (int)ceil($totalImages / $photoPerPage); //Calculate the quantity of pages
    $previousPage = ($page !== 1) ? $page - 1 : $page; //Set previous page number
    $nextPage = ($page !== $numberPages) ? $page + 1 : $page; //Set next page number

    require "views/index.view.php";
?>
