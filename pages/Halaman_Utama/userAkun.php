
<?php
  require('../tables_toko/db.php');

  $query = $connection->prepare('SELECT * FROM user_akun');
  
  $query->bindParam(':username', $username);

  $query->execute();
  $akun   = $query->fetch(PDO::FETCH_OBJ);
  
  $jumlah = $query->rowCount();

?>