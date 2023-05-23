<?php
session_start();

include("../connections.php");
if (isset($_SESSION["idNumber"])) {
    $idNumber = $_SESSION["idNumber"];
    $query_info = mysqli_query($connections, "SELECT * FROM login WHERE idNumber='$idNumber'");
    $fetch = mysqli_fetch_assoc($query_info);
    $account_type = $fetch["account_type"];
} else {
    // echo "<script>window.location.href='';</script>";
}



// $query_info = mysqli_query($connections, "SELECT * FROM login WHERE account_type='1' ");
// while ($row_users = mysqli_fetch_assoc($query_info)) {
//     $id_user = $row_users['id'];
//     $account_type = $row_users['account_type'];
//     $idNumber = $row_users['idNumber'];
// }


// $my_info = mysqli_fetch_assoc($query_info);
?>





<!-- // ! FIXED ADMIN CONTROL PANEL -->
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="controlPanel.css">
    <title>Home</title>
</head>

<body>
    <!-- change it add new sidebar admin side!!!!!! -->
    <?php include('sidebar.php'); ?>
    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid ">
                <a class="navbar-brand" href="controlPanel.php">Coop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="controlPanel.php">Home</a>
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
                    <div class="card-header"><b>Admin Information</b></div>
                    <div class="card-body text-center">
                        <img class="img-account-profile rounded-circle mb-2" src="../Client/IDPicture.jpg" alt="">
                        <h2 class="fw-bold">
                            <?php echo $idNumber ?>
                        </h2>
                        <p> President </p>
                    </div>
                </div>
            </div>
            <!-- <div class="col-sm-3 mr-5">
                <img class="img-account-profile rounded-circle mb-2" src="../Client/IDPicture.jpg" alt="">
            </div> -->
            <div class="col-sm-9">
                <div class="card" id="form" position="aboslute">
                    <nav class="card-header" id="btn">
                        <b> Dashboard </b>
                    </nav>
                    <div class="row px-4">
                        <div class="card-body">
                            <!-- table -->
                            <h1>Welcome<b>
                                    <?php echo $idNumber ?>!
                                </b>
                            </h1>
                            <div class="row">
                                <div class="col-sm-4 d-flex align-items-stretch">
                                    <div class="card">
                                        <div class="card-body d-flex flex-column" style="background-color: #C0F8D1;">
                                            <b class="card-title">View all members</b>
                                            <p class="card-text mb-4">Import and export dataset of each users.</p>
                                            <a href="members.php" class="btn btn-primary mt-auto align-self-end">Go
                                                To</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 d-flex align-items-stretch">
                                    <div class="card">
                                        <div class="card-body d-flex flex-column" style="background-color: #A4C5E9;">
                                            <b class="card-title">Daily Transact</b>
                                            <p class="card-text mb-4">Dataset for each users daily transactions.</p>
                                            <a href="transactions.php" class="btn btn-primary mt-auto align-self-end">Go
                                                To</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4  d-flex align-items-stretch">
                                    <div class="card">
                                        <div class="card-body d-flex flex-column" style="background-color: #F2C2D4;">
                                            <b class="card-title">Upload and Download Forms</b>
                                            <p class="card-text mb-4">Upload and download forms for loans.</p>
                                            <a href="downloads.php" class="btn btn-primary mt-auto align-self-end">Go
                                                To</a>
                                        </div>
                                    </div>
                                </div>
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