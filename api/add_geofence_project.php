<?php
include "../includes/db_functions.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $projectId = $_POST["projectId"];
    $geofence = $_POST["geofence"];

    $result = addGeofence($projectId, $geofence);
    if ($result) {
        http_response_code(200); // Set a 200 
        header("Content-Type: application/json");
        echo json_encode(["message" => "Geofence Added successfully"]);
    } else {
        http_response_code(400); // Set a 400
        header("Content-Type: application/json");
        echo json_encode(["message" => "Something went Wrong"]);
    }

} else {
    http_response_code(500); // Set a 500 
    header("Content-Type: application/json");
    echo json_encode(["message" => "Internal Server Error"]);
}

?>