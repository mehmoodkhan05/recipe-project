<?php
header('Content-Type: application/json');
$apiUrl = 'https://edevz.com/recipe/get_desserts_recipes.php?user_id=1&page=1&limit=10';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

echo $response;