<?php

include '../model/model.php';
include '../data.php';

$aksi = $_GET['aksi'];

$action = new Controller;

if($aksi == 'deposit'){
    $value = $_POST['value'];
    $action->deposit($value);
    header("Location: ../home.php");  
}else if($aksi == 'withdraw'){
    $value = $_POST['value'];
    $action->withdraw($value);
    header("Location: ../home.php");  
}else if($aksi == 'transfer'){
    $value = $_POST['value'];
    $nama = $_POST['nama'];
    $action->transfer($nama,$value);
    header("Location: ../home.php");  
}





?>