<?php
  require('db.php');
  session_start();
  $username = $_SESSION['username'];

  $query = $connection->prepare('SELECT * FROM service_komputer LEFT JOIN daftar_service USING(idService) WHERE Username_SA=:username');
  $query->bindParam(':username', $username);

  $query->execute();
  $admin = $query->fetch(PDO::FETCH_OBJ);
?>