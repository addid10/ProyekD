<?php

function upload_image()
{
	if(isset($_FILES["Foto_Service"]))
	{
		$extension = explode('.', $_FILES['Foto_Service']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = './upload/' . $new_name;
		move_uploaded_file($_FILES['Foto_Service']['tmp_name'], $destination);
		return $new_name;
	}
}

function get_image_name($idService)
{
	include('db.php');
	$statement = $connection->prepare("SELECT Foto_service FROM service_komputer WHERE idService='$idService'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["Foto_service"];
	}
}

function get_total_all_records()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM service_komputer");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>