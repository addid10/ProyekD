
<?php
  require('../tables_toko/db.php');

  $query = $connection->prepare('SELECT * FROM service_komputer_akun');

  $query->execute();
  $serviceAkun        = $query->fetch(PDO::FETCH_OBJ);
  
  $jumlahPenyewa      = $query->rowCount();

?>