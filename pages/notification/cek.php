<?php
session_start();
require 'db.php';
$username = $_SESSION['username'];

$statement = $connection->prepare(
    "SELECT idTransaksi From transaksi_service LEFT JOIN service_komputer USING(idService)
    JOIN service_komputer_akun USING(Username_SA)
    WHERE Username_SA=:username AND Status_Service='Baru'
    ");
    $result = $statement->execute(
        array(
            ':username'		=>	$username
        )
    );

    $count = $statement->rowCount();

    if($count>0){
        echo $count;
    }
?>