<?php

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Get the image data from the POST request
        $imageData = $_POST['image'];
        $imageUrl = $_POST['imageUrl'];
        $urlParts = explode("uploads/", $imageUrl);
        $folderName = end($urlParts);

        // Remove the data URI prefix and decode the base64-encoded image data
        $imageData = str_replace('data:image/png;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
        $imageBinary = base64_decode($imageData);

        if ($imageBinary !== false) {
            // Define the path where you want to save the image
            $imagePath = '../uploads/'.$folderName; // Change this to your desired directory
        
            // Save the image to the specified path
            if (file_put_contents($imagePath, $imageBinary) !== false) {

                http_response_code(200); // Set a 200 OK Request status code
                header("Content-Type: application/json");
                echo json_encode(["message" => "Photo Updated successfully."]);
            } else {
                http_response_code(400);
                header("Content-Type: application/json");
                echo json_encode(["message" => "Photo Updation Failed."]);
            }
        } else {
            http_response_code(400);
            header("Content-Type: application/json");
            echo json_encode(["message" => "Unexpected Failure."]);
        }
    } else {
        http_response_code(500);
        header("Content-Type: application/json");
        echo json_encode(["message" => "Internal Server Failure."]);
    }
?>
