<?php

$idTran = $_POST["employee_id"];

require("db.php");

     $Tampil_data = $connection->prepare(
     
     "SELECT * FROM transaksi_service WHERE idTransaksi=:transaksi");
 
        $Tampil_data->execute(
            array (
            ':transaksi' 		=>	$idTran
            )
        );
        $daftar = $Tampil_data->fetchAll(PDO::FETCH_OBJ);
        
        $output .= '  
        <div class="table-responsive">  
        <table class="table table-bordered">';
 
 foreach ($daftar as $data)
{
    $output .= '
    <tr>
    <td colspan="2" class="box">
    
            <div class="box-header">
              <h3 class="box-title">Status Transaksi (Pengerjaan)</h3>
            </div>
            <div class="box-body">
              Selengkapnya atas informasi yang diberikan oleh pengguna(user) dalam menginputkan kesalahan yang ada di komputernya.
            </div>
            <div class="overlay">
              <i class="fa fa-refresh fa-spin"></i>
            </div>

    </td>
    <tr>
        <th width="50%">Nama Pengguna</th>
        <td width="50%">'.$data->Username.'</td>
    </tr>
    <tr>
        <th width="50%">Waktu Permintaan</th>
        <td width="50%">'.$data->Waktu_Kirim.'</td>
    </tr>
    <tr>
        <th width="50%">Tanggal Permintaan</th>
        <td width="50%">'.$data->Tanggal_Masuk.'</td>
    </tr>
    <tr>
        <th width="50%">Status Transaksi</th>
        <td width="50%"><span class="label label-success">'.$data->Status_Transaksi.'</span></td>
    </tr>
    <tr>
        <th width="50%">Daftar Kerusakan</th>
        <td width="50%">'.$data->Kerusakan.'</td>
    </tr>
    ';
}
$output .= '</table></div>';
echo $output;   
?>