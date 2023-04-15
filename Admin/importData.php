<?php
// Load the database configuration file
include_once "../connections.php";

if(isset($_POST['importSubmit'])){
    
    // Allowed mime types
    $csvMimes = array('text/csv', 'application/csv:charset=UTF-8', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $memberID = $line[0];
                $name   = $line[1];
                $loanType  = $line[2];
                $principal  = $line[3];
                $dateGranted = $line[4];
                $term = $line[5];
                $amort = $line[6];
                $paidAmount = $line[7];
                $balance = $line[8];
                $expAmount = $line[9];
                $monthsDefault = $line[10];
                $defaultAmount = $line[11];
                
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT id FROM members WHERE name = '".$line[3]."'";
                $prevResult = $connections->query($prevQuery);
                
                if($prevResult->num_rows > 1){
                    // Update member data in the database
                    $connections->query("UPDATE members SET memberID = '".$memberID."',  name = '".$name."',  loanType = '".$loanType."', principal = '".$principal."',  dateGranted = '".$dateGranted."',  term = '".$term."', amort = '".$amort."', paidAmount = '".$paidAmount."',  balance = '".$balance."', expAmount = '".$expAmount."', monthsDefault = '".$monthsDefault."', defaultAmount = '".$defaultAmount."'");
                }else{
                    // Insert member data in the database
                    $connections->query("INSERT INTO members (memberID, name, loanType, principal, dateGranted, term, amort, paidAmount, balance, expAmount, monthsDefault, defaultAmount) VALUES ('".$memberID."', '".$name."', '".$loanType."', '".$principal."', '".$dateGranted."', '".$term."', '".$amort."', '".$paidAmount."', '".$balance."', '".$expAmount."', '".$monthsDefault."', '".$defaultAmount."')");
                }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

// Redirect to the listing page
header("Location: members.php".$qstring);