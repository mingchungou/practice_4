<?php
    define("ROOT", "http://localhost/practice_4/galery");
    define("ROOT_LIB_CSS", "http://localhost/practice_4/css");
    define("ROOT_LIB", "http://localhost/practice_4/lib");
    define("DB_HOST", "192.168.1.9:3306");
    define("DB_NAME", "mydb");
    define("DB_USER", "mingchung");
    define("DB_PASSWORD", "admin");

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
?>
