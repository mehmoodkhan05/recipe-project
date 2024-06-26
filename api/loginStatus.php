<?php
session_start();
header('Content-Type: application/json');

if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']) {
    echo json_encode([
        'logged_in' => true,
        'name' => $_SESSION['name']
    ]);
} else {
    echo json_encode(['logged_in' => false]);
}