<?php
session_start();
header('Content-Type: application/json');
include "../db/connection.php"; // Include your database connection if needed

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

// Validate the required fields for login
if (isset($_GET['email']) && isset($_GET['password'])) {
    $email = $_GET['email'];
    $password = $_GET['password'];

    // Construct the login API URL with encoded email and password
    $url = 'https://edevz.com/recipe/login.php?email=' . urlencode($email) . '&password=' . urlencode($password);

    // Initialize cURL session
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);

    // Execute cURL session
    $response = curl_exec($ch);

    // Check for cURL errors
    if ($response === false) {
        $error_msg = curl_error($ch);
        curl_close($ch);
        echo json_encode(['success' => false, 'message' => 'cURL error: ' . $error_msg]);
        exit;
    }

    // Split the response into headers and body
    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($response, 0, $header_size);
    $body = substr($response, $header_size);

    // Close cURL session
    curl_close($ch);

    // Debug: Log or output the raw response for debugging
    // error_log($response);
    // echo $response;

    // Decode the JSON response body
    $data = json_decode($body, true);

    // Check if JSON decoding was successful
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo json_encode(['success' => false, 'message' => 'JSON decode error: ' . json_last_error_msg()]);
        exit;
    }

    // Check if login was successful
    if (isset($data['success']) && $data['success']) {
        // Set session variables
        $_SESSION['user_logged_in'] = true;
        $_SESSION['user_name'] = $data['data']['name']; // Assuming the API returns a user object with a name field
        $_SESSION['user_id'] = $data['data']['user_id']; // Adjust based on API response structure

        // Return success response with user data
        echo json_encode(['success' => true, 'user' => $data['data']]);
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