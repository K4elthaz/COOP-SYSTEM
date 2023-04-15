

<?php

$memberId = $name = $paymentType = $transactionDate = $referenceNo = $transactionRemarks = $collector = "";
$memberIdErr = $nameErr = $paymentTypeErr = $transactionDateErr = $referenceNoErr = $transactionRemarksErr = $collectorErr = "";
// Get status message
if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'Members data has been imported successfully.';
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="initial-scale=1, width=device-width" />

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="../assets//css//bootstrap.min.css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet"href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,700&display=swap"/>
        <link rel="stylesheet" href="DailyTransact.css">
        <title> Admin </title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
<?php if(!empty($statusMsg)){ ?>
    <div class="col-xs-12">
        <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
    </div>
<?php } ?>
            <hr class="mt-0 mb-4">
            <div class="row">
                <div class="col-sm-3 mr-5" >
                    <div class="card mb-2 mb-xl-0" >
                        <div class="card-header">Admin Information</div>
                        <div class="card-body text-center">
                            <img class="img-account-profile rounded-circle mb-2" src="../Client/IDPicture.jpg" alt="">
                            <h2 class="fw-bold">Name</h2>
                            <p> President </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 " >
                    <div class="card" id="form" position="aboslute">
                        <nav class="card-header" id="btn">
                            <div class="search float-end">
                                <form class="example mt-2" action="">
                                    <input type="text" placeholder="  Search.." name="search">
                                    <button type="submit"><i class="fa fa-search fa-outline-success" aria-hidden="true"></i></button>   
                                </form>
                            </div>
                            <h4> Control Panel </h4>     
                        </nav>
                        <div class="row px-4 ">
                            <div class="new-inp mt-4" >
                                <button type="button" class="btn btn-primary add-new float-end" ><i class="fa fa-plus"></i> Pwede lagyan din </button>
                                <a href="exportData.php" class="btn btn-success  export float-end mx-1" ><i class="fa fa-download"></i> pwede lagyan</a>
                                <!-- <button type="button" class="btn btn-success  export float-end mx-1" ><i class="fa fa-download"></i> Export</button> -->

                                
                                <button type="button" class="btn btn-warning import float-end" onclick=""><i class="fa fa-plus" ></i> New Transaction</button>
                                
                                


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
                                        if($dailytransact->num_rows > 0){
                                            while($row = $dailytransact->fetch_assoc()){
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

                                                <button type = "button" title = "View Payment"> View Payment </button>
                                                    <!-- <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons"></i></a>
                                                    <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"></i></a>
                                                    <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons"></i></a> -->
                                                </td>
                                            </tr>
                                        <?php } }else{ ?>
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
        <script src="../assts/e/js//bootstrap.min.js"></script>   
    </body>
</html>
