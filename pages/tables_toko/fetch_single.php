<?php
include('db.php');
include('function.php');
if(isset($_POST["idService"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM service_komputer 
		WHERE idService = '".$_POST["idService"]."'"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["idService"]	     = $row["idService"];
		$output["Nama_Service"]      = $row["Nama_Service"];
		$output["Alamat_Service"] 	 = $row["Alamat_Service"];
		$output["waktuBuka"]         = $row["waktuBuka"];
		$output["longitud"]          = $row["longitud"];
		$output["latitud"]           = $row["latitud"];
		$output["Daftar_Service"]	 = $row["Daftar_Service"];
		
		if($row["Foto_Service"] != '')
		{
			$output["Foto_Service"] = 
			'<img src="upload/'.$row["Foto_Service"].'" class="img-thumbnail" width="200" height="150" />
			<input type="hidden" name="hidden_user_image" value="'.$row["Foto_Service"].'" />';
		}
		else
		{
			$output['Foto_Service'] = '<input type="hidden" name="hidden_user_image" value="" />';
		}
	}
	echo json_encode($output);
}
?>