<?php
// Database connection
include '../connect/dbconnect.php';

// Fetch all ideas information from the database
$sql = "SELECT * FROM ideas";
$result = $con->query($sql);

// Create a new zip file
$zip = new ZipArchive;
$zipFileName = 'ideasinformation.zip';
if ($zip->open($zipFileName, ZipArchive::CREATE) === TRUE) {
  // Loop through the results and add each idea's information to the zip file
  while ($row = $result->fetch_assoc()) {
    $ideaData = "Title: " . $row['title'] . "\r\n";
    $ideaData .= "Explanation: " . $row['explanation'] . "\r\n";
    $ideaData .= "Category_id: " . $row['category_id'] . "\r\n";
    $ideaData .= "Ideasevent id: " . $row['ie_id'] . "\r\n";
    // Add more fields as needed
    
    $zip->addFromString('idea_' . $row['id'] . '.txt', $ideaData);
  }
  // Close the zip file
  $zip->close();

  // Prompt the user to download the zip file
  header('Content-Type: application/zip');
  header('Content-disposition: attachment; filename=' . $zipFileName);
  header('Content-Length: ' . filesize($zipFileName));
  readfile($zipFileName);
} else {
  echo 'Failed to create zip file';
}

// Close the database connection
$con->close();
?>
