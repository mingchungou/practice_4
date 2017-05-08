<?php
    require "../config.php";

    $dbConnection = connectDB(); //Connect to db

    if ($_SERVER["REQUEST_METHOD"] !== "GET" || empty($_GET["info"])) {
        setcookie("error_message", "No se encontró dato 'info' dentro del url");
        header("location: " . ROOT . "/error.php");
        die();
    }

    $info = clearInputData($_GET["info"]); //Clear info data gotten from url
    $currentPage = currentPage(); //Set current page number
    $init = ($currentPage > 1) ? ($currentPage * BLOG_PER_PAGE) - BLOG_PER_PAGE : 0;
    $statement = $dbConnection->prepare("select sql_calc_found_rows * from blog where title like :search or extract like :search limit $init, " . BLOG_PER_PAGE);
    $statement->execute(array(":search" => "%$info%"));
    $blogs = $statement->fetchAll(); //Get blogs

    //Show sort of title according to whether or not get the blogs
    if (!$blogs) {
        $title = "No se encontraron blogs con el resultado: " . $info;
    } else {
        $title = "Resultados de la busqueda: " . $info;
    }

    require "../views/search.view.php";
?>
