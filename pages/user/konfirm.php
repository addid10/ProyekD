<?php
include('../tables/db.php');

    $kode       = $_POST['Kode']; 
 
    $statement = $connection->prepare(
        "UPDATE user_akun SET Verifikasi='Y' WHERE Kode_Aktif=:Kode"
    );

    $result = $statement->execute(
        array(
            ':Kode'      		=>	$kode
        )
    );    

    if($result) 
    {
        echo json_encode(array( 'response'=>'success' ));
    } 
    else 
    {
        echo json_encode(array( 'response'=>'failed' ));
    }
?>

