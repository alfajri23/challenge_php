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
            'username' => $_SESSION['username'],
            'description' => ''
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
            'username' => $_SESSION['username'],
            'description' => ''
        ];
    }

    function transfer($to,$no) {

        if($_SESSION['user'][$_SESSION['username']] < $no){
            header("Location: ../home.php?error=kurang");  
            exit;
        }else if($no < 1){
            header("Location: ../home.php?error=input");  
            exit;
        }
        
        // Keluar
        $_SESSION['user'][$_SESSION['username']] -= $no;
        $_SESSION['transaksi'][] = [
            'time' => date("Y-m-d H:i"),
            'tipe' => 'Transfer',
            'debit' => '',
            'credit' => $no,
            'balance' => $_SESSION['user'][$_SESSION['username']],
            'username' => $_SESSION['username'],
            'description' => 'Transfer to '. $to
        ];

        // Masuk ke rekening penerima
        $_SESSION['user'][$to] += $no;
        $_SESSION['transaksi'][] = [
            'time' => date("Y-m-d H:i"),
            'tipe' => 'Transfer',
            'debit' => $no,
            'credit' => '',
            'balance' => $_SESSION['user'][$to],
            'username' => $to,
            'description' => 'Transfer from '. $_SESSION['username']
        ];
    }


}

?>