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
return $connection;
}        
 
 
function login($nom, $clau){
   // needs to include ('../inc/config.cfg');
  try {
   $con = Conectarse();
   $result = mysqli_query($con,
      "SELECT * FROM `e_users` WHERE 'user' LIKE '".$nom."';");
  }
   if(mysqli_num_rows($result)>0){
      $row = mysqli_fetch_array($result);
      $password = $row['password'];
   
      if ($password==md5($clau)){
         return TRUE;
      }
 /*  if ( mysqli_connect_errno()) {
       throw new Exception("Could not connect to database.");   
   }
   } catch (Exception $e) {
      throw new Exception($e->getMessage());   
   }*/
   }
return FALSE;

}   

?>