<?php
require("db.php");

$service   = $_REQUEST['idService']; 

$query      = $connection->prepare("SELECT avg(userRating) as totalRating FROM Rating WHERE idService=?");


$query->bindParam(1,$service);
$query->execute();
$row = $query->fetch(PDO::FETCH_OBJ);

       if($row->totalRating==null){
           $userData_List = (array("totalRating"=>1));
          
       }
       else{
           $userData_List=$row;
       }
   
   
       echo json_encode($userData_List);
?>