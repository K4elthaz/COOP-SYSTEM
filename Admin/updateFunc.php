<?php

$id_user = $_GET["id_user"];

$get_record = mysqli_query($connections, "SELECT * FROM dailytransact WHERE id ='$id' ");

while ($get = mysqli_fetch_assoc($get_record)) {

    $db_first_name = $get["first_name"];
    $db_middle_name = $get["middle_name"];
    $db_last_name = $get["last_name"];
    $db_gender = $get["gender"];
    $db_preffix = $get["preffix"];
    $db_seven_digit = $get["seven_digit"];
    $db_email = $get["email"];
    $db_password = $get["password"];

}

?>