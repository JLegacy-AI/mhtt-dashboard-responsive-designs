<?php
    include '../includes/db_functions.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $usernameEmail = $_POST["usernameEmail"];
        $usernameEmail = '%' . $usernameEmail . '%';
        $result = searchUser($usernameEmail);
        if($result){
            http_response_code(200); // Set a 200 OK Request status code
            header("Content-Type: application/json");
            echo json_encode(["message" => "User Found", "user" => $result]);
        }else{
            http_response_code(200); // Set a 200 OK Request status code
            header("Content-Type: application/json");
            echo json_encode(["message" => "User Not Found", "user" => []]);
        }
    }else{
        http_response_code(500); // Set a 500 OK Request status code
        header("Content-Type: application/json");
        echo json_encode(["message" => "Unexpected Server Error"]);
    }
?>