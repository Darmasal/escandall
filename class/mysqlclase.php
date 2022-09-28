<?php

function Conectarse(){

 // needs to include ('../inc/config.cfg');
 
 try {
   $connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
   if ( mysqli_connect_errno()) {
       throw new Exception("Could not connect to database.");   
   }
   } catch (Exception $e) {
      throw new Exception($e->getMessage());   
   }
return $connection;}        
 
 
 
 /*
 if (!($link=mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD))){
    echo "Error conectando a la base de datos.";
    exit();  }
   if (!mysql_select_db(DB_DATABASE_NAME,$link))
   {      echo "Error seleccionando la base de datos.";
   exit();   }   
   return $link;}*/

//function CerrarConexion(){
//	mysql_close($link);
// }

?>