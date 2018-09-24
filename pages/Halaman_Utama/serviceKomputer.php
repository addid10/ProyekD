
<?php
  require('../tables_toko/db.php');

  $query = $connection->prepare('SELECT * FROM service_komputer');

  $query->execute();
  $serviceKomputer    = $query->fetch(PDO::FETCH_OBJ);
  
  $jumlahService     = $query->rowCount();

?>