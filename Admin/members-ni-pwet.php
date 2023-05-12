<?php
include('backend.php');
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9c35be8496.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="members.css">
    <title>Members</title>
</head>

<body>
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="controlPanel.php">Coop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link Active" href="./controlPanel.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link Active" href="../login.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="new-inp mt-2 d-flex justify-content-start">
                <!-- Button trigger Delete modal -->
                <button type="button" class="btn btn-danger mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa fa-trash"></i> Delete All
                </button>

                <!-- Delete Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete all?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <?php
                                $dbc = mysqli_connect('localhost', 'root', '', 'coop-database') or die('Error connecting to MySQL server.');
                                if (isset($_POST['delete'])) {
                                    mysqli_query($dbc, 'TRUNCATE TABLE `clients`');
                                    header("Location: members.php" . $_SERVER['PHP_SELF']);
                                    exit();
                                }
                                ?>
                                <form method="post" action="">
                                    <input class="btn btn-danger" name="delete" type="submit" value="Yes" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Button to trigger Add new -->
                <button type="button" class="btn btn-primary add-new float-end mx-1" data-bs-toggle="modal"
                    data-bs-target="#addModal">
                    <i class="fa fa-plus"></i> Add New
                </button>

                <!-- Add new Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Member</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Member ID"
                                                name="memberID" required>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Name" name="name"
                                                required>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Loan Type"
                                                name="loanType" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <input type="number" class="form-control" placeholder="Principal"
                                                name="principal" required>
                                        </div>
                                        <div class="col">
                                            <input type="date" class="form-control" placeholder="Date Granted"
                                                name="dateGranted" required>
                                        </div>
                                        <div class="col">
                                            <input type="month" class="form-control" placeholder="Term" name="term"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <input type="number" class="form-control" placeholder="Amort" name="amort"
                                                required>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control" placeholder="Paid Amount"
                                                name="paidAmount" required>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control" placeholder="Balance"
                                                name="balance" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <input type="number" class="form-control" placeholder="Expected Amount"
                                                name="expAmount" required>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control" placeholder="Months Default"
                                                name="monthsDefault" required>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control" placeholder="Default Amount"
                                                name="defaultAmount" required>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" name="addSubmit" value="Add Member">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Button trigger Export modal -->
                <button type="button" class="btn btn-success mx-1" data-bs-toggle="modal" data-bs-target="#exportModal">
                    <i class="fa fa-download"></i> Export
                </button>
                <!-- Export Modal -->
                <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to download this file?
                            </div>
                            <div class="modal-footer">
                                <a href="exportData.php" class="btn btn-success  export float-end mx-2">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Button trigger Import modal -->
                <button type="button" class="btn btn-warning mx-1" data-bs-toggle="modal" data-bs-target="#importModal">
                    <i class="fa-solid fa-file-import"></i> Import
                </button>
                <!-- Import Modal -->
                <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="importData.php" method="post" enctype="multipart/form-data">
                                    <input type="file" name="file" />
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-warning" name="importSubmit"
                                            value="CONFIRM">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form class="d-flex mt-1 mx-1 justify-content-start">
                <input class="form-control-sm me-2" type="text" placeholder="Search" name="search" required
                    value="<?php if (isset($_GET['search'])) {
                                                                                                                        echo $_GET['search'];
                                                                                                                    } ?>">
                <button class="btn btn-outline-success" type="submit">Search</button>
                <a class="btn btn-link" href="members.php" role="button">Go back to table</a>
            </form>


        </div>
        <div class="container">
            <div class="card-body">
                <!-- table -->
                <div class="table-container">
                    <table class="table table-hover text-center">
                        <thead class="thead-dark text-center">
                            <tr>
                                <!-- <th>ID</th> -->
                                <th>id</th>
                                <th>ID Number</th>
                                <th>Name</th>
                                <th>Classification</th>
                                <th>Date of Birth</th>
                                <th>Age</th>
                                <th>TIN No.</th>
                                <th>Civil Status</th>
                                <th>Gender</th>
                                <th>Contact Number</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Account Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $connections = mysqli_connect("localhost", "root", "", "coop-database");

                            if (isset($_GET['search'])) {

                                $filtervalues = $_GET['search'];
                                if (empty($filtervalues)) {
                                    // display the original table
                                    $query = "SELECT * FROM clients";
                                } else {
                                    // display filtered results
                                    $query = "SELECT * FROM clients WHERE CONCAT(db_id,idNumber,name,classification,birthday,age,tin,civilStatus,gender,contactNo,address,email,accStatus) LIKE '%$filtervalues%' ";
                                }
                                $query_run = mysqli_query($connections, $query);

                                if (mysqli_num_rows($query_run) > 0) {

                                    foreach ($query_run as $items) {

                            ?>
                            <!-- Display Search Results -->
                            <tr>
                                <td><?= $items['db_id']; ?></td>
                                <td><?= $items['idNumber']; ?></td>
                                <td><?= $items['name']; ?></td>
                                <td><?= $items['classification']; ?></td>
                                <td><?= $items['birthday']; ?></td>
                                <td><?= $items['age']; ?></td>
                                <td><?= $items['tin']; ?></td>
                                <td><?= $items['civilStatus']; ?></td>
                                <td><?= $items['gender']; ?></td>
                                <td><?= $items['contactNo']; ?></td>
                                <td><?= $items['address']; ?></td>
                                <td><?= $items['email']; ?></td>
                                <td><?= $items['accStatus']; ?></td>
                                <td>
                                    <!-- Button to trigger Edit Modal -->
                                    <a class="edit" title="Edit" data-toggle="tooltip" data-bs-toggle="modal"
                                        data-bs-target="#editModal"><i class="fa-solid fa-user-pen fa-md"
                                            style="color: #2564d0;"></i></a>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Member</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST">
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Member ID" name="memberID"
                                                                    value="<?php echo $db_memberID ?>" required>
                                                            </div>
                                                            <div class="col">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Name" name="name"
                                                                    value="<?php echo $db_name ?>" required>
                                                            </div>
                                                            <div class="col">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Loan Type" name="loanType" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Principal" name="principal" required>
                                                            </div>
                                                            <div class="col">
                                                                <input type="date" class="form-control"
                                                                    placeholder="Date Granted" name="dateGranted"
                                                                    required>
                                                            </div>
                                                            <div class="col">
                                                                <input type="month" class="form-control"
                                                                    placeholder="Term" name="term" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Amort" name="amort" required>
                                                            </div>
                                                            <div class="col">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Paid Amount" name="paidAmount"
                                                                    required>
                                                            </div>
                                                            <div class="col">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Balance" name="balance" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Expected Amount" name="expAmount"
                                                                    required>
                                                            </div>
                                                            <div class="col">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Months Default" name="monthsDefault"
                                                                    required>
                                                            </div>
                                                            <div class="col">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Default Amount" name="defaultAmount"
                                                                    required>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-primary" name="updateMember"
                                                        value="Update">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="delete" title="Delete" data-toggle="tooltip"><i
                                            class="fa-solid fa-user-xmark fa-md" style="color: #e81717;"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                                    }
                                } else {
                                    ?>
                            <tr>
                                <td colspan="4">No Record Found</td>
                            </tr>
                            <?php
                                }
                            } else {
                                // display the original table
                                $query = "SELECT * FROM clients";
                                $query_run = mysqli_query($connections, $query);

                                if (mysqli_num_rows($query_run) > 0) {

                                    foreach ($query_run as $items) {

                                    ?>
                            <tr>
                                <td><?= $items['db_id']; ?></td>
                                <td><?= $items['idNumber']; ?></td>
                                <td><?= $items['name']; ?></td>
                                <td><?= $items['classification']; ?></td>
                                <td><?= $items['birthday']; ?></td>
                                <td><?= $items['age']; ?></td>
                                <td><?= $items['tin']; ?></td>
                                <td><?= $items['civilStatus']; ?></td>
                                <td><?= $items['gender']; ?></td>
                                <td><?= $items['contactNo']; ?></td>
                                <td><?= $items['address']; ?></td>
                                <td><?= $items['email']; ?></td>
                                <td><?= $items['accStatus']; ?></td>

                                <td>
                                    <!-- Button to trigger Edit Modal -->
                                    <a class="edit" title="Edit" data-toggle="tooltip" data-bs-toggle="modal"
                                        data-bs-target="#editModal"><i class="fa-solid fa-user-pen fa-md"
                                            style="color: #2564d0;"></i></a>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Member</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST">
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Member ID" name="memberID"
                                                                    value="<?php echo $db_memberID ?>" required>
                                                            </div>
                                                            <div class="col">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Name" name="name"
                                                                    value="<?php echo $db_name ?>" required>
                                                            </div>
                                                            <div class="col">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Loan Type" name="loanType" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Principal" name="principal" required>
                                                            </div>
                                                            <div class="col">
                                                                <input type="date" class="form-control"
                                                                    placeholder="Date Granted" name="dateGranted"
                                                                    required>
                                                            </div>
                                                            <div class="col">
                                                                <input type="month" class="form-control"
                                                                    placeholder="Term" name="term" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Amort" name="amort" required>
                                                            </div>
                                                            <div class="col">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Paid Amount" name="paidAmount"
                                                                    required>
                                                            </div>
                                                            <div class="col">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Balance" name="balance" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Expected Amount" name="expAmount"
                                                                    required>
                                                            </div>
                                                            <div class="col">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Months Default" name="monthsDefault"
                                                                    required>
                                                            </div>
                                                            <div class="col">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Default Amount" name="defaultAmount"
                                                                    required>
                                                            </div>
                                                        </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-primary" name="updateMember"
                                                        value="Update">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a class="delete" title="Delete" data-toggle="tooltip"><i
                                            class="fa-solid fa-user-xmark fa-md" style="color: #e81717;"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                                    }
                                } else {
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
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>

<script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});