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

        <title> Files Upload and Download </title>  
    </head>
    <body>

    <div class="container-xl px-4 mt-4 ">
            <!-- Account page navigation-->
            <nav class="nav nav-borders">
                <a class="nav-link active ms-0" href="AdminHome.php"> Admin</a>
                <!-- <a class="nav-link active ms-0" href="../Client/EditProfile.php"> Edit Profile</a> -->
                <a class="nav-link active ms-0" href="uploads.php"> Upload forms</a>     
                <a class="nav-link active ms-0" href="downloads.php"> Downloaded Forms</a>
                <a class="nav-link active ms-0"> Logout</a>
            </nav>

            <hr class="mt-0 mb-4">
            

            <div class="col-xl-5 ">
                <div class="card mb-2 mb-xl-0 ">
                    <div class="card-header"> <b> UPLOAD A FILE <b> </div>
                    <div class="card-body mb-5 d-flex justify-content-center">     
                        <form action="uploads.php" method="post" enctype="multipart/form-data">
                            <h6> Supported formats are .docx and .pdf <h6>
                            <input type="file" name="myfile"> 
                            <br>
                            <br>
                            <button class="btn btn-primary btn-sm" type="submit" name="save"> Upload </button>
                        </form>        
                    </div>                
                </div>
            </div>
            
            


    </div>
        <script src="../assts/e/js//bootstrap.min.js"></script>   
    </body>
</html>
