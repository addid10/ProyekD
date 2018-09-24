<?php


session_start();
require('../tables/db.php');

if(isset($_POST['username']) && isset($_POST['password']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $connection->prepare(
        "SELECT * FROM user_akun FULL JOIN user USING(Username)
        WHERE Username=? AND Password=?");
    
    $query->bindParam(1,$username);
    $query->bindParam(2,$password);

    $query->execute();
    $row = $query->fetch();

    $user = $row['Username'];
    $pass = $row['Password'];
    $id   = $row['idUser'];
    
    if($pass==$password && $username==$user) {
        session_start();
        $_SESSION['username_user'] = $id;
            header('location: pemesanan.php');

    }
    else
    {
        header('location: login.php?status=Username atau Password salah!');      
    }
    
}
?>
