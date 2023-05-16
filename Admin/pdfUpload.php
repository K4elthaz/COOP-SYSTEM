<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="pdfUpload.css">
</head>

<body>
    </p>
    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid ">
                <a class="navbar-brand" href="controlPanel.php">Coop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="controlPanel.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../login.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>      
    </div>

    <div class="row d-flex justify-content-center mt-5">
        <div class="col-sm-7">
            <div class="card" id="form">
                <nav class="card-header">
                    <b> FORMS </b>     
                </nav>

                    <div class="d-flex justify-content-center align-self-center" style="margin-top: 50px;">
                        <form action="submit.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            <div class="formgroup container-fluid">
                                <label for="project_name">Enter the PDF Filename</label>
                                <input type="text" name="project_name" />
                            </div>
                            <div class="formgroup container-fluid mt-2">
                                <input type="file" name="pdf_file" accept=".pdf" />
                                <input type="hidden" name="MAX_FILE_SIZE" value="67108864" />
                                <! - 64 MB's worth in bytes → </div>
                                <input class="btn btn-primary btn-sm" type="submit" name="submit" />
                            </div>
                        </form>
                    </div>
                    <div class="row px-5 mt-3">
                        <div class="card-body">
                            <div class="table-container">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Filename</th>
                                        <th scope="col">Download</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        include("../connections.php");
                                        // Retrieve the PDF files from the database
                                        $sql = "SELECT id, project_name FROM pdf_files";
                                        $result = $connections->query($sql);

                                        // Display the PDF files in a table
                                        while ($row = $result->fetch_assoc()) {
                                            $pdf_id = $row['id'];
                                            $pdf_projectname = $row['project_name'];
                                            echo "<tr>
                                                <td>$pdf_id</td>
                                                <td>$pdf_projectname</td>
                                                <td><a href='downloadProcess.php?id=$pdf_id'>Download Here</a></td>
                                            </tr>";
                                        }
                                        echo "</table>";

                                        // Close the database connection
                                        $connections->close();
                                        ?>
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
