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

style='font-family:Arial'><b>Escandall</b> de <?php echo $_POST["REF"];?><o:p></o:p></span></p>





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
$DataMod=$row["DataMod"];
}

echo "<center>DATA : ", $DataMod,"</center>";

echo "<p class=MsoNormal align=center style='text-align:center'><span style='font-family:Arial'><o:p>&nbsp;</o:p></span></p>";

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

while ($row = mysql_fetch_array($rmateria)) {

if ($and==0){
echo "<center><b>MATERIES</B><p><table><tr><td align=center>REF.</td><td align=center>Descripcio</td><td align=center>Unitat<br>Mesura</td><td align=center>Quantitat</td><td align=center>Cost</td>";

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




echo "<td>", $row["Materia"], "</td><td>",$rowsqlmat["Descripcio"],"</td><td>",$rowsqlmat["Umesura"],"</td><td>",$row["Qty"],"</td><td>",$subcost,"</td></tr>";

  }

}



echo"</table> </center>";

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
echo "<center><table><tr><td align=center>Descripcio</td><td align=center>Segons</td><td align=center>Cost</td>";

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



echo "<td>", $row["Manufactura"], "</td><td>",$row["Qty"],"</td><td>",$subcost,"</td></tr>";



  }

}



echo"</table> </center>";




//---------------------------------------

?>






<CENTER>
<b> COSTOS FINALS </b>
<table><tr><td>
<table>
<tr><td>Costos sense Gastos</td><td align=right><?php printf("%.2f", $cost);?></td></tr>
<tr><td>Costos de Transport</td><td align=right><?php $Transport=$cost*($Transport/100); printf("%.2f", $Transport);?></td></tr>
<tr><td>Costos de Generals</td><td align=right><?php $Generals=$cost*($Generals/100); printf("%.2f", $Generals);?></td></tr>
<tr><td>Costos de Financiacio</td><td align=right><?php $Financiacio=$cost*($Financiacio/100); printf("%.2f", $Financiacio);?></td></tr>
<tr><td>Costos de Varis</td><td align=right><?php $Varis=$cost*($Varis/100); printf("%.2f", $Varis);?></td></tr>
<?php
$cost=$cost+$Transport+$Generals+$Financiacio+$Varis;
$mcost=$cost*(1+($Marge/100));
$Smcost=$cost*(1+($Smarge/100));
$preuf=$mcost/(1-($Representant/100));
$preufS=$Smcost/(1-($Representant/100));

?>
<tr><td>PREU COST</td><td align=right><?php  printf("%.2f", $cost);?></td></tr>
<tr><td>Costos de Representant</td><td align=right><?php $Represent=$preuf*($Representant/100); printf("%.2f", $Represent);?></td></tr>
<tr><td>PREU FINAL - <?php printf("%.2f %%", $Marge);?></td><td align=right><?php printf("%.2f", $preuf);?></td></tr>
<tr><td>Costos de Representant 2�Marge</td><td align=right><?php $Repre=$preufS*($Representant/100); printf("%.2f", $Repre);?></td></tr>
<tr><td>PREU MINIM - <?php printf("%.2f %%", $Smarge);?></td><td align=right><?php printf("%.2f", $preufS);?></td></tr>
</table>
</td>
<td>
<table>
<?php 

for ($i=10; $i>0;$i--){

$mar=$i*10;
$Smcost=$cost*(1+(($mar)/100));
$preufS=$Smcost/(1-($Representant/100));
?>
<tr><td>PREU MARGE - <?php printf("%.2f %%", $mar);?></td><td align=right><?php printf("%.2f", $preufS);?></td><tr>
<?php } ?>
</table>
</td></tr>
</table>



</table>









</div>



</body>



</html>





