<?php
session_start(); 
if (!isset($_SESSION['is_login'])) { 
    header("Location: login.php");  
} 

if(!isset($_SESSION['user'][$_SESSION['username']])){
    $_SESSION['user'][$_SESSION['username']] = 0;
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div>
    Your Balance : <?= $_SESSION['user'][$_SESSION['username']] ?>
</div>
<a href="home.php">Back</a>
    
</body>
</html>