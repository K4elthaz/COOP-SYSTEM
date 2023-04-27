<?php


$get_record = mysqli_query($connections, "SELECT * FROM dailytransact");

while ($get = mysqli_fetch_assoc($get_record)) {
    $db_id = $get["id"];
    $db_memberID = $get["memberID"];
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
            collector = '$db_collector' WHERE id = '$db_id'
            ");


        echo "<script>window.location.href='transactions.php?$&&notify=Record Has Been Updated!';</script>";
    }
}
?>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Member ID" value=" <?php echo $db_memberID; ?>" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Name" name="name" value=" <?php echo $db_name; ?>" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Payment Type" name="Payment Type" value=" <?php echo $db_paymentType; ?>" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <input type="date" class="form-control" placeholder="Transaction Date" name="Transaction Date" value=" <?php echo $db_transactionDate; ?>" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Reference No" name="Reference No" value=" <?php echo $db_referenceNo; ?>" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Transaction Remarks" name="Transaction Remarks" value=" <?php echo $db_transactionRemarks; ?>" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Collector" name="Collector" value="<?php echo $db_collector; ?>" required>
                        </div>

                    </div>

            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" name="updateMember" value="Update">
                </form>
            </div>
        </div>
    </div>
</div>