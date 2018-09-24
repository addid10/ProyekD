<?php
 
require("db.php");
$Username         = $_REQUEST['Username'];

$query =$connection->prepare("SELECT * FROM `transaksi_service` JOIN service_komputer USING(idService)  WHERE Username=:username and Status_Transaksi !='DIAMBIL' and Status_Transaksi != 'DIBATALKAN'order by idTransaksi desc ");

$query->bindParam(username,$Username);

$query->execute();

$result=array();

   while($row=$query->fetchAll(PDO::FETCH_ASSOC)){
       $userData_List= $row; 
      
   }
  //echo json_encode($userData_List);
  //echo json_encode(array("result"=>$userData_List));
  
  if($userData_List == Null){
      
      echo json_encode(array("value"=>0,"result"=>$userData_List));
  }
  else{
  echo json_encode(array("value"=>1,"result"=>$userData_List));
  }
?>