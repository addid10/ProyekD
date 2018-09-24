<?php
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

// Konfigurasi SMTP
$mail->isSMTP(true);
$mail->Host = gethostbyname('smtp.gmail.com');

$mail->SMTPAuth = true;
$mail->Username = 'csgoservicecom@gmail.com';
$mail->Password = 'tinteen2016';
$mail->SMTPSecure = 'ssl';
$mail->Port = 467;

$mail->setFrom('rezkynewaditya@gmail.com');
$mail->addReplyTo('info@contoh.com', 'Codingan');
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

// Menambahkan penerima
$mail->addAddress('rezkynewaditya@gmail.com');

// Menambahkan beberapa penerima
//$mail->addAddress('penerima2@contoh.com');
//$mail->addAddress('penerima3@contoh.com');

// Menambahkan cc atau bcc 
$mail->addCC('cc@contoh.com');
$mail->addBCC('bcc@contoh.com');

// Subjek email
$mail->Subject = 'Kirim Email via SMTP Server di PHP menggunakan PHPMailer';

// Mengatur format email ke HTML
$mail->isHTML(true);

// Konten/isi email
$mailContent = "<h1>Mengirim Email HTML menggunakan SMTP di PHP</h1>
    <p>Ini adalah email percobaan yang dikirim menggunakan email server SMTP dengan PHPMailer.</p>";
$mail->Body = $mailContent;

// Menambahakn lampiran
$mail->addAttachment('lmp/file1.pdf');
$mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png'); //atur nama baru

// Kirim email
if(!$mail->send()){
    echo 'Pesan tidak dapat dikirim.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{
    echo 'Pesan telah terkirim';
}