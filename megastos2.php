<script LANGUAGE="JavaScript">

<!--

// Nannette Thacker http://www.shiningstar.net

function confirmSubmit(vref, vdes)

{

var confirmacio="Les dades son correctes?\nRef.: "+vref+"\nDescripcio: "+vdes;



var agree=confirm(confirmacio);

if (agree)

	return true ;

else

	return false ;

}

// -->

</script>







<p class=MsoNormal align=center style='text-align:center'><span

style='font-family:Arial'><b>Modificacio Escandall</b> de <? echo $_POST["REF"];?><o:p></o:p></span></p>



<p class=MsoNormal align=center style='text-align:center'><span

style='font-family:Arial'><o:p>&nbsp;</o:p></span></p>




<form action="sqlmescandall.php" method="post" name="modificaescandall" enctype="multipart/form-data" > 


<center>
<BUTTON name=submit value=mesmateria type=submit>Afegir materia</BUTTON>
<BUTTON name=submit value=mesfeina type=submit>Afegir feines</BUTTON>
</center>



<?php




$sgastos="SELECT * FROM e_articles WHERE Referencia='".$_POST["REF"]."';"; 

$cost=0;

mysql_query($sgastos, $link);



$my_error = mysql_error($link);



if(!empty($my_error)) {



    echo "Ha habido un error.<br>", $my_error ,"<br>"; 



}



$rgastos = mysql_query($sgastos);


while ($row = mysql_fetch_array($rgastos)) {

$Descripcio=$row["Nom"];
$Transport=$row["Transport"];
$Generals=$row["Generals"];
$Financiacio=$row["Financiacio"];
$Varis=$row["Varis"];
$Representant=$row["Representant"];
$Marge=$row["Marge"];
$Smarge=$row["Smarge"];
}

echo "<p class=MsoNormal align=center style='text-align:center'><span";

echo "style='font-family:Arial'><o:p>",$Descripcio,"</o:p></span></p>";



//-----------------------------------------------------------------------------


$smateria="SELECT * FROM e_art_mat WHERE Article='".$_POST["REF"]."';"; 



mysql_query($smateria, $link);



$my_error = mysql_error($link);



if(!empty($my_error)) {



    echo "Ha habido un error.<br>", $my_error ,"<br>"; 



}



$rmateria = mysql_query($smateria);

$and=0;
$countmat=1;
$countmanu=1;

while ($row = mysql_fetch_array($rmateria)) {

if ($and==0){
echo "<center><b>MATERIES</B><p><table><tr><td align=center>REF.</td><td align=center>Descripcio</td><td align=center>Unitat<br>Mesura</td><td align=center>Quantitat</td>";

$and=2;
}



if ($and==2){

 $and=1;

 echo "<tr bgcolor=#e3e3e3>";

  }

else{

 $and=2;

 echo "<tr bgcolor=white>";

  }



$sqlmat="SELECT * FROM e_materies WHERE Materia='".$row["Materia"]."';";


$rsqlmat = mysql_query($sqlmat);


while ($rowsqlmat = mysql_fetch_array($rsqlmat)) {

$preu=$rowsqlmat["Preu"];
$quan=$row["Qty"];
$subcost=($preu*$quan);
$cost=($cost+($subcost));




echo "<td>", $row["Materia"], "</td><td>",$rowsqlmat["Descripcio"],"</td><td>",$rowsqlmat["Umesura"],"</td><td>";
echo "<INPUT name=MAT",$countmat," value=",$row["Qty"]," align=right></td></tr>";
echo "<INPUT type=hidden name=REFMAT",$countmat," value=",$row["Materia"],">";
print("\n");
$countmat=$countmat+1;

  }

}



echo"<td></td></table> </center>";





//---------------------------------------------------------------------------------

$smanu="SELECT * FROM e_art_man WHERE Article='".$_POST["REF"]."';"; 



mysql_query($smanu, $link);



$my_error = mysql_error($link);



if(!empty($my_error)) {



    echo "Ha habido un error.<br>", $my_error ,"<br>"; 



}



$rmanu = mysql_query($smanu);

$and=0;

while ($row = mysql_fetch_array($rmanu)) {

if ($and==0){
echo "<center><b>MANUFACTURA - FEINA</B><p></center>";
echo "<center><table><tr><td align=center>Descripcio</td><td align=center>Segons</td>";

$and=2;
}



if ($and==2){

 $and=1;

 echo "<tr bgcolor=#e3e3e3>";

  }

else{

 $and=2;

 echo "<tr bgcolor=white>";

  }



$sqlmat="SELECT * FROM e_manufactura WHERE Manufactura='TALLER';";


$rsqlmat = mysql_query($sqlmat);


while ($rowsqlmat = mysql_fetch_array($rsqlmat)) {

$preu=($rowsqlmat["Preu"]/3600);
$quan=$row["Qty"];
$subcost=($preu*$quan);
$cost=($cost+($subcost));



echo "<td>", $row["Manufactura"], "</td><td><INPUT name=MANU",$countmanu," value=",$row["Qty"]," align=right></td></tr>";
echo "<INPUT type=hidden name=REFMANU",$countmanu," value=",$row["ID"],">";
print("\n");
$countmanu=$countmanu+1;



  }

}



echo"</table> </center>";

echo "<INPUT type=hidden name=CMAT value=",$countmat-1,">";
echo "<INPUT type=hidden name=CMANU value=",$countmanu-1,">";



//---------------------------------------


$sql="SELECT * FROM e_articles WHERE referencia='".$_POST["REF"]."';";



mysql_query($sql, $link);



$my_error = mysql_error($link);



if(!empty($my_error)) {



    echo "Ha habido un error.<br>", $my_error ,"<br>"; 



}



$resultat = mysql_query($sql);
echo "<p><center><b>GASTOS VARIS</B><p></center>";


?>
<center><table><tr><td>
<?php
echo "<INPUT NAME=REF  TYPE=HIDDEN SIZE=8 VALUE=".$_POST["REF"]." maxlenght=8>";


while ($row = mysql_fetch_array($resultat)) {

echo " Transport </td><td><INPUT NAME=Transport Type=TEXT VALUE=",$row["Transport"]," SIZE=3 maxlenght=3>%</td></tr>";
echo " <tr><td>Generals </td><td><INPUT NAME=Generals Type=TEXT VALUE=",$row["Generals"]," SIZE=3 maxlenght=3>%</td></tr>";
echo " <tr><td>Financiacio </td><td><INPUT NAME=Financiacio Type=TEXT VALUE=",$row["Financiacio"]," SIZE=3 maxlenght=3>%</td></tr>";
echo " <tr><td>Varis </td><td><INPUT NAME=Varis Type=TEXT VALUE=",$row["Varis"]," SIZE=3 maxlenght=3>%</td></tr>";
echo " <tr><td>Representant </td><td><INPUT NAME=Representant Type=TEXT VALUE=",$row["Representant"]," SIZE=3 maxlenght=3>%</td></tr>";
echo " <tr><td>Marge </td><td><INPUT NAME=Marge Type=TEXT VALUE=",$row["Marge"]," SIZE=3 maxlenght=3>%</td></tr>";
echo " <tr><td>Minim </td><td><INPUT NAME=Smarge Type=TEXT VALUE=",$row["Smarge"]," SIZE=3 maxlenght=3>%</td></tr>";
}


echo"</table> </center>";
?>


<center>
<BUTTON name=submit value=fimodifica type=submit>Modifica Fitxa</BUTTON>
</center>



</form>





</div>



</body>



</html>





