<?php
// session_start();


if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
} else {
    // echo "<script>window.location.href='';</script>";
}
include("../connections.php");


$query_info = mysqli_query($connections, "SELECT * FROM clients WHERE account_type='2' ");
while ($row_users = mysqli_fetch_assoc($query_info)) {
    $id_user = $row_users['id'];
    $idNumber = $row_users['idNumber'];
    $name = $row_users['name'];
    $classification = $row_users['classification'];
    $birthday = $row_users['birthday'];
    $age = $row_users['age'];
    $tin = $row_users['tin'];
    $civilStatus = $row_users['civilStatus'];
    $gender = $row_users['gender'];
    $contactNumber = $row_users['contactNo'];
    $address = $row_users['address'];
    $email = $row_users['email'];
    $accStatus = $row_users['accStatus'];
}


$my_info = mysqli_fetch_assoc($query_info);
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../login.php">Logout</a>
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
                        <h2 class="fw-bold"><?php echo $name ?></h2>
                        <p> Department </p>
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
                            <h1>Welcome <b><?php
                                            echo $name;
                                            ?></b> !!!

                            </h1>

                            <div class="row my-4">
                                <div id="account-area">
                                    <div class="">
                                        <div class="row">
                                            <div class="col-auto mb-3">
                                                <div class="savings status">
                                                    <h5>Savings</h5>
                                                    <h2>$ <span id="current-savings">5,000,000</span>
                                                    </h2>
                                                </div>
                                            </div>

                                            <div class="col-auto mb-3">
                                                <div class="shareC status">
                                                    <h5>Share Capital</h5>
                                                    <h2>$ <span id="current-shareC">5,000,000</span>
                                                    </h2>
                                                </div>
                                            </div>

                                            <div class="col-auto mb-3">
                                                <div class="balance status">
                                                    <h5>Balance</h5>
                                                    <h2 style="color:red">$ <span id="current-balance"
                                                            style="color:red">5,000,000</span>
                                                    </h2>
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
            <!-- </div> -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous">
            </script>
            <script src="web/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
            <script src="web/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
            <script src="web/js/scripts.js"></script> <!-- Custom scripts -->
</body>

</html>


<style>
.savings {
    background-color: lightseagreen;
}

.shareC {
    background-color: green;
}

.balance {
    background-color: black;
}

.status {
    margin: 0 10px;
    color: white;
    padding: 15px;
    border-radius: 10px;
}

/* #account-area {
        margin-top: 5%;
    } */
</style>