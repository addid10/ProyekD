<?php
 
require("db.php");

$Username         = $_POST['Username'];

$query =$connection->prepare("SELECT * FROM transaksi_service JOIN service_komputer USING(idService) WHERE Username=:username AND Status_Transaksi='SELESAI'");

$query->bindParam(username,$Username);

$query->execute();

$result=array();

   while($row=$query->fetchAll(PDO::FETCH_ASSOC)){
       $userData_List= $row; 
   }
  echo json_encode($userData_List);
  
?>