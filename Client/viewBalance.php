<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="../assets//css//bootstrap.min.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,700&display=swap" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./client.css">
</head>

<body>
    <div class="container-xl px-10 mt-10 ">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" href="viewBalance.php" target="__blank">View Balance</a>
            <a class="nav-link active ms-0" href="forms.php" target="__blank">Loan & Petty Cash forms</a>
            <a class="nav-link active ms-0" href="EditProfile.php" target="__blank">Edit Profile</a>
            <a class="nav-link active ms-0" target="__blank">Logout</a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-sm-9 ">
                <div class="card" id="form" position="aboslute">
                    <nav class="card-header" id="btn">
                        <h4> Client's Balance </h4>
                    </nav>
                    <div class="row px-4">
                        <div class="card-body">
                            <!-- table -->
                            <div class="table-container">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="headcol">Name</th>
                                            <th>Department</th>
                                            <th>Phone</th>
                                            <th>Loan Amount</th>
                                            <th>Term</th>
                                            <th>Monthly</th>
                                            <th>Months Default</th>
                                            <th>Arrears</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="headcol">Sample Text</td>
                                            <td>Administration</td>
                                            <td>Sample Text</td>
                                            <td>Sample Text</td>
                                            <td>Sample Text</td>
                                            <td>Sample Text</td>
                                            <td>Sample Text</td>
                                            <td>Sample Text</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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