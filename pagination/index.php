<?php
    $IP_Address = "192.168.1.9";

    //Connect to db
    try {
        $connection = new PDO("mysql:host=$IP_Address:3306;dbname=mydb;", "mingchung", "admin");
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage() . "<br />";
        die();
    }

    $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1; //Set current page
    $postPerPage = 5; //Set number of articles per page
    $init = ($page > 1) ? ($page * $postPerPage - $postPerPage) : 0; //Set from which position we want to get the articles

    //Bringing the list of articles
    $statement = $connection->prepare("select SQL_CALC_FOUND_ROWS * from pagination limit $init, $postPerPage");
    $statement->execute();
    $articles = $statement->fetchAll();

    if (!$articles) {
        header("location: index.php");
    }

    //Get the quantity of articles
    $totalArticles = $connection->query("select FOUND_ROWS() as total");
    $totalArticles = (int)$totalArticles->fetch()["total"];

    //Calculate the quantity of pages
    $numberPages = (int)ceil($totalArticles / $postPerPage);

    //Get pages to show
    if ($page !== 1 && $page !== $numberPages) {
        $pageShow = [$page - 1, $page, $page + 1];
    } elseif ($page === 1) {
        $pageShow = [$page, $page + 1, $page + 2];
    } elseif ($page === $numberPages) {
        $pageShow = [$page - 2, $page - 1, $page];
    }

    require "views/index.view.php";
?>
