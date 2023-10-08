<?php
include 'db_connection.php';

// Function to insert a user into the database
function insertUser($email, $password, $username, $firstname, $lastname, $phonenumber) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO users (email, password, username, firstname, lastname, phonenumber) VALUES (?, ?, ?, ?, ?, ?)");
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
    $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
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
    $stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
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

    $stmt = $conn->prepare("SELECT * FROM users WHERE (username = ? OR email = ?) AND password = ?");
    $stmt->bind_param("sss", $username,$username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
    return $user; // Returns user data if login is valid, otherwise returns null
}



?>