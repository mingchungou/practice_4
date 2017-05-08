<?php
    session_start();
    require "../config.php";

    //Redirect to admin page if session exists
    if (isset($_SESSION["user"])) {
        header("location: " . ROOT . "/templates/admin.php");
    }

    $errors = ["name" => "", "password" => ""];
    $username = "";
    $password = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $dbConnection = connectDB(); //Connect to db
        $username = clearInputData($_POST["name"]);
        $password = $_POST["password"];

        //Validate form datas
        if (empty($username)) {
            $errors["name"] = "Por favor ingresar usuario";
        }

        if (empty($password)) {
            $errors["password"] = "Por favor ingresar contraseña";
        }

        //Try to match a db user with these username and password, if find a match, then redirecting to admin page
        if (!empty($username) and !empty($password)) {
            $passwordEncoded = hash("sha512", $password); //Encode password
            $result = $dbConnection->prepare("select * from user where name = :name and password = :password limit 1");
            $result->execute(array(":name" => $username, ":password" => $passwordEncoded));
            $result = $result->fetch();

            if ($result) {
                $_SESSION["user"] = $username;
                header("location: " . ROOT . "/templates/admin.php");
            } else {
                $errors["name"] = "El usuario o la contraseña esta mal";
            }
        }
    }

    require "../views/login.view.php";
?>
