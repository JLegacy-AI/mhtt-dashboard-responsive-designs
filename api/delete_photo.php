<?php
    include '../includes/db_functions.php';
    include '../includes/utils.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $photoId = decode($_POST["photoId"]);
        
        if(deleteImage($photoId)){
            http_response_code(200); // Set a 200 OK Request status code
            header("Content-Type: application/json");
            echo json_encode(["message" => "Photo Deleted successful"]);
            exit();
        }else{
            http_response_code(400); // Set a 400 OK Request status code
            header("Content-Type: application/json");
            echo json_encode(["message" => "Photo Data Cannot be Deleted"]);
            exit();
        }

    }else{
        http_response_code(500); // Set a 500 OK Request status code
        header("Content-Type: application/json");
        echo json_encode(["message" => "Unexpected Server Error"]);
        exit();
    }
?>