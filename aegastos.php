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

style='font-family:Arial'>Formulari <b>ALTA</b> de Gastos a <?php echo $_POST["REF"];?><o:p></o:p></span></p>



<p class=MsoNormal align=center style='text-align:center'><span

style='font-family:Arial'><o:p>&nbsp;</o:p></span></p>



<?php



$sql="SELECT * FROM e_gastos"; 



mysql_query($sql, $link);



$my_error = mysql_error($link);



if(!empty($my_error)) {



    echo "Ha habido un error.<br>", $my_error ,"<br>"; 



}



$resultat = mysql_query($sql);

?>
<form action="sqlaescandall.php" method="post" name="altaemateria" enctype="multipart/form-data" > 

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
echo " <tr><td>2� Marge </td><td><INPUT NAME=Smarge Type=TEXT VALUE=100 SIZE=3 maxlenght=3>%</td></tr>";
}


echo"</table> </center>";



?>



<center>

<BUTTON name=submit value=calcul type=submit>Calcular</BUTTON>

</center>
</FORM>





</div>



</body>



</html>





