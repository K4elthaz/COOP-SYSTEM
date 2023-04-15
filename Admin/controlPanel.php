<!-- // ! FIXED ADMIN CONTROL PANEL -->
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
        <link rel="stylesheet" href="controlPanel.css">
        <title> Admin </title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            <nav class="nav nav-borders">
                <a class="nav-link active ms-0" href="controlPanel.php" target="__blank">Home</a>
                <a class="nav-link active ms-0" href="../login.php">Logout</a>
            </nav>
                <!-- Display status message -->
            <hr class="mt-0 mb-4">
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
                                                <a href="AdminHome.php" class="btn btn-primary">Go To</a>
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
        <script src="../assts/e/js//bootstrap.min.js"></script>   
    </body>
</html>


