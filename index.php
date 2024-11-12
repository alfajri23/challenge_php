<?php

session_start(); 

include 'data.php';
// $_SESSION['username'];
// $_SESSION['user'];
// $_SESSION['transaksi'];


if (!isset($_SESSION['is_login'])) { 
    header("Location: login.php");  
    exit;
} else{
    header("Location: home.php");
    exit;
}

?>