
<?php
  require('../tables_toko/db.php');
  $username = $_SESSION['username'];

  $query = $connection->prepare('SELECT * FROM transaksi_service JOIN service_komputer USING(idService) WHERE Username_SA=:username');
  
  $query->bindParam(username,$username);
  $query->execute();
  $transaksi        = $query->fetch(PDO::FETCH_OBJ);
  
  $jumlahTransaksi = $query->rowCount();

?>