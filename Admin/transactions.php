<?php
include("../connections.php");

$memberId = $name = $paymentType = $transactionDate = $referenceNo = $transactionRemarks = $collector = "";
$memberIdErr = $nameErr = $paymentTypeErr = $transactionDateErr = $referenceNoErr = $transactionRemarksErr = $collectorErr = "";

if (isset($_POST["btnRegister"])) {

    if (empty($_POST["memberId"])) {
        $memberIdErr = "Required!";
    } else {
        $memberId = $_POST["memberId"];
    }

    if (empty($_POST["name"])) {
        $nameErr = "Required!";
    } else {
        $name = $_POST["name"];
    }

    if (empty($_POST["paymentType"])) {
        $paymentTypeErr = "Required!";
    } else {
        $paymentType = $_POST["paymentType"];
    }

    if (empty($_POST["transactionDate"])) {
        $transactionDateErr = "Required!";
    } else {
        $transactionDate = $_POST["transactionDate"];
    }

    if (empty($_POST["referenceNo"])) {
        $referenceNoErr = "Required!";
    } else {
        $referenceNo = $_POST["referenceNo"];
    }

    if (empty($_POST["transactionRemarks"])) {
        $transactionRemarksErr = "Required!";
    } else {
        $transactionRemarks = $_POST["transactionRemarks"];
    }

    if (empty($_POST["collector"])) {
        $collectorErr = "Required!";
    } else {
        $collector = $_POST["collector"];
    }

    if ($memberId && $name && $paymentType && $transactionDate && $referenceNo && $transactionRemarks && $collector) {
        $query = mysqli_query($connections, "INSERT INTO dailytransact (memberId,name,paymentType,transactionDate,referenceNo,transactionRemarks,collector) 
        VALUES('$memberId', '$name' ,'$paymentType', '$transactionDate', '$referenceNo', '$transactionRemarks', '$collector') ");
        echo "<script language='javascript'>alert('New record has been inserted!')</script>";
        echo "<script> window.location.href='transactions.php';</script>";
    } else {
    }
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
                            <a class="nav-link Active" href="./controlPanel.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link Active" href="../login.php">Logout</a>
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
                                    if(isset($_POST['delete'])){
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="myPopup" class="popup">
                                    <div class="modal-body">
                                        <form method="POST">
                                            <div class="row">
                                                <div class="col">
                                                    <input type="number" class="form-control" name="memberId"
                                                        placeholder="Member ID" value="<?php echo $memberId; ?>">
                                                    <span class="error"><?php echo $memberIdErr; ?></span>
                                                </div>
                                                <div class="col">
                                                    <input type="text" class="form-control" name="name"
                                                        placeholder="Name" value="">
                                                    <span class="error"><?php echo $nameErr; ?></span>
                                                </div>
                                                <div class="col">
                                                    <input type="text" class="form-control" name="paymentType"
                                                        placeholder="Payment Type" value="">
                                                    <span class="error"><?php echo $paymentTypeErr; ?></span>
                                                </div>
                                                <div class="col">
                                                    <input type="date" class="form-control" name="transactionDate"
                                                        placeholder="Transactrion Date" value="">
                                                    <span class="error"><?php echo $transactionDateErr; ?></span>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col">
                                                    <input type="number" class="form-control" name="referenceNo"
                                                        placeholder="Reference No" value="">
                                                    <span class="error"><?php echo $referenceNoErr; ?></span>
                                                </div>
                                                <div class="col">
                                                    <input type="text" class="form-control" name="transactionRemarks"
                                                        placeholder="Transaction Remarks" value="">
                                                    <span class="error"><?php echo $transactionRemarksErr; ?></span>
                                                </div>
                                                <div class="col">
                                                    <input type="text" class="form-control" name="collector"
                                                        placeholder="Collector" value="">
                                                    <span class="error"><?php echo $collectorErr; ?></span>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button value="btnRegister" name="btnRegister" type="submit"
                                    class="btn btn-primary">Add</button>
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
                    value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>">
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
                                <th>TransactionDate</th>
                                <th>Reference No</th>
                                <th>Transaction Remarks</th>
                                <th>Collector</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                include("../connections.php");

                                // Get member rows
                                $dailytransact = $connections->query("SELECT * FROM dailytransact ORDER BY id DESC");
                                if ($dailytransact->num_rows > 0) {
                                    while ($row = $dailytransact->fetch_assoc()) {
                            ?>
                            <tr>
                                <!-- <td><?php echo $row['id']; ?></td> -->
                                <td><?php echo $row['memberID']; ?></td>
                                <td class="th"><?php echo $row['name']; ?></td>
                                <td><?php echo $row['paymentType']; ?></td>
                                <td><?php echo $row['transactionDate']; ?></td>
                                <td><?php echo $row['referenceNo']; ?></td>
                                <td><?php echo $row['transactionRemarks']; ?> </td>
                                <td><?php echo $row['collector']; ?></td>
                                <td>
                                    <a class="edit" title="Edit" data-toggle="tooltip"><i
                                            class="fa-solid fa-user-pen fa-md" style="color: #2564d0;"></i></a>
                                    <a class="delete" title="Delete" data-toggle="tooltip"><i
                                            class="fa-solid fa-user-xmark fa-md" style="color: #e81717;"></i></a>
                                </td>
                            </tr>
                            <?php }
                                } else { ?>
                            <div>No Transaction(s) found...</div>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>

<script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>