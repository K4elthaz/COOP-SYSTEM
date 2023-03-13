<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="../assets//css//bootstrap.min.css"/>

    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,700&display=swap"
    />

    <link rel="stylesheet" href="./client.css">
  </head>
  <body>
  <div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="login.php" target="__blank">View Balance</a>
        <a class="nav-link active ms-0" href="google.com" target="__blank">Edit Profile</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Personal Information</div>
                <div class="card-body text-center">
                    <img class="img-account-profile rounded-circle mb-2" src="../Client/IDPicture.jpg" alt="">
                    <h2 class="fw-bold">IAN ROBIN C. BREVA</h2>
                    <h3 class="fw-semibold">ID: 12345678</h3>

                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card mb-4" id="form">

                <nav class="card-header" id="btn">
                    <!-- <a class="card-header active ms-0" >YOUR BALANCE</a> -->
                    <h4> YOUR BALANCE </h4>
                </nav>
                <div class="card-body">
                    <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                            <th>HEADER</th>
                            <th>BALANCE</th>
                            <th>DATE</th>
                            <th>LOAN AMOUNT</th>
                            <th>TERM</th>
                            <th>MONTHLY</th>
                            <th>MONTHS DEFAULT</th>
                            <th>ARREARS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>Tiger</td>
                            <td>Nixon</td>
                            <td>System</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                            <td>5421</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../assts/e/js//bootstrap.min.js"></script>   
</body>
</html>

<script>
$(document).ready(function () {
  $('#dtHorizontalExample').DataTable({
    "scrollX": true
  });
  $('.dataTables_length').addClass('bs-select');
});
</script>