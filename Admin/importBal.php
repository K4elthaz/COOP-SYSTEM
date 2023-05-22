<?php
// Load the database configuration file
include_once "../connections.php";

if (isset($_POST['importBalSubmit'])) {

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
            while (($data = fgetcsv($csvFile)) !== FALSE) {
                // Get row data
                $id_no = $data[0]; // Assuming name is in the first column (index 0)
                $name = $data[1]; // Assuming account number is in the second column (index 1)
                $regular_loan = $data[2];
                $emergency_loan = $data[3];
                $petty_cash = $data[4];
                $stl = $data[5];
                $stlB = $data[6];
                $stl_calamity = $data[7];
                $special_project = $data[8];
                $savings_deposits = $data[9];
                $share_capital = $data[10];
                $special_promo = $data[11];
                $stl_healthCard = $data[12];

                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT id_no FROM clients_balance WHERE id_no= '" . $data[0] . "' LIMIT 1";
                $prevResult = $connections->query($prevQuery);

                if ($prevResult->num_rows > 1) {
                    // Update member data in the database
                    $connections->query("UPDATE clients_balance SET id = '" . $id . "',  id_no = '" . $id_no . "',  name = '" . $name . "', regular_loan = '" . $regular_loan . "',  emergency_loan = '" . $emergency_loan . "',  petty_cash = '" . $petty_cash . "', stl = '" . $stl . "', stlB = '" . $stlB . "',  stl_calamity = '" . $stl_calamity . "', special_project = '" . $special_project . "', savings_deposits = '" . $savings_deposits . "', share_capital = '" . $share_capital . "',  special_promo = '" . $special_promo . "',  stl_healthCard = '" . $stl_healthCard. "'");
                } else {
                    // Insert member data in the database
                    $query = mysqli_query($connections, "INSERT INTO clients_balance (id_no, name, regular_loan, emergency_loan, petty_cash, stl, stlB, stl_calamity, savings_deposits, share_capital, special_promo, stl_healthCard)
                    VALUES ('" . $id_no . "', '" . $name . "', '" . $regular_loan . "', '" . $emergency_loan . "', '" . $petty_cash . "', '" . $stl . "', '" . $stlB . "', '" . $stl_calamity . "', '" . $savings_deposits . "', '" . $share_capital . "', '" . $special_promo . "', '" . $stl_healthCard . "')");
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