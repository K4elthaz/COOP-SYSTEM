<?php
include ('../connections.php');



// * Add New Member in clients table
if(isset($_POST['add'])){

    $id = $_POST['db_id'];
    $memberID = $_POST['idNumber'];
    $name = $_POST['name'];
    $loanType = $_POST['classifictaion'];
    $principal = $_POST['birthday'];
    $dateGranted = $_POST['age'];
    $term = $_POST['tin'];
    $amort = $_POST['civilStatus'];
    $paidAmount = $_POST['gender'];
    $balance = $_POST['contactNo'];
    $expAmount = $_POST['address'];
    $monthsDefault = $_POST['email'];
    $defaultAmount = $_POST['accStatus'];

    $query = mysqli_query($connections, "INSERT INTO clients (idNumber,name,classification,birthday,age,tin,civilStatus,gender,contactNo,address,email,accStatus) 
    VALUES('$idNumber', '$name' ,'$classification', '$birthday', '$age', '$tin', '$civilStatus', '$gender', '$contactNo', '$address', '$email', '$accStatus') ");
    echo "<script language='javascript'>alert('New record has been inserted!')</script>";
    echo "<script> window.location.href='members.php';</script>";
}

?>