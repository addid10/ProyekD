<?php


require('../tables_toko/db.php');

if(isset($_POST['username']) && isset($_POST['password']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $connection->prepare(
        "SELECT * FROM user_akun 
        WHERE Username=?");
    
    $query->bindParam(1,$username);

    $query->execute();
    $row = $query->fetch();

    $user = $row['Username'];
    $pass = $row['Password'];
    $aktif= $row['Verifikasi'];

    
    if(password_verify($password, $pass)==$password && $username==$user) {
            if($username!='' && $password!=''){
                echo json_encode(array( 'response'=>'success' ));
            }
            else {
                
            echo json_encode(array( 'response'=>'null' ));
            }
    }
    else
    {
      echo json_encode(array( 'response'=>'failed' ));
    }
    
}
?>
