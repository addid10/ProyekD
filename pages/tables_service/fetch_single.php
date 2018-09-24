<?php
include('db.php');
include('function.php');
if(isset($_POST["id_nama_service"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM daftar_service 
		WHERE id_nama_service = '".$_POST["id_nama_service"]."'"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["id_nama_service"]	 = $row["id_nama_service"];
		$output["nama_service"]      = $row["nama_service"];
		$output["harga_service"] 	 = $row["harga_service"];
		$output["idService"]    	 = $row["idService"];
	}
	echo json_encode($output);
}
?>