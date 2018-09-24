<?php
require 'db.php';

$idTransaksi      = $_POST['idTransaksi'];
$prosesPengiriman = $_POST['prosesPengiriman'];
$hargaDelivery    = $_POST['hargaDelivery'];

    $statement2 = $connection->prepare(
    "SELECT * FROM transaksi_service WHERE idTransaksi=:idTransaksi");
    
    $statement2->execute(
        array(
            ':idTransaksi'	    =>	$idTransaksi
        )
    );
    
    $row = $statement2->fetch(PDO::FETCH_OBJ);
    
    $harga = $row->totalHarga;
    $hargaTotal = $hargaDelivery+$harga;
    

    $statement = $connection->prepare(
    "UPDATE transaksi_service SET
            Status_Service      = :Service,
            totalHarga          = :totalHarga,
            prosesPengiriman    = :prosesPengiriman
			WHERE idTransaksi   = :idTransaksi

    ");
    $result = $statement->execute(
        array(
            ':idTransaksi'	    =>	$idTransaksi,
            ':Service'          =>  "Baru", 
            ':totalHarga'       =>  $hargaTotal,
            ':prosesPengiriman' =>	$prosesPengiriman
        )
    );
    
    

    /*
    $statement3 = $connection->prepare(
    "UPDATE transaksi_service SET
            totalHarga          = :totalHarga
			WHERE idTransaksi   = :idTransaksi

    ");
    $result3 = $statement3->execute(
        array(
            ':idTransaksi'	    =>	$idTransaksi,
            ':totalHarga'       =>  $hargaTotal
        )
    );    
    
    */
    

    if($result)
		{
			echo json_encode(array( 'response'=>'success' ));
		}
		
	else{
	        echo json_encode(array( 'response'=>'failed' ));
	}

?>