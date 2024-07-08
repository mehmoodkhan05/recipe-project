<?php
session_start();
header('Content-Type: application/json');

// Check if the user is logged in by verifying the session variables
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
    echo json_encode([
        'logged_in' => true,
        'user_name' => $_SESSION['user_name'],
        'user_id' => $_SESSION['user_id']
    ]);
} else {
    echo json_encode(['logged_in' => false]);
}