<?php
session_start();
require 'db.php';
$username = $_SESSION['username'];

$statement = $connection->prepare(
    "SELECT * FROM transaksi_service JOIN user_akun USING(Username)
    JOIN service_komputer USING(idService) 
    JOIN service_komputer_akun USING(Username_SA)
    WHERE Username_SA=:Username_SA AND Status_Service='Baru' ORDER BY Tanggal_Masuk DESC, Waktu_Kirim DESC");
    $result = $statement->execute(
        array(
            ':Username_SA'		=>	$username
        )
    );

    $count = $statement->rowCount();

if($count>0)
{
    echo "<ul class='menu'><li>";
}
else
{
    die("<table class='table'><tr><td><font color=red size=2,5>Tidak ada notifikasi baru yang belum dibaca!</font></td></tr></table>");
}
while($p = $statement->fetch())
{
    $mula  = $p['Waktu_Kirim'];
    $awal  = date_create($mula);
    $akhir = date_create();
    $diff  = date_diff($awal, $akhir);
    $oke   = $diff->i;
    $oke2  = $diff->h;
    
    //Hari
    $mulai = $p['Tanggal_Masuk'];
    $first = date_create($mulai);
    $last  = date_create();
    $dipp  = date_diff($first, $last);
    $ok    = $dipp->d;
    $status= $p['Status_Transaksi'];
    $kirim = $p['prosesPengiriman'];
    
    
    if($ok>=1){
        $jam = $dipp->d." days";
    }
    else if($oke2>=1){
        $jam = $diff->h." hours";
    }
    else if($oke>=1){
        $jam = $diff->i." mins";
    }
    else{
        $jam = "just now";
    }
    
    if($status=="DIBATALKAN"){
        $hasil = "Dibatalkan Karena ".$p['alasan_pembatalan'];
        $foto  = "Cancel.png";
    }
    else if(!empty($kirim)){
        $hasil = "Opsi pengiriman ".$p['prosesPengiriman'];
        $foto  = "Deliver.png";
    
    }
    else{
        $hasil = $p['Kerusakan'];
        $foto  = $p['Foto_Service'];
    }
    echo "
     <a style='' href='../notification/pesan.php?idTransaksi=".$p['idTransaksi']."'>
     <div class='pull-left'>
     <img src='../tables_toko/upload/$foto' width='50px' height='50px'>
     </div>
     <h4>
        ".$p['Username']."
        <small><i class='fa fa-clock-o'></i> ".$jam."</small>
     </h4>
     <p>".$hasil."</p>
     </a>
     ";
}
echo "</li></ul>";
?>

<!--
    echo "<tr><td onmouseover=\"this.style.backgroundColor='skyblue'\"
     onmouseout=\"this.style.backgroundColor='white'\">
     <a style='' href='../notification/pesan.php?idTransaksi=".$p['idTransaksi']."'>
     <table class='table' style='margin:0px;padding:0px;color:#000'>
     <tbody>
     <tr  style='margin:0px;padding:0px;'>
     <td rowspan='2'><center><img src='../tables/upload/".$p['Foto_Service']."' width='50px' height='50px' class='img-circle'></img></center></td>
     <td width='70%'><p style='font-size:20px;margin:0px;padding:0px;'>".$p['Username']."</p></td>
     <td width='25%'><small><div class='fa fa-clock-o'></div> 5 mins</small></td>
     </tr>
     <tr>
     <td colspan='3'>Anda menerima pesanan dari ".$p['Username']."</td>
     </tr>
     </tbody>
     </table>
     </a>
     </td></tr>";
}
echo "</table>";
?>
-->