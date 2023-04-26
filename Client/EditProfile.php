<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="../assets//css//bootstrap.min.css" />
    <link rel="stylesheet" href="./ERDBClientSideEditProfile.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,700&display=swap" />
    <link rel="stylesheet" href="./client.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body>

    <div class="row">
        <!-- Account page navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="controlPanel.php">Coop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link Active" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link Active" href="../login.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row d-flex justify-content-center" id="pages">
            <div class="col-xl-3">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" src="../Client/IDPicture.jpg" alt="">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <button class="btn btn-primary" type="button">Upload new image</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <nav class="card-header" id="formSelector">
                        <a class="card-header active ms-0" id="edit-btn" name="form" value="1" target="__blank">Edit
                            Profile</a>
                        <a class="card-header active ms-0" id="pass-btn" name="form" value="2" target="__blank">Change
                            password</a>
                    </nav>
                    <div class="card-body">
                        <div id="edit-btn">
                            <form id="edit-btn">
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (surname)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName">Surname</label>
                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your surname" value="">
                                    </div>
                                    <!-- Form Group (given name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Given name</label>
                                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter your given name" value="">
                                    </div>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (middle name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName">Middle name</label>
                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your middle name" value="">
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Extension name</label>
                                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter your extension name" value="">
                                    </div>
                                </div>
                                <!-- Form Row        -->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputOrgName">Email Address</label>
                                        <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your email address" value="">
                                    </div>
                                    <!-- Form Group (location)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLocation">Contact No.</label>
                                        <input class="form-control" id="inputLocation" type="text" placeholder="Enter your contact number" value="">
                                    </div>
                                </div>
                                <!-- Form Group (address)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Address</label>
                                    <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your current address" value="">
                                </div>
                                <!-- Form Group (civil status)-->

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (phone number)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputPhone">TIN</label>
                                        <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your TIN number" value="">
                                    </div>

                                    <div class="col-md-2 ">
                                        <label class="small mb-1" for="inputBirthday">Civil Status</label>
                                        <select class="form-control " id="inputBirthday" name="birthday">
                                            <option value="Option">Civil Status</option>
                                            <option value="Male">Single</option>
                                            <option value="Female">Married</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Seperated">Seperated</option>
                                            <option value="Widowed">Widowed</option>
                                        </select>
                                    </div>

                                    <!-- Form Group (gender)-->
                                    <div class="col-auto ">
                                        <label class="small mb-1" for="inputBirthday">Gender</label>
                                        <select class="form-control " id="inputBirthday" name="birthday" placeholder="Gender">
                                            <option value="Option">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <!-- Form Group (birthday)-->
                                    <div class="col-auto">
                                        <label class="small mb-1" for="inputBirthday">Birthday</label>
                                        <input class="form-control" id="inputBirthday" type="date" name="birthday" placeholder="Enter your birthday" value="06/10/1988">
                                    </div>
                                </div>
                                <!-- Save changes button-->
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary me-md-2" type="submit">Save changes</button>
                                </div>
                                <script src="../assets//js//bootstrap.min.js"></script>

                            </form>
                        </div>
                        <div id="pass-btn">
                            <form id="pass-btn" style="display: none;">
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (Change password)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputPhone">Password</label>
                                        <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your new password" value="">
                                    </div>
                                    <!-- Form Group (Confirm password)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputBirthday">Confirm Password</label>
                                        <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="Confirm your password" value="">
                                    </div>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary me-md-2" type="submit">Save changes</button>
                                </div>
                                <script src="../assts/e/js//bootstrap.min.js"></script>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script type="text/javascript">
    // const btn = document.getElementById('formSelector');

    // btn.addEventListener('click', () => {

    //     const pass = document.getElementById('form-pass');
    //     const edit = document.getElementById('form-edit');

    //     if (pass.style.display === 'none' && edit.style.display != 'none') {
    //         // 👇️ this SHOWS the form
    //         pass.style.display = 'block';
    //         edit.style.display = 'none';
    //     } else if (pass.style.display === 'none'){
    //         // 👇️ this HIDES the form
    //         pass.style.display = 'block';
    //     } else {
    //         edit.style.display = 'none';
    //     }
    // });

    $("#edit-btn").click(function() {
        var id = $(this).attr('id');
        $('#pages form#pass-btn').css('display', 'none');
        $('#pages div#' + id + '').css('display', 'block');
    });

    $("#pass-btn").click(function() {
        var id = $(this).attr('id');
        $('#pages div#edit-btn').css('display', 'none');
        $('#pages form#' + id + '').css('display', 'block');
    });
</script>