<?php
    define("ROOT", "http://localhost/practice_4/blog");
    define("ROOT_LIB_CSS", "http://localhost/practice_4/css");
    define("ROOT_LIB", "http://localhost/practice_4/lib");
    define("DB_HOST", "192.168.1.9:3306");
    define("DB_NAME", "mydb");
    define("DB_USER", "mingchung");
    define("DB_PASSWORD", "admin");
    define("BLOG_PER_PAGE", 2);
    define("IMAGES_FILE", "../images/");

    //Function for connecting to db
    function connectDB() {
        try {
            $connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
            return $connection;
        } catch(PDOException $err) {
            return false;
        }
    }

    //Function for checking if db connection is fine
    function checkConnection($dbConnection) {
        if (!$dbConnection) {
            setcookie("error_message", "Ocurrió un error cuando se conectaba con la base de datos.");
            header("location: " . ROOT . "/error.php");
            die();
        }
    }

    //Function for getting all blogs and return empty array if there isn't any
    function getBlogs($dbConnection) {
        $currentPage = currentPage();

        $init = ($currentPage > 1) ? ($currentPage * BLOG_PER_PAGE) - BLOG_PER_PAGE : 0;
        $statement = $dbConnection->prepare("select sql_calc_found_rows * from blog limit $init, " . BLOG_PER_PAGE);
        $statement->execute();
        $result = $statement->fetchAll();
        return ($result) ? $result : [];
    }

    function getBlogByID($dbConnection, $blogID) {
        $blog = $dbConnection->query("select * from blog where id = $blogID limit 1");
        $blog = $blog->fetch();
        return $blog;
    }

    //Function for getting current pagination page number
    function currentPage() {
        return (isset($_GET["page"]) && is_numeric($_GET["page"])) ? (int)$_GET["page"] : 1;
    }

    //Function for getting quantity of pages the pagination needs to show
    function getQuantityPage($dbConnection) {
        $statement = $dbConnection->prepare("select found_rows() as total");
        $statement->execute();
        $result = $statement->fetch()["total"];
        return (int)ceil($result / BLOG_PER_PAGE);
    }

    //Function for checking if session is initialized, and redirect to login in case it doesn't
    function checkSession() {
        if (!isset($_SESSION["user"])) {
            header("location: " . ROOT . "/templates/login.php");
        }
    }

    //Function for clearing html tags or unliked characters from form inputs
    function clearInputData($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //Function for parsing date data
    function parseDate($date) {
        $timestamp = strtotime($date);
        $months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"];
        $day = date("d", $timestamp);
        $month = date("m", $timestamp) - 1;
        $year = date("Y", $timestamp);
        return "$day de " . $months[$month] . " del $year";
    }
?>
