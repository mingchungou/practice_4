<?php
    require "../mixin.php";

    $connection = connectDB("mydb", "mingchung", "admin"); //Connect to db
    $id = isset($_GET["id"]) ? (int)$_GET["id"] : false; //Clear id data gotten from url
    $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1; //Clear page data gotten from url

    if (!$id) {
        header("location: ../index.php");
    }

    //Get image by id gotten
    $statement = $connection->prepare("select * from image where id = :id");
    $statement->execute(array(":id" => $id));
    $photo = $statement->fetch();

    if (!$photo) {
        header("location: ../index.php");
    }

    require "../views/image.view.php";
?>
