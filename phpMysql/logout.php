<?php
session_start();

if(isset($_POST['logout'])){
    unset($_SESSION['name']);
    header("location:login.php");
    die();
}


?>