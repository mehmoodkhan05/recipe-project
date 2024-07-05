<?php
session_start();
header("Content-Type: application/json");

if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']) {
    echo json_encode(['success' => true, 'user_id' => $_SESSION['user_id']]);
} else {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
}