<?php

include('db.php');
include("function.php");

$Status = 'ON-PROSES';

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