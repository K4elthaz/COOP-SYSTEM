<?php

include ("../connections.php");

session_start();

if (isset($_SESSION['idNumber'])){
    $idNumber = $_SESSION['idNumber'];

    $queryView = mysqli_query($connections, "SELECT * FROM co_maker");

    $viewInfo = mysqli_fetch_assoc($queryView);
    $id = $viewInfo['id'];
    $name = $viewInfo['name'];
    $idNumber1 = $viewInfo['idNumber'];
    $tin = $viewInfo['tin'];
    $no = $viewInfo['no'];
    $birthday = $viewInfo['birthday'];
    $email = $viewInfo['email'];
    $civilStatus = $viewInfo['civilStatus'];
    $gender = $viewInfo['gender'];
    $loanType = $viewInfo['loanType'];
    $paymentTerm = $viewInfo['paymentTerm'];
    $amount = $viewInfo['amount'];
    $co_maker_1 = $viewInfo['co_maker_1'];
    $co_maker_2 = $viewInfo['co_maker_2'];
    $co_maker_3 = $viewInfo['co_maker_3'];
    $co_maker_4 = $viewInfo['co_maker_4'];
    $co_maker_5 = $viewInfo['co_maker_5'];
    $co_maker_6 = $viewInfo['co_maker_6'];
    $co_maker_7 = $viewInfo['co_maker_7'];
}

?>