<?php
    $errors= ["name" => "", "email" => "", "message" => ""];
    $sendTo = "";
    $subject = "";
    $emailMessage = "";
    $sent = false;
    $name = "";
    $email = "";
    $message;

    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];

        //Validate form datas
        if (!empty($name)) {
            $name = trim($name);
            $name = filter_var($name, FILTER_SANITIZE_STRING);

            if (preg_match("/[\$\(\)\{\}\<\>\\\|\[\]\?\%\+\#\@\^\*\&\/]/", $name)) {
                $errors["name"] = "Invalid name is entered";
            }
        } else {
            $errors["name"] = "Please write your name";
        }

        if (!empty($email)) {
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors["email"] = "Invalid email is entered";
            }
        } else {
            $errors["email"] = "Please write your email";
        }

        if (!empty($message)) {
            $message = trim($message);
            $message = htmlspecialchars($message);
            $message = stripslashes($message);
        } else {
            $errors["message"] = "Please write your message";
        }

        if (empty($errors["name"]) && empty($errors["email"]) && empty($errors["message"])) {
            $sendTo = "mingchungou@gmail.com";
            $subject = "Email sent from practice contact";
            $emailMessage .= "From: $name\n";
            $emailMessage .= "Email: $email\n";
            $emailMessage .= "Message: $message";

            mail($sendTo, $subject, $emailMessage); //Send an email to my account, but having to upload the practice into real server
            $sent = true;
        }
    }

    require "views/index.view.php";
?>
