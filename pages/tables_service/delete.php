<?php

include('db.php');
include("function.php");

if(isset($_POST["id_nama_service"]))
{
	$statement = $connection->prepare(
		"DELETE FROM daftar_service WHERE id_nama_service = :idService"
	);
	$result = $statement->execute(
		array(
			':idService'	=>	$_POST["id_nama_service"]
		)
	);
}



?>