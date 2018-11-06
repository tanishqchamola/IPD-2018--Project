<?php 
session_start();
unset($_SESSION['sess_rollnumber']);
session_destroy();
header("location:login.php");
?>