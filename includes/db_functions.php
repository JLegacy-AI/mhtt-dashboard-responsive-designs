<?php
include 'db_connection.php';

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


function addProject($projectName, $addressOne, $addressTwo, $state, $city, $country, $postalCode, $userId){
    global $conn;
    $stmt = $conn->prepare("INSERT INTO Projects (name, addressOne, addressTwo, state, city, country, postalCode, user) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssi", $projectName, $addressOne, $addressTwo, $state, $city, $country, $postalCode, $userId);
    if ($stmt->execute()) {
        $stmt->close();
        return true; // Project insertion successful
    } else {
        $stmt->close();
        return false; // Project insertion failed
    }
}



?>