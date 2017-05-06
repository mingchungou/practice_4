<?php
    require "mixin.php";

    //Connect to db
    $connection = connectDB("mydb", "mingchung", "admin");

    if (!$connection) {
        die();
    }

    $photoPerPage = 4; //Set number of images per page
    $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1; //Set current page number
    $init = ($page > 1) ? ($page * $photoPerPage) - $photoPerPage : 0; //Set from which position we want to get the articles

    //Get list of images
    $statement = $connection->prepare("select SQL_CALC_FOUND_ROWS * from image limit $init, $photoPerPage");
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
