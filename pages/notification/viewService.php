<?php
 
require("db.php");


$query =$connection->prepare("SELECT * FROM service_komputer order by Total_Rating desc");

$query->execute();
$result = array();

   while($row=$query->fetchAll(PDO::FETCH_ASSOC)){
       $userData_List= $row; 
   }
  echo json_encode($userData_List);
  
?>
