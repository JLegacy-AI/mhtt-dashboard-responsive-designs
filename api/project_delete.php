<?php
    include '../includes/utils.php';
    include '../includes/db_functions.php';
    if (session_status() == PHP_SESSION_NONE)
        session_start();
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $encodedID = str_replace(' ', '+', $_POST["pid"]);
        $pid = decode($encodedID);
        if(deleteProject($pid)){
            http_response_code(200); // Set a 200 OK Request status code
            header("Content-Type: application/json");
            echo json_encode(["message" => "Project Deleted successful"]);
        }else{
            http_response_code(400); // Set a 400 OK Request status code
            header("Content-Type: application/json");
            echo json_encode(["message" => "Project Data Cannot be Deleted"]);
        }
    }
?>