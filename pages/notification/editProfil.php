



<?php
require("db.php");


//if (isset($_POST['submit'])) {
    
       $userName = $_POST['userName'];
        $NamaUser=$_POST['Nama_User'];
        $nomorTelepon=$_POST['Nomor_Hape'];
        $alamatUser=$_POST['alamat_User'];
      
      
  
    
   
        $query=$connection->prepare("UPDATE `userProfil`   
        SET `Nama_User` = :Nama,
            `Nomor_Hape` = :nomorTelepon,
            `Alamat_User` = :alamatUser
      WHERE `Username` = :userName");

$query->bindParam(":Nama",  $NamaUser);
 $query->bindParam(":nomorTelepon",  $nomorTelepon);
 $query->bindParam(":alamatUser", $alamatUser);
 $query->bindParam(":userName", $userName);



 $query->execute();

 if($query){

 
    echo json_encode(array( 'response'=>'success' ));
 }
 else
 {
    echo json_encode(array( 'response'=>'failed' ));
 }
 //$Tampil_data = $koneksi->prepare(" UPDATE pegawai set NamaPegawai='".$_POST["NamaPegawai"]."' Alamat= '".$_POST["alamat"]."' Jenis_kelamin= '".$_POST["gender"]."' where idPegawai= ".$_POST["id"]." " );
 
          //$Tampil_data->execute();
         // echo "Berhasil";





?>