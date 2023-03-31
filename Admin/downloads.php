<?php 
include 'filesLogic.php';
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets//css//bootstrap.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,700&display=swap"/>
    <link rel="stylesheet" href="../Client/client.css">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <title>Download files</title>
    </head>
    <body>
        <div class="container-xl px-10 mt-10">
            <nav class="nav nav-borders">
                <a class="nav-link active ms-0" href="viewBalance.php" >TEST</a>
                <a class="nav-link active ms-0" href="downloads.php" >TEST</a>
                <a class="nav-link active ms-0" href="EditProfile.php">TEST</a>
                <a class="nav-link active ms-0" target="__blank">TEST</a>
            </nav> 
                
                <hr class="mt-0 mb-4">
                
                <div class="row">
                    <div class="col-sm-9">
                        <div class="card" id="form" position="aboslute">
                            <nav class="card-header">
                                <h4> FORMS </h4>     
                            </nav>
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