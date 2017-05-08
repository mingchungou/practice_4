<?php
    session_start();
    require "../mixin.php";

    checkSession(false);

    $dbConnection = connectDB(); //Connect to db
    $errors = ["name" => "", "password" => ""];
    $username = "";
    $password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
        $password = $_POST["password"];

        //Validate form datas
        if (empty($username)) {
            $errors["name"] = "Por favor ingresar usuario";
        }

        if (empty($password)) {
            $errors["password"] = "Por favor ingresar contraseña";
        }

        if (!empty($username) and !empty($password)) {
            $passwordEncoded = hash("sha512", $password); //Encode password
            $result = getUser($dbConnection, $username, $passwordEncoded);

            if ($result) {
                $_SESSION["user"] = $username;
                header("location: " . ROOT . "/index.php");
            } else {
                $errors["name"] = "El usuario o la contraseña esta mal";
            }
        }
    }

    require "../views/login.view.php";
?>
