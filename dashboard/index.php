<?php
    include '../includes/db_functions.php';

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $token = $_GET["token"];
        if(checkToken($token))
        {
            session_start();
            session_set_cookie_params(3600);
            $_SESSION["token"] = $token;

            header("Location: ../project/index.php");
        }
    }
    header("Location: ../index.php")
?>