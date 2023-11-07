<?php
    include '../includes/db_functions.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $photoId = intval($_POST["photoId"]);
        $description = $_POST["description"];
        $result = addPhotoDescription($photoId, $description);
        if($result){
            http_response_code(200);
            header("Content-Type: application/json");
            echo json_encode(["message" => "✅ Description Added"]);
        }else{
            http_response_code(400);
            header("Content-Type: application/json");
            echo json_encode(["message" => "🚫 Description Cannot be Added"]);
        }
    }else{
        http_response_code(500);
        header("Content-Type: application/json");
        echo json_encode(["message" => "Internal Server Error"]);
    }


?>