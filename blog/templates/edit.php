<?php
    session_start();
    require "../config.php";

    checkSession(); //Check if start session

    //Connect to db
    $dbConnection = connectDB();
    checkConnection($dbConnection);

    $errors = ["title" => "", "extract" => "", "text" => "", "thumb" => ""];
    $id = "";
    $title = "";
    $extract = "";
    $text = "";
    $thumbStored = "";
    $page = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id = clearInputData($_POST["id"]);
        $title = clearInputData($_POST["title"]);
        $extract = clearInputData($_POST["extract"]);
        $text = $_POST["text"];
        $thumbStored = clearInputData($_POST["thumb-stored"]);
        $page = (int)clearInputData($_POST["page"]);
        $thumb = $_FILES["thumb"];

        //Validate form datas
        if (empty($title)) {
            $errors["title"] = "Por favor ingresar un título";
        }

        if (empty($extract)) {
            $errors["extract"] = "Por favor ingresar un extracto";
        }

        if (empty($text)) {
            $errors["text"] = "Por favor ingresar el texto del artículo";
        }

        if (empty($thumb["name"])) { //If image input file is empty then use the previous one
            $thumb = $thumbStored;
        } else {
            if (!@getimagesize($thumb["tmp_name"])) {
                $errors["thumb"] = "El archivo no es una imagen o es muy pesado";
                $thumb = false;
            } elseif (!empty($title) && !empty($extract) && !empty($text)) { //If a new image is selected, then copying it to image root file
                $file_root = IMAGES_FILE . $thumb["name"];
                move_uploaded_file($thumb["tmp_name"], $file_root); //Copy the image from somewhere and paste it to location set
                $thumb = $thumb["name"];
            }
        }

        //Update the blog from db and redirect to admin page
        if (!empty($title) && !empty($extract) && !empty($text) && $thumb) {
            $statement = $dbConnection->prepare("update blog set title = :title, extract = :extract, thumb = :thumb, text = :text where id = :id");
            $statement->execute(array(":title" => $title, ":extract" => $extract, ":thumb" => $thumb, ":text" => $text, ":id" => $id));
            header("location: " . ROOT . "/templates/admin.php?page=" . $page);
        }
    } else {
        $blogID = (int)clearInputData($_GET["id"]); //Clear id data gotten from url
        $page = (int)clearInputData($_GET["page"]); //Clear page data gotten from url

        if (!$blogID || !$page) {
            header("location: " . ROOT . "/templates/admin.php");
        }

        $blog = getBlogByID($dbConnection, $blogID); //Get blog by id

        if (!$blog) {
            header("location: " . ROOT . "/templates/admin.php");
        }
    }

    require "../views/edit.view.php";
?>
