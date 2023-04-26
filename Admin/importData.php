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
                $no = $line[0];
                $idNumber   = $line[1];
                $name  = $line[2];
                $classification  = $line[3];
                $birthday = $line[4];
                $age = $line[5];
                $tin = $line[6];
                $civilStatus = $line[7];
                $gender = $line[8];
                $contactNo = $line[9];
                $address = $line[10];
                $email = $line[11];
                $accStatus = $line[12];
                
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT id FROM clients WHERE name = '".$line[3]."' LIMIT 1";
                $prevResult = $connections->query($prevQuery);
                
                if($prevResult->num_rows > 1){
                    // Update member data in the database
                    $connections->query("UPDATE clients SET no = '".$no."',  idNumber = '".$idNumber."',  name = '".$name."', classification = '".$classification."',  birthday = '".$birthday."',  age = '".$age."', tin = '".$tin."', civilStatus = '".$civilStatus."',  gender = '".$gender."', contactNo = '".$contactNo."', address = '".$address."', email = '".$email."', accStatus = '".$accStatus."'");
                }else{
                    // Insert member data in the database
                    $connections->query("INSERT INTO clients (no, idNumber, name, classification, birthday, age, tin, civilStatus, gender, contactNo, address, email, accStatus) VALUES ('".$no."', '".$idNumber."', '".$name."', '".$classification."', '".$birthday."', '".$age."', '".$tin."', '".$civilStatus."', '".$gender."', '".$contactNo."', '".$address."', '".$email."', '".$accStatus."')");
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