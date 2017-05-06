<?php
    session_start();
    require "../config.php";

    checkSession(); //Check if start session

    $errors = ["title" => "", "extract" => "", "text" => "", "thumb" => ""];
    $title = "";
    $extract = "";
    $text = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        //Connect to db
        $dbConnection = connectDB();
        checkConnection($dbConnection);

        $title = clearInputData($_POST["title"]);
        $extract = clearInputData($_POST["extract"]);
        $text = $_POST["text"];
        $checkImage = @getimagesize($_FILES["thumb"]["tmp_name"]);

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

        if (!$checkImage) {
            $errors["thumb"] = "El archivo no es una imagen o es muy pesado";
        }

        //Add new blog to db and redirect to admin page
        if (!empty($title) && !empty($extract) && !empty($text) && $checkImage) {
            $file_root = IMAGES_FILE . $_FILES["thumb"]["name"];
            move_uploaded_file($_FILES["thumb"]["tmp_name"], $file_root); //Copy the image from somewhere and paste it to location set

            $statement = $dbConnection->prepare("insert into blog (title, extract, thumb, text) values (:title, :extract, :thumb, :text)");
            $statement->execute(array(":title" => $title, ":extract" => $extract, ":thumb" => $_FILES["thumb"]["name"], ":text" => $text));
            header("location: " . ROOT . "/templates/admin.php");
        }
    }

    require "../views/add.view.php";
?>
