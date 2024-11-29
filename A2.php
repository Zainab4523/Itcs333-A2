<?php
// Define the API endpoint
$url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

// Fetch the data from the API
$response = file_get_contents($url);

// Decode the JSON response into an associative array
$result = json_decode($response, true);

// Check if the data is retrieved successfully
if ($result && isset($result['results'])) {
    // Successfully retrieved data
    $data = $result['results'];
} else {
    echo "Failed to retrieve data.";
}
?>