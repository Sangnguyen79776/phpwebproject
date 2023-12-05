<?php
// Database connection
include '../connect/dbconnect.php';

// Fetch all ideas and their information from the database
$sql = "SELECT * FROM ideas";
$result = $con->query($sql);

// Create a CSV file
$csvfile = 'all_ideas_information.csv';
$fp = fopen($csvfile, 'w');

// Add headers to the CSV file
$headers = array('ID', 'Title', 'Explanation','category_id','ie_id');
fputcsv($fp, $headers);

// Add data to the CSV file
while ($row = $result->fetch_assoc()) {
  $data = array($row['id'], $row['title'], $row['explanation'],$row['category_id'],$row['ie_id']);
  fputcsv($fp, $data);
}

// Close the CSV file
fclose($fp);

// Prompt the user to download the CSV file
header('Content-Type: text/csv');
header('Content-disposition: attachment; filename=' . $csvfile);
header('Content-Length: ' . filesize($csvfile));
readfile($csvfile);

// Close the database connection
$con->close();
?>
 