<?php
session_start(); 

class Controller{

    function deposit($no) {

        if($no < 1){
            header("Location: ../home.php?error=input");  
            exit;
        }

        $_SESSION['user'][$_SESSION['username']] += $no;
        $_SESSION['transaksi'][] = [
            'time' => date("Y-m-d H:i"),
            'tipe' => 'Deposit',
            'debit' => $no,
            'credit' => '',
            'balance' => $_SESSION['user'][$_SESSION['username']],
            'username' => $_SESSION['username']
        ];
    }

    function withdraw($no) {

        if($_SESSION['user'][$_SESSION['username']] < $no){
            header("Location: ../home.php?error=kurang");  
            exit;
        }else if($no < 1){
            header("Location: ../home.php?error=input");  
            exit;
        }

        $_SESSION['user'][$_SESSION['username']] -= $no;
        $_SESSION['transaksi'][] = [
            'time' => date("Y-m-d H:i"),
            'tipe' => 'Withdraw',
            'debit' => '',
            'credit' => $no,
            'balance' => $_SESSION['user'][$_SESSION['username']],
            'username' => $_SESSION['username']
        ];
    }


}

?>