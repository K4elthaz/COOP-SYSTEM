<?php
// Load the database configuration file
include_once "../connections.php";

if (isset($_POST['importSubmit'])) {

    // Allowed mime types
    $csvMimes = array('text/csv', 'application/csv:charset=UTF-8', 'text/plain');

    // Validate whether selected file is a CSV file
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {

        // If the file is uploaded
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {

            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

            // Skip the first line
            fgetcsv($csvFile);

            // Parse data from CSV file line by line
            while (($line = fgetcsv($csvFile)) !== FALSE) {
                // Get row data
                $db_id = $line[0];
                $idNumber = $line[1];
                $name = $line[2];
                $classification = $line[3];
                $birthday = $line[4];
                $age = $line[5];
                $tin = $line[6];
                $civilStatus = $line[7];
                $gender = $line[8];
                $contactNo = $line[9];
                $address = $line[10];
                $email = $line[11];
                $password = $line[12];
                $accStatus = $line[13];
                $account_type = $line[14];

                // $str = str_replace(["'", '"', ','], ' ', $str);

                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT idNumber FROM clients WHERE db_id = '" . $line[0] . "' LIMIT 1";
                $prevResult = $connections->query($prevQuery);

                if ($prevResult->num_rows > 1) {
                    // Update member data in the database
                    $connections->query("UPDATE clients SET db_id = '" . $db_id . "',  idNumber = '" . $idNumber . "',  name = '" . $name . "', classification = '" . $classification . "',  birthday = '" . $birthday . "',  age = '" . $age . "', tin = '" . $tin . "', civilStatus = '" . $civilStatus . "',  gender = '" . $gender . "', contactNo = '" . $contactNo . "', address = '" . $address . "', email = '" . $email . "', password = '" . $password . "', accStatus = '" . $accStatus . "', account_type = '" . $account_type . "'");
                } else {
                    // Insert member data in the database
                    $query = mysqli_query($connections, "INSERT INTO clients (db_id, idNumber, name, classification, birthday, age, tin, civilStatus, gender, contactNo, address, email,password,accStatus,account_type)
                    VALUES ('" . $db_id . "', '" . $idNumber . "', '" . $name . "', '" . $classification . "', '" . $birthday . "', '" . $age . "', '" . $tin . "', '" . $civilStatus . "', '" . $gender . "', '" . $contactNo . "', '" . $address . "', '" . $email . "', '" . $password . "', '" . $accStatus . "', '" . $account_type . "')");
                    echo "<script language='javascript'>alert('New record has been inserted!')</script>";
                    echo "<script> window.location.href='members.php';</script>";
                }
            }

            // Close opened CSV file
            fclose($csvFile);

            $qstring = '?status=succ';
        } else {
            $qstring = '?status=err';
        }
    } else {
        $qstring = '?status=invalid_file';
    }
}

// Redirect to the listing page
header("Location: members.php" . $qstring);