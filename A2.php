<?php
$URL = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";
$response = file_get_contents($URL);
$result = json_decode($response, true);

if ($response === FALSE) {
    die("Error retrieving data from API");
}


if (json_last_error() !== JSON_ERROR_NONE) {
    die("Error decoding JSON data");
}

$students = $result['records'];
?>