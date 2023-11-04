<?php
    include '../includes/db_functions.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $username = $_POST["username"];
        $projectId = intval($_POST["projectId"]);
        $user  = getUserByID(checkToken($_SESSION["token"])["user"]);
        
        if($user['username'] == $username){
            http_response_code(400); // Set a 200 OK Request status code
            header("Content-Type: application/json");
            echo json_encode(["message" => "You cannot add yourself"]);
            exit();
        }
        $user = getUserByUsername($username);
        if(!$user){
            http_response_code(400); // Set a 200 OK Request status code
            header("Content-Type: application/json");
            echo json_encode(["message" => "User Not Found"]);
            exit();
        }
        $userid = $user["id"];
        $result = sendInvitation( $projectId, $userid);
        if(is_bool($result) && $result == true){
            http_response_code(200); // Set a 200 OK Request status code
            header("Content-Type: application/json");
            echo json_encode(["message" => "User Added in a Project"]);
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