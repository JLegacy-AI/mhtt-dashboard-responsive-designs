<?php
include 'db_connection.php';
// include 'utils.php';

// Function to insert a user into the database
function insertUser($email, $password, $username, $firstname, $lastname, $phonenumber) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO Users (email, password, username, firstname, lastname, phonenumber) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $email, $password, $username, $firstname, $lastname, $phonenumber);

    if ($stmt->execute()) {
        $stmt->close();
        return true; // User insertion successful
    } else {
        $stmt->close();
        return false; // User insertion failed
    }
}

// Function to check if an email is already registered
function isEmailAlreadyRegistered($email) {
    global $conn;
    $stmt = $conn->prepare("SELECT email FROM Users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $count = $stmt->num_rows;
    $stmt->close();
    return $count > 0; // Returns true if email is already registered
}


// Function to check if a username is already registered
function isUsernameAlreadyRegistered($username) {
    global $conn;
    $stmt = $conn->prepare("SELECT username FROM Users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $count = $stmt->num_rows;
    $stmt->close();
    return $count > 0; // Returns true if username is already registered
}

// Function to check login credentials using the global $conn variable
function checkLogin($username, $password) {
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM Users WHERE (username = ? OR email = ?) AND password = ?");
    $stmt->bind_param("sss", $username,$username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
    return $user; // Returns user data if login is valid, otherwise returns null
}

function getTokens($userId){
    global $conn;
    //Token Configuration
    if(checkUserToken($userId)){
        // Delete all tokens for this user
        $stmt = $conn->prepare("DELETE FROM Tokens WHERE user = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->close();
    }
    //Generate New Token
    $token = bin2hex(random_bytes(16)); // Generates a 32-character hexadecimal token
    $stmt = $conn->prepare("INSERT INTO Tokens (token, user) VALUES (?, ?)");
    $stmt->bind_param("si", $token, $userId);
    $stmt->execute();
    $stmt->close();
    return $token;
}

function checkToken($token){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM Tokens WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    $token = $result->fetch_assoc();
    $stmt->close();
    return $token;
}

function checkUserToken($userId){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM Tokens WHERE user = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $token = $result->fetch_assoc();
    $stmt->close();
    return $token;
}


function addProject($projectName, $addressOne, $addressTwo, $state, $city, $postalCode, $userId){
    global $conn;
    $stmt = $conn->prepare("INSERT INTO Projects (name, addressOne, addressTwo, state, city, postalCode, user) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssii", $projectName, $addressOne, $addressTwo, $state, $city, $postalCode, $userId);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}

function countProjectPhotos($id){
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) as count FROM `Project Photos` WHERE project = ?");
    $stmt->bind_param("i", $project['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->fetch_assoc();
    return $count['count'];
}

function countProjectUsers($id){
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) as count FROM `Project Users` WHERE project = ?");
    $stmt->bind_param("i", $project['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->fetch_assoc();
    return $count['count'];
}

function getProjects($id){
   global $conn;
    $stmt = $conn->prepare("SELECT * FROM Projects WHERE user = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $projects = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    
    foreach($projects as &$project){
        // Count Photos
        $project['photos'] = countProjectPhotos($project['id']);
    
        // Count Users
        $project['users'] = countProjectUsers($project['id']);
    }
    

    return $projects;
}

function getUserByID($id){
    global $conn;
    $stmt = $conn->prepare("SELECT firstName, lastName, username, email, phoneNumber FROM Users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
    return $user;
}

function updateUserInformation($id, $column, $value){
    global $conn;
    $stmt = $conn->prepare("UPDATE Users SET $column = ? WHERE id = ?");
    $stmt->bind_param("si", $value, $id);
    if ($stmt->execute()) {
        $stmt->close();
        return true; // Project insertion successful
    } else {
        $stmt->close();
        return false; // Project insertion failed
    }
}


function getProjectByID($id){
    global $conn;
    $stmt = $conn->prepare("SELECT id,name, addressOne, addressTwo, city, state, postalCode, user FROM Projects WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $project = $result->fetch_assoc();
    $stmt->close();
    return $project;
}

function deleteProject($id){
    global $conn;
    $stmt = $conn->prepare("DELETE FROM Projects WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $stmt->close();
        return true; // Project insertion successful
    } else {
        $stmt->close();
        return false; // Project insertion failed
    }
}

function sendInvitation($projectId, $id){
    global $conn;
    $stmt = $conn->prepare("INSERT INTO `project users` (project, user) VALUES (?, ?);");
    $stmt->bind_param("ii", $projectId, $id);

    try {
        if ($stmt->execute()) {
            $stmt->close();
            return true; // Return true on success
        } else {
            $stmt->close();
            return "Some Unexpected Error Occur"; // Return false on failure
        }
    } catch (Exception $e) {
        return $e->getMessage(); // Return the error message for duplicate key violation
    }
}

function searchUser($usernameEmail){
    global $conn;
    $stmt = $conn->prepare("SELECT username, firstName, lastName FROM Users WHERE username LIKE ? OR email LIKE ?");
    $stmt->bind_param("ss", $usernameEmail, $usernameEmail);
    $stmt->execute();
    $result = $stmt->get_result();
    $users = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $users;
}

function getUserByUsername($username){
    global $conn;
    $stmt = $conn->prepare("SELECT id, username, firstName, lastName FROM Users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
    return $user;
}

function getProjectUsers($id){
    global $conn;
    $stmt = $conn->prepare("SELECT id, CONCAT(firstName,' ',lastName) as fullName, email, phoneNumber, lastActivity FROM `Users` INNER JOIN `Project Users` ON  `Users`.id = `Project Users`.user WHERE project = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $users = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $users;
}

function deleteProjectUser($projectId, $userId){
    global $conn;
    $stmt = $conn->prepare("DELETE FROM `Project Users` WHERE project = ? AND user = ?");
    $stmt->bind_param("ii", $projectId, $userId);
    if ($stmt->execute()) {
        $stmt->close();
        return true; // Project deletion successful
    } else {
        $stmt->close();
        return false; // Project deletion failed
    }
}

function addImage( $userId, $url){
    global $conn;
    $stmt = $conn->prepare("INSERT INTO Photos ( user, url) VALUES (?, ?)");
    $stmt->bind_param("is", $userId, $url);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}

function getImages($userId){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM Photos WHERE user = ? ORDER BY created DESC;");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $images = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $images;
}

function deleteImage($imageId){
    global $conn;
    $stmt = $conn->prepare("DELETE FROM Photos WHERE id = ?");
    $stmt->bind_param("i", $imageId);
    if ($stmt->execute()) {
        $stmt->close();
        return true; 
    } else {
        $stmt->close();
        return false; 
    }
}



function getImageById($imageId){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM Photos WHERE id = ? LIMIT 1");
    $stmt->bind_param("i", $imageId);
    $stmt->execute();
    $result = $stmt->get_result();
    $image = $result->fetch_assoc();
    $stmt->close();
    return $image;
}

function getImageByURL($imageUrl){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM Photos WHERE url = ? LIMIT 1");
    $stmt->bind_param("s", $imageUrl);
    $stmt->execute();
    $result = $stmt->get_result();
    $image = $result->fetch_assoc();
    $stmt->close();
    return $image;
}


function searchTags($tags){
    global $conn;
    $stmt = $conn->prepare("SELECT DISTINCT Tag FROM Tags WHERE tag LIKE ? LIMIT 10");
    $stmt->bind_param("s", $tags);
    $stmt->execute();
    $result = $stmt->get_result();
    $result = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $result;
}


function searchProject($projectNameID, $userId){
    global $conn;
    $stmt = $conn->prepare('SELECT * FROM (
        SELECT P.id, P.name, P.state, P.city, P.postalCode FROM Projects AS P
        INNER JOIN `Project Users` AS U ON P.id = U.project
        WHERE U.user = ? AND P.name LIKE ?
        
        UNION
        
        SELECT id, name, state, city, postalCode FROM `projects`
        WHERE user = ? AND name LIKE ?
    ) AS combined_result;');
    $stmt->bind_param("isis",$userId, $projectNameID, $userId, $projectNameID);
    $stmt->execute();
    $result = $stmt->get_result();
    $result = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $result;
}

function addProjectToPhoto($projectId, $photoId){
    global $conn;
    $stmt = $conn->prepare("INSERT INTO `Project Photos` ( photo, project) VALUES (?, ?)");
    $stmt->bind_param("ii", $photoId, $projectId);
    try {
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return "☠️ Unexpected Error Occur";
        }
    } catch (Exception $e) {
        return "🚫 Project Already Added"; 
    }
}

function addTagToPhoto($tag, $photoId){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM Tags WHERE tag = ? AND photo = ?");
    $stmt->bind_param("si", $tag, $photoId);
    $stmt->execute();
    $result = $stmt->get_result();
    $result = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    if(count($result) > 0){
        return "🚫 Tag Already Added";
    } else {
        $stmt = $conn->prepare("INSERT INTO `Tags` ( tag, photo) VALUES (?, ?)");
        $stmt->bind_param("si", $tag, $photoId);
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }
}

function getProjectsByPhotoId($photoId){
    global $conn;
    $stmt = $conn->prepare("SELECT P.id, P.name, P.addressOne, P.addressTwo, P.state, P.city, P.postalCode, P.lastActivity FROM Projects AS P
        INNER JOIN `Project Photos` AS U ON P.id = U.project
        WHERE U.photo = ?");
    $stmt->bind_param("i", $photoId);
    $stmt->execute();
    $result = $stmt->get_result();
    $result = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $result;
}

function getTagsByPhotoId($photoId){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM Tags WHERE photo = ?");
    $stmt->bind_param("i", $photoId);
    $stmt->execute();
    $result = $stmt->get_result();
    $result = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $result;
}


function deletePhotoTag($tag, $photoId){
    global $conn;
    $stmt = $conn->prepare("DELETE FROM Tags WHERE tag = ? AND photo = ?");
    $stmt->bind_param("si", $tag, $photoId);
    if ($stmt->execute()) {
        $stmt->close();
        return true; 
    } else {
        $stmt->close();
        return false; 
    }
}

function deletePhotoFromProject($projectId, $photoId){
    global $conn;
    $stmt = $conn->prepare("DELETE FROM `Project Photos` WHERE project = ? AND photo = ?");
    $stmt->bind_param("ii", $projectId, $photoId);
    if ($stmt->execute()) {
        $stmt->close();
        return true; 
    } else {
        $stmt->close();
        return false; 
    }
}

function getProjectImages($projectId){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM Photos WHERE id IN (SELECT photo FROM `Project Photos` WHERE project = ?) ORDER BY created DESC");
    $stmt->bind_param("i", $projectId);
    $stmt->execute();
    $result = $stmt->get_result();
    $images = array();

    while ($row = $result->fetch_assoc()) {
        $created = date("Y-m-d", strtotime($row["created"]));

        if (!isset($images[$created])) {
            $images[$created] = array();
        }

        $images[$created][] = $row;
    }

    $stmt->close();
    return $images;
}

function addPhotoDescription($photoId, $description){
    global $conn;
    $stmt = $conn->prepare("UPDATE Photos SET description = ? WHERE id = ?");
    $stmt->bind_param("si", $description, $photoId);
    if ($stmt->execute()) {
        $stmt->close();
        return true; 
    } else {
        $stmt->close();
        return false; 
    }
}


function getProjectOneImage($projectId){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM Photos WHERE id IN (SELECT photo FROM `Project Photos` WHERE project = ?) LIMIT 1;");
    $stmt->bind_param("i", $projectId);
    $stmt->execute();
    $result = $stmt->get_result();
    $images = $result->fetch_assoc();
    $stmt->close();
    return $images;
}

function getProjectImagesCount($projectId){
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) as count FROM Photos WHERE id IN (SELECT photo FROM `Project Photos` WHERE project = ?);");
    $stmt->bind_param("i", $projectId);
    $stmt->execute();
    $result = $stmt->get_result();
    $images = $result->fetch_assoc();
    $stmt->close();
    return $images;
}

function getProjectUserCount($projectId){
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) as count FROM `Project Users` WHERE project = ?;");
    $stmt->bind_param("i", $projectId);
    $stmt->execute();
    $result = $stmt->get_result();
    $images = $result->fetch_assoc();
    $stmt->close();
    return $images;
}

function getUsersFromProjects($userId){
    global $conn;
    $stmt = $conn -> prepare("SELECT * FROM `Users` WHERE id IN (SELECT user FROM `Project Users` WHERE project IN (SELECT project FROM `Project Users` WHERE user = ?))");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $users = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $users;
}

?>