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
                        <h4> YOUR BALANCE </h4>
                        </nav>
                        <div class="card-body">
                            <div class="table-container">
                                <table>
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>Header</th>
                                            <th>Balance</th>
                                            <th>Date</th>
                                            <th>Loan Amount</th>
                                            <th>Term</th>
                                            <th>Monthly</th>
                                            <th>Months Default</th>
                                            <th>Arrears</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        <tr>
                                            <td><b>Share<b></td>
                                            <td>Row 1, Column 2</td>
                                            <td>Row 1, Column 3</td>
                                            <td>Row 1, Column 4</td>
                                            <td>Row 1, Column 5</td>
                                            <td>Row 1, Column 6</td>
                                            <td>Row 1, Column 7</td>
                                            <td>Row 1, Column 8</td>

                                        </tr>
                                        <tr>
                                            <td><b>Savings Deposists<b></td>
                                            <td>Row 2, Column 2</td>
                                            <td>Row 2, Column 3</td>
                                            <td>Row 2, Column 4</td>
                                            <td>Row 2, Column 5</td>
                                            <td>Row 2, Column 6</td>
                                            <td>Row 2, Column 7</td>
                                            <td>Row 2, Column 8</td>
                                        </tr>

                                        <tr>
                                            <td><b>Emergency<b></td>
                                            <td>Row 2, Column 2</td>
                                            <td>Row 2, Column 3</td>
                                            <td>Row 2, Column 4</td>
                                            <td>Row 2, Column 5</td>
                                            <td>Row 2, Column 6</td>
                                            <td>Row 2, Column 7</td>
                                            <td>Row 2, Column 8</td>
                                        </tr>

                                        <tr>
                                            <td><b>Petty Cash<b></td>
                                            <td>Row 2, Column 2</td>
                                            <td>Row 2, Column 3</td>
                                            <td>Row 2, Column 4</td>
                                            <td>Row 2, Column 5</td>
                                            <td>Row 2, Column 6</td>
                                            <td>Row 2, Column 7</td>
                                            <td>Row 2, Column 8</td>
                                        </tr>

                                        <tr>
                                            <td><b>STL<b></td>
                                            <td>Row 2, Column 2</td>
                                            <td>Row 2, Column 3</td>
                                            <td>Row 2, Column 4</td>
                                            <td>Row 2, Column 5</td>
                                            <td>Row 2, Column 6</td>
                                            <td>Row 2, Column 7</td>
                                            <td>Row 2, Column 8</td>
                                        </tr>

                                        <tr>
                                            <td><b>STL B<b></td>
                                            <td>Row 2, Column 2</td>
                                            <td>Row 2, Column 3</td>
                                            <td>Row 2, Column 4</td>
                                            <td>Row 2, Column 5</td>
                                            <td>Row 2, Column 6</td>
                                            <td>Row 2, Column 7</td>
                                            <td>Row 2, Column 8</td>
                                        </tr>

                                        <tr>
                                            <td><b>STL-Calamity Loan<b></td>
                                            <td>Row 2, Column 2</td>
                                            <td>Row 2, Column 3</td>
                                            <td>Row 2, Column 4</td>
                                            <td>Row 2, Column 5</td>
                                            <td>Row 2, Column 6</td>
                                            <td>Row 2, Column 7</td>
                                            <td>Row 2, Column 8</td>
                                        </tr>

                                        <tr>
                                            <td><b>Special Promo<b></td>
                                            <td>Row 2, Column 2</td>
                                            <td>Row 2, Column 3</td>
                                            <td>Row 2, Column 4</td>
                                            <td>Row 2, Column 5</td>
                                            <td>Row 2, Column 6</td>    
                                            <td>Row 2, Column 7</td>
                                            <td>Row 2, Column 8</td>
                                        </tr>

                                        <tr>
                                            <td><b>Special Project Assistance Loan<b></td>
                                            <td>Row 2, Column 2</td>
                                            <td>Row 2, Column 3</td>
                                            <td>Row 2, Column 4</td>
                                            <td>Row 2, Column 5</td>
                                            <td>Row 2, Column 6</td>
                                            <td>Row 2, Column 7</td>
                                            <td>Row 2, Column 8</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
            <script src="../assts/e/js//bootstrap.min.js"></script>   
    </body>
</html>

<?php
include("../connections.php");
?>