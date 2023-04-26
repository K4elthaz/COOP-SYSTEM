<?php
$id_user = $_GET["id"];

$get_record = mysqli_query($connections, "SELECT * FROM dailytransact WHERE id ='$id_user' ");

while ($get = mysqli_fetch_assoc($get_record)) {

    $db_name = $get["name"];
    $db_paymentType = $get["paymentType"];
    $db_transactionDate = $get["transactionDate"];
    $db_referenceNo = $get["referenceNo"];
    $db_transactionRemarks = $get["transactionRemarks"];
    $db_collector = $get["collector"];

}

$NewName = $NewPaymentType = $NewTransactionDate = $NewReferenceNo = $NewTransactionRemarks = $NewCollector = "";
$NewNameErr = $NewPaymentTypeErr = $NewTransactionDateErr = $NewReferenceNoErr = $NewTransactionRemarksErr = $NewCollectorErr = "";

if (isset($_POST["btnUpdate"])) {
    if (empty($_POST["NewName"])) {
        $NewNameErr = "This field is empty!";
    } else {
        $NewName = $_POST["name"];
        $db_name = $NewName;
    }

    if (empty($_POST["NewPaymentType"])) {
        $NewPaymentTypeErr = "This field is empty!";
    } else {
        $NewPaymentType = $_POST["NewPaymentType"];
        $db_paymentType = $NewPaymentType;
    }

    if (empty($_POST["NewTransactionDate"])) {
        $NewTransactionDateErr = "This field is empty!";
    } else {
        $NewTransactionDate = $_POST["NewTransactionDate"];
        $db_transactionDate = $NewTransactionDate;
    }

    if (empty($_POST["NewReferenceNo"])) {
        $NewReferenceNoErr = "This field is empty!";
    } else {
        $NewReferenceNo = $_POST["NewReferenceNo"];
        $db_referenceNo = $NewReferenceNo;
    }

    if (empty($_POST["NewTransactionRemarks"])) {
        $NewTransactionRemarksErr = "This field is empty!";
    } else {
        $NewTransactionRemarks = $_POST["NewTransactionRemarks"];
        $db_transactionRemarks = $NewTransactionRemarks;
    }

    if (empty($_POST["NewCollector"])) {
        $NewCollectorErr = "This field is empty!";
    } else {
        $NewCollector = $_POST["NewCollector"];
        $db_collector = $NewCollector;
    }


    if ($NewName && $NewPaymentType && $NewTransactionDate && $NewReferenceNo && $NewTransactionRemarks && $NewCollector) {

        mysqli_query($connections, "UPDATE dailytransact SET
            name = '$db_name',
            paymentType = '$db_paymentType',
            transactionDate = '$db_transactionDate' ,
            referenceNo = '$db_referenceNo',
            transactionRemarks = '$db_transactionRemarks',
            collector = '$db_collector',
            ");


        echo "<script>window.location.href='transactions.php?$&&notify=Record Has Been Updated!';</script>";



    }

}