<?php
 
require("db.php");

$idService = $_REQUEST['idService'];


$query =$connection->prepare("SELECT * FROM daftar_service where idService = :idService");
$query -> bindparam("idService",$idService);
$query->execute();
$result = array();

   while($row=$query->fetchAll(PDO::FETCH_ASSOC)){
       $userData_List= $row; 
   }
   if($userData_List == Null){
      
      echo json_encode("kosong");
  }
  else{
  echo json_encode($userData_List);
  }
  
?>