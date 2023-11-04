<?php
    
    include '../includes/db_functions.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if ($_FILES['projectImage']['error'] === UPLOAD_ERR_OK) {
      
        $tempFile = $_FILES['projectImage']['tmp_name'];
    
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
        $uniqueFileName =  $uniqueID. '.' . pathinfo($_FILES['projectImage']['name'], PATHINFO_EXTENSION);
    
        $uploadFile = $currentDateFolder . $uniqueFileName;
        
        $user = checkToken($_SESSION["token"])["user"];
        $imageUrl = "http://localhost/mhtt-dashboard-responsive-designs/uploads/".$currentDate.'/'.$uniqueFileName;
        $isImageAdded = addImage($user , $imageUrl);
        if($isImageAdded){
            if (move_uploaded_file($tempFile, $uploadFile)) {
                http_response_code(200); // Set a 200 OK status code
                header("Content-Type: application/json");
                echo json_encode(["message" => "File uploaded successfully"]);
            } else {
                http_response_code(400); // Set a 400 Bad Request status code
                header("Content-Type: application/json");
                echo json_encode(["message" => "File not uploaded"]);
            }
        }else{
            header("Location: ../../../index.php");
            exit();
        }        
    } else {
        http_response_code(500); // Set a 500 Internal Server Error status code
        header("Content-Type: application/json");
        echo json_encode(["message" => "Unexpected error occurred"]);
    }
    
?>
