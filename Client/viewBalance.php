<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="../assets//css//bootstrap.min.css"/>

    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,700&display=swap"
    />

    <link rel="stylesheet" href="./client.css">
  </head>
  <body>
  <div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="viewBalance.php" target="__blank">View Balance</a>
        <a class="nav-link active ms-0" href="forms.php" target="__blank">Loan & Petty Cash forms</a>
        <a class="nav-link active ms-0" href="EditProfile.php" target="__blank">Edit Profile</a>
        <a class="nav-link active ms-0" href="../login.php">Logout</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Personal Information</div>
                <div class="card-body text-center">
                    <img class="img-account-profile rounded-circle mb-2" src="../Client/IDPicture.jpg" alt="">
                    <h2 class="fw-bold">IAN ROBIN C. BREVA</h2>
                    <h3 class="fw-semibold">ID: 12345678</h3>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card mb-4" id="form">
                <nav class="card-header" id="btn">
                    <!-- <a class="card-header active ms-0" >YOUR BALANCE</a> -->
                    <h4> YOUR BALANCE </h4>
                </nav>
                <div class="card-body">
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Header</th>
                        <th scope="col">Balance</th>
                        <th scope="col">Date</th>
                        <th scope="col">Loan Amount</th>
                        <th scope="col">Term</th>
                        <th scope="col">Monthly</th>
                        <th scope="col">Months Default</th>
                        <th scope="col">Arrears</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">EMERGENCY</th>
                            <td>150,000.00</td>
                            <td>03/01/2023</td>
                            <td>200,000.00</td>
                            <td>2</td>
                            <td>1,000.00</td>
                            <td>0.68</td>
                            <td>1,234.00</td>
                        </tr>
                        
                        <tr>
                            <th scope="row">PETTY CASH</th>
                            <td>150,000.00</td>
                            <td>03/01/2023</td>
                            <td>200,000.00</td>
                            <td>4</td>
                            <td>1,000.00</td>
                            <td>0.68</td>
                            <td>1,234.00</td>
                        </tr>

                        <tr>
                            <th scope="row">STL</th>
                            <td>150,000.00</td>
                            <td>03/01/2023</td>
                            <td>200,000.00</td>
                            <td>4</td>
                            <td>1,000.00</td>
                            <td>0.68</td>
                            <td>1,234.00</td>
                        </tr>

                        <tr>
                            <th scope="row">SAVINGS REPORT</th>
                            <td>150,000.00</td>
                            <td>03/01/2023</td>
                            <td>200,000.00</td>
                            <td>2</td>
                            <td>1,000.00</td>
                            <td>0.68</td>
                            <td>1,234.00</td>
                        </tr>

                        <tr>
                            <th scope="row">SHARE</th>
                            <td>150,000.00</td>
                            <td>03/01/2023</td>
                            <td>200,000.00</td>
                            <td>3</td>
                            <td>1,000.00</td>
                            <td>0.68</td>
                            <td>1,234.00</td>
                        </tr>

                        <tr>
                            <th scope="row">SPECIAL-PROMO</th>
                            <td>150,000.00</td>
                            <td>03/01/2023</td>
                            <td>200,000.00</td>
                            <td>6</td>
                            <td>1,000.00</td>
                            <td>0.68</td>
                            <td>1,234.00</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>

            

        </div>
    </div>
</div>
<script src="../assts/e/js//bootstrap.min.js"></script>   
</body>
</html>
