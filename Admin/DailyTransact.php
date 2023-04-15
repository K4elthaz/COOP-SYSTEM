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
        echo "<script> window.location.href='DailyTransact.php';</script>";
    } else {
    }
}




// Get status message
// if (!empty($_GET['status'])) {
//     switch ($_GET['status']) {
//         case 'succ':
//             $statusType = 'alert-success';
//             $statusMsg = 'Members data has been imported successfully.';
//             break;
//         case 'err':
//             $statusType = 'alert-danger';
//             $statusMsg = 'Some problem occurred, please try again.';
//             break;
//         case 'invalid_file':
//             $statusType = 'alert-danger';
//             $statusMsg = 'Please upload a valid CSV file.';
//             break;
//         default:
//             $statusType = '';
//             $statusMsg = '';
//     }
// }
?>

<!DOCTYPE html>
<html>
<style>
.error {
    color: red;
}
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9c35be8496.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="DailyTransact.css">
    <title>Members</title>
</head>

<body>
    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" href="controlPanel.php" target="__blank">Admin</a>
            <a class="nav-link active ms-0" href="downloads.php" target="__blank">Forms</a>
            <a class="nav-link active ms-0" href="../login.php">Logout</a>
        </nav>
        <!-- Display status message -->
        <?php if (!empty($statusMsg)) { ?>
        <div class="col-xs-12">
            <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
        </div>
        <?php } ?>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-sm-3 mr-5">
                <div class="card mb-2 mb-xl-0">
                    <div class="card-header">Admin Information</div>
                    <div class="card-body text-center">
                        <img class="img-account-profile rounded-circle mb-2" src="../Client/IDPicture.jpg" alt="">
                        <h2 class="fw-bold">Name</h2>
                        <p> President </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 ">
                <div class="card" id="form" position="aboslute">
                    <nav class="card-header" id="btn">
                        <div class="search float-end">
                            <form class="example mt-2" action="">
                                <input type="text" placeholder="  Search.." name="search">
                                <button type="submit"><i class="fa fa-search fa-outline-success"
                                        aria-hidden="true"></i></button>
                            </form>
                        </div>
                        <h4> Control Panel </h4>
                    </nav>
                    <div class="row px-4 ">
                        <div class="new-inp mt-4">
                            <button type="button" class="btn btn-primary add-new float-end"><i class="fa fa-plus"></i>
                                Pwede lagyan din </button>
                            <a href="exportData.php" class="btn btn-success  export float-end mx-1"><i
                                    class="fa fa-download"></i> pwede lagyan</a>
                            <!-- <button type="button" class="btn btn-success  export float-end mx-1" ><i class="fa fa-download"></i> Export</button> -->

                            <!-- <button type="button" class="btn btn-warning import float-end" onclick="showPopup()"><i class="fa fa-plus" ></i> New Transaction</button> -->

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"><i class="fa fa-plus"></i>
                                Add Transact
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                                                <input type="text" name="memberId"
                                                                    placeholder="Member ID"
                                                                    value="<?php echo $memberId; ?>">
                                                                <span class="error"><?php echo $memberIdErr; ?></span>
                                                            </div>
                                                            <div class="col">
                                                                <input type="text" name="name" placeholder="Name"
                                                                    value="">
                                                                <span class="error"><?php echo $nameErr; ?></span>
                                                            </div>
                                                            <div class="col">
                                                                <input type="text" name="paymentType"
                                                                    placeholder="Payment Type" value="">
                                                                <span
                                                                    class="error"><?php echo $paymentTypeErr; ?></span>
                                                            </div>
                                                            <div class="col">
                                                                <input type="text" name="transactionDate"
                                                                    placeholder="Transactrion Date" value="">
                                                                <span
                                                                    class="error"><?php echo $transactionDateErr; ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col">
                                                                <input type="text" name="referenceNo"
                                                                    placeholder="Reference No" value="">
                                                                <span
                                                                    class="error"><?php echo $referenceNoErr; ?></span>
                                                            </div>
                                                            <div class="col">
                                                                <input type="text" name="transactionRemarks"
                                                                    placeholder="Transaction Remarks" value="">
                                                                <span
                                                                    class="error"><?php echo $transactionRemarksErr; ?></span>
                                                            </div>
                                                            <div class="col">
                                                                <input type="text" name="collector"
                                                                    placeholder="Collector" value="">
                                                                <span class="error"><?php echo $collectorErr; ?></span>
                                                            </div>
                                                        </div>
                                                        <!-- </form> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <!-- <form method="POST"> -->
                                            <button value="btnRegister" name="btnRegister" type="submit"
                                                class="btn btn-primary">Add</button>
                                            </form>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>






                        </div>
                    </div>

                    <div class="row px-4">
                        <div class="card-body">
                            <!-- table -->
                            <div class="table-container">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="headcol">ID</th>
                                            <th>MemberID</th>
                                            <th class="third">Name</th>
                                            <th>Payment Type</th>
                                            <th>TransactionDate</th>
                                            <th>Reference No</th>
                                            <th>Transaction Remarks</th>
                                            <th>Collector</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        include("../connections.php");

                                        // Get member rows
                                        $dailytransact = $connections->query("SELECT * FROM dailytransact ORDER BY id");
                                        if ($dailytransact->num_rows > 0) {
                                            while ($row = $dailytransact->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['memberID']; ?></td>
                                            <td class="th"><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['paymentType']; ?></td>
                                            <td><?php echo $row['transactionDate']; ?></td>
                                            <td><?php echo $row['referenceNo']; ?></td>
                                            <td><?php echo $row['transactionRemarks']; ?> </td>
                                            <td><?php echo $row['collector']; ?></td>
                                            <td>

                                                <button type="button" title="View Payment"> View Payment </button>
                                                <!-- <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons"></i></a>
                                                    <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"></i></a>
                                                    <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons"></i></a> -->
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
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>