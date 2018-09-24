<?php
require 'db.php';

$idTransaksi      = $_POST['idTransaksi'];
$Status        	  = $_POST['Status_Transaksi'];
$alasanPembatalan = $_POST['alasan_pembatalan'];

$statement = $connection->prepare(
    "UPDATE transaksi_service SET
            Status_Transaksi    = :Status,
            Status_Service      = :Service,
            alasan_pembatalan   = :alasanPembatalan
			WHERE idTransaksi   = :idTransaksi

    ");
    $result = $statement->execute(
        array(
            ':idTransaksi'	    =>	$idTransaksi,
            ':Status'           =>	$Status,
            ':Service'          =>  "Baru", 
            ':alasanPembatalan' =>	$alasanPembatalan
        )
    );

    if(!empty($result))
		{
			echo json_encode(array( 'response'=>'success' ));
		}
		
	else{
	        echo json_encode(array( 'response'=>'failed' ));
	}

?>