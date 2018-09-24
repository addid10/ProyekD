<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	//Add
	if($_POST["operation"] == "Add")
	{
		$image = '';
		if($_FILES["Foto_Service"]["name"] != '')
		{
			$image = upload_image();
		}
		$statement = $connection->prepare(
		"INSERT INTO service_komputer (Nama_Service, Alamat_Service, Foto_Service, Daftar_Service, Username_SA, waktuBuka, latitud, longitud) 
			VALUES (:Nama_Service, :Alamat_Service, :Foto_Service, :Daftar_Service, :Username_SA, :waktu, :latitud, :longitud)
		");
		$result = $statement->execute(
			array(
				':Nama_Service'		=>	$_POST["Nama_Service"],
				':Alamat_Service'	=>	$_POST["Alamat_Service"],
				':Daftar_Service'	=>	$_POST["Daftar_Service"],
				':Username_SA'	    =>	$_POST["username"],
				':longitud'         =>  $_POST["longitud"],
				':latitud'          =>  $_POST["latitud"],
				':waktu'            =>  $_POST["waktuBuka"],
				':Foto_Service'		=>	$image
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
		$image = '';
		if($_FILES["Foto_Service"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = $_POST["hidden_user_image"];
		}
		$statement = $connection->prepare(
			"UPDATE service_komputer SET 
			Nama_service 	  = :Nama_Service, 
			Alamat_Service 	  = :Alamat_Service, 
			Foto_Service 	  = :Foto_Service,
			waktuBuka         = :waktu,
			longitud          = :longitud,
			latitud           = :latitud,
			Daftar_Service	  = :Daftar_Service  
			WHERE idService   = :idService"
		);
		$result = $statement->execute(
			array(
				':idService'		=>	$_POST["idService"],
				':Nama_Service'		=>	$_POST["Nama_Service"],
				':Alamat_Service'	=>	$_POST["Alamat_Service"],
				':Daftar_Service'	=>	$_POST["Daftar_Service"],
				':waktu'            =>  $_POST['waktuBuka'],
				':longitud'         =>  $_POST["longitud"],
				':latitud'          =>  $_POST["latitud"],
				':Foto_Service'		=>	$image
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>