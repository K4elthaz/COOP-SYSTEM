<?php



if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
} else {
    echo "<script>window.location.href='home.php';</script>";
}

include_once '../connections.php';
