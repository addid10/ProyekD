
<?php
  session_start();
  require('pages/tables_toko/db.php');
  $username = $_SESSION['username'];

  $query = $connection->prepare('SELECT * FROM service_komputer WHERE Username_SA=:username');

  $query->bindParam(username,$username);
  $query->execute();
  
  $namaService    = $query->fetch(PDO::FETCH_OBJ);
?>