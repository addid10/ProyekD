
<?php
  require('tables_toko/db.php');
  $username = $_SESSION['username'];

  $query = $connection->prepare('SELECT * FROM service_komputer_akun WHERE Username_SA=:username');
  $query->bindParam(':username', $username);

  $query->execute();
  $admin = $query->fetch(PDO::FETCH_OBJ);
?>