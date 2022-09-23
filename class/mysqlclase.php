<?php

function Conectarse(){

 //if (!($link=mysql_connect("217.76.131.31","qe771","Jau2002"))){
if (!($link=mysql_connect(SERVER,USER,PASSWORD))){
    echo "Error conectando a la base de datos.";
    exit();  }
   if (!mysql_select_db(BBDD,$link))
   {      echo "Error seleccionando la base de datos.";
   exit();   }   
   return $link;}

//function CerrarConexion(){
//	mysql_close($link);
// }
?>