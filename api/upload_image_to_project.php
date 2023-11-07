<?php
include '../includes/db_functions.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $projectId = isset($_POST["projectId"]) ? intval($_POST["projectId"]) : null;

    if ($projectId === null) {
        http_response_code(400); // Bad Request status
        echo json_encode(["message" => "Project ID is missing"]);
        exit;
    }

    if (isset($_FILES['projectPhoto']) && $_FILES['projectPhoto']['error'] === UPLOAD_ERR_OK) {
        $tempFile = $_FILES['projectPhoto']['tmp_name'];

        // Get the current date in the format YYYY-MM-DD
        $currentDate = date('Y-m-d');

        // Set the upload directory to the "uploads" folder
        $uploadDir = '../uploads/';

        // Create the full path to the folder with the current date
        $currentDateFolder = $uploadDir . $currentDate . '/';

        // If the folder with the current date doesn't exist, create it
        if (!file_exists($currentDateFolder)) {
            mkdir($currentDateFolder, 0777, true);
        }

        // Generate a unique UUID for the new file name
        $uniqueID = uniqid();
        $uniqueFileName = $uniqueID . '.' . pathinfo($_FILES['projectPhoto']['name'], PATHINFO_EXTENSION);

        $uploadFile = $currentDateFolder . $uniqueFileName;

        $user = checkToken($_SESSION["token"])["user"];
        $imageUrl = "http://localhost/mhtt-dashboard-responsive-designs/uploads/" . $currentDate . '/' . $uniqueFileName;

        if (move_uploaded_file($tempFile, $uploadFile)) {
            $result = addImage($user, $imageUrl);

            if ($result) {
                $imageId = getImageByURL($imageUrl)['id'];
                $result = addProjectToPhoto($projectId, $imageId);
                if(is_bool($result) && $result === true){
                    http_response_code(200); // Set a 200 OK Request status code
                    header("Content-Type: application/json");
                    echo json_encode(["message" => "✅ Photo Added in a Project"]);
                    exit();
                }else{
                    http_response_code(400); // Set a 200 OK Request status code
                    header("Content-Type: application/json");
                    echo json_encode(["message" => $result]);
                }
            } else {
                http_response_code(500); // Internal Server Error status
                header("Content-Type: application/json");
                echo json_encode(["message" => "Failed to add image to the database"]);
            }
        } else {
            http_response_code(400); // Bad Request status
            header("Content-Type: application/json");
            echo json_encode(["message" => "File not uploaded"]);
        }
    } else {
        http_response_code(400); // Bad Request status
        header("Content-Type: application/json");
        echo json_encode(["message" => "No valid file uploaded"]);
    }
} else {
    http_response_code(405); // Method Not Allowed status
}
?>