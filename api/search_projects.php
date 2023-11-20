<?php
include '../includes/db_functions.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ProjectNameID = $_POST["ProjectNameID"];
    $ProjectNameID = '%' . $ProjectNameID . '%';
    $userID = checkToken($_SESSION["token"])['user'];
    $result = searchProject($ProjectNameID, $userID);
    if ($result) {
        http_response_code(200); // Set a 200 OK Request status code
        header("Content-Type: application/json");
        echo json_encode(["message" => "Projects Found", "projects" => $result]);
    } else {
        http_response_code(200); // Set a 200 OK Request status code
        header("Content-Type: application/json");
        echo json_encode(["message" => "Projects Not Found", "projects" => []]);
    }
} else {
    http_response_code(500); // Set a 500 OK Request status code
    header("Content-Type: application/json");
    echo json_encode(["message" => "Unexpected Server Error"]);
}
?>