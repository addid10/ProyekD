<?php
include('db.php');
include('function.php');
ob_start();
$return = include 'session.php';
$output = ob_get_clean();
$query = '';
$output = array();
$query .= "SELECT * FROM transaksi_service JOIN service_komputer USING(idService) WHERE Username_SA=:username AND Status_Transaksi IN('Menunggu','ON-PROSES','SELESAI') ";

if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY Status_Transaksi DESC, idTransaksi DESC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connection->prepare($query);
$statement->bindParam(username,$return);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$sub_array = array();
	$sub_array[] = $row["idTransaksi"];
	$sub_array[] = $row["Username"];
	$sub_array[] = '<button type="button" name="VIEW" id="'.$row["idTransaksi"].'" class="btn btn-info btn-xs VIEW">   View   </button>';
	if($row["Status_Transaksi"] == "Menunggu"){
	    $sub_array[] = '<button type="button" name="accept"  id="'.$row["idTransaksi"].'" class="btn btn-success btn-xs accept"> Agreed </button>';
	}
	else if($row["Status_Transaksi"] == "SELESAI"){
	    $sub_array[] = '<button type="button" name="complete"  id="'.$row["idTransaksi"].'" class="btn btn-xs complete" style="background:#b901ba;color:#fff;"> Delivered </button>';
	}
	else{
	    $sub_array[] = '<button type="button" name="proses"  id="'.$row["idTransaksi"].'" class="btn btn-warning btn-xs proses"> Processing </button>';
	}
	if($row["Status_Transaksi"] == "Menunggu"){
	    $sub_array[] = '<button type="button" name="decline" id="'.$row["idTransaksi"].'" class="btn btn-danger  btn-xs decline"> Denied </button>';
	}
	else{
	    $sub_array[] = '';
	}
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


