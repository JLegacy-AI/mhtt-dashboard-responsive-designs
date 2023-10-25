<?php

include '../includes/db_functions.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = checkLogin($username, $password);

    if ($user) {
        $tokens = getTokens($user["id"]);
        // Successful login
        http_response_code(200); // Set a 200 OK Request status code
        header("Content-Type: application/json");
        echo json_encode(["message" => "Login successful", "token" => ["token" => $tokens ]]);
    } else {
        // Invalid login
        http_response_code(400); // Set a 400 BAD Request status code
        header("Content-Type: application/json");
        echo json_encode(["message" => "Invalid Login Data"]);
    }
}

?>