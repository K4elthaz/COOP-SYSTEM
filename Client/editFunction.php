<?php

include ("../connections.php");

session_start();

if (isset($_SESSION["idNumber"])) {
    $idNumber = $_SESSION["idNumber"];

    $queryEdit = mysqli_query($connections, "SELECT *, clients.db_id, clients.idNumber, clients.name, clients.classification, clients.birthday, clients.age, clients.tin, clients.civilStatus, clients.gender, clients.contactNo, clients.address, clients.email, clients.password, clients.accStatus FROM clients WHERE idNumber='$idNumber'");

    $editInfo = mysqli_fetch_assoc($queryEdit);
    $idUser = $editInfo['db_id'];
    $idNumber = $editInfo['idNumber'];
    $name = $editInfo['name'];
    $classification = $editInfo['classification'];
    $birthday = $editInfo['birthday'];
    $age = $editInfo['age'];
    $tin = $editInfo['tin'];
    $civilStatus = $editInfo['civilStatus'];
    $gender = $editInfo['gender'];
    $contactNo = $editInfo['contactNo'];
    $address = $editInfo['address'];
    $email = $editInfo['email'];
    $password = $editInfo['password'];
    $accStatus = $editInfo['accStatus'];
}

if (isset($_POST["editBtn"])) {
    
    $name = $_POST['name'];
    $birthday = $_POST['birthday'];
    $tin = $_POST['tin'];
    $civilStatus = $_POST['civilStatus'];
    $gender = $_POST['gender'];
    $contactNo = $_POST['contactNo'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    
    $updateQuery = mysqli_query($connections, "UPDATE clients SET idNumber='$idNumber', name='$name', birthday='$birthday', tin='$tin', civilStatus='$civilStatus', gender='$gender', contactNo='$contactNo', address='$address', email='$email' WHERE idNumber='$idNumber'");
    echo "<script language='javascript'>alert('Profile has been updated!')</script>";
    echo "<script> window.location.href='home.php';</script>";
}

if (isset($_POST["passwordBtn"])) {

    $password = $_POST['password'];

    $passwordUpdate = mysqli_query($connections, "UPDATE clients SET idNumber='$idNumber', password='$password' WHERE idNumber='$idNumber'");
    echo "<script language='javascript'>alert('Password has been updated!')</script>";
    echo "<script> window.location.href='home.php';</script>";
}

$target_dir = "profile_picture/";

if (isset($_POST['imgBtn'])) {

    $target_file = $target_dir . "/" . basename($_FILES["profile_img"]["name"]);
    $uploadSuccess = 1;

    if (file_exists($target_file)) {
        $target_file = $target_dir . rand(1,9) . rand(1,9) . rand(1,9) . rand(1,9) . "_" . basename($_FILES["profile_img"]["name"]);
        $uploadSuccess = 1;
    }

    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    if ($_FILES["profile_img"]["size"] > 5000000) {
        $uploadUnsuccesfull = "Sorry, your file is too large";
        $uploadSuccess = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $uploadUnsuccesfull = "Sorry, only JPG, JPEG & PNG files are allowed";
        $uploadSuccess = 0;
    }

    if ($uploadSuccess == 1) {
        if (move_uploaded_file($_FILES["profile_img"]["tmp_name"], $target_file)) {
            mysqli_query($connections, "UPDATE clients SET profile_pic='$target_file' WHERE idNumber='$idNumber'");
            // echo "<script language='javascript'>alert('Profile picture has been updated!')</script>";
            // echo "<script> window.location.href='';</script>";
        } else {
            echo "Sorry, there was an error uploading your file";
        }
    }
}
$imgQuery = mysqli_query($connections, "SELECT *, clients.db_id, clients.idNumber, clients.profile_pic FROM clients WHERE idNumber='$idNumber'");
$imgStorage = mysqli_fetch_assoc($imgQuery);
$img = (!empty($imgStorage)) ? $imgStorage["profile_pic"] : "";

?>