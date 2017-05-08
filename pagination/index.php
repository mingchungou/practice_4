<?php
    $IP_Address = "192.168.1.9";

    //Connect to db
    try {
        $connection = new PDO("mysql:host=$IP_Address:3306;dbname=mydb;", "mingchung", "admin");
    } catch(PDOException $e) {
        if (function_exists("http_response_code")) {
            http_response_code(500);
        } else {
            header("HTTP/1.1 500 Internal Server Error");
        }
        die("Error: " . $e->getMessage());
    }

    $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1; //Set current page
    $postPerPage = 5; //Set number of articles per page
    $init = ($page > 1) ? ($page * $postPerPage - $postPerPage) : 0; //Set from which position we want to get the articles

    //Bringing the list of articles
    $statement = $connection->prepare("select SQL_CALC_FOUND_ROWS * from pagination limit $init, $postPerPage");
    $statement->execute();
    $articles = $statement->fetchAll();

    if (!$articles) {
        if (function_exists("http_response_code")) {
            http_response_code(500);
        } else {
            header("HTTP/1.1 500 Internal Server Error");
        }
        die("Error: Not found any blog within that page");
    }

    //Get the quantity of articles
    $totalArticles = $connection->query("select FOUND_ROWS() as total");
    $totalArticles = (int)$totalArticles->fetch()["total"];

    //Calculate the quantity of pages
    $numberPages = (int)ceil($totalArticles / $postPerPage);

    //Determine if possible to show previous and next page number buttons
    $previousPage = (($page - 1) >= 1) ? $page - 1 : -1;
    $nextPage = (($page + 1) <= $numberPages) ? $page + 1 : -1;

    require "views/index.view.php";
?>
