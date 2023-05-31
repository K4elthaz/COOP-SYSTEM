<?php
session_start();
include("../connections.php");

if (isset($_SESSION["idNumber"])) {
    $idNumber = $_SESSION["idNumber"];

    $query_info = mysqli_query($connections, "SELECT *, clients.db_id, clients.idNumber, clients.name, clients.classification, clients.birthday, clients.age, clients.tin, clients.civilStatus, clients.gender, clients.no, clients.email, clients.accStatus FROM clients WHERE idNumber='$idNumber'");

    $my_info = mysqli_fetch_assoc($query_info);
    $id_user = $my_info['db_id'];
    $idNumber = $my_info['idNumber'];
    $name = $my_info['name'];
    $classification = $my_info['classification'];
    $birthday = $my_info['birthday'];
    $age = $my_info['age'];
    $tin = $my_info['tin'];
    $civilStatus = $my_info['civilStatus'];
    $gender = $my_info['gender'];
    $contactNumber = $my_info['no'];
    $email = $my_info['email'];
    $accStatus = $my_info['accStatus'];
} else {
    // echo "<script>window.location.href='';</script>";
}

// if (isset($_POST['register_loan'])) {
//     // $loanType = $_POST['loanType'];
//     // $paymentTerm = $_POST['paymentTerm'];
//     // $amount = $_POST['amount'];


//     $query = mysqli_query($connections, "INSERT INTO co_maker (name,idNumber,tin,no,birthday,email,civilStatus,gender) 
//         VALUES('$name', '$idNumber' ,'$tin', '$contactNumber', '$birthday', '$email', '$civilStatus','$gender') ");
// }

?>
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <title>Home</title>
    <!-- Favicon  -->
    <link rel="icon" href="../web/images/coopnobg.png">
</head>

<body>
    <div class="container-xl px-4 mt-4">
        <?php include('sidebar.php'); ?>
        <!-- Account page navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid ">
                <a class="navbar-brand" href="home.php">Coop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Display status message -->
        <div class="row">
            <div class="col-sm-3 mr-5">
                <div class="card mb-2 mb-xl-0">
                    <div class="card-header"><b>Client Information</b></div>
                    <div class="card-body text-center">
                        <img class="img-account-profile rounded-circle mb-2" src="../Client/IDPicture.jpg" alt="">
                        <h2 class="fw-bold">
                            <?php echo $name ?>
                        </h2>
                        <p> Department </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-9">
                <form method="post" action="">
                    <div class="card" id="form" position="aboslute">
                        <nav class="card-header" id="btn">
                            <b> Loan Information </b>
                        </nav>

                        <!-- upload a pdf file -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- drop down -->
                                    <label for="loanType" class="form-label">Loan Type</label>
                                    <select class="form-select" name="loanType" id="loanType" required>
                                        <option value="" selected disabled hidden>Choose Loan Type</option>
                                        <option value="Regular Loan">Regular Loan</option>
                                        <option value="Emergency Loan">Emergency Loan</option>
                                        <option value="Petty Cash">Petty Cash</option>
                                        <option value="Short Term Loan">Short Term Loan</option>
                                        <option value="Short Term Loan B">Short Term Loan B</option>
                                        <option value="Short Term Loan Calamity">Short Term Loan Calamity</option>
                                        <option value="Special Project">Special Project</option>
                                        <option value="Special Promo">Special Promo</option>
                                        <option value="Short Term Loan Health Card">Short Term Loan Health Card</option>
                                    </select>
                                </div>
                                <div></div>
                                <!-- input terms -->
                                <div class="col-sm-6">
                                    <label for="terms" class="form-label">Payment Terms in Months</label>
                                    <input type="number" class="form-control" name="paymentTerm" id="paymentTerm" required>
                                </div>
                                <div></div>
                                <div class="col-sm-6">
                                    <label for="terms" class="form-label">Amount</label>
                                    <input type="number" class="form-control" name="amount" id="amount" required>
                                </div>
                            </div>
                        </div>
                        <!-- Enter Personal Information -->
                        <nav class="card-header" id="btn">
                            <b> Personal Information </b>
                        </nav>
                        <div class="row card-body">
                            <div class="col-sm-6">
                                <label for="memberName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="name" id="name" value=" <?php echo $name ?>" style="font-weight: bold;" disabled>

                            </div>
                            <!-- Account Number = idNumber -->
                            <div class="col-sm-6">
                                <label for="accountNumber" class="form-label">Account Number</label>
                                <input type="text" class="form-control" name="idNumber" id="idNumber" value="<?php echo $idNumber ?>" style="font-weight: bold;" disabled>

                            </div>
                            <!-- Enter TIN -->
                            <div class="col-sm-6">
                                <label for="TIN" class="form-label">TIN</label>
                                <input type="text" class="form-control" name="tin" id="tin" value="<?php echo $tin ?>" style="font-weight: bold;" disabled>

                            </div>
                            <!-- Enter Contact Number -->
                            <div class="col-sm-6">
                                <label for="ContactNumber" class="form-label">Contact Number</label>
                                <input type="number" class="form-control" name="no" id="no" value="<?php echo $contactNumber ?>" style="font-weight: bold;" disabled>
                            </div>
                            <!-- Enter Birthdate -->
                            <div class="col-sm-6">
                                <label for="birthDate" class="form-label">Birth Date</label>
                                <input type="date" class="form-control" name="birthday" id="birthday" value="<?php echo $birthday ?>" style="font-weight: bold;" disabled>
                            </div>
                            <!-- Enter Address -->
                            <div class="col-sm-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" id="email" value="<?php echo $email ?>" style="font-weight: bold;" disabled>
                            </div>
                            <!-- Enter Civil Status -->
                            <div class="col-sm-6">
                                <label for="civilStatus" class="form-label">Civil Status</label>
                                <input type="text" class="form-control" name="civilStatus" id="civilStatus" value="<?php echo $civilStatus ?>" style="font-weight: bold;" disabled>
                            </div>
                            <!-- Enter Gender -->
                            <div class="col-sm-6">
                                <label for="gender" class="form-label">Gender</label>
                                <input type="text" class="form-control" name="gender" id="gender" value="<?php echo $gender ?>" style="font-weight: bold;" disabled>
                            </div>
                            <!-- Upload Form -->
                            <div class="col-sm-6">
                                <label for="file" class="form-label">Upload Loan Form</label>
                                <input type="file" class="form-control" name="file" id="file" required>
                            </div>
                        </div>
                        <!-- Enter Co-Makers -->
                        <nav class="card-header" id="btn">
                            <b>Co-Makers</b>
                            <button type="button" id="addCoMakerBtn" class="btn btn-sm btn-primary ">Add
                                New</button>
                        </nav>
                        <div class="row card-body">
                            <div id="coMakerContainer">
                                <div class="col-sm-6">
                                    <label for="comaker" class="form-label">Co-Maker</label>
                                    <input type="text" class="form-control" name="comaker[]" placeholder="Enter Co-Maker" required>
                                </div>
                            </div>
                        </div>
                        <!-- submit button -->
                        <input type="submit" class="btn btn-primary" id="register_loan" name="register_loan" value="Submit">
                        <br>
                </form>
            </div>


            <!-- JavaScript code to handle adding more co-makers -->
            <script>
                document.getElementById('addCoMakerBtn').addEventListener('click', function() {
                    const container = document.getElementById('coMakerContainer');
                    const coMakerDiv = document.createElement('div');
                    coMakerDiv.className = 'col-sm-6';
                    const coMakerLabel = document.createElement('label');
                    coMakerLabel.setAttribute('for', `coMaker${container.children.length}`);
                    coMakerLabel.className = 'form-label';
                    coMakerLabel.textContent = 'Co-Maker';
                    const coMakerInput = document.createElement('input');
                    coMakerInput.setAttribute('type', 'text');
                    coMakerInput.className = 'form-control';
                    coMakerInput.setAttribute('name', 'comaker[]');
                    coMakerInput.setAttribute('id', `coMaker${container.children.length}`);
                    coMakerInput.setAttribute('placeholder', 'Enter Co-Maker');
                    coMakerInput.required = true;
                    coMakerDiv.appendChild(coMakerLabel);
                    coMakerDiv.appendChild(coMakerInput);
                    container.appendChild(coMakerDiv);

                    // Add a delete button to the new co-maker input field
                    const deleteButton = document.createElement('button');
                    deleteButton.className = 'btn btn-danger';
                    deleteButton.textContent = 'Delete';
                    deleteButton.addEventListener('click', function() {
                        container.removeChild(coMakerDiv);
                    });
                    coMakerDiv.appendChild(deleteButton);
                });
            </script>

            <!-- PHP code to handle form submission and database updates -->
            <?php

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Retrieve the submitted data
                $loanType = $_POST['loanType'];
                $paymentTerm = $_POST['paymentTerm'];
                $amount = $_POST['amount'];
                $coMakers = $_POST['comaker'];

                // Database connection
                $servername = 'localhost';
                $username = 'root';
                $password = '';
                $dbname = 'coop-database';
                $tableName = 'co_maker';

                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Get the existing columns from the table
                    $existingColumns = [];
                    $existingColumnsQuery = $conn->query("SHOW COLUMNS FROM $tableName");
                    while ($column = $existingColumnsQuery->fetch(PDO::FETCH_ASSOC)) {
                        $existingColumns[] = $column['Field'];
                    }

                    // Prepare the column names and values for co-makers
                    $coMakerColumns = '';
                    $coMakerValues = '';
                    foreach ($coMakers as $index => $coMaker) {
                        $columnName = "co_maker_" . ($index + 1); // Generate a unique column name for each co-maker

                        // Check if the column already exists
                        if (!in_array($columnName, $existingColumns)) {
                            // SQL query to add a new column to the table
                            $sql = "ALTER TABLE $tableName ADD $columnName VARCHAR(255) DEFAULT ''";
                            $conn->exec($sql);
                            $existingColumns[] = $columnName; // Add the new column to the existing columns array
                        }

                        $coMakerColumns .= "$columnName, ";
                        $coMakerValues .= "'$coMaker', ";
                    }

                    // Remove trailing comma and space from the co-maker column names and values
                    $coMakerColumns = rtrim($coMakerColumns, ", ");
                    $coMakerValues = rtrim($coMakerValues, ", ");

                    // Construct the SQL query for inserting loan and co-maker data
                    $sql = "INSERT INTO $tableName (name,idNumber,tin,no,birthday,email,civilStatus,gender,loanType, paymentTerm, amount, $coMakerColumns)
                VALUES ('$name','$idNumber','$tin','$contactNumber','$birthday','$email','$civilStatus','$gender','$loanType', '$paymentTerm', '$amount', $coMakerValues)";

                    // Execute the SQL query
                    $conn->exec($sql);

                    echo "Loan and Co-Makers added successfully.";
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }

                $conn = null;
            }

            //  


            // if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            //     // Retrieve the submitted loan details
            //     $loanType = $_POST['loanType'];
            //     $paymentTerm = $_POST['paymentTerm'];
            //     $amount = $_POST['amount'];

            //     // Retrieve the submitted co-maker values
            //     $coMakers = $_POST['comaker'];

            //     // Database connection
            //     $servername = 'localhost';
            //     $username = 'root';
            //     $password = '';
            //     $dbname = 'coop-database';
            //     $tableName = 'co_maker';

            //     try {
            //         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            //         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //         // Insert loan details into the loan table
            //         $loanQuery = "INSERT INTO co_maker (loanType, paymentTerm, amount) 
            //                       VALUES (:loanType, :paymentTerm, :amount)";
            //         $loanStmt = $conn->prepare($loanQuery);
            //         $loanStmt->bindParam(':loanType', $loanType);
            //         $loanStmt->bindParam(':paymentTerm', $paymentTerm);
            //         $loanStmt->bindParam(':amount', $amount);
            //         $loanStmt->execute();

            //         // Retrieve the last inserted loan ID
            //         $loanId = $conn->lastInsertId();

            //         // Prepare the SQL statement for updating the co-maker values
            //         $updateSql = "UPDATE $tableName SET ";
            //         $params = [];

            //         foreach ($coMakers as $index => $coMaker) {
            //             $columnName = "co_maker_" . ($index + 1); // Generate the column name

            //             // Append the column name and placeholder to the SQL statement
            //             $updateSql .= "$columnName = :coMaker$index, ";

            //             // Bind the parameter using bindValue
            //             $paramName = ":coMaker$index";
            //             $coMakerValue = ($coMaker !== '') ? $coMaker : ''; // Check if the co-maker value is empty and replace with an empty string
            //             $params[$paramName] = $coMakerValue;
            //         }

            //         // Remove trailing comma and space from the SQL statement
            //         $updateSql = rtrim($updateSql, ", ");

            //         // Assuming you have a primary key or unique identifier column named 'id', modify the WHERE clause to target the specific row
            //         $updateSql .= " WHERE id = :id"; // Change 'id' to the actual column name and adjust the condition based on your requirement
            //         $params[':id'] = $loanId; // Use the loan ID as the identifier for the co-makers

            //         // Execute the SQL statement
            //         $stmt = $conn->prepare($updateSql);
            //         $stmt->execute($params);

            //         echo "Loan registered and co-makers added/updated successfully.";
            //     } catch (PDOException $e) {
            //         echo "Error: " . $e->getMessage();
            //     }

            //     $conn = null;
            // }

            ?>



            <?php
            // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //     // Retrieve the submitted co-maker values
            //     $coMakers = $_POST['comaker'];

            //     // Database connection
            //     $servername = 'localhost';
            //     $username = 'root';
            //     $password = '';
            //     $dbname = 'coop-database';
            //     $tableName = 'co_maker';

            //     try {
            //         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            //         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //         // Get the existing columns from the table
            //         $existingColumns = [];
            //         $existingColumnsQuery = $conn->query("SHOW COLUMNS FROM $tableName");
            //         while ($column = $existingColumnsQuery->fetch(PDO::FETCH_ASSOC)) {
            //             $existingColumns[] = $column['Field'];
            //         }

            //         // Loop through the co-maker values
            //         foreach ($coMakers as $index => $coMaker) {
            //             $columnName = "co_maker_" . ($index + 1); // Generate a unique column name for each co-maker

            //             // Check if the column already exists
            //             if (!in_array($columnName, $existingColumns)) {
            //                 // SQL query to add a new column to the table
            //                 $sql = "ALTER TABLE $tableName ADD $columnName VARCHAR(255) DEFAULT ''";

            //                 // Execute the SQL query
            //                 $conn->exec($sql);
            //                 $existingColumns[] = $columnName; // Add the new column to the existing columns array
            //             }
            //         }

            //         // Insert the co-maker values into the respective columns
            //         $insertSql = "INSERT INTO $tableName (";
            //         $valueSql = "VALUES (";

            //         foreach ($coMakers as $index => $coMaker) {
            //             $columnName = "co_maker_" . ($index + 1); // Generate the column name

            //             // Append the column name to the INSERT INTO statement
            //             $insertSql .= "$columnName, ";

            //             // Append the placeholder for the column value to the VALUES statement
            //             $valueSql .= ":coMaker$index, ";
            //         }

            //         // Remove trailing comma and space from the SQL statements
            //         $insertSql = rtrim($insertSql, ", ");
            //         $valueSql = rtrim($valueSql, ", ");

            //         // Complete the SQL statements
            //         $insertSql .= ") ";
            //         $valueSql .= ")";

            //         // Concatenate the SQL statements
            //         $sql = $insertSql . $valueSql;

            //         // Prepare the SQL query
            //         $stmt = $conn->prepare($sql);

            //         // Bind the parameters using bindValue
            //         foreach ($coMakers as $index => $coMaker) {
            //             $paramName = ":coMaker$index";
            //             $coMakerValue = ($coMaker !== '') ? $coMaker : ''; // Check if the co-maker value is empty and replace with an empty string
            //             $stmt->bindValue($paramName, $coMakerValue);
            //         }

            //         // Execute the SQL query
            //         $stmt->execute();

            //         echo "Co-Makers added successfully.";
            //     } catch (PDOException $e) {
            //         echo "Error: " . $e->getMessage();
            //     }

            //     $conn = null;
            // }
            ?>








</body>

<?php
// $servername = 'localhost';
// $username = 'root';
// $password = '';
// $dbname = 'coop-database';

// // Create a database connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check if the connection was successful
// if ($conn->connect_error) {
//     die('Connection failed: ' . $conn->connect_error);
// }

// // Fetch data from the table
// $query = 'SELECT * FROM co_maker';
// $result = $conn->query($query);

// // Check if there are any rows returned
// if ($result->num_rows > 0) {
//     // Start creating the table structure
//     echo '<table>';

//     // Fetch the column names and create table headers
//     $fields = $result->fetch_fields();
//     echo '<tr>';
//     foreach ($fields as $field) {
//         echo '<th>' . $field->name . '</th>';
//     }
//     echo '</tr>';

//     // Loop through the rows of data
//     while ($row = $result->fetch_assoc()) {
//         echo '<tr>';
//         foreach ($row as $value) {
//             echo '<td>' . $value . '</td>';
//         }
//         echo '</tr>';
//     }

//     // Close the table
//     echo '</table>';
// } else {
//     echo 'No data found.';
// }
?>