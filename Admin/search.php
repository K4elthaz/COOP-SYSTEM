<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Search</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Search mo mama mo</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>DB ID</th>
                                <th>MemberID</th>
                                <th>Name</th>
                                <th>Loan Type</th>
                                <th>Principal</th>
                                <th>Date Granted</th>
                                <th>Term</th>
                                <th>Amort</th>
                                <th>Paid Amount</th>
                                <th>Balance</th>
                                <th>Expected Amount</th>
                                <th>Months Default</th>
                                <th>Default Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $connections = mysqli_connect("localhost", "root", "", "coop-database");

                                if(isset($_GET['search']))
                                {
                                    $filtervalues = $_GET['search'];
                                    $query = "SELECT * FROM members WHERE CONCAT(memberID,name,loanType,principal,dateGranted,term,amort,paidAmount,balance,expAmount,monthsDefault,defaultAmount) LIKE '%$filtervalues%' ";
                                    $query_run = mysqli_query($connections, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $items)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $items['id']; ?></td>
                                                <td><?= $items['memberID']; ?></td>
                                                <td><?= $items['name']; ?></td>
                                                <td><?= $items['loanType']; ?></td>
                                                <td><?= $items['principal']; ?></td>
                                                <td><?= $items['dateGranted']; ?></td>
                                                <td><?= $items['term']; ?></td>
                                                <td><?= $items['amort']; ?></td>
                                                <td><?= $items['paidAmount']; ?></td>
                                                <td><?= $items['balance']; ?></td>
                                                <td><?= $items['expAmount']; ?></td>
                                                <td><?= $items['monthsDefault']; ?></td>
                                                <td><?= $items['defaultAmount']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                            <tr>
                                                <td colspan="4">No Record Found</td>
                                            </tr>
                                        <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>