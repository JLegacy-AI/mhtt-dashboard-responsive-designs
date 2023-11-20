<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
function convertTime($inputDate)
{
    $timestamp = strtotime($inputDate);
    $outputDate = date('M j, g:i A', $timestamp);
    return $outputDate;
}
function encode($data)
{
    $secretKey = $_SESSION['token'];

    // Generate a 16-byte IV
    $iv = openssl_random_pseudo_bytes(16);

    // Encrypt the data with the correct IV
    $encryptedData = openssl_encrypt($data, 'aes-256-cbc', $secretKey, 0, $iv);

    // Encode the IV and ciphertext as a single string
    $encodedData = base64_encode($iv . $encryptedData);

    return $encodedData;
}

function decode($data)
{
    $data = str_replace(' ', '+', $data);
    $secretKey = $_SESSION['token'];

    // Decode the data and separate IV from ciphertext
    $decodedData = base64_decode($data);

    // Extract the IV (first 16 bytes)
    $iv = substr($decodedData, 0, 16);

    // Extract the ciphertext (the rest of the data)
    $ciphertext = substr($decodedData, 16);

    // Decrypt the data using the IV
    $decryptedData = openssl_decrypt($ciphertext, 'aes-256-cbc', $secretKey, 0, $iv);

    return $decryptedData;
}

?>