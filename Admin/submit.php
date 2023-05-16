<?php
if (isset($_POST['submit']) && !empty($_FILES['pdf_file']['name'])) {
    //a $_FILES 'error' value of zero means success. Anything else and something wrong with attached file.
    if ($_FILES['pdf_file']['error'] != 0) {
        echo 'Something wrong with the file.';
    } else { //pdf file uploaded okay.
        //project_name supplied from the form field
        $project_name = htmlspecialchars($_POST['project_name']);
        
        //attached pdf file information
        $file_name = $_FILES['pdf_file']['name'];
        $file_tmp = $_FILES['pdf_file']['tmp_name'];
            if ($pdf_blob = fopen($file_tmp, "rb")) {
                try {
                $conn = new mysqli("localhost", "root", "", "coop-database");
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                        $insert_sql = "INSERT INTO `pdf_files` (`project_name`, `file_contents`) VALUES(?, ?);";
                        $stmt = $conn->prepare($insert_sql);
                        $null = NULL;
                        $stmt->bind_param('sb', $project_name, $null);
                        $stmt->send_long_data(1, fread($pdf_blob, filesize($file_tmp)));
                    if ($stmt->execute() === FALSE) {
                        echo 'Could not save information to the database';
                    } else {
                        echo 'Information saved';
                        
                    }
                    $stmt->close();
                    $conn->close();
                } catch (Exception $e) {
                    echo 'Database Error '. $e->getMessage(). ' in '. $e->getFile().': '. $e->getLine();
                }
            } else {
            //fopen() was not successful in opening the .pdf file for reading.
            echo 'Could not open the attached pdf file';
        }
    }
} else {
    //submit button was not clicked. No direct script navigation.
    header('Location: pdfUpload.php');
}