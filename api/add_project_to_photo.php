<?php
    include '../includes/db_functions.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $projectId = intval($_POST["projectId"]);
        $photoId = intval($_POST["photoId"]);
        
        $result = addProjectToPhoto($projectId, $photoId);
        if(is_bool($result) && $result === true){
            http_response_code(200); // Set a 200 OK Request status code
            header("Content-Type: application/json");
            echo json_encode(["message" => "✅ Photo Added in a Project"]);
            exit();
        }else{
            http_response_code(400); // Set a 200 OK Request status code
            header("Content-Type: application/json");
            echo json_encode(["message" => $result]);
        }
    }else{
        http_response_code(500); // Set a 500 OK Request status code
        header("Content-Type: application/json");
        echo json_encode(["message" => "Unexpected Server Error"]);
        exit();
    }
?>