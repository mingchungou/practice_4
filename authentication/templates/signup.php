<?php
    session_start();
    require "../mixin.php";

    checkSession(false);

    $dbConnection = connectDB(); //Connect to db
    $errors = ["name" => "", "password" => "", "confirm" => ""];
    $username = "";
    $password = "";
    $confirm = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
        $password = $_POST["password"];
        $confirm = $_POST["confirm"];

        //Validate form datas
        if (empty($username)) {
            $errors["name"] = "Por favor ingresar usuario";
        }

        if (empty($password)) {
            $errors["password"] = "Por favor ingresar contraseña";
        }

        if (empty($confirm)) {
            $errors["confirm"] = "Por favor ingresar contraseña de confirmación";
        }

        if (!empty($username) and !empty($password) and !empty($confirm)) {
            if ($password !== $confirm) { //Check password and confirm are the same
                $errors["confirm"] = "La contraseña de confirmación es diferente a la primera";
            } elseif (verifyExistUser($dbConnection, $username)) { //Check the user doesn't exist
                $errors["name"] = "El usuario ya existe";
            } else {
                $password = hash("sha512", $password); //Encode password
                insertUser($dbConnection, $username, $password);

                $_SESSION["user"] = $username;
                header("location: " . ROOT . "/index.php");
            }
        }
    }

    require "../views/signup.view.php";
?>
