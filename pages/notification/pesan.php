<?php
session_start();
require "db.php";
$idTransaksi = $_GET['idTransaksi'];
$Username_SA = $_SESSION['username'];

$statement = $connection->prepare(
    "UPDATE transaksi_service SET Status_Service='Lama'
    WHERE idTransaksi=:idTransaksi
    ");

$result = $statement->execute(
    array(
        ':idTransaksi'		=>	$idTransaksi
    )
);

header('location: ../tables_transaksi/');


?>

</div>
      
</div>