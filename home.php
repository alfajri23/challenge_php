<?php
session_start(); 
if (!isset($_SESSION['is_login'])) { 
    header("Location: login.php");  
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program</title>
</head>
<body>

    

    <div>
        <div>
            <a href="balance.php">
                Check Balance
            </a>
            <span> - </span>
            <a href="transaksi.php">
                Transaksi
            </a>
            <span> - </span>
            <a href="controller/logout.php">
                Logout
            </a>
            <span> - </span>
            <!-- <a href="controller/delete.php">
                Destroy
            </a> -->
        </div>

        <h1><?=$_SESSION['username']?></h1>

        <?php
            if(isset($_GET['error'])){
                if($_GET['error'] == 'kurang'){
        ?>
                <p>Your balance is insufficient</p>
        <?php
            }else{
        ?>
                <p>Error input</p>
        <?php
                }
            }
        ?>

        <div style="margin: 20px 0">
            <form action="controller/controller.php?aksi=withdraw" method="post">
                <input type="text" name="value">
                <button type="submit">Withdraw</button>
            </form>
        </div>

        <div style="margin: 10px 0">
            <form action="controller/controller.php?aksi=deposit" method="post">
                <input type="text" name="value">
                <button type="submit">Deposit</button>
            </form>
        </div>

        <br>
        <div style="margin: 10px 0">
            <form action="controller/controller.php?aksi=transfer" method="post">
                <label for="">Nama penerima</label>
                <select name="nama">
                <?php
                foreach($_SESSION['user'] as $user => $value){
                    if($user != $_SESSION['username']){
                ?>
                <option value="<?=$user?>"><?=$user?></option>
                <?php
                }}
                ?>
                </select>
                <br>
                <label for="">Nominal</label>
                <input type="text" name="value">
                <button type="submit">Transfer</button>
            </form>
        </div>
   
    </div>

<?php

?>
    
</body>
</html>