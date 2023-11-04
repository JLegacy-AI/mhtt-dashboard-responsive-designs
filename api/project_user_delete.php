<?php
    include '../includes/utils.php';
    include '../includes/db_functions.php';
    if (session_status() == PHP_SESSION_NONE)
        session_start();
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $pid = $_POST["pid"];
        $uid = $_POST["uid"];

        if(deleteProjectUser($pid, $uid)){
            http_response_code(200); // Set a 200 OK Request status code
            header("Content-Type: application/json");
            echo json_encode(["message" => "Project User Deleted successful"]);
        }else{
            http_response_code(400); // Set a 400 Bad Request status code
            header("Content-Type: application/json");
            echo json_encode(["message" => "Project User Data Cannot be Deleted"]);
        }
    }else{
        http_response_code(500); // Set a 500 Internal Server Error Request status code
        header("Content-Type: application/json");
        echo json_encode(["message" => "Unexpected Server Error"]);
    }
?>