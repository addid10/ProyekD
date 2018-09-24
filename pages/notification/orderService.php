<?php
require 'db.php';

$Username         = $_POST['Username'];
$idService   	  = $_POST['idService'];
$Kerusakan        = $_POST['Kerusakan'];
$hargaService     = $_POST['hargaService'];
$Status_Service   = "Baru";
$Status_Transaksi = "Menunggu";
$prosesPengiriman = "kosong";
$Tanggal_Masuk  = date("Y/m/d");
date_default_timezone_set('Asia/Jakarta');
$Waktu          = date("H:i:s");

$statement = $connection->prepare(
    "INSERT INTO transaksi_service (Tanggal_Masuk, Status_Service, idService, Username, Status_Transaksi, Kerusakan, Waktu_Kirim , totalHarga ,prosesPengiriman) 
        VALUES (:Tanggal_Masuk, :Status_Service, :idService, :Username, :StatusT, :Rusak, :Waktu, :hargaService ,:prosesPengiriman)
    ");
    $result = $statement->execute(
        array(
            ':Tanggal_Masuk'	=>	$Tanggal_Masuk,
            ':Status_Service'   =>	$Status_Service,
            ':idService'	    =>	$idService,
            ':Username'	        =>	$Username,
            ':StatusT'          =>  $Status_Transaksi,
            ':Rusak'            =>  $Kerusakan,
            ':Waktu'            =>  $Waktu,
            ':hargaService'     =>  $hargaService,
            ':prosesPengiriman'     =>  $prosesPengiriman
        )
    );

    if(!empty($result) && $Kerusakan!='')
		{
			echo json_encode(array( 'response'=>'success' ));
		}
		
	else{
	        echo json_encode(array( 'response'=>'failed' ));
	}

?>