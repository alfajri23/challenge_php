<?php
session_start(); 
if (!isset($_SESSION['username'])) { 
    header("Location: login.php");  
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <style>
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even) {
    background-color: #dddddd;
    }
    </style>
</head>
<body>

<a href="home.php">
    Kembali
</a>

<table>
    <tr>
        <th>No</th>
        <th>Time</th>
        <th>Tipe</th>
        <th>Debit</th>
        <th>credit</th>
        <th>balance</th>
    </tr>
    <?php
        $no = 1;

        if(isset($_SESSION['transaksi'])){

            foreach($_SESSION['transaksi'] as $y){
                if($y['username'] == $_SESSION['username']){
        

    ?>
	<tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $y['time'] ?></td>
            <td><?php echo $y['tipe'] ?></td>
            <td><?php echo $y['debit'] ?></td>
            <td><?php echo $y['credit'] ?></td>
            <td><?php echo $y['balance'] ?></td>
	</tr>
    <?php 
            }}}
    ?>
</table>
    
</body>
</html>