<?php

include ('../connections.php');

if(isset($_POST['addSubmit'])){

    $id = $_POST['id'];
    $memberID = $_POST['memberID'];
    $name = $_POST['name'];
    $loanType = $_POST['memberID'];
    $principal = $_POST['principal'];
    $dateGranted = $_POST['dateGranted'];
    $term = $_POST['term'];
    $amort = $_POST['amort'];
    $paidAmount = $_POST['paidAmount'];
    $balance = $_POST['balance'];
    $expAmount = $_POST['expAmount'];
    $monthsDefault = $_POST['monthsDefault'];
    $defaultAmount = $_POST['defaultAmount'];

    $query = mysqli_query($connections, "INSERT INTO members (memberID,name,loanType,principal,dateGranted,term,amort,paidAmount,balance,expAmount,monthsDefault,defaultAmount) 
    VALUES('$memberID', '$name' ,'$loanType', '$principal', '$dateGranted', '$term', '$amort', '$paidAmount', '$balance', '$expAmount', '$monthsDefault', '$defaultAmount') ");
    echo "<script language='javascript'>alert('New record has been inserted!')</script>";
    echo "<script> window.location.href='members.php';</script>";
}

?>