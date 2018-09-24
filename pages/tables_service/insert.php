<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	//Add
	if($_POST["operation"] == "Add")
	{
		$statement = $connection->prepare(
		"INSERT INTO daftar_service (nama_service, harga_service, idService) 
			VALUES (:nama, :harga, :service)
		");
		$result = $statement->execute(
			array(
				':nama'		=>	$_POST["nama_service"],
				':harga'	=>	$_POST["harga_service"],
				':service'	=>	$_POST["idService"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}

	//Edit
	if($_POST["operation"] == "Edit")
	{
		$statement = $connection->prepare(
			"UPDATE daftar_service SET 
			nama_service 	        = :nama, 
			harga_service 	        = :harga
			WHERE id_nama_service   = :idNama"
		);
		$result = $statement->execute(
			array(
				':idNama'	=>	$_POST["id_nama_service"],
				':nama'		=>	$_POST["nama_service"],
				':harga'	=>	$_POST["harga_service"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>