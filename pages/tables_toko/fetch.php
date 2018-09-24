<?php
include('db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM service_komputer ";

if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE Nama_Service LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR Alamat_Service LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY idService ASC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}


$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$sub_array = array();
	$sub_array[] = $row["idService"];
	$sub_array[] = $row["Nama_Service"];
	if($row["Daftar_Service"] == 0)
	{ 
		$sub_array[] = '<a href="#" data-toggle="tooltip" data-placement="top" title="Print"><i class="fa fa-print"></i></a>';
	}
	else if($row["Daftar_Service"] == 1)
	{
		$sub_array[] = '<a href="#" data-toggle="tooltip" data-placement="top" title="Laptop"><i class="fa fa-laptop"></i></a>';
	}
	else
	{
		$sub_array[] = '<a href="#" data-toggle="tooltip" data-placement="top" title="Laptop"><i class="fa fa-laptop"></i></a> <a href="#" data-toggle="tooltip" data-placement="top" title="Print"><i class="fa fa-print"></i></a>';
	}
	$sub_array[] = '<button type="button" name="view" 	id="'.$row["idService"].'" class="btn btn-info    btn-xs view">   View   </button>';
	
	$sub_array[] = '<button type="button" name="update" id="'.$row["idService"].'" class="btn btn-warning btn-xs update"> Update </button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["idService"].'" class="btn btn-danger  btn-xs delete"> Delete </button>';
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


