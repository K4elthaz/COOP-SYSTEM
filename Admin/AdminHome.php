<?php
// Get status message
if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            // $statusType = 'alert-success';
            $statusMsg = 'Members data has been imported successfully.';
            break;
        case 'err':
            // $statusType = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            // $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="initial-scale=1, width=device-width" />

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="../assets//css//bootstrap.min.css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet"href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,700&display=swap"/>
        <link rel="stylesheet" href="adminHome.css">
        <title> Admin </title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            <nav class="nav nav-borders">
                <a class="nav-link active ms-0" href="login.php" target="__blank">Admin</a>
                <a class="nav-link active ms-0" href="downloads.php" target="__blank">Forms</a>
                <a class="nav-link active ms-0" href="../login.php">Logout</a>
            </nav>
                <!-- Display status message -->
<?php if(!empty($statusMsg)){ 
    function function_alert($statusMsg) {   
        echo "<script>alert('$statusMsg');</script>";
    }   
    function_alert("$statusMsg");
    ?>
    
    
<?php } ?>
            <hr class="mt-0 mb-4">
            <div class="row">
                <div class="col-sm-3 mr-5" >
                    <div class="card mb-2 mb-xl-0" >
                        <div class="card-header">Admin Information</div>
                        <div class="card-body text-center">
                            <img class="img-account-profile rounded-circle mb-2" src="../Client/IDPicture.jpg" alt="">
                            <h2 class="fw-bold">Name</h2>
                            <p> President </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 " >
                    <div class="card" id="form" position="aboslute">
                        <nav class="card-header" id="btn">
                            <div class="search float-end">
                                <form class="example mt-2" action="">
                                    <input type="text" placeholder="  Search.." name="search">
                                    <button type="submit"><i class="fa fa-search fa-outline-success" aria-hidden="true"></i></button>   
                                </form>
                            </div>
                            <h4> Control Panel </h4>     
                        </nav>
                        <div class="row px-4 ">
                            <div class="new-inp mt-4" >
                                <button type="button" class="btn btn-primary add-new float-end" ><i class="fa fa-plus"></i> Add New</button>
                                <a href="exportData.php" class="btn btn-success  export float-end mx-1" ><i class="fa fa-download"></i> Export</a>
                                <!-- <button type="button" class="btn btn-success  export float-end mx-1" ><i class="fa fa-download"></i> Export</button> -->
                                <button type="button" class="btn btn-warning import float-end" onclick="formToggle('importFrm');"><i class="fa fa-file-excel-o" ></i> Import</button>
                            </div>
                            <div class="col-md-5" id="importFrm" style="display: none;">
                                    <form action="importData.php" method="post" enctype="multipart/form-data">
                                        <input type="file" name="file" />
                                        <input type="submit" class="btn btn-primary" name="importSubmit" value="CONFIRM">
                                    </form>
                                </div>
                        </div>
                        
                        <div class="row px-4">
                            <div class="card-body">
                                <!-- table -->
                                <div class="table-container">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="headcol">ID</th>
                                                <th>MemberID</th>
                                                <th class="third">Name</th>
                                                <th>Loan Type</th>
                                                <th>Principal</th>
                                                <th>Date Granted</th>
                                                <th>Term</th>
                                                <th>Amort</th>
                                                <th>Paid Amount</th>
                                                <th>Balance</th>
                                                <th>Expected Amount</th>
                                                <th>Months Default</th>
                                                <th>Default Amount</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        include("../connections.php");

                                        // Get member rows
                                        $result = $connections->query("SELECT * FROM members ORDER BY id");
                                        if($result->num_rows > 0){
                                            while($row = $result->fetch_assoc()){
                                        ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['memberID']; ?></td>
                                                <td class="th"><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['loanType']; ?></td>
                                                <td><?php echo $row['principal']; ?></td>
                                                <td><?php echo $row['dateGranted']; ?></td>
                                                <td><?php echo $row['term']; ?> Months</td>
                                                <td><?php echo $row['amort']; ?></td>
                                                <td><?php echo $row['paidAmount']; ?></td>
                                                <td><?php echo $row['balance']; ?></td>
                                                <td><?php echo $row['expAmount']; ?></td>
                                                <td><?php echo $row['monthsDefault']; ?></td>
                                                <td><?php echo $row['defaultAmount']; ?></td>
                                                <td>
                                                    <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons"></i></a>
                                                    <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"></i></a>
                                                    <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons"></i></a>
                                                </td>
                                            </tr>
                                        <?php } }else{ ?>
                                            <div>No member(s) found...</div>
                                        <?php } ?>


                                            <!-- <tr>
                                                <td class="headcol">Sample Text</td>
                                                <td>Administration</td>
                                                <td>Sample Text</td>
                                                <td>Sample Text</td>
                                                <td>Sample Text</td>
                                                <td>Sample Text</td>
                                                <td>Sample Text</td>
                                                <td>Sample Text</td>
                                                <td>
                                                    <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons"></i></a>
                                                    <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"></i></a>
                                                    <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons"></i></a>
                                                </td>
                                            </tr> -->
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

<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
	var actions = $("table td:last-child").html();
	// Append table with add row form on add new button click
    $(".add-new").click(function(){
		$(this).attr("disabled", "disabled");
		var index = $("table tbody tr:last-child").index();
        var row = '<tr>' +
            '<td><input type="text" class="form-control" name="name" id="id"></td>' +
            '<td><input type="text" class="form-control" name="name" id="name"></td>' +
            '<td><input type="text" class="form-control" name="department" id="department"></td>' +
            '<td><input type="text" class="form-control" name="phone" id="phone"></td>' +
            '<td><input type="text" class="form-control" name="phone" id="loan-amount"></td>' +
            '<td><input type="text" class="form-control" name="phone" id="term"></td>' +
            '<td><input type="text" class="form-control" name="phone" id="monthly"></td>' +
            '<td><input type="text" class="form-control" name="phone" id="months-default"></td>' +
            '<td><input type="text" class="form-control" name="phone" id="arrears"></td>' +
			'<td>' + actions + '</td>' +
        '</tr>';
    	$("table").append(row);		
		$("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        $('[data-toggle="tooltip"]').tooltip();
    });
	// Add row on add button click
	$(document).on("click", ".add", function(){
		var empty = false;
		var input = $(this).parents("tr").find('input[type="text"]');
        input.each(function(){
			if(!$(this).val()){
				$(this).addClass("error");
				empty = true;
			} else{
                $(this).removeClass("error");
            }
		});
		$(this).parents("tr").find(".error").first().focus();
		if(!empty){
			input.each(function(){
				$(this).parent("td").html($(this).val());
			});			
			$(this).parents("tr").find(".add, .edit").toggle();
			$(".add-new").removeAttr("disabled");
		}		
    });
	// Edit row on edit button click
	$(document).on("click", ".edit", function(){		
        $(this).parents("tr").find("td:not(:last-child)").each(function(){
			$(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
		});		
		$(this).parents("tr").find(".add, .edit").toggle();
		$(".add-new").attr("disabled", "disabled");
    });
	// Delete row on delete button click
	$(document).on("click", ".delete", function(){
        $(this).parents("tr").remove();
		$(".add-new").removeAttr("disabled");
    });
});

function formToggle(ID){
    var element = document.getElementById(ID);
    if(element.style.display === "none"){
        element.style.display = "block";
    }else{
        element.style.display = "none";
    }
}

</script>

