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
    $regular_loan = $my_info["regular_loan"];
    $emergency_loan = $my_info["emergency_loan"];
    $petty_cash = $my_info["petty_cash"];
    $stl = $my_info["stl"];
    $stlb = $my_info["stlb"];
    $stl_calamity = $my_info["stl_calamity"];
    $special_project = $my_info["special_project"];
    $special_promo = $my_info["special_promo"];
    $stl_healthCard = $my_info["stl_healthCard"];

    $totalLoan = $regular_loan + $emergency_loan + $petty_cash + $stl + $stlb + $stl_calamity + $special_project + $special_promo + $stl_healthCard;
} else {
    // echo "<script>window.location.href='';</script>";
}

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9c35be8496.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="pdfDownload.css">
    <title>View Balance</title>
</head>

<body>
    <div class="row">  
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
            <a class="navbar-brand logo-image" href="home.php"><img src="images/cooplogo.png" style="width: 60px; height: auto;" alt="alternative"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"href="home.php">Home</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../logout.php">Logout</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="container">
            <div class="card-body">
                <!-- table -->
                <div class="table-container">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="headcol">Name</th>  
                                <th>Petty Cash</th>
                                <th>Regular Loan</th>
                                <th>Emergency Loan</th>
                                <th>STL</th>
                                <th>STL B</th>
                                <th>STL Calamity</th>
                                <th>Special Project</th>
                            </tr>

                            <tr>
                                <td> <?php echo $name ?> </td>
                                <td> <?php echo $petty_cash ?> </td>
                                <td> <?php echo $regular_loan ?> </td>
                                <td> <?php echo $emergency_loan ?> </td>
                                <td> <?php echo $stl ?> </td>
                                <td> <?php echo $stlb ?> </td>
                                <td> <?php echo $stl_calamity ?> </td>
                                <td> <?php echo $special_project ?> </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>


<img class="centered-image" src="images/coopnobgBNW.png" alt="logobackground">
<style>
.centered-image {
        display: block;
        margin-left: auto;
        margin-right: auto;
        opacity: 0.4;
        
    }
</style>