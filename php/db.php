<?php
  //parametros de conexion
  $servidor="localhost";
  $username="root";
  $contra_db="";
  $db_name="login";
  //Estableciendo conexión
  $connection=new mysqli($servidor,$username,$contra_db,$db_name);

  if($connection->connect_error){
    die("Conexión fallida :/ ".$connection ->connect_error);
  }

  

  

?>