<?php 
include 'filesLogic.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Downloads and Upload Files</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
    <body>
        <div class="container-xl px-10 mt-10 ">
            <nav class="nav nav-borders">
                <a class="nav-link active ms-0" href="AdminHome.php"> Admin</a>
                <!-- <a class="nav-link active ms-0" href="../Client/EditProfile.php"> Edit Profile</a> -->
                <!-- <a class="nav-link active ms-0" href="uploads.php"> Upload forms</a>      -->
                <a class="nav-link active ms-0" href="downloads.php"> Downloaded Forms</a>
                <a class="nav-link active ms-0"> Logout</a>
            </nav> 
                
                <hr class="mt-0 mb-4">
                
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-9">
                        <div class="card" id="form">
                            <nav class="card-header">
                                <b> FORMS </b>     
                            </nav>
                            <!-- Upload Files -->
                            <div class="card-body mb-5 d-flex justify-content-center">     
                                <form class="align-items-center" method="post" enctype="multipart/form-data">
                                    <h6> Supported formats are .docx and .pdf <h6>
                                    <input type="file" name="myfile"> 
                                    <button class="btn btn-primary btn-sm" type="submit" name="save"> Upload </button>
                                </form>        
                            </div>
                             <!-- Downloaded Forms -->
                            <div class="row px-4">
                                <div class="card-body">
                                    <div class="table-container">
                                        <table class="table mt-0 ">
                                            <thead> 
                                                <tr>
                                                    <th class="text-center">ID</th>
                                                    <th class="text-center">Filename</th>
                                                    <th class="text-center">size (in mb)</th>
                                                    <th class="text-center">Downloads</th>
                                                    <th class="text-center">Action</th>
                                                <tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($files as $file): ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $file['ID']; ?></td>
                                                        <td class="text-center"><?php echo $file['name']; ?></td>
                                                        <td class="text-center"><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
                                                        <td class="text-center"><?php echo $file['downloads']; ?></td>
                                                        <td class="text-center"><a href="downloads.php?file_id=<?php echo $file['ID'] ?>">Download</a></td>
                                                    </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>             
                        </div> 
                    </div>
                </div>                   
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>