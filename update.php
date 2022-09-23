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
style='font-family:Arial'>CONFIRMACIÓ MODIFICACIÓ DADES<o:p></o:p></span></p>

<p class=MsoNormal align=center style='text-align:center'><span
style='font-family:Arial'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal align=center style='text-align:center'><span
style='font-family:Arial'><o:p>&nbsp;</o:p></span></p>

<?php


include("class/mysqlclase.php");

$link=Conectarse();

$select="SELECT ".$_POST["TIPUS"]." from v_stock WHERE COLOR='".$_POST["COLOR"]."'";

$resultat=mysql_query($select);

$row = mysql_fetch_array($resultat);

if ($_POST["submit"]=="entrada"){

$e_s="Entrada";
$qty= $row[$_POST["TIPUS"]]+$_POST["QTY"];

}

else {
$e_s="Sortida";
$qty= $row[$_POST["TIPUS"]]-$_POST["QTY"];
}

$data=date('Y-m-d');

$update= "UPDATE v_stock SET ".$_POST["TIPUS"]."=".$qty." WHERE COLOR='".$_POST["COLOR"]."'";

mysql_query($update, $link);

$my_error = mysql_error($link);

if(!empty($my_error)) {

    echo "Ha habido un error al insertar los valores. $my_error <br>"; 

} 

else {

$insert="INSERT INTO v_control (TIPUS,COLOR,DIA,ES,QTY ) VALUES ('".$_POST["TIPUS"]."','".$_POST["COLOR"]."','".$data."','".$e_s."','".$_POST["QTY"]."') ;";

mysql_query($insert, $link);

$my_error = mysql_error($link);

if(!empty($my_error)) {

    echo "Ha habido un error al actualizar el log. $my_error <br>"; 
}
}


echo "<p class=MsoNormal align=center style='text-align:center'><span";
echo "style='font-family:Arial'>S'ha efectuat una <b>", $e_s, "</b> al magatzem<o:p></o:p></span></p>";

echo "<p class=MsoNormal align=center style='text-align:center'><span";
echo "style='font-family:Arial'><o:p>&nbsp;</o:p></span></p>";

echo "<p class=MsoNormal align=center style='text-align:center'><span";
echo "style='font-family:Arial'>Tipus de velcro: <b>", $_POST["TIPUS"], "</b><o:p></o:p></span></p>";

echo "<p class=MsoNormal align=center style='text-align:center'><span";
echo "style='font-family:Arial'><o:p>&nbsp;</o:p></span></p>";

echo "<p class=MsoNormal align=center style='text-align:center'><span";
echo "style='font-family:Arial'>Color: <b>", $_POST["COLOR"], "</b><o:p></o:p></span></p>";

echo "<p class=MsoNormal align=center style='text-align:center'><span";
echo "style='font-family:Arial'><o:p>&nbsp;</o:p></span></p>";

echo "<p class=MsoNormal align=center style='text-align:center'><span";
echo "style='font-family:Arial'>Quantitat: <b>", $_POST["QTY"], "</b><o:p></o:p></span></p>";


?></html>
