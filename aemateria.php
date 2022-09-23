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
style='font-family:Arial'>Formulari <b>ALTA</b> de Materials a <? echo $_POST["REF"];?><o:p></o:p></span></p>

<p class=MsoNormal align=center style='text-align:center'><span
style='font-family:Arial'><o:p>&nbsp;</o:p></span></p>

<?

$sql="SELECT * FROM e_art_mat WHERE Article='".$_POST["REF"]."';"; 

echo $sql;

mysql_query($sql, $link);

$my_error = mysql_error($link);

if(!empty($my_error)) {

    echo "Ha habido un error.<br>", $my_error ,"<br>"; 

}

$resultat = mysql_query($sql);
$and=0;
while ($row = mysql_fetch_array($resultat)) {

if ($and==0){
echo "<center><table><tr><td align=center>REF.</td><td align=center>Descripcio</td><td align=center>Unitat<br>Mesura</td><td align=center>Quantitat</td>";
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

echo "<td>", $row["Materia"], "</td><td>",$rowsqlmat["Descripcio"],"</td><td>",$rowsqlmat["Umesura"],"</td><td>",$row["Qty"],"</td></tr>";
  }
}

echo"</table> </center>";



?>

<form action="sqlaescandall.php" method="post" name="altaemateria" enctype="multipart/form-data" > 

<? echo "<INPUT NAME=REF  TYPE=HIDDEN SIZE=8 VALUE='".$_POST["REF"]."' maxlenght=8>";?>
<div align=center>

<table class=MsoNormalTable border=0 cellpadding=0 style='mso-cellspacing:1.5pt;
 mso-padding-alt:0cm 5.4pt 0cm 5.4pt'>

<?

if (($_POST["QTY"]!=NULL) ||($_POST["REFMP"]==NULL)){
 
 echo "<tr style='mso-yfti-irow:2'>
  <td style='padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><span class=SpellE><b style='mso-bidi-font-weight:normal'><span
  style='font-family:Arial'>  Referencia Materia Prima:  </span></b></span><b style='mso-bidi-font-weight:
  normal'><span style='font-family:Arial'>.<o:p></o:p></span></b></p>
  </td>
  <td style='padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><INPUT NAME='REFMP'  TYPE=text SIZE=10 maxlenght=10></p>
  </td>";
 }

else{

 $select="SELECT * FROM e_materies WHERE Materia='".$_POST["REFMP"]."';";

  mysql_query($sql, $link);

  $my_error = mysql_error($link);

if(!empty($my_error)) {

    echo "Ha habido un error.<br>", $my_error ,"<br>"; 

}
else{

$resultat = mysql_query($select);
while ($row = mysql_fetch_array($resultat)) {


 echo "<table><tr><td>",$_POST["REFMP"],"</td><td>", $row["Descripcio"],"</td><td>", $row["Umesura"],"</td><td>";

 echo "Qty --> <INPUT NAME=QTY  TYPE=text SIZE=8 maxlenght=8></td>";
 echo "<INPUT NAME='REFMP'  TYPE=HIDDEN SIZE=10 VALUE=".$_POST["REFMP"]." maxlenght=10>";

}
}
}
?>

<td align=center>
<BUTTON name=submit value=altamp type=submit>Alta</BUTTON>
</td></tr>

</table>
<table>
<tr><td>
<a href="amateria.php" target=new> <BUTTON name=submit value=altamp>Alta Materia</BUTTON></a>
<a href="cmateria.php" target=new> <BUTTON name=submit value=altamp>Cerca Materia</BUTTON></a>
<BUTTON name=submit value=altafe type=submit>Entrar feina</BUTTON>
</FORM>


</div>

</div>

</body>

</html>


