<?php
include ("../connections.php");
include ("viewLoansFunction.php");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Loans</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
</head>

<body>
    <div class="container-xl px-5 mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header text-center">
                        <b>Request Loans</b>
                    </div>
                    <div class="card-body">
                        <div class="table-container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center"><?php echo $id ?></td>
                                        <td class="text-center"><?php echo $name ?></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-sm btn-outline-primary flex-end"
                                                id="info" data-toggle="tooltip" data-bs-toggle="modal"
                                                data-bs-target="#infoModal">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i> View Info
                                            </button>

                                            <div class="modal fade" id="infoModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">

                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Loan
                                                                Information</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="row gap-2">
                                                                <div class="form-group d-flex justify-content-center">
                                                                    <img class="img-request-holder rounded-circle"
                                                                        src="../Client//profile.png" alt="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control text-center"
                                                                        name="name" value="<?php echo $name ?>"
                                                                        disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="number"
                                                                        class="form-control text-center" name="idNumber"
                                                                        value="<?php echo $idNumber1 ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="number"
                                                                        class="form-control text-center" name="tin"
                                                                        value="<?php echo $tin ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="date" class="form-control text-center"
                                                                        name="birthday" value="<?php echo $birthday ?>"
                                                                        disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="email" class="form-control text-center"
                                                                        name="email" value="<?php echo $email ?>"
                                                                        disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control text-center"
                                                                        name="civilStatus"
                                                                        value="<?php echo $civilStatus ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control text-center"
                                                                        name="gender" value="<?php echo $gender ?>"
                                                                        disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control text-center"
                                                                        name="loanType" value="<?php echo $loanType ?>"
                                                                        disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="number"
                                                                        class="form-control text-center"
                                                                        name="paymentTerm"
                                                                        value="<?php echo $paymentTerm ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="number"
                                                                        class="form-control text-center" name="amount"
                                                                        value="<?php echo $amount ?>" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-primary"
                                                                data-bs-target="#coMakerModal" data-bs-toggle="modal">Co
                                                                Makers</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="coMakerModal" aria-hidden="true"
                                                aria-labelledby="coMakerModalLabel" tabindex="-1">
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="coMakerModalLabel">Co Makers
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="modal-body">
                                                                <div class="row gap-2">
                                                                    <div class="form-group">
                                                                        <input type="text"
                                                                            class="form-control text-center"
                                                                            name="co_maker_1"
                                                                            value="<?php echo $co_maker_1 ?>" disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text"
                                                                            class="form-control text-center"
                                                                            name="co_maker_2"
                                                                            value="<?php echo $co_maker_2 ?>" disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text"
                                                                            class="form-control text-center"
                                                                            name="co_maker_3"
                                                                            value="<?php echo $co_maker_3 ?>" disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text"
                                                                            class="form-control text-center"
                                                                            name="co_maker_4"
                                                                            value="<?php echo $co_maker_4 ?>" disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text"
                                                                            class="form-control text-center"
                                                                            name="co_maker_5"
                                                                            value="<?php echo $co_maker_5 ?>" disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text"
                                                                            class="form-control text-center"
                                                                            name="co_maker_6"
                                                                            value="<?php echo $co_maker_6 ?>" disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text"
                                                                            class="form-control text-center"
                                                                            name="co_maker_7"
                                                                            value="<?php echo $co_maker_7 ?>" disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-center">
                                                            <button class="btn btn-danger">Declined</button>
                                                            <button class="btn btn-success">Approved</button>
                                                            <button class="btn btn-primary" data-bs-target="#infoModal"
                                                                data-bs-toggle="modal">Information</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
                crossorigin="anonymous">
            </script>
</body>

</html>

<style>
.img-request-holder {
    height: 10rem;
}
</style>