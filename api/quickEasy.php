<?php
header('Content-Type: application/json');

$user_id = 496;
$page = 1;
$limit = 10;

$api_url = "https://edevz.com/recipe/get_quick_recipes.php?user_id=$user_id&page=$page&limit=$limit";
$response = file_get_contents($api_url);
echo $response;