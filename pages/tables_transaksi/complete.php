<?php

include('db.php');
include("function.php");

$Status = 'DIAMBIL';

if(isset($_POST["idTransaksi"]))
{
	$statement = $connection->prepare(
		"UPDATE transaksi_service 
        SET Status_Transaksi = :Status
        WHERE idTransaksi = :idTransaksi"
	);
	$result = $statement->execute(
		array(
            ':idTransaksi'	=> $_POST["idTransaksi"],
            ':Status'       => $Status
		)
	);
}
?>