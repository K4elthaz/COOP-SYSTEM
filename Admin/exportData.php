<?php 
// Load the database configuration file 
include_once "../connections.php";
 
$filename = "members_" . date('Y-m-d') . ".csv"; 
$delimiter = ","; 
 
// Create a file pointer 
$f = fopen('php://memory', 'w'); 
 
// Set column headers 
$fields = array('ID', 'Member ID', 'Name', 'Loan Type', 'Principal', 'Date Granted', 'Term', 'Amort', 'Paid Amount', 'Balance', 'Expected Amount', 'Months Default', 'Default Amount'); 
fputcsv($f, $fields, $delimiter); 
 
// Get records from the database 
$result = $connections->query("SELECT * FROM members ORDER BY id"); 
if($result->num_rows > 0){ 
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $result->fetch_assoc()){ 
        $lineData = array($row['id'], $row['memberID'], $row['name'], $row['loanType'], $row['principal'], $row['dateGranted'], $row['term'], $row['amort'], $row['paidAmount'], $row['balance'], $row['expAmount'], $row['monthsDefault'], $row['defaultAmount']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
} 
 
// Move back to beginning of file 
fseek($f, 0); 
 
// Set headers to download file rather than displayed 
header('Content-Type: text/csv'); 
header('Content-Disposition: attachment; filename="' . $filename . '";'); 
 
// Output all remaining data on a file pointer 
fpassthru($f); 
 
// Exit from file 
exit();