<?php
header('Content-Type: application/json');

$user_id = 496;
$current_time = '14:30:00';
$page = 1;
$limit = 10;
$api_url = "https://edevz.com/recipe/get_cm_choice.php?user_id=$user_id&currentTime=$current_time&page=$page&limit=$limit";

$response = file_get_contents($api_url);
echo $response;