<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9c35be8496.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="members.css">
    <title>Members</title>
  </head>
  <body>
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="controlPanel.php">Coop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="controlPanel.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../login.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="new-inp mt-2 d-flex justify-content-start" >
                <!-- Button trigger Delete modal -->
                <button type="button" class="btn btn-danger mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa fa-trash"></i> Delete All
                </button>

                <!-- Delete Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete all?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- // TODO: Make popup for add new -->
                <button type="button" class="btn btn-primary add-new float-end mx-1" ><i class="fa fa-plus"></i> Add New</button>

                <!-- Button trigger Export modal -->
                <button type="button" class="btn btn-success mx-1" data-bs-toggle="modal" data-bs-target="#exportModal">
                    <i class="fa fa-download"></i> Export
                </button>

                <!-- Export Modal -->
                <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to download this file?
                            </div>
                            <div class="modal-footer">
                                <a href="exportData.php" class="btn btn-success  export float-end mx-2" >Download</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Button trigger Import modal -->
                <button type="button" class="btn btn-warning mx-1" data-bs-toggle="modal" data-bs-target="#importModal">
                    <i class="fa-solid fa-file-import"></i> Import
                </button>

                <!-- Import Modal -->
                <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="importData.php" method="post" enctype="multipart/form-data">
                                    <input type="file" name="file" />
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-primary" name="importSubmit" value="CONFIRM">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form class="d-flex mt-1 mx-1 justify-content-start">
                <input class="form-control-sm me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
        <div class="container">
            <div class="card-body">
                <!-- table -->
                <div class="table-container">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th class="headcol">ID</th>
                                <th>MemberID</th>
                                <th class="third">Name</th>
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
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="viewer">
                            <?php
                                include("../connections.php");
                                    // Get member rows
                                    $result = $connections->query("SELECT * FROM members ORDER BY id");
                                        if($result->num_rows > 0){
                                            while($row = $result->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['memberID']; ?></td>
                                <td class="th"><?php echo $row['name']; ?></td>
                                <td><?php echo $row['loanType']; ?></td>
                                <td><?php echo $row['principal']; ?></td>
                                <td><?php echo $row['dateGranted']; ?></td>
                                <td><?php echo $row['term']; ?> Months</td>
                                <td><?php echo $row['amort']; ?></td>
                                <td><?php echo $row['paidAmount']; ?></td>
                                <td><?php echo $row['balance']; ?></td>
                                <td><?php echo $row['expAmount']; ?></td>
                                <td><?php echo $row['monthsDefault']; ?></td>
                                <td><?php echo $row['defaultAmount']; ?></td>
                                
                                <td>
                                    <!-- // !Fixed edit delete, remove add -->
                                    <a class="add" title="Add" data-toggle="tooltip" ><i class="fa-solid fa-user-plus fa-md" style="color: #2dab1c;"></i></a>
                                    <a class="edit" title="Edit" data-toggle="tooltip"><i class="fa-solid fa-user-pen fa-md" style="color: #2564d0;"></i></a>
                                    <a class="delete" title="Delete" data-toggle="tooltip"><i class="fa-solid fa-user-xmark fa-md" style="color: #e81717;"></i></a>
                                </td>
                            </tr>
                            <?php } }else{ ?>
                                <div>No member(s) found...</div>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>