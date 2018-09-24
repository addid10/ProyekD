<?php session_start(); ?>
<?php require('db.php'); ?>
<html>

<?php if (isset($_SESSION['username'])): ?>

<?php $username = $_SESSION['username']; ?>


<?php $query = $connection->prepare('SELECT * FROM service_komputer JOIN service_komputer_akun USING(Username_SA) WHERE Username_SA=:username'); ?>

<?php $query->bindParam(username,$username); ?>
<?php $query->execute(); ?>
<?php $result = $query->fetchAll(PDO::FETCH_OBJ); ?>


<?php foreach ($result as $data): ?>
<?php $dal = $data->idService; ?>
<?php return $dal ?>
<?php endforeach ?>

<?php endif ?>

    
</html>

