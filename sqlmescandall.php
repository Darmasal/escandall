<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=us-ascii">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 10">
<meta name=Originator content="Microsoft Word 10">
<link rel=File-List href="formulario_archivos/filelist.xml">
<link rel=Edit-Time-Data href="formulario_archivos/editdata.mso">
<!--[if !mso]>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
w\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]-->
<title>Formulario</title>
<!--[if gte mso 9]><xml>
 <o:DocumentProperties>
  <o:Author>Taula</o:Author>
  <o:Template>Normal</o:Template>
  <o:LastAuthor>Taula</o:LastAuthor>
  <o:Revision>3</o:Revision>
  <o:TotalTime>2</o:TotalTime>
  <o:Created>2006-07-20T13:34:00Z</o:Created>
  <o:LastSaved>2006-07-20T13:40:00Z</o:LastSaved>
  <o:Pages>1</o:Pages>
  <o:Words>88</o:Words>
  <o:Characters>487</o:Characters>
  <o:Company>-</o:Company>
  <o:Lines>4</o:Lines>
  <o:Paragraphs>1</o:Paragraphs>
  <o:CharactersWithSpaces>574</o:CharactersWithSpaces>
  <o:Version>10.4219</o:Version>
 </o:DocumentProperties>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <w:WordDocument>
  <w:SpellingState>Clean</w:SpellingState>
  <w:GrammarState>Clean</w:GrammarState>
  <w:HyphenationZone>21</w:HyphenationZone>
  <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>
 </w:WordDocument>
</xml><![endif]-->
<style>
<!--
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-parent:"";
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman";
	mso-fareast-font-family:"Times New Roman";}
p
	{font-size:12.0pt;
	font-family:"Times New Roman";
	mso-fareast-font-family:"Times New Roman";}
span.SpellE
	{mso-style-name:"";
	mso-spl-e:yes;}
span.GramE
	{mso-style-name:"";
	mso-gram-e:yes;}
@page Section1
	{size:595.3pt 841.9pt;
	margin:70.85pt 3.0cm 70.85pt 3.0cm;
	mso-header-margin:35.4pt;
	mso-footer-margin:35.4pt;
	mso-paper-source:0;}
div.Section1
	{page:Section1;}
-->
</style>
<!--[if gte mso 10]>
<style>
 /* Style Definitions */
 table.MsoNormalTable
	{mso-style-name:"Tabla normal";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-noshow:yes;
	mso-style-parent:"";
	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
	mso-para-margin:0cm;
	mso-para-margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Times New Roman";}
</style>
<![endif]--><!--[if gte mso 9]><xml>
 <o:shapedefaults v:ext="edit" spidmax="1026"/>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <o:shapelayout v:ext="edit">
  <o:idmap v:ext="edit" data="1"/>
 </o:shapelayout></xml><![endif]-->
</head>

<body lang=ES style='tab-interval:35.4pt'>

<div class=Section1>

<p class=MsoNormal align=center style='text-align:center'><span
style='font-family:Arial'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal align=center style='text-align:center'><span
style='font-family:Arial'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal align=center style='text-align:center'><span
style='font-family:Arial'><o:p>&nbsp;</o:p></span></p>

<?php


include("class/mysqlclase.php");

$link=Conectarse();

if (isset($_GET["REF"])){
 $_POST["REF"]=$_GET["REF"];
 $_POST["submit"]="llista";
}


if ($_POST["submit"]=="alta"){


$sql="SELECT * FROM e_articles WHERE Referencia='".$_POST["REF"]."';"; 

mysql_query($sql, $link);

$my_error = mysql_error($link);

if(!empty($my_error)) {

    echo "Ha habido un error.<br>", $my_error ,"<br>"; 

}

$resultat = mysql_query($sql);
$and=0;
while ($row = mysql_fetch_array($resultat)) {


$insert="INSERT INTO e_articles (Referencia,Nom,Marge,Transport,Generals,Financiacio,Varis,Representant,Smarge,Estat)
VALUES ('".$_POST["REFNEW"]."','".$_POST["NOM"]."',".$row["Marge"].",".$row["Transport"].",".$row["Generals"].",".$row["Financiacio"]
         .",".$row["Varis"].",".$row["Representant"].",".$row["Smarge"].",'M');";

}


mysql_query($insert, $link);

$my_error = mysql_error($link);

if(!empty($my_error)) {
 
if ($my_error==("Duplicate entry '".$_POST["REF"]."' for key 1")){

  $_POST["submit"]="altamp";
	
    }
else{
    echo "Ha habido un error en la Alta.<br>", $my_error ,"<br>"; 
   }
}

$sql2="SELECT * FROM e_art_mat WHERE Article='".$_POST["REF"]."';"; 

mysql_query($sql2, $link);

$my_error = mysql_error($link);

if(!empty($my_error)) {

    echo "Ha habido un error.<br>", $my_error ,"<br>"; 

}




$resultat2 = mysql_query($sql2);
$and=0;
while ($row = mysql_fetch_array($resultat2)) {

 $insert="INSERT INTO e_art_mat (Article,Materia,Qty) VALUES ('".$_POST["REFNEW"]."','".$row["Materia"]."',".$row["Qty"].");";

mysql_query($insert, $link);

$my_error = mysql_error($link);

if(!empty($my_error)) {
 
if ($my_error==("Duplicate entry '".$_POST["REF"]."' for key 1")){

  $_POST["submit"]="altamp";
	
    }
else{
    echo "Ha habido un error en la Alta.<br>", $my_error ,"<br>"; 
   }
}
}


$sql3="SELECT * FROM e_art_man WHERE Article='".$_POST["REF"]."';"; 

mysql_query($sql3, $link);

$my_error = mysql_error($link);

if(!empty($my_error)) {

    echo "Ha habido un error.<br>", $my_error ,"<br>"; 

}



$resultat3 = mysql_query($sql3);
$and=0;
while ($row = mysql_fetch_array($resultat3)) {

 $insert="INSERT INTO e_art_man (Article,Manufactura,Qty) VALUES ('".$_POST["REFNEW"]."','".$row["Manufactura"]."',".$row["Qty"].");";

mysql_query($insert, $link);

$my_error = mysql_error($link);

if(!empty($my_error)) {
 
if ($my_error==("Duplicate entry '".$_POST["REF"]."' for key 1")){

  $_POST["submit"]="altamp";
	
    }
else{
    echo "Ha habido un error en la Alta.<br>", $my_error ,"<br>"; 
   }
}
}

$_POST["REF"]=$_POST["REFNEW"];


   include("megastos2.php");



 }


if ($_POST["submit"]=="mesmateria"){

 if($_POST["QTY"]==NULL){

   include("amemateria.php");
  }
 else{
   
  $insert="INSERT INTO e_art_mat (Article,Materia,Qty) 
           VALUES ('".$_POST["REF"]."','".$_POST["REFMP"]."',".$_POST["QTY"].");";

   mysql_query($insert, $link);

   $my_error = mysql_error($link);

      if(!empty($my_error)) {
  
        echo "Ha habido un error en la Alta.<br>", $my_error ,"<br>"; 
           }
  
   include("amemateria.php");

  }

}

if ($_POST["submit"]=="mesfeina"){

 if($_POST["QTY"]==NULL){
   
  $update= "UPDATE e_articles SET Estat='F', DataMod=now() WHERE Referencia='".$_POST["REF"]."'";

   mysql_query($update, $link);

   $my_error = mysql_error($link);

      if(!empty($my_error)) {
  
        echo "Ha habido un error en la Alta.<br>", $my_error ,"<br>"; 
           }

   include("amemanufactura.php");
  }

 else{
   
  $insert="INSERT INTO e_art_man (Article,Manufactura,Qty) 
           VALUES ('".$_POST["REF"]."','".$_POST["REFFE"]."',".$_POST["QTY"].");";

   mysql_query($insert, $link);

   $my_error = mysql_error($link);

      if(!empty($my_error)) {
  
        echo "Ha habido un error en la Alta.<br>", $my_error ,"<br>"; 
           }
  
   include("amemanufactura.php");

  }

}

if ($_POST["submit"]=="gastos"){

  
  $update= "UPDATE e_articles SET Estat='F', DataMod=now() WHERE Referencia='".$_POST["REF"]."'";

   mysql_query($update, $link);

   $my_error = mysql_error($link);

      if(!empty($my_error)) {
  
        echo "Ha habido un error en la Alta.<br>", $my_error ,"<br>"; 
           }

   include("aegastos.php");


}

if ($_POST["submit"]=="calcul"){

  
  $update= "UPDATE e_articles SET 
       Marge=".$_POST["Marge"].",
       Transport=".$_POST["Transport"].",
       Generals=".$_POST["Generals"].",
       Financiacio=".$_POST["Financiacio"].",
       Varis=".$_POST["Varis"].",
       Representant=".$_POST["Representant"].",
       Smarge=".$_POST["Smarge"].",	   DataMod=now()
       WHERE Referencia='".$_POST["REF"]."'";

   mysql_query($update, $link);

   $my_error = mysql_error($link);

      if(!empty($my_error)) {
  
        echo "Ha habido un error en la Alta.<br>", $my_error ,"<br>"; 
           }

   include("aegastos2.php");

}


if ($_POST["submit"]=="baixa"){

  
  $delete= "DELETE FROM e_articles 
       WHERE Referencia='".$_POST["REF"]."' LIMIT 1";

echo $delete, "<br>";
   mysql_query($delete, $link);

  $delete= "DELETE FROM e_art_mat 
       WHERE Article='".$_POST["REF"]."'";
echo $delete, "<br>";
   mysql_query($delete, $link);

  $delete= "DELETE FROM e_art_man 
       WHERE Article='".$_POST["REF"]."'";
echo $delete, "<br>";
   mysql_query($delete, $link);


   $my_error = mysql_error($link);

      if(!empty($my_error)) {
  
        echo "Ha habido un error en la Alta.<br>", $my_error ,"<br>"; 
           }

      Else {
	 echo " L'article s'ha esborrat correctament";
    }

}

if (($_POST["submit"]=="cerca")||($_POST["submit"]=="llmodifica")){


$sql="SELECT * FROM e_articles ";
$and=0;

if ($_POST["REF"]!=NULL){
 $sql= $sql."WHERE Referencia LIKE '%".$_POST["REF"]."%' ";
 $and=1;
}
if ($_POST["NOM"]!=NULL){
 if($and==1){$sql=$sql."AND ";}
 else{$sql=$sql."WHERE ";};
 $and=1;
 $sql= $sql."Nom LIKE '%".$_POST["NOM"]."%' ";
}


$sql= $sql."ORDER BY Nom";

mysql_query($sql, $link);

$my_error = mysql_error($link);

if(!empty($my_error)) {

    echo "Ha habido un error en la Baja.<br>", $my_error ,"<br>"; 

}

echo "<table><tr><td align=center>REF.</td><td align=center>Descripcio</td><td></td></tr>";

$resultat = mysql_query($sql);
$and=0;
while ($row = mysql_fetch_array($resultat)) {

if ($and==0){
 $and=1;
 echo "<tr bgcolor=#e3e3e3>";
}
else{
 $and=0;
 echo "<tr bgcolor=white>";
}

if ($_POST["submit"]=="cerca"){
echo "<td>", $row["Referencia"], "</td><td>",$row["Nom"],"</td><td><a href=sqlaescandall.php?REF=",$row["Referencia"],">Mostra</a></td></tr>";
}
else{
echo "<td>", $row["Referencia"], "</td><td>",$row["Nom"],"</td><td><a href=sqlmescandall.php?REF=",$row["Referencia"],">Modifica</a></td></tr>";
}
}

echo"</table>";

}

if ($_POST["submit"]=="llista"){

  
   include("megastos2.php");


}

if ($_POST["submit"]=="llistat"){

  
   include("aegastos2.php");

}


if ($_POST["submit"]=="fimodifica"){


for($i=1;$i<=$_POST["CMAT"];$i++){

$qmat="MAT";
$cm=$qmat.$i;
$rmat="REFMAT";
$rm=$rmat.$i;


if ($_POST[$cm]<=0){

  $delete= "DELETE FROM e_art_mat 
       WHERE Article='".$_POST["REF"]."' and Materia='".$_POST[$rm]."' LIMIT 1";

   mysql_query($delete, $link);


   $my_error = mysql_error($link);

      if(!empty($my_error)) {
  
        echo "Ha habido un error en la linia",$delete,".<br>", $my_error ,"<br>"; 
           }

}

else{

 $update="UPDATE e_art_mat SET Qty='".$_POST[$cm]."'  WHERE Article='".$_POST["REF"]."' and Materia='".$_POST[$rm]."' LIMIT 1";
 print(" \n");

   mysql_query($update, $link);

   $my_error = mysql_error($link);

      if(!empty($my_error)) {
  
        echo "Ha habido un error en la linia",$delete,".<br>", $my_error ,"<br>"; 
           }

}
}


for($i=1;$i<=$_POST["CMANU"];$i++){

$qmat="MANU";
$cm=$qmat.$i;
$rmat="REFMANU";
$rm=$rmat.$i;


if ($_POST[$cm]<=0){

  $delete= "DELETE FROM e_art_man 
       WHERE ID='".$_POST[$rm]."' LIMIT 1";

   mysql_query($delete, $link);


   $my_error = mysql_error($link);

      if(!empty($my_error)) {
  
        echo "Ha habido un error en la linia",$delete,".<br>", $my_error ,"<br>"; 
           }


}
else{

 $update="UPDATE e_art_man SET Qty='".$_POST[$cm]."'  WHERE ID='".$_POST[$rm]."' LIMIT 1";

   mysql_query($update, $link);

   $my_error = mysql_error($link);

      if(!empty($my_error)) {
  
        echo "Ha habido un error en la linia",$delete,".<br>", $my_error ,"<br>"; 
           }

}
}

  $update= "UPDATE e_articles SET 
       Marge=".$_POST["Marge"].",
       Transport=".$_POST["Transport"].",
       Generals=".$_POST["Generals"].",
       Financiacio=".$_POST["Financiacio"].",
       Varis=".$_POST["Varis"].",
       Representant=".$_POST["Representant"].",
       Smarge=".$_POST["Smarge"].",	   DataMod=now()
       WHERE Referencia='".$_POST["REF"]."'";

   mysql_query($update, $link);

   $my_error = mysql_error($link);

      if(!empty($my_error)) {
  
        echo "Ha habido un error en la linia",$delete,".<br>", $my_error ,"<br>"; 
           }

   include("aegastos2.php");


}































?></html>
