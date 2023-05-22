<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coop_database";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to insert a single record into the database
function insertRecord(
    $id_no,
    $name,
    $regular_loan,
    $emergency_loan,
    $petty_cash,
    $stl,
    $stlb,
    $stl_calamity,
    $special_project,
    $savings_deposits,
    $share_capital,
    $special_promo,
    $stl_healthCard
) {
    global $conn;

    // Insert the data into the database
    $sql = "INSERT INTO clients_balance (id_no, name, regular_loan, emergency_loan, petty_cash, stl, stlb, stl_calamity, special_project
    ,savings_deposits, share_capital, special_promo, stl_healthCard) VALUES ('$id_no','$name', '$regular_loan','$emergency_loan','$petty_cash',
    '$stl','$stlb','$stl_calamity','$special_project','$savings_deposits','$share_capital','$special_promo','$stl_healthCard',)";
    $conn->query($sql);
}

// Function to process the uploaded CSV file
function processCSV($file)
{
    while (($data = fgetcsv($file, 1000, ",")) !== false) {
        $id_no = $data[0]; // Assuming name is in the first column (index 0)
        $name = $data[1]; // Assuming account number is in the second column (index 1)
        $regular_loan = $data[2];
        $emergency_loan = $data[3];
        $petty_cash = $data[4];
        $stl = $data[5];
        $stlb = $data[6];
        $stl_calamity = $data[7];
        $special_project = $data[8];
        $savings_deposits = $data[9];
        $share_capital = $data[10];
        $special_promo = $data[11];
        $stl_healthCard = $data[12];
        // Insert the data into the database
        insertRecord(
            $id_no,
            $name,
            $regular_loan,
            $emergency_loan,
            $petty_cash,
            $stl,
            $stlb,
            $stl_calamity,
            $special_project,
            $savings_deposits,
            $share_capital,
            $special_promo,
            $stl_healthCard
        );
    }
}

// Check if a file was uploaded
if (isset($_FILES['file'])) {
    $file = $_FILES['file']['tmp_name'];

    // Check if the uploaded file is a CSV
    if ($_FILES['file']['type'] == 'text/csv') {
        // Process the CSV file
        $handle = fopen($file, "r");
        processCSV($handle);
        fclose($handle);

        echo "CSV file imported successfully.";
    } else {
        echo "Please upload a CSV file.";
    }
}

// Close the database connection
$conn->close();
?>