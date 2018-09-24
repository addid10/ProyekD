<?php
    session_start(); 
    include('../tables_toko/db.php');

    $username    = $_POST['Username']; 
    $password    = $_POST['Password']; 
    $email       = $_POST['Email']; 
    $passwordbaru= password_hash($password, PASSWORD_DEFAULT);
    $length      = 6; 
    $randomString= substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
    $nama        = $_POST['Nama'];
    $telepon     = $_POST['Telepon'];
    $alamat      = $_POST['Alamat'];
    
    $body        = "Kode Aktivasi untuk Akun ".$username." adalah <strong>".$randomString."</strong>";
    
    $statement1  = $connection->prepare("SELECT COUNT('Username') from user_akun where Username =  :userName");
    $statement1 -> bindparam("userName",$username);
           $statement1->execute();
    //$row = $statement1->fetch();
    //$user = $row['Username'];
    $count = $statement1 -> fetchColumn();
    
    if($count == "1"){
        echo json_encode(array( 'response'=>'Username sudah ada' ));
    }
    else {
    $statement = $connection->prepare(
        "INSERT INTO user_akun (Username, Password, Email, Kode_Aktif, Verifikasi) 
        VALUES (:Username, :Passwords, :Email, :Kode, :Aktif)"
    );
    $statement2= $connection->prepare(
        "INSERT INTO userProfil (Nama_User, Nomor_Hape, Alamat_User, Username) 
        VALUES (:Nama, :Telepon, :Alamat, :Username)"
    );
    
    $result = $statement->execute(
        array(
            ':Username' 		=>	$username,
            ':Passwords'    	=>	$passwordbaru,
            ':Email'            =>	$email,
            ':Aktif'	        =>	"T",
            ':Kode'		        =>	$randomString
        )
    );
    $result2 = $statement2->execute(
        array(
            ':Nama'      		=>	$nama,
            ':Telepon'      	=>	$telepon,
            ':Alamat'           =>	$alamat,
            ':Username'         =>  $username
        )
    );
    
    
    if($result){   
            echo json_encode(array( 'response'=>'success' ));
        }
    
    else{
            echo json_encode(array( 'response'=>'failed' ));
        }
    }
    
?>



<!--
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();  
    $mail->Host = 'pemrograman-web.ti.ulm.ac.id'; 
    $mail->SMTPAuth = true; 
    $mail->Username = 'servicecom@pemrograman-web.ti.ulm.ac.id'; 
    $mail->Password = 'tinteen2016';
    $mail->SMTPSecure = 'ssl'; 
    $mail->Port = 465;

    //Recipients
    $mail->setFrom('servicecom@pemrograman-web.ti.ulm.ac.id', 'CS Service');
    $mail->addAddress($email,$nama);

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Service Komputer';
    $mail->Body    = 'Verifikasi Email';
    $mail->AltBody = $body;

    $mail->send();
    } catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
-->