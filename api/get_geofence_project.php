<?php

include '../includes/db_functions.php';
include '../includes/utils.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $projectId = $_GET["projectId"];
    $geofence = getGeofence($projectId);
    if ($geofence == null) {
        http_response_code(400); // Set a 400
        header("Content-Type: application/json");
        echo json_encode(["message" => "No Geofence Found"]);
        exit();
    }
    http_response_code(200);
    header("Content-Type: application/json");
    echo json_encode(["geofence" => convert_multipoints_text_point($geofence['marks'])]);
} else {
    http_response_code(500); // Set a 500 
    header("Content-Type: application/json");
    echo json_encode(["message" => "Internal Server Error"]);
}
?>