<?php
require("db.php");

$userName = $_REQUEST["username"];



$query =$connection->prepare("SELECT * FROM userProfil JOIN user_akun USING(Username) where username = :username");
$query->bindParam("username", $userName);
$query->execute();
$result = array();


   while($row=$query->fetch(PDO::FETCH_ASSOC)){
       $userData_List= $row;	
       //array_push($result, array('idkonsumen'=>$row[0], 'namakonsumen'=>$row[1], 'alamatkonsumen'=>$row[2]));
   }
  echo json_encode($userData_List);
 //echo json_encode(array("result"=>$result));

?>