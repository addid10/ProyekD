<?php


session_start();
require('../tables_toko/db.php');

if(isset($_POST['username']) && isset($_POST['password']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $connection->prepare(
        "SELECT * FROM service_komputer_akun 
        WHERE Username_SA=? AND Password_SA=?");
    
    $query->bindParam(1,$username);
    $query->bindParam(2,$password);

    $query->execute();
    $row = $query->fetch();

    $user = $row['Username_SA'];
    $pass = $row['Password_SA'];
    $aktif= $row['Aktif'];
    
    if($pass==$password && $username==$user) {
        session_start();
        $_SESSION['username'] = $username;
            header('location: ../Halaman_Utama');

    }
    else
    {
      if ($aktif=="T")
      {
        header('location: login.php?status=Akun belum diverifikasi!');
      }
      else 
      {
        header('location: login.php?status=Username atau Password salah!');
      }
      
    }
    
}
?>
