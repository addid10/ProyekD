<?php
function get_total_all_records()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM transaksi_service WHERE Status_Transaksi='Menunggu'");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>