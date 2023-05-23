<?php
// Open a database connection
$connections = new mysqli("localhost", "root", "", "coop-database");

$pdf_id = $_GET['id'];
$sql = "SELECT project_name, file_contents FROM pdf_files WHERE id = $pdf_id";

$result = $connections->query($sql);
$row = $result->fetch_assoc();
$project_name = $row['project_name'];
$file_contents = $row['file_contents'];

// Generate the filename based on the project name
$filename = $project_name . ".pdf";

// Set the HTTP headers to indicate that the response is a PDF file
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . $filename . '"');

// Output the file contents to the response stream
echo $file_contents;

// Close the database connection
$connections->close();
?>
