<?php
    require "../mixin.php";

    //Connect to db
    $connection = connectDB("mydb", "mingchung", "admin");

    if (!$connection) {
        die();
    }

    $errors = ["photo" => "", "title" => "", "description" => ""];
    $title = "";
    $description = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES)) {
        $check = @getimagesize($_FILES["photo"]["tmp_name"]); //Check that form brings image file
        $title = $_POST["title"];
        $description = $_POST["description"];

        //Validate form datas
        if (!empty($title)) {
            $title = trim($title);
            $title = htmlspecialchars($title);
            $title = stripslashes($title);
        } else {
            $errors["title"] = "Por favor ingresar un título";
        }

        if (!empty($description)) {
            $description = trim($description);
            $description = htmlspecialchars($description);
            $description = stripslashes($description);
        } else {
            $errors["description"] = "Por favor ingresar una descripción";
        }

        //Add new image to db and redirect to index page
        if ($check and !empty($description) and !empty($title)) {
            $file_root = "../images/";
            $file_upload = $file_root . $_FILES["photo"]["name"];
            move_uploaded_file($_FILES["photo"]["tmp_name"], $file_upload); //Copy the image from somewhere and paste it to location set

            $statement = $connection->prepare("insert into image (photo, title, description) values (:photo, :title, :description)");
            $statement->execute(array(":photo" => $_FILES["photo"]["name"], ":title" => $title, ":description" => $description));

            header("location: ../index.php");
        } else {
            $errors["photo"] = "El archivo no es una imagen o es muy pesado";
        }
    }

    require "../views/upload.view.php";
?>
