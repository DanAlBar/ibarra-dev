<?php
// Get POST data
$company_name = $_POST['name'];
$city = $_POST['city'];
$website_url = $_POST['url'];
$map_pack = $_POST['map_pack'];
$services = $_POST['services'];

// OPTIONAL: Save to your MySQL database
/*
include 'db_connection.php'; // Your DB connection file
$stmt = $conn->prepare("INSERT INTO leads (company_name, city, website_url, map_pack) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $company_name, $city, $website_url, $map_pack);
$stmt->execute();
*/

// Split city and state
$city_parts = explode(',', $city);
$city_only = trim($city_parts[0]);
$state_only = isset($city_parts[1]) ? trim($city_parts[1]) : '';

// Extract domain from URL
$parsed_url = parse_url($website_url);
$host = isset($parsed_url['host']) ? $parsed_url['host'] : '';

// If the user submits without scheme (like just "company.com"), fix it
if (!$host && !str_contains($website_url, '://')) {
    $website_url = 'http://' . $website_url;
    $parsed_url = parse_url($website_url);
    $host = isset($parsed_url['host']) ? $parsed_url['host'] : '';
}

// Send to Pipedream webhook
$webhook_url = "https://eo3a6yscpv2trts.m.pipedream.net"; // Replace with your actual URL

$data = [
    "Client URL" => $website_url,
    "Company Name" => $company_name,
    "Location" => $city,
    "Services" => $services,
    "Map Pack" => $map_pack,
    "City" => $city_only,
    "State" => $state_only,
    "Run Auto" => $city,
    "Website" => $host
];

// Use file_get_contents (or switch to cURL if needed)
$options = [
    'http' => [
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data)
    ]
];

$context  = stream_context_create($options);
$result = file_get_contents($webhook_url, false, $context);

if ($result === FALSE) {
    echo "Error sending to automation.";
} else {
    echo "Submission successful! ✅";
}

echo "Form received!";
?>
https://eovov5ljn1z423e.m.pipedream.net
