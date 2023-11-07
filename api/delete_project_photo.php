<?php
    include '../includes/db_functions.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $projectId = intval($_POST["projectId"]);
        $photoId = intval($_POST["photoId"]);
        
        $result = deletePhotoFromProject($projectId, $photoId);
        if($result){
            http_response_code(200); // Set a 200 OK Request status code
            header("Content-Type: application/json");
            echo json_encode(["message" => "✅ Photo Remove From Project"]);
            exit();
        }else{
            http_response_code(400); // Set a 200 OK Request status code
            header("Content-Type: application/json");
            echo json_encode(["message" => "🚫 Photo Can't Remove From Project"]);
        }
    }else{
        http_response_code(500); // Set a 500 OK Request status code
        header("Content-Type: application/json");
        echo json_encode(["message" => "Unexpected Server Error"]);
        exit();
    }
?>