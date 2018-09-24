<?php 
require('../tables/db.php');
if (isset($_SESSION['username'])):?>

<?php
  $usernam = $_SESSION['username'];

  $query = $connection->prepare(
      'SELECT * FROM service_komputer_akun full join service_komputer using Username_SA WHERE Username_SA=:username');
  $query->bindParam(':username', $usernam);

  $query->execute();
  $admin = $query->fetch(PDO::FETCH_OBJ);
?>

<?php endif ?>