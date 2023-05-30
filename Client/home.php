<?php

session_start();
include("../connections.php");
if (isset($_SESSION["idNumber"])) {
    $idNumber = $_SESSION["idNumber"];

    $querylog = mysqli_query($connections, "SELECT c.classification,c.account_type, c.idNumber, c.name, c.classification, c.birthday, cb.id_no, cb.savings_deposits, 
    cb.regular_loan, cb.share_capital, cb.emergency_loan, cb.petty_cash, cb.stl, cb.stlb, cb.stl_calamity, cb.special_project, cb.special_promo, cb.stl_healthCard
        FROM clients c
        JOIN clients_balance cb ON c.idNumber = cb.id_no
        WHERE c.idNumber = '$idNumber'");

    $my_info = mysqli_fetch_assoc($querylog);
    $classification = $my_info["classification"];
    $account_type = $my_info["account_type"];
    $idNumber = $my_info["idNumber"];
    $balId = $my_info["id_no"];
    $name = $my_info["name"];
    $classification = $my_info["classification"];
    $birthday = $my_info["birthday"];
    $savings = $my_info["savings_deposits"];
    $share_capital = $my_info["share_capital"];
    $regualr_loan = $my_info["regular_loan"];
    $emergency_loan = $my_info["emergency_loan"];
    $petty_cash = $my_info["petty_cash"];
    $stl = $my_info["stl"];
    $stlb = $my_info["stlb"];
    $stl_calamity = $my_info["stl_calamity"];
    $special_project = $my_info["special_project"];
    $special_promo = $my_info["special_promo"];
    $stl_healthCard = $my_info["stl_healthCard"];

    $totalLoan = $regualr_loan + $emergency_loan + $petty_cash + $stl + $stlb + $stl_calamity + $special_project + $special_promo + $stl_healthCard;
} else {
    // echo "<script>window.location.href='';</script>";
}



// session_start();
// include("../connections.php");
// if (isset($_SESSION["email"])) {
//     $email = $_SESSION["email"];

//     $querylog = mysqli_query($connections, "SELECT * FROM clients WHERE email='$email' ");
//     $my_info = mysqli_fetch_assoc($querylog);
//     $account_type = $my_info["account_type"];
// } else {
//     // echo "<script>window.location.href='';</script>";
// }




// $query_info = mysqli_query($connections, "SELECT c.*, cb.*
//     FROM clients c
//     JOIN clients_balance cb ON c.idNumber = cb.id_no
//     WHERE c.account_type='2'");

// while ($row_users = mysqli_fetch_assoc($query_info)) {
//     $id_user = $row_users['db_id'];
//     $idNumber = $row_users['idNumber'];
//     $name = $row_users['name'];
//     $classification = $row_users['classification'];
//     $birthday = $row_users['birthday'];
//     $age = $row_users['age'];
//     $tin = $row_users['tin'];
//     $civilStatus = $row_users['civilStatus'];
//     $gender = $row_users['gender'];
//     $contactNumber = $row_users['contactNo'];
//     $address = $row_users['address'];
//     $email = $row_users['email'];
//     $accStatus = $row_users['accStatus'];

//     $id_bal = $row_users['id'];
//     $id_no = $row_users['id_no'];

//     $regualr_loan = $row_users['regular_loan'];
//     $emergency_loan = $row_users['emergency_loan'];
//     $petty_cash = $row_users['petty_cash'];
//     $stl = $row_users['stl'];
//     $stlb = $row_users['stlb'];
//     $stl_calamity = $row_users['stl_calamity'];
//     $special_project = $row_users['special_project'];
//     $savings_deposits = $row_users['savings_deposits'];
//     $share_capital = $row_users['share_capital'];
//     $special_promo = $row_users['special_promo'];
//     $stl_healthCard = $row_users['stl_healthCard'];

// Process the record or perform any desired operations

// Example: Access data from clients_balance table
// $balance = $row_users['balance']; // Assuming there is a 'balance' column in the clients_balance table

// // Output the user information and balance
// echo "User ID: $id_user<br>";
// echo "ID Number: $idNumber<br>";
// echo "Name: $name<br>";
// // Output the rest of the fields as needed
// echo "Balance: $balance<br>";
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
                    <div class="card-header bg-secondary text-white"><b>Client Information</b></div>
                    <div class="card-body text-center">
                        <img class="img-account-profile rounded-circle mb-2" src="../Client/IDPicture.jpg" alt="">
                        <h2 class="fw-bold">
                            <?php echo $name ?>
                        </h2>
                        <p>
                            <?php echo "<h5>$classification <br> $idNumber </h5>" ?>
                            <br>





                        </p>
                    </div>
                </div>
            </div>
            <!-- <div class="col-sm-3 mr-5">
                <img class="img-account-profile rounded-circle mb-2" src="../Client/IDPicture.jpg" alt="">
            </div> -->
            <div class="col-sm-9">
                
                <div class="card " id="form" position="aboslute">
                    
                    <nav class="card-header bg-secondary text-white" id="btn">
                        <b> Dashboard </b>
                    </nav>
                    
                        
                        <div class="card-body bg-light text-black">
                            <!-- table -->
                            <h1>Welcome <b>
                                    <?php
                                    echo $name;
                                    ?>
                                </b>
                            </h1>

                            <div class="row my-4">
                                <div id="account-area">
                                    <div class="col-auto mb-3">
                                        <div class="row">
                                            <div class="col-auto mb-3">
                                                <div class="savings status">
                                                    <h5 class="mb-4" style="color:white">Savings</h5>
                                                    <h4 style="color:white">₱ <span id="current-savings">
                                                        <?php echo $savings; ?> </span>
                                                    </h4>
                                                </div>
                                            </div>

                                            <div class="col-auto mb-3">
                                                <div class="shareC status">
                                                    <h5 class="mb-4"> Share Capital</h5>
                                                    <h4>₱ <span id="current-shareC"></span>
                                                        <?php echo $share_capital ?>
                                                    </h4>
                                                </div>
                                            </div>

                                            <div class="col-auto mb-3">
                                                <div class="balance status">
                                                    <h5 class="mb-4">Balance</h5>
                                                    <h4 style="color:white">₱ <span id="current-balance" style="color:white">5,000,000</span>
                                                    </h4>
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
        background: rgba( 226, 114, 91, 1 );
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
        backdrop-filter: blur( 7px );
        -webkit-backdrop-filter: blur( 7px );
        border-radius: 10px;
    }

    .shareC {
        background: rgba( 32, 98, 40, 0.9 );
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
        backdrop-filter: blur( 0px );
        -webkit-backdrop-filter: blur( 0px );
        border-radius: 10px;
    }

    .balance {
        background: rgba( 62, 54, 63, 1 );
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
        backdrop-filter: blur( 9.5px );
        -webkit-backdrop-filter: blur( 9.5px );
        border-radius: 10px;
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