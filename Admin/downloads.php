<?php 
include 'filesLogic.php';
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
        <meta name="viewport" content="initial-scale=1, width=device-width" />
        <link rel="stylesheet" href="../assets//css//bootstrap.min.css"/>

        <link rel="stylesheet" href="../assets//css//bootstrap.min.css"/>
        <link rel="stylesheet" href="./ERDBClientSideEditProfile.css" />
        <link rel="stylesheet"href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,700&display=swap"/>
        <!-- <link rel="stylesheet" href="./client.css"> -->

        <title>Download files</title>
    </head>
    <body>
        <div class="container-xl px-10 mt-10 ">
            <nav class="nav nav-borders">
                <a class="nav-link active ms-0" href="controlPanel.php"> Admin</a>
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
        <script src="../assts/e/js//bootstrap.min.js"></script>   
    </body>
</html>