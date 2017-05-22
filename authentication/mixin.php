<?php
    define("ROOT", "http://localhost/practice/practice_4/authentication");
    define("ROOT_LIB_CSS", "http://localhost/practice/practice_4/css");
    define("ROOT_LIB", "http://localhost/practice/practice_4/lib");
    define("DB_HOST", "192.168.1.6:3306");
    define("DB_NAME", "mydb");
    define("DB_USER", "mingchung");
    define("DB_PASSWORD", "admin");

    //Function for checking session, redicting to content page if already signin but redirecting to login page
    function checkSession($redirect) {
        if (isset($_SESSION["user"])) {
            header("location: " . ROOT . "/templates/content.php");
        } elseif ($redirect) {
            header("location: " . ROOT . "/templates/login.php");
        }
    }

    //Function for checking session, if not signin then redicting to login page
    function avoidAccessWithoutLogin() {
        if (!isset($_SESSION["user"])) {
            header("location: " . ROOT . "/templates/login.php");
        }
    }

    //Function for connecting to db
    function connectDB() {
        try {
            $connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
            return $connection;
        } catch(PDOException $err) {
            if (function_exists("http_response_code")) {
                http_response_code(500);
            } else {
                header("HTTP/1.1 500 Internal Server Error");
            }
            die("Error: " . $err->getMessage());
        }
    }

    //Function for getting user from db by name and password
    function getUser($dbConnection, $name, $password) {
        $statement = $dbConnection->prepare("select * from user where name = :name and password = :password limit 1");
        $statement->execute(array(":name" => $name, ":password" => $password));
        $result = $statement->fetch();
        return ($result) ? $result : false;
    }

    //Function for verifying if the user with specified name exists in db
    function verifyExistUser($dbConnection, $name) {
        $statement = $dbConnection->prepare("select * from user where name = :name limit 1");
        $statement->execute(array(":name" => $name));
        $result = $statement->fetch();
        return ($result) ? $result : false;
    }

    //Function for inserting new user to db
    function insertUser($dbConnection, $name, $password) {
        $statement = $dbConnection->prepare("insert into user (name, password) values (:name, :password)");
        $statement->execute(array(":name" => $name, ":password" => $password));
    }
?>
