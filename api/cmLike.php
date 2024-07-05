<?php
session_start();
header("Content-Type: application/json");

// Check if user is logged in
if (!isset($_SESSION['user_logged_in']) || !$_SESSION['user_logged_in']) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}

// Get user ID from session
$userId = $_SESSION['user_id']; // Assuming 'user_id' is set during login or session creation

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Get the raw POST data
$data = file_get_contents('php://input');

// Decode the JSON data
$request_data = json_decode($data, true);
if ($request_data === null) {
    echo json_encode(['success' => false, 'message' => 'Invalid JSON input']);
    exit;
}

// Add user_id to the request data
$request_data['user_id'] = $userId;
$data = json_encode($request_data);

// Log the request data for debugging
file_put_contents('php://stderr', print_r($request_data, true));

$api_url = "https://edevz.com/recipe/like_recipe.php";

$options = [
    'http' => [
        'header' => "Content-Type: application/json\r\n",
        'method' => 'POST',
        'content' => $data,
    ],
];

$context = stream_context_create($options);
$response = file_get_contents($api_url, false, $context);

if ($response === FALSE) {
    echo json_encode(['success' => false, 'message' => 'Failed to like recipe']);
    exit;
}

// Check if the response is valid JSON
$response_data = json_decode($response, true);
if ($response_data === null) {
    echo json_encode(['success' => false, 'message' => 'Invalid JSON response from API']);
    exit;
}

echo json_encode($response_data);