<script LANGUAGE="JavaScript">
<!--
// Nannette Thacker http://www.shiningstar.net
function confirmSubmit(vref, vdes, vuni, vpreu, vprov)
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
style='font-family:Arial'>Formulari <b>ALTA</b> d'Escandall<o:p></o:p></span></p>

<p class=MsoNormal align=center style='text-align:center'><span
style='font-family:Arial'><o:p>&nbsp;</o:p></span></p>

<form action="sqlaescandall.php" onsubmit="return confirmSubmit(REF.value,NOM.value)" method="post" name="alta" enctype="multipart/form-data" > 

<div align=center>

<table class=MsoNormalTable border=0 cellpadding=0 style='mso-cellspacing:1.5pt;
 mso-padding-alt:0cm 5.4pt 0cm 5.4pt'>
 
 <tr style='mso-yfti-irow:2'>
  <td style='padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><span class=SpellE><b style='mso-bidi-font-weight:normal'><span
  style='font-family:Arial'>  Referencia:  </span></b></span><b style='mso-bidi-font-weight:
  normal'><span style='font-family:Arial'>.<o:p></o:p></span></b></p>
  </td>
  <td style='padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><INPUT NAME="REF"  TYPE="text" SIZE="8" maxlenght=8></p>
  </td>
 </tr>

 <tr style='mso-yfti-irow:2'>
  <td style='padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><span class=SpellE><b style='mso-bidi-font-weight:normal'><span
  style='font-family:Arial'>Descripció:</span></b></span><b style='mso-bidi-font-weight:
  normal'><span style='font-family:Arial'>.<o:p></o:p></span></b></p>
  </td>
  <td style='padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><INPUT NAME="NOM"  TYPE="text" SIZE="100" maxlenght=100></p>
  </td>
 </tr>

<tr><td align=center>
<BUTTON name=submit value=modifica type=submit>Cercar</BUTTON>
</FORM>
</td><td></td></tr>

</table>

</div>

</div>

</body>

</html>


