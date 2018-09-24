
<?php
  session_start();
  require('../tables_toko/db.php');
  $username = $_SESSION['username'];

  $query = $connection->prepare('SELECT *, avg(userRating) as totalRating FROM service_komputer LEFT JOIN Rating USING(idService) WHERE Username_SA=:username');

  $query->bindParam(username,$username);
  $query->execute();
  
  $namaService    = $query->fetch(PDO::FETCH_OBJ);
?>