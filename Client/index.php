<?php



if (isset($_SESSION["idNumber"])) {
    $email = $_SESSION["idNumber"];
} else {
    echo "<script>window.location.href='home.php';</script>";
}

include_once '../connections.php';
