<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"/>
</head>
<body>
    </p><h4 class="text-center" style="margin-top: 100px;">Upload A PDF Form</h4>
    <div class="d-flex justify-content-center align-self-center" style="margin-top: 115px;">
        <form action="submit.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="formgroup container-fluid">
                <label for="project_name">Enter the PDF Filename</label>
                <input type="text" name="project_name"/>
            </div>
            <div class="formgroup container-fluid">
                <input type="file" name="pdf_file" accept=".pdf"/>
                <input type="hidden" name="MAX_FILE_SIZE" value="67108864"/> <! - 64 MB's worth in bytes →
            </div>
            <div class="formgroup container-fluid">
                <label for="submit">Submit To Database</label><br />
                <input type="submit" name="submit"/>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384–9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>


<?php
include("../connections.php");

// Retrieve the PDF files from the database
$sql = "SELECT id FROM pdf_files";
$result = $connections->query($sql);

// Display the PDF files in a table
echo "<table>";

echo "<tr>
        <th>ID</th>
        <th>Filename</th>
        <th>Download PDF</th>
    </tr>";

    while ($row = $result->fetch_assoc()) {
        $pdf_id = $row['id'];

echo "<tr>
        <td>$pdf_id</td>
        <td><a href='downLoad.php?id=$pdf_id'>Download Here</a></td>
    </tr>";
    }
echo "</table>";

// Close the database connection
$connections->close();
?>