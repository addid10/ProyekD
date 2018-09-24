<?php
require("db.php");

$idTrans    = $_REQUEST["idTransaksi"];

$query      = $connection->prepare("SELECT * FROM Rating WHERE idTransaksi=:idTrans");

$query->bindParam(idTrans, $idTrans);
$query->execute();
$result = array();


   while($row=$query->fetch(PDO::FETCH_ASSOC)){
       $userData_List= $row;
   }
  echo json_encode($userData_List);

?>