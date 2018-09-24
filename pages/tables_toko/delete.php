<?php

include('db.php');
include("function.php");

if(isset($_POST["idService"]))
{
	$image = get_image_name($_POST["idService"]);
	if($image != '')
	{
		unlink("upload/" . $image);
	}
	$statement = $connection->prepare(
		"DELETE FROM service_komputer WHERE idService = :idService"
	);
	$result = $statement->execute(
		array(
			':idService'	=>	$_POST["idService"]
		)
	);
}



?>