<?php
header('Content-Type: application/json');
$api_url = 'https://edevz.com/recipe/get_blogs.php';
$response = file_get_contents($api_url);
echo $response;