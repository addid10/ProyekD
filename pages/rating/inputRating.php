<?php
require 'db.php';

$rating     = $_POST['userRating'];
$idService  = $_POST['idService'];
$Username   = $_POST['Username'];
$idTransaksi      = $_POST['idTransaksi'];
$Status        	  = $_POST['Status_Transaksi'];
$alasanPembatalan = $_POST['alasan_pembatalan'];

$statement = $connection->prepare(
    "INSERT INTO Rating (userRating, idService, Username,idTransaksi) 
        VALUES (:userRating, :idService, :Username,:idTransaksi)
    ");
    $result = $statement->execute(
        array(
            ':userRating'	=>	$rating,
            ':idService'    =>	$idService,
            ':Username'	    =>	$Username,
            ':idTransaksi'  => $idTransaksi
        )
    );
    
    $statement2 = $connection->prepare(
    "UPDATE transaksi_service SET
            Status_Transaksi    = :Status,
            Status_Service      = :Service,
            alasan_pembatalan   = :alasanPembatalan
			WHERE idTransaksi   = :idTransaksi

    ");
    $result2 = $statement2->execute(
        array(
            ':idTransaksi'	    =>	$idTransaksi,
            ':Status'           =>	$Status,
            ':Service'          =>  "Baru", 
            ':alasanPembatalan' =>	$alasanPembatalan
        )
    );
    
    //Untuk insert data ke total rating di daftar toko
    $query      = $connection->prepare("SELECT avg(userRating) as totalRating FROM Rating WHERE idService=?");


    $query->bindParam(1,$idService);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_OBJ);
    
    $totalRating = $row->totalRating;
    
     $statement3 = $connection->prepare(
    "UPDATE service_komputer SET
            Total_Rating    = :total_rating
			WHERE idService   = :idService

    ");
    
     $result3 = $statement3->execute(
        array(
            ':idService'	    =>	$idService,
            ':total_rating'           =>	$totalRating
        )
    );
    
    
    
    
    //end


    if(!empty($result) && !empty($result2) && !empty($result3))
		{
			echo json_encode(array( 'response'=>'success' ));
		}
		
	else{
	        echo json_encode(array( 'response'=>'failed' ));
	}

?>