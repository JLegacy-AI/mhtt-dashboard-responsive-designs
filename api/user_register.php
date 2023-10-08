<?php
include '../includes/db_functions.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $username = $_POST["username"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $phonenumber = $_POST["phonenumber"];

    // Check if email is already registered
    if (isEmailAlreadyRegistered($email)) {
        http_response_code(400); // Set a 400 Bad Request status code
        header("Content-Type: application/json");
        echo json_encode(["message" => "Email is already registered"]);
    } else if (isUsernameAlreadyRegistered($username)) {
        // Check if username is already registered
        // Set a 400 Bad Request status code
        http_response_code(400); 
        header("Content-Type: application/json");
        echo json_encode(["message" => "Username is already registered"]);
    } else {
        // Insert the user into the database (your existing code)
        $result = insertUser($email, $password, $username, $firstname, $lastname, $phonenumber);

        if ($result) {
            // Set a 200 OK status code
            http_response_code(200); 
            header("Content-Type: application/json");
            echo json_encode(["message" => "User registration successful"]);
        } else {
            http_response_code(500); // Set a 500 Internal Server Error status code
            header("Content-Type: application/json");
            echo json_encode(["message" => "User registration failed"]);
        }
    }
}


?>