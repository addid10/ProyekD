<?php
include('db.php');
include('function.php');
ob_start();
$return = include 'session.php';
$output = ob_get_clean();
$query = '';
$output = array();
$query .= "SELECT * FROM daftar_service WHERE idService=:service ";

if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY id_nama_service ASC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}


$statement = $connection->prepare($query);
$statement->bindParam(service,$return);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$sub_array = array();
	$sub_array[] = $row["id_nama_service"];
	$sub_array[] = $row["nama_service"];
	$sub_array[] = $row["harga_service"];
	$sub_array[] = '<button type="button" name="update" id="'.$row["id_nama_service"].'" class="btn btn-warning btn-xs update"> Update </button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["id_nama_service"].'" class="btn btn-danger  btn-xs delete"> Delete </button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>


