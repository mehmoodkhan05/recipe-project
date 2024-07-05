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

// Validate request method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Parse incoming JSON data
$data = json_decode(file_get_contents('php://input'), true);

// Ensure required data is present
if (!isset($data['recipe_id']) || empty($data['recipe_id'])) {
    echo json_encode(['success' => false, 'message' => 'Recipe ID is required']);
    exit;
}

// Prepare API endpoint
$api_url = "https://edevz.com/recipe/unlike_recipe.php";

// Set up options for API request
$options = [
    'http' => [
        'header' => "Content-Type: application/json\r\n",
        'method' => 'POST',
        'content' => json_encode(['recipe_id' => $data['recipe_id'], 'user_id' => $userId]),
    ],
];

// Create a stream context
$context = stream_context_create($options);

// Send request to unlike recipe
$response = file_get_contents($api_url, false, $context);

// Check if request was successful
if ($response === false) {
    echo json_encode(['success' => false, 'message' => 'Failed to unlike recipe']);
    exit;
}

// Output the response from the API
echo $response;