







$sql="SELECT * FROM e_articles WHERE referencia='".$_POST["REF"]."';";



mysql_query($sql, $link);



$my_error = mysql_error($link);



if(!empty($my_error)) {



    echo "Ha habido un error.<br>", $my_error ,"<br>"; 



}



$resultat = mysql_query($sql);

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
echo " <tr><td>Minim </td><td><INPUT NAME=SMarge Type=TEXT VALUE=",$row["Smarge"]," SIZE=3 maxlenght=3>%</td></tr>";
}


echo"</table> </center>";



