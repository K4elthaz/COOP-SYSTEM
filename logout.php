<?php
session_start();

// Rest of your code...

unset($_SESSION['email']);
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session
echo "<script>window.location.href='login.php';</script>";
