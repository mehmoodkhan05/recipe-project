<?php
header("Content-Type: application/json");
$api_url = "https://edevz.com/recipe/get_faq.php";
$faqs = file_get_contents($api_url);
echo $faqs;