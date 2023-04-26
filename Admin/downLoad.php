<?php
// Open a database connection

$connections = new mysqli("localhost", "root", "", "coop-database");

$pdf_id = $_GET['id'];
$sql = "SELECT file_contents FROM pdf_files WHERE id = $pdf_id";

$result = $connections->query($sql);
$row = $result->fetch_assoc();
$file_contents = $row['file_contents'];

// Set the HTTP headers to indicate that the response is a PDF file
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="down.pdf"');

// Output the file contents to the response stream
echo $file_contents;

// Close the database connection
$connections->close();
?>