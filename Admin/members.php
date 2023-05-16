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
                                    echo "<script language='javascript'>alert('Table has been deleted!')</script>";
                                    echo "<script> window.location.href='members.php';</script>";
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
                                    <div class="form-group d-grid gap-3">
                                        <div class="form-group">
                                            <label for="add-memberID">Member ID: </label>
                                            <input type="number" class="form-control" name="memberID" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="add-name">Name: </label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                        <div class="form-group row">
                                            <label for="add-classification"
                                                class="col-auto col-form-label">Classification:</label>
                                            <div class="col-auto">
                                                <select class="form-select mb-1" aria-label="Default select example"
                                                    id="classification" name="classification"
                                                    onchange="giveSelection(this.value)" required>
                                                    <option selected>Select Classification</option>
                                                    <option value="erdb">ERDB</option>
                                                    <option value="others">Other Institution</option>
                                                    <option value="private">Private</option>
                                                </select>
                                            </div>
                                            <div class="col-auto">
                                                <select class="form-select" aria-label="Default select example"
                                                    id="subClassification" name="classification" required>
                                                    <option data-option="erdb">Regular</option>
                                                    <option data-option="erdb">Casual</option>
                                                    <option data-option="erdb">Job Order</option>
                                                    <option data-option="erdb">Retiree</option>
                                                    <option data-option="erdb">Separated</option>

                                                    <option data-option="others">DENR Central Office</option>
                                                    <option data-option="others">FMB</option>
                                                    <option data-option="others">CFNR / Other Office / College of UPLB
                                                    </option>
                                                    <option data-option="others">FPRDI</option>
                                                    <option data-option="others">Other Government District</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="add-birthday">Birthday: </label>
                                            <input type="date" class="form-control" name="birthday" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="add-age">Age: </label>
                                            <input type="number" class="form-control" name="age" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="add-tin">Tax Identification Number: </label>
                                            <input type="number" class="form-control" name="tin" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="add-civilStatus">Civil Status: </label>
                                            <select class="form-select" aria-label="Default select example"
                                                id="civilStatus" name="civilStatus" required>
                                                <option selected>Select Civil Status:</option>
                                                <option value="married">Married</option>
                                                <option value="widowed">Widowed</option>
                                                <option value="separated">Separate</option>
                                                <option value="divorce">Divorced</option>
                                                <option value="single">Single</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="add-gender">Gender: </label>
                                            <select class="form-select" aria-label="Default select example" id="gender"
                                                name="gender" required>
                                                <option selected>Select Gender:</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="add-contactNo">Contact Number: </label>
                                            <input type="number" class="form-control" name="contactNo" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="add-address">Address: </label>
                                            <textarea class="form-control" name="address" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="add-email">Email: </label>
                                            <input type="text" class="form-control" name="email" required>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="toggle-switch">
                                            <label class="form-check-label" for="toggle-switch"
                                                data-bs-on-label="Active" data-bs-off-label="Inactive">Account Status:
                                            </label>
                                        </div>

                                    </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" name="add" value="Add Member">
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
                <input class="form-control-sm me-2" type="text" placeholder="Search" name="search" required>
                <button class="btn btn-outline-info" type="submit">Search</button>
                <a class="mx-1 btn btn-outline-info" href="members.php" role="button">Go back to table</a>
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
                            $result_per_page = 50;

                            // display the original table
                            $query = "SELECT * FROM clients";
                            $query_result = mysqli_query($connections, $query);
                            $total_data = mysqli_num_rows($query_result);
                            $number_per_page = ceil($total_data / $result_per_page);

                            if (!isset($_GET['page'])) {
                                $page = 1;
                            } else {
                                $page = $_GET['page'];
                            }
                            $page_first_result = ($page - 1) * $result_per_page;

                            $query = "SELECT *FROM clients LIMIT " . $page_first_result . ',' . $result_per_page;
                            $result = mysqli_query($connections, $query);
                            ?>

                            <?php

                            while ($row = mysqli_fetch_array($result)) {

                            ?>
                            <tr>
                                <?php
                                    // Check if the edit form was submitted EDIT FORM
                                    if (isset($_POST['edit'])) {
                                        // Get the updated values from the form

                                        $db_id = $_POST['id'];
                                        $idNumber = $_POST['idNumber'];
                                        $name = $_POST['name'];
                                        $classification = $_POST['classification'];
                                        $birthday = $_POST['birthday'];
                                        $age = $_POST['age'];
                                        $tin = $_POST['tin'];
                                        $civilStatus = $_POST['civilStatus'];
                                        $gender = $_POST['gender'];
                                        $contactNo = $_POST['contactNo'];
                                        $address = $_POST['address'];
                                        $email = $_POST['email'];
                                        $accStatus = $_POST['accStatus'];

                                        // Update the clients table with the new values
                                        $query = "UPDATE clients SET idNumber='$idNumber', name='$name', classification='$classification', birthday='$birthday', age='$age', tin='$tin', civilStatus='$civilStatus', gender='$gender', contactNo='$contactNo', address='$address', email='$email', accStatus='$accStatus' WHERE db_id={$db_id}";
                                        mysqli_query($connections, $query);
                                        echo "<script language='javascript'>alert('Record has been updated!')</script>";
                                        echo "<script> window.location.href='members.php';</script>";
                                    }

                                    if (isset($_POST["delete_user"])) {
                                        $db_id = $_POST['id'];
                                        mysqli_query($connections, "DELETE FROM clients WHERE db_id='$db_id'");
                                        echo "<script language='javascript'>alert('User has been deleted!')</script>";
                                        echo "<script> window.location.href='members.php';</script>";
                                    }

                                    ?>

                                <!-- Display Members Table -->
                                <td><?php echo $row['db_id'] ?></td>
                                <td><?php echo $row['idNumber'] ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['classification'] ?></td>
                                <td><?php echo $row['birthday'] ?></td>
                                <td><?php echo $row['age'] ?></td>
                                <td><?php echo $row['tin'] ?></td>
                                <td><?php echo $row['civilStatus'] ?></td>
                                <td><?php echo $row['gender'] ?></td>
                                <td><?php echo $row['contactNo'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['accStatus'] ?></td>

                                <td>
                                    <!-- Button to trigger Edit Modal -->
                                    <a class="edit" title="Edit" data-toggle="tooltip" data-bs-toggle="modal"
                                        data-bs-target="#editModal-<?php echo $row['db_id'] ?>"><i class=" fa-solid
                                        fa-user-pen fa-md" style="color: #2564d0;"></i></a>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editModal-<?php echo $row['db_id'] ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">

                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Member</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <form method="POST">
                                                    <div class="modal-body">
                                                        <input type='hidden' name='id'
                                                            value="<?php echo $row['db_id'] ?>" id='edit-id'>

                                                        <div class="form-group d-grid gap-3">

                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    placeholder="ID Number" name="idNumber"
                                                                    value="<?php echo $row['idNumber'] ?>" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Name" name="name"
                                                                    value="<?php echo $row['name'] ?>" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Classification" name="classification"
                                                                    value="<?php echo $row['classification'] ?>"
                                                                    required>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="date" class="form-control"
                                                                    placeholder="Birthday" name="birthday"
                                                                    value="<?php echo $row['birthday'] ?>" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Age" name="age"
                                                                    value="<?php echo $row['age'] ?>" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Tax Identification Number" name="tin"
                                                                    value="<?php echo $row['tin'] ?>" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Civil Status" name="civilStatus"
                                                                    value="<?php echo $row['civilStatus'] ?>" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Gender" name="gender"
                                                                    value="<?php echo $row['gender'] ?>" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Contact Number" name="contactNo"
                                                                    value="<?php echo $row['contactNo'] ?>" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Address" name="address"
                                                                    value="<?php echo $row['address'] ?>" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Email" name="email"
                                                                    value="<?php echo $row['email'] ?>" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Account Status" name="accStatus"
                                                                    value="<?php echo $row['accStatus'] ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-primary" name="edit"
                                                            value="Update">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                    <a class="delete" title="Delete" data-toggle="tooltip" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal-<?php echo $row['db_id'] ?>"><i class=" fa-solid
                                        fa-user-xmark fa-md" style="color: #e81717;"></i></a>
                                    </a>
                                    <!-- Delete Modal -->
                                    <div class='modal fade' id="deleteModal-<?php echo $row['db_id'] ?>" tabindex='-1'
                                        role='dialog' aria-labelledby='deleteModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog' role='document'>
                                            <div class='modal-content'>

                                                <div class='modal-header'>
                                                    <h5 class='modal-title' id='deleteModalLabel'>
                                                        Delete Member</h5>
                                                    <button type='button' class='btn-close' data-bs-dismiss='modal'
                                                        aria-label='Close'></button>
                                                </div>

                                                <form method='POST'>
                                                    <input type='hidden' name='id' id='delete-id'
                                                        value="<?php echo $row['db_id'] ?>">
                                                    <div class='modal-body'>
                                                        Are you sure you want to delete this user?
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <button type='submit' class='btn btn-danger'
                                                            name='delete_user'>Confirm</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                            //display the link of the pages in URL  
                            for ($page = 1; $page <= $number_per_page; $page++) {
                                echo '<a class="btn btn-outline-success mx-1" href="members.php?page=' . $page . '">' . " " . $page . '</a> ';
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

var sel1 = document.querySelector('#classification');
var sel2 = document.querySelector('#subClassification');
var options2 = sel2.querySelectorAll('option');

function giveSelection(selValue) {
    sel2.innerHTML = '';
    for (var i = 0; i < options2.length; i++) {
        if (options2[i].dataset.option === selValue) {
            sel2.appendChild(options2[i]);
        }
    }
}

giveSelection(sel1.value);
</script>