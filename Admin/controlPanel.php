<!-- // ! FIXED ADMIN CONTROL PANEL -->
<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="controlPanel.css">
    <title>Members</title>
  </head>

    <body>
        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            <!-- <nav class="nav nav-borders">
                <a class="nav-link active ms-0" href="AdminHome.php" target="__blank">Home</a>
                <a class="nav-link active ms-0" href="../login.php">Logout</a>
            </nav> -->
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
                <!-- Display status message -->
            <div class="row">
                <div class="col-sm-3 mr-5" >
                    <div class="card mb-2 mb-xl-0" >
                        <div class="card-header"><b>Admin Information</b></div>
                        <div class="card-body text-center">
                            <img class="img-account-profile rounded-circle mb-2" src="../Client/IDPicture.jpg" alt="">
                            <h2 class="fw-bold">Name</h2>
                            <p> President </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9" >
                    <div class="card" id="form" position="aboslute">
                        <nav class="card-header" id="btn">
                            <b> Dashboard </b>
                        </nav>
                        <div class="row px-4">
                            <div class="card-body">
                                <!-- table -->
                                <h1>Welcome User!</h1>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-body" style="background-color: #C0F8D1;">
                                                <b class="card-title">Control Panel</b>
                                                <p class="card-text">Import and export dataset of each users.</p>
                                                <a href="members.php" class="btn btn-primary">Go To</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-body" style="background-color: #A4C5E9;">
                                                <b class="card-title">Daily Transact</b>
                                                <p class="card-text">Dataset for each users daily transactions.</p>
                                                <a href="DailyTransact.php" class="btn btn-primary">Go To</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-body" style="background-color: #F2C2D4;">
                                                <b class="card-title">Upload and Download Forms</b>
                                                <p class="card-text">Upload and download forms for loans.</p>
                                                <a href="downloads.php" class="btn btn-primary">Go To</a>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>


