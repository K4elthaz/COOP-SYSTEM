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
    <title> Loan Form </title>
  </head>
  <body>
  <div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="viewBalance.php" target="__blank">View Balance</a>
        <a class="nav-link active ms-0" href="forms.php" target="__blank">Loan & Petty Cash forms</a>
        <a class="nav-link active ms-0" href="EditProfile.php" target="__blank">Edit Profile</a>
        <a class="nav-link active ms-0" href="../login.php">Logout</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
 
                <div class="row">
                    <div class="col-xs-8 col-xs-offset-2">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>File Name</th>
                                    <th>Download</th>
                                </tr>

                                <tr>
                                    <th> 1 </th>
                                    <th> LOAN FORM </th>
                                </tr>

                                <tr>
                                    <th> 2 </th>
                                    <th> PETTY CASH FORM </th>            
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $i = 1;
                                while($row = mysqli_fetch_array($result)) { ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row['filename']; ?></td>
                                        <td><a href="uploads/<?php echo $row['filename']; ?>" target="_blank">View</a></td>
                                        <td><a href="uploads/<?php echo $row['filename']; ?>" download>Download</td>
                                    </tr>
                                <?php } ?>
                            
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


<?php

include("../connections.php");

$FileNo=$_GET['FileNO'];

//Use Mysql Query to find the 'full path' of file using $FileNo.
// I Assume $FilePaths as 'Full File Path'.

download_file($FilePaths);

function download_file( $fullPath ){
    if( headers_sent() )
    die('Headers Sent');


    if(ini_get('zlib.output_compression'))
        ini_set('zlib.output_compression', 'Off');


    if( file_exists($fullPath) ) {
        $fsize = filesize($fullPath);
        $path_parts = pathinfo($fullPath);
        $ext = strtolower($path_parts["extension"]);

    switch ($ext){
        case "pdf": $ctype="application/pdf"; break;
        case "exe": $ctype="application/octet-stream"; break;
        case "zip": $ctype="application/zip"; break;
        case "doc": $ctype="application/msword"; break;
        case "xls": $ctype="application/vnd.ms-excel"; break;
        case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
        case "gif": $ctype="image/gif"; break;
        case "png": $ctype="image/png"; break;
        case "jpeg":
        case "jpg": $ctype="image/jpg"; break;
        default: $ctype="application/force-download";
    }

    header("Pragma: public"); 
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false); 
    header("Content-Type: $ctype");
    header("Content-Disposition: attachment; filename=\"".basename($fullPath)."\";" );
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".$fsize);
    ob_clean();
    flush();
    readfile( $fullPath );

    } else
        die('File Not Found');
}

?>