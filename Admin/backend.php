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


$fetch_query = mysqli_query($connections, "SELECT * FROM members WHERE id");
while ($rows = mysqli_fetch_assoc($fetch_query)){
    
    $id = $rows['id'];
    $db_memberID = $rows['memberID'];
    $db_name = $rows['name'];
    $db_loanType = $rows['loanType'];
    $db_principal = $rows['principal'];
    $db_dateGranted = $rows['dateGranted'];
    $db_term = $rows['term'];
    $db_amort = $rows['amort'];
    $db_paidAMount = $rows['paidAmount'];
    $db_balance = $rows ['balance'];
    $db_expAmount = $rows ['expAmount'];
    $db_monthsDefault = $rows['monthsDefault'];
    $db_defaultAmount = $rows['defaultAmount'];

    
}

?>