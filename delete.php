<?php

// sql to delete a record
include ("connection.php");
 $connection=new Connection();
 include ("client.php");
 $connection->selectDatabase("Fancy");

 Client::deleteClient("Clients",$connection->conn,$_GET['deletedId']);


?>