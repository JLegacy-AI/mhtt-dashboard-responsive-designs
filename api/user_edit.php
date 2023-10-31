<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include '../includes/db_functions.php';
    include '../includes/utils.php';

    if(checkToken($_SESSION["token"]) == null)
    {
        header("Location: ../index.php");
    }else if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id = decode($_POST["url"]);
        $column = $_POST["column"];
        $value = $_POST["value"];
        
        $result = updateUserInformation($id, $column, $value);
        if($result){
            http_response_code(200); // Set a 200 OK Request status code
            header("Content-Type: application/json");
            echo json_encode(["message" => "User Updated successful"]);
        }else{
            http_response_code(400); // Set a 400 OK Request status code
            header("Content-Type: application/json");
            echo json_encode(["message" => "User Data Cannot be Updated"]);
        }
    }
?>