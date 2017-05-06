<?php
    session_start();
    require "../config.php";

    checkSession(); //Check if start session

    //Connect to db
    $dbConnection = connectDB();
    checkConnection($dbConnection);

    $blogID = (int)clearInputData($_GET["id"]); //Clear id data gotten from url

    if (!$blogID) {
        header("location: " . ROOT . "/templates/admin.php");
    }

    $blog = getBlogByID($dbConnection, $blogID); //Get blog by id

    if (!$blog) {
        header("location: " . ROOT . "/templates/admin.php");
    }

    unlink(IMAGES_FILE . $blog["thumb"]); //Remove image of block

    //Remove the blog from db and redirect to admin page
    $statement = $dbConnection->prepare("delete from blog where id = :id");
    $statement->execute(array(":id" => $blogID));
    header("location: " . ROOT . "/templates/admin.php");

    require "../views/add.view.php";
?>
