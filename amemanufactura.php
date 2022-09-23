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

style='font-family:Arial'>Formulari MODIFICACI� - <b>ALTA</b> de Feina a <?php echo $_POST["REF"];?><o:p></o:p></span></p>



<p class=MsoNormal align=center style='text-align:center'><span

style='font-family:Arial'><o:p>&nbsp;</o:p></span></p>



<?php



$sql="SELECT * FROM e_art_man WHERE Article='".$_POST["REF"]."';"; 



mysql_query($sql, $link);



$my_error = mysql_error($link);



if(!empty($my_error)) {



    echo "Ha habido un error.<br>", $my_error ,"<br>"; 



}



$resultat = mysql_query($sql);

$and=0;

while ($row = mysql_fetch_array($resultat)) {

if ($and==0){
echo "<center><table><tr><td align=center>Descripcio</td><td align=center>Quantitat</td>";

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



echo "<td>", $row["Manufactura"], "</td><td>",$row["Qty"],"</td></tr>";



}



echo"</table> </center>";





?>



<form action="sqlmescandall.php" method="post" name="altaemateria" enctype="multipart/form-data" > 


<?php echo "<INPUT NAME=REF  TYPE=HIDDEN SIZE=8 VALUE=".$_POST["REF"]." maxlenght=8>";?>

<div align=center>



<table class=MsoNormalTable border=0 cellpadding=0 style='mso-cellspacing:1.5pt;

 mso-padding-alt:0cm 5.4pt 0cm 5.4pt'>


<?php

 

 echo "<tr style='mso-yfti-irow:2'>

  <td style='padding:.75pt .75pt .75pt .75pt'>

  <p class=MsoNormal><span class=SpellE><b style='mso-bidi-font-weight:normal'><span

  style='font-family:Arial'>  Descripcio Materia Prima:  </span></b></span><b style='mso-bidi-font-weight:

  normal'><span style='font-family:Arial'>.<o:p></o:p></span></b></p>

  </td>

  <td style='padding:.75pt .75pt .75pt .75pt'>

  <p class=MsoNormal><INPUT NAME='REFFE'  TYPE=text SIZE=50 maxlenght=50></p>

  </td></tr></table><br>";



 echo "<table><tr><td>";



 echo "Segons --> <INPUT NAME=QTY  TYPE=text SIZE=8 maxlenght=8></td>";


?>


<td align=center>

<BUTTON name=submit value=mesfeina type=submit>Alta</BUTTON>





</td></tr>



</table>
<table>
<tr><td>
<BUTTON name=submit value=llistat type=submit>Calcular</BUTTON>

</FORM>
</div>



</div>



</body>



</html>





