<?php
include "../db/connection.php"; // Assuming this includes your database connection

// Allow from any origin
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

// Read and decode the request payload
$requestPayload = json_decode(file_get_contents('php://input'), true);

// Validate the required fields for signup
if (isset($requestPayload['email']) && isset($requestPayload['phoneNumber']) && isset($requestPayload['password']) && isset($requestPayload['cpassword'])) {
    $url = 'https://edevz.com/recipe/signup_with_email.php';

    // Initialize cURL session
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestPayload));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

    // Execute cURL session
    $response = curl_exec($ch);

    // Split the response into headers and body
    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($response, 0, $header_size);
    $body = substr($response, $header_size);

    // Close cURL session
    curl_close($ch);

    // Forward the response headers
    foreach (explode("\r\n", $header) as $header_line) {
        if (strpos($header_line, 'HTTP/') === 0)
            continue;
        header($header_line);
    }

    // Output the response body
    echo $body;
} else {
    http_response_code(400);
    echo json_encode(["error" => "Invalid signup request"]);
    exit;
}