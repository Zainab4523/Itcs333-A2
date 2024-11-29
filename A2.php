<?php
// Fetching data from the API
$url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";
$response = file_get_contents($url);

if ($response === false) {
    die('Error fetching data');
}

$result = json_decode($response, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    die('Error decoding JSON: ' . json_last_error_msg());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Enrollment Data</title>
    <link rel="stylesheet" href="pico-main/css/pico.min.css">
</head>
<body>

<h2>Students Enrollment Data</h2>
<div class="overflow-auto">
<table>
    <thead>
        <tr>
            <th>Year</th>
            <th>Semester</th>
            <th>The Programs</th>
            <th>Nationality</th>
            <th>Colleges</th>
            <th>Number of Students</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($result['results'] as $record): ?>
        <tr>
            <td><?php echo htmlspecialchars($record['year']); ?></td>
            <td><?php echo htmlspecialchars($record['semester']); ?></td>
            <td><?php echo htmlspecialchars($record['the_programs']); ?></td>
            <td><?php echo htmlspecialchars($record['nationality']); ?></td>
            <td><?php echo htmlspecialchars($record['colleges']); ?></td>
            <td><?php echo htmlspecialchars($record['number_of_students']); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</body>
</html>