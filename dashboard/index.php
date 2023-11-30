<?php
include '../includes/db_functions.php';
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $token = $_GET["token"];
    // echo $token;
    if (checkToken($token) != null) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["token"] = $token;
        header("Location: ./projects/index.php");

        // exit();
    } else {
        // header("Location: ../index.php");
    }
}

?>