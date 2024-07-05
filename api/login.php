<?php
session_start();
header('Content-Type: application/json');
include "../db/connection.php"; // Include your database connection if needed

// Allow from any origin (for testing purposes; restrict in production as needed)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

// Read and decode the request payload
$requestPayload = json_decode(file_get_contents('php://input'), true);

// Validate the required fields for login
if (isset($requestPayload['email']) && isset($requestPayload['password'])) {
    // Construct the login API URL with encoded email and password
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

    // Decode the JSON response body
    $data = json_decode($body, true);

    // Check if login was successful
    if (isset($data['success']) && $data['success']) {
        // Set session variables
        $_SESSION['user_logged_in'] = true;
        $_SESSION['user_name'] = $data['user']['name']; // Assuming the API returns a user object with a name field
        $_SESSION['user_id'] = $data['user']['user_id']; // Adjust based on API response structure

        // Return success response with user data
        echo json_encode(['success' => true, 'user' => $data['user']]);
    } else {
        // Return error message for invalid credentials
        echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
    }
} else {
    // Return error for invalid login request (missing fields)
    http_response_code(400);
    echo json_encode(["error" => "Invalid login request"]);
    exit;
}