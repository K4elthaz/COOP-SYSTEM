<?php
include ("../connections.php");
include ("editFunction.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    
    <link rel="stylesheet" href="editProfile.css">
    <title>Edit Account</title>
</head>

<body>
<div class="container-xl px-4 mt-4">
<?php include('sidebar.php'); ?>
    <div class="row">
        <!-- Account page navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand logo-image" href="home.php"><img src="images/cooplogo.png" style="width: 60px; height: auto;" alt="alternative"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../logout.php">Logout</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row" id="pages">
            <div class="col-sm-3 mr-5">
                <!-- Profile picture card-->
                <div class="card mb-2 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="card-body text-center">
                            <!-- Profile picture image-->
                            <img class="img-account-profile rounded-circle mb-2" src="<?php echo $profile_pic ?>"
                                alt="">
                            <!-- Profile picture help block-->
                            <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                            <input type="file" id="profile_img" name="profile_img"
                                onchange="displayPreview(this.files)">
                            <!-- Profile picture upload button-->
                            <button class="btn btn-primary mt-3" name="imgBtn" type="submit">Upload new image</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-9">
                <!-- Account details card-->
                <div class="card mb-4 ">
                    <nav class="card-header" id="formSelector">
                        <a class="card-header active ms-0" id="edit-btn" name="form" value="1" target="__blank">Edit
                            Profile</a>
                        <a class="card-header active ms-0" id="pass-btn" name="form" value="2" target="__blank">Change
                            password</a>
                    </nav>
                    <div class="card-body">
                        <div id="edit-btn">
                            <form id="edit-btn" method="POST">
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (Full Name)-->
                                    <div class="col-md-6">
                                        <label class="form-label small mb-1" for="inputName">Name</label>
                                        <input class="form-control" id="inputName" name="name" type="text"
                                            value=" <?php echo $name ?>">
                                    </div>
                                    <!-- Form Group (Email Address)-->
                                    <div class="col-md-6">
                                        <label class="form-label small mb-1" for="inputEmailAddress">Email
                                            Address</label>
                                        <input class="form-control" id="inputEmailAddress" name="email" type="email"
                                            value=" <?php echo $email ?>">
                                    </div>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (Contact Number)-->
                                    <div class="col-md-6">
                                        <label class="form-label small mb-1" for="inputNumber">Contact No.</label>
                                        <input class="form-control" id="inputNumber" name="contactNo" type="text"
                                            value=" <?php echo $contactNo ?>">
                                    </div>
                                    <!-- Form Group (Civil Status)-->
                                    <div class="col-md-2 ">
                                        <label class="form-label small mb-1" for="inputCivilStatus">Civil Status</label>
                                        <select class="form-select" id="inputCivilStatus" name="civilStatus">
                                            <option value=""><?php echo $civilStatus ?></option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Seperated">Seperated</option>
                                            <option value="Widowed">Widowed</option>
                                        </select>
                                    </div>
                                    <!-- Form Group (gender)-->
                                    <div class="col-md-2 ">
                                        <label class="form-label small mb-1" for="inputGender">Gender</label>
                                        <select class="form-select" id="inputGender" name="gender">
                                            <option value=""><?php echo $gender ?></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <!-- Form Group (birthday)-->
                                    <div class="col-md-2">
                                        <label class="form-label small mb-1" for="inputBirthday">Birthday</label>
                                        <input class="form-control" id="inputBirthday" type="date" name="birthday"
                                            value="<?php echo $birthday ?>">
                                    </div>
                                </div>
                                <!-- Form Group (TIN)-->
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <label class="form-label small mb-1" for="inputTin">TIN</label>
                                        <input class="form-control" id="inputTin" name="tin" type="text"
                                            value="<?php echo $tin ?>">
                                    </div>
                                    <!-- Form Group (Address)-->
                                    <div class="col-lg-7">
                                        <label class="form-label small mb-1" for="inputAddress">Address</label>
                                        <input class="form-control" id="inputAddress" name="address" type="text"
                                            value="<?php echo $address ?>">
                                    </div>

                                </div>
                                <!-- Save changes button-->
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary me-md-2" name="editBtn" type="submit">Save
                                        changes</button>
                                </div>
                            </form>
                        </div>
                        <div id="pass-btn">
                            <form id="pass-btn" method="POST" style="display: none;">
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (Change password)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputPassword">New Password</label>
                                        <div class="input-group">
                                            <input class="form-control" id="inputPassword" type="password"
                                                name="password" value="<?php echo $password ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text" onclick="password_show_hide();">
                                                    <i class="fas fa-eye" id="show_eye"></i>
                                                    <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Form Group (Confirm password)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputPassword">Confirm Password</label>
                                        <div class="input-group">
                                            <input class="form-control" id="inputPassword1" type="password"
                                                name="password" placeholder="Confirm your password" value="">
                                            <div class="input-group-append">
                                                <span class="input-group-text" onclick="password_show_hide1();">
                                                    <i class="fas fa-eye" id="show_eye1"></i>
                                                    <i class="fas fa-eye-slash d-none" id="hide_eye1"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary me-md-2" name="passwordBtn" type="submit">Save
                                        changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    
</body>

</html>

<script type="application/javascript">
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

function password_show_hide() {
    var x = document.getElementById("inputPassword");
    var show_eye = document.getElementById("show_eye");
    var hide_eye = document.getElementById("hide_eye");
    hide_eye.classList.remove("d-none");
    if (x.type === "password") {
        x.type = "text";
        show_eye.style.display = "none";
        hide_eye.style.display = "block";
    } else {
        x.type = "password";
        show_eye.style.display = "block";
        hide_eye.style.display = "none";
    }
}

function password_show_hide1() {
    var x = document.getElementById("inputPassword1");
    var show_eye = document.getElementById("show_eye1");
    var hide_eye = document.getElementById("hide_eye1");
    hide_eye.classList.remove("d-none");
    if (x.type === "password") {
        x.type = "text";
        show_eye.style.display = "none";
        hide_eye.style.display = "block";
    } else {
        x.type = "password";
        show_eye.style.display = "block";
        hide_eye.style.display = "none";
    }
}

var _URL = window.URL || window.webkitURL;

function displayPreview(files) {
    var file = files[0];
    var img = new Image();
    var sizeKB = file.size / 1024;
    img.onload = function() {
        $('#preview').append(img);
    }

    img.src = _URL.createObjectURL(file);

}
</script>

<style>
/* Style for Show and hide pass and input  */
.form-control,
.input-group-text {
    height: 40px;
    /* Adjust the height value as per your requirement */
}