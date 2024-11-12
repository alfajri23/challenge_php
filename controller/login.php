<?php
session_start(); 
    if(isset($_POST['submit'])){
        //die($_POST['submit']);
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['is_login'] = true;
        header("Location: ../home.php");
        exit;
    }else{
        header("Location: ../login.php");
    }



?>