<?php
 
require("db.php");

$kataKunci = $_REQUEST['search'];

$query =$connection->prepare("SELECT * FROM service_komputer where Nama_Service LIKE '%$kataKunci%' or Alamat_Service LIKE '%$kataKunci%' order by Total_Rating desc");


$query->execute();
$result = array();

   while($row=$query->fetchAll(PDO::FETCH_ASSOC)){
       $userData_List= $row; 
   }
   if($userData_List == Null){
      
      echo json_encode(array("value"=>0,"result"=>$userData_List));
  }
  else{
  echo json_encode(array("value"=>1,"result"=>$userData_List));
  }
  
?>
