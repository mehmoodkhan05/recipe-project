<?php
session_start();
header('Content-Type: application/json');
include "../db/connection.php"; // Assuming this includes your database connection

// Allow from any origin
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    exit(0);
}

// Read and decode the request payload
$requestPayload = json_decode(file_get_contents('php://input'), true);

// Validate the required fields for login
if (isset($requestPayload['email']) && isset($requestPayload['password'])) {
    $url = 'https://edevz.com/recipe/login.php?email=' . urlencode($requestPayload['email']) . '&password=' . urlencode($requestPayload['password']);

    // Initialize cURL session
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);

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
    echo json_encode(["error" => "Invalid login request"]);
    exit;
}