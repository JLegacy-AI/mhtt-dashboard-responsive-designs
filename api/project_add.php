<?php
    include '../includes/db_functions.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $projectName = $_POST["projectName"];
        $addressOne = $_POST["addressOne"];
        $addressTwo = $_POST["addressTwo"];
        $state = $_POST["state"];
        $city = $_POST["city"];
        $postalCode = $_POST["postalCode"];
        $token = $_SESSION["token"];
        if($token){
            $user = checkToken($token)["user"];
            $result = addProject($projectName, $addressOne, $addressTwo, $state, $city, $postalCode, $user);
            if($result){
                http_response_code(200); // Set a 200 OK Request status code
                header("Content-Type: application/json");
                echo json_encode(["message" => "Project Added successful"]);
            }else{
                http_response_code(400); // Set a 400 OK Request status code
                header("Content-Type: application/json");
                echo json_encode(["message" => "Error Found"]);
            }
        }else{
            http_response_code(400); // Set a 400 OK Request status code
            header("Content-Type: application/json");
            echo json_encode(["message" => "Login Again"]);
        }
        
    }else{
        http_response_code(500); // Set a 500 OK Request status code
        header("Content-Type: application/json");
        echo json_encode(["message" => "Unexpected Server Error"]);
    }
?>