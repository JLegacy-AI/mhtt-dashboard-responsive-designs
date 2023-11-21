<?php

include '../includes/db_functions.php';
include '../includes/utils.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $projectId = $_POST["projectId"];
    $markers = getMarkersLocation($projectId);
    if ($markers == null) {
        http_response_code(400); // Set a 400
        header("Content-Type: application/json");
        echo json_encode(["message" => "No Markers Found"]);
        exit();
    }
    http_response_code(200);
    header("Content-Type: application/json");
    echo json_encode(["markers" => convert_multipoints_text_point($markers['marks'])]);
} else {
    http_response_code(500); // Set a 500 
    header("Content-Type: application/json");
    echo json_encode(["message" => "Internal Server Error"]);
}
?>