<?php

include("../connections.php");
session_start();

if (isset($_SESSION["idNumber"])) {
    $idNumber = $_SESSION["idNumber"];

    $query_info = mysqli_query($connections, "SELECT *, login.idNumber, login.email FROM login WHERE idNumber='$idNumber'");

    $my_info = mysqli_fetch_assoc($query_info);
    $idNumber = $my_info['idNumber'];
    $email = $my_info['email'];
} else {
    // echo "<script>window.location.href='';</script>";
}

$memberID = $name = $paymentType = $amount = $transactionDate = $referenceNo = $transactionRemarks = $paymentMethod = "";


if (isset($_POST["btnRegister"])) {
    $memberID = $_POST['memberID'];
    $name = $_POST['name'];
    $paymentType = $_POST['paymentType'];
    $amount = $_POST['amount'];
    $transactionDate = $_POST['transactionDate'];
    $referenceNo = $_POST['referenceNo'];
    $transactionRemarks = $_POST['transactionRemarks'];
    $paymentMethod = $_POST['paymentMethod'];

    $query = mysqli_query($connections, "INSERT INTO dailytransact (memberID, name, paymentType, amount, transactionDate, referenceNo, transactionRemarks, paymentMethod, collector) 
    VALUES ('$memberID', '$name', '$paymentType', '$amount', '$transactionDate', '$referenceNo', '$transactionRemarks', '$paymentMethod','$email')");
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9c35be8496.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="members.css">
    <title>Members</title>
</head>

<body>
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="controlPanel.php">Coop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link Active" href="controlPanel.php">Home</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="new-inp mt-2 d-flex justify-content-start">
                <!-- Button trigger Delete modal -->
                <button type="button" class="btn btn-danger mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa fa-trash"></i> Delete All
                </button>

                <!-- Delete Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete all?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <?php
                                $dbc = mysqli_connect('localhost', 'root', '', 'coop-database') or die('Error connecting to MySQL server.');
                                if (isset($_POST['delete'])) {
                                    mysqli_query($dbc, 'TRUNCATE TABLE `dailytransact`');
                                    header("Location: transactions.php" . $_SERVER['PHP_SELF']);
                                    exit();
                                }
                                ?>
                                <form method="post" action="">
                                    <input class="btn btn-danger" name="delete" type="submit" value="Yes" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- // TODO: Make popup for add new -->
                <!-- Button to trigger Add new -->
                <button type="button" class="btn btn-primary add-new float-end mx-1" data-bs-toggle="modal"
                    data-bs-target="#addModal">
                    <i class="fa fa-plus"></i> Add New
                </button>

                <!-- Add new Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Transaction</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="myPopup" class="popup">
                                    <div class="modal-body">
                                        <form method="POST">
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" class="form-control" name="memberID"
                                                        placeholder="Member ID" required>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <input type="text" class="form-control" name="name"
                                                        placeholder="Name" value="" required>
                                                </div>
                                                <div class="col">
                                                    <select class="form-select" name="paymentType" id="paymentType"
                                                        value="" required>
                                                        <option value="" selected disabled hidden>Payment Type
                                                        </option>
                                                        <option value="Withdraw">Withdraw</option>
                                                        <option value="Deposit">Deposit</option>
                                                        <option value="Payment">Payment</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="amount"
                                                        placeholder="Amount" value="" required>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <input type="date" class="form-control" name="transactionDate"
                                                        placeholder="Transactrion Date" value="" required>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col">
                                                    <input type="number" class="form-control" name="referenceNo"
                                                        placeholder="Reference No" id="referenceNumberInput" value=""
                                                        required>
                                                    <button type="button" onclick="generateReferenceNumber()">Generate
                                                        Reference Number</button>
                                                </div>
                                                <div class="col">
                                                    <select class="form-select" name="transactionRemarks"
                                                        id="transactionRemarks" value="" required>
                                                        <option value="" selected disabled hidden>Transaction Type
                                                        </option>
                                                        <option value="Regular Loan">Savings</option>
                                                        <option value="Regular Loan">Regular Loan</option>
                                                        <option value="Emergency Loan">Emergency Loan</option>
                                                        <option value="Petty Cash">Petty Cash</option>
                                                        <option value="Short Term Loan">Short Term Loan</option>
                                                        <option value="Short Term Loan B">Short Term Loan B</option>
                                                        <option value="Short Term Loan Calamity">Short Term Loan
                                                            Calamity</option>
                                                        <option value="Special Project">Special Project</option>
                                                        <option value="Special Promo">Special Promo</option>
                                                        <option value="Short Term Loan Health Card">Short Term Loan
                                                            Health Card</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <select class="form-select" name="paymentMethod" id="paymentMethod"
                                                        value="" required>
                                                        <option value="" selected disabled hidden>Payment Method
                                                        </option>
                                                        <option value="Cash">Cash</option>
                                                        <option value="E-Wallet">E-Wallet</option>
                                                        <option value="Bank Transfer">Bank Transfer</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <input type="text" class="form-control" name="collector"
                                                        placeholder="Collector" value="<?php echo $email ?>" disabled>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button value="btnRegister" name="btnRegister" type="submit"
                                    class="btn btn-primary">Add</button>
                                <script>
                                swal("Good job!", "Successfuly Added!", "success")
                                </script>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Button trigger Export modal -->
                <button type="button" class="btn btn-success mx-1" data-bs-toggle="modal" data-bs-target="#exportModal">
                    <i class="fa fa-download"></i> Export
                </button>

                <!-- Export Modal -->
                <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to download this file?
                            </div>
                            <div class="modal-footer">
                                <a href="exportData.php" class="btn btn-success  export float-end mx-2">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form class="d-flex mt-1 mx-1 justify-content-start" action="search.php">
                <input class="form-control-sm me-2" type="search" placeholder="Search" aria-label="Search" name="search"
                    value="<?php if (isset($_GET['search'])) {
                                                                                                                                    echo $_GET['search'];
                                                                                                                                } ?>">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
        <div class="container">
            <div class="card-body">
                <!-- table -->
                <div class="table-container">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>MemberID</th>
                                <th class="third">Name</th>
                                <th>Payment Type</th>
                                <th>Amount</th>
                                <th>Transaction Date</th>
                                <th>Reference No</th>
                                <th>Transaction Type</th>
                                <th>Payment Method</th>
                                <th>Collector</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            include("../connections.php");

                            // Check if the edit form was submitted EDIT FORM
                            if (isset($_POST['edit'])) {
                                // Get the updated values from the form

                                $id = $_POST['id'];
                                $memberID = $_POST['memberID'];
                                $name = $_POST['name'];
                                $paymentType = $_POST['paymentType'];
                                $amount = $_POST['amount'];
                                $transactionDate = $_POST['transactionDate'];
                                $referenceNo = $_POST['referenceNo'];
                                $transactionRemarks = $_POST['transactionRemarks'];
                                $paymentMethod = $_POST['paymentMethod'];


                                // Update the dailytransact table with the new values
                                $query = "UPDATE dailytransact SET memberID='$memberID', name='$name', paymentType='$paymentType', amount='$amount', transactionDate='$transactionDate', referenceNo='$referenceNo', transactionRemarks='$transactionRemarks',paymentMethod='$paymentMethod', collector='$email' WHERE id=$id";
                                mysqli_query($connections, $query);
                                if ($query) {
                                    // Display success message using SweetAlert
                                    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                                    echo '<script>
                                    swal({
                                        title: "Success",
                                        text: "Transaction Successful!",
                                        icon: "success",
                                        button: "OK",
                                    }).then(function() {
                                        document.getElementById("myForm").submit();
                                    });
                                    </script>';
                                } else {
                                    // Display error message using SweetAlert
                                    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                                    echo '<script>
                                    swal({
                                        title: "Error",
                                        text: "Transaction Failed!",
                                        icon: "error",
                                        button: "OK",
                                    }).then(function() {
                                        document.getElementById("myForm").submit();
                                    });
                                    </script>';
                                }
                            }

                            if (isset($_POST["btnDelete"])) {
                                $id = $_POST['id'];
                                mysqli_query($connections, "DELETE FROM dailytransact WHERE id='$id'");
                            }

                            // Get member rows  
                            $dailytransact = mysqli_query($connections, "SELECT * FROM dailytransact");
                            while ($row = mysqli_fetch_assoc($dailytransact)) {
                                $db_id = $row["id"];
                                $db_memberID = $row["memberID"];
                                $db_name = $row["name"];
                                $db_paymentType = $row["paymentType"];
                                $db_amount = $row["amount"];
                                $db_transactionDate = $row["transactionDate"];
                                $db_referenceNo = $row["referenceNo"];
                                $db_transactionRemarks = $row["transactionRemarks"];
                                $db_paymentMethod = $row["paymentMethod"];
                                $db_collector = $row["collector"];

                                // Edit and delete links
                                $editLink = '<a class="edit" title="Edit" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#editModal-' . $db_id . '" data-id="' . $db_id . '"><i class="fa-solid fa-user-pen fa-md" style="color: #2564d0;"></i></a>';
                                $deleteLink = '<a class="edit" title="Delete" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#deleteModal-' . $db_id . '" data-id="' . $db_id . '"><i class="fa-solid fa-user-pen fa-md" style="color: #e81717;"></i></a>';

                                echo "
                                    <tr>
                                        <td>$db_memberID</td>
                                        <td>$db_name</td>
                                        <td>$db_paymentType</td>
                                        <td>$db_amount</td>
                                        <td>$db_transactionDate</td>
                                        <td>$db_referenceNo</td>
                                        <td>$db_transactionRemarks</td>
                                        <td>$db_paymentMethod</td>
                                        <td>$db_collector</td>
                                        <td>$editLink $deleteLink </td>
                                    </tr>
                                ";

                                echo "
                                <!-- Edit Modal -->
                                <div class='modal fade' id='editModal-$db_id' tabindex='-1' role='dialog' aria-labelledby='editModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog' role='document'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='editModalLabel'>Edit Transaction</h5>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                </button>
                                            </div>
                                            <form method='POST'>
                                            <div class='modal-body'>
                                                <input type='hidden' name='id' id='edit-id' value=$db_id>
                                                <div class='form-group'>
                                                    <label for='edit-memberID'>Member ID:</label>
                                                    <input type='text' class='form-control' id='edit-memberID' value='$db_memberID' name='memberID' required>
                                                </div>
                                                <div class='form-group'>    
                                                    <label for='edit-name'>Name:</label>
                                                    <input type='text' class='form-control' id='edit-name' value='$db_name' name='name' required>
                                                </div>
                                                <div class='form-group'>
                                                    <label for='edit-paymentType'>Payment Type:</label>
                                                    <select class='form-select' name='paymentType' id='edit-paymentType'
                                                        value='$db_paymentType' required>
                                                        <option value='' selected disabled hidden>Payment Type
                                                        </option>
                                                        <option value='Withdraw'>Withdraw</option>
                                                        <option value='Deposit'>Deposit</option>
                                                        <option value='Payment'>Payment</option>
                                                    </select>
                                                    
                                                </div>
                                                <div class='form-group'>
                                                    <label for='edit-amount'>Amount:</label>
                                                    <input type='number' class='form-control' id='edit-amount' value='$db_amount' name='amount' required>
                                                </div>
                                                <div class='form-group'>
                                                    <label for='edit-transactionDate'>Transaction Date:</label>
                                                    <input type='date' class='form-control' id='edit-transactionDate' value='$db_transactionDate' name='transactionDate' required>
                                                </div>
                                                <div class='form-group'>
                                                    <label for='edit-referenceNo'>Reference No:</label>
                                                    <input type='text' class='form-control' id='edit-referenceNo' value='$db_referenceNo' name='referenceNo' required>
                                                </div>
                                                <div class='form-group'>
                                                    <label for='edit-transactionRemarks'>Transaction Type:</label>
                                                    <select class='form-select' id='edit-transactionRemarks' value='$db_transactionRemarks' name='transactionRemarks' required>
                                                        <option value='' selected disabled hidden>Transaction Type
                                                        </option>
                                                        <option value='Regular Loan'>Savings</option>
                                                        <option value='Regular Loan'>Regular Loan</option>
                                                        <option value='Emergency Loan'>Emergency Loan</option>
                                                        <option value='Petty Cash'>Petty Cash</option>
                                                        <option value='Short Term Loan'>Short Term Loan</option>
                                                        <option value='Short Term Loan B'>Short Term Loan B</option>
                                                        <option value='Short Term Loan Calamity'>Short Term Loan
                                                            Calamity</option>
                                                        <option value='Special Project'>Special Project</option>
                                                        <option value='Special Promo'>Special Promo</option>
                                                        <option value='Short Term Loan Health Card'>Short Term Loan
                                                            Health Card</option>
                                                    </select>
                                                </div>
                                                <div class='form-group'>
                                                    <label for='edit-paymentMethod'>Payment Method:</label>
                                                        <select class='form-select' name='paymentMethod' id='paymentMethod' value='$db_paymentMethod' required>
                                                            <option value='' selected disabled hidden>Payment Method
                                                            </option>
                                                            <option value='Cash'>Cash</option>
                                                            <option value='E-Wallet'>E-Wallet</option>
                                                            <option value='Bank Transfer'>Bank Transfer</option>
                                                        </select>
                                                </div>
                                                <div class='form-group'>
                                                    <label for='edit-collector'>Collector:</label>
                                                    <input type='text' class='form-control' id='edit-collector' value='$db_collector' name='collector' required disabled>
                                                </div>
                                                <div class='modal-footer'>
                                                        <button type='submit' class='btn btn-primary' name='edit'>Save changes</button>
                                                    </form>    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Delete Modal -->
                                <div class='modal fade' id='deleteModal-$db_id' tabindex='-1' role='dialog' aria-labelledby='deleteModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog' role='document'>
                                        <div class='modal-content'>

                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='deleteModalLabel'>Edit Transaction</h5>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>

                                            <form method='POST'>
                                                <input type='hidden' name='id' id='edit-id' value=$db_id>
                                                <div class='modal-body'>
                                                    Are you sure you want to delete this user?
                                                </div>
                                                <div class='modal-footer'>
                                                    <button type='submit' class='btn btn-danger' name='btnDelete'>Confirm</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>";
                            }
                            ?>

                            <!-- Option 1: Bootstrap Bundle with Popper -->
                            <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js'
                                integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM'
                                crossorigin='anonymous'>
                            </script>
</body>

</html>

<script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});

function generateReferenceNumber() {
    // Get the current date
    var date = new Date();
    var year = date.getFullYear();
    var month = ("0" + (date.getMonth() + 1)).slice(-2);
    var day = ("0" + date.getDate()).slice(-2);

    // Generate a random number between 1000 and 9999
    var randomNumber = Math.floor(Math.random() * (9999 - 1000 + 1)) + 1000;

    // Combine the date and random number to create the reference number
    var referenceNumber = year + month + day + randomNumber;

    // Display the generated reference number in the input field
    document.getElementById("referenceNumberInput").value = referenceNumber;
}
</script>

<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">