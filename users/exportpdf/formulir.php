<?php
// ob_start();
session_start();
error_reporting(0);
$id = $_GET['id'];

include"../config/DB.php";
include"../config/dbold.php";
include"../fctn/tglid.php";
$sql = $dbase->query("SELECT * FROM user_reg INNER JOIN anggota ON user_reg.id = anggota.iduser WHERE iduser = '$_SESSION[iduser]'");
// $sql = $dbase->query("SELECT * FROM anggota WHERE username = '$_SESSION[calonanggota]'");
// $data = $sql->fetch(PDO::FETCH_OBJ);
while ($data = $sql->fetch(PDO::FETCH_OBJ)) {
    $pendidikanterkahir = $data->pendidikanterkahir;
    $foto               = $data->foto;
    $kodeanggota        = $data->kodeanggota;
    $nama               = $data->nama;
    $jeniskelamin       = $data->jeniskelamin;
    $tempatlahir        = $data->tempatlahir;
    $tgllahir           = $data->tgllahir;
    $agama              = $data->agama;
    $alamat             = $data->alamat;
    $jenisidentitas     = $data->jenisidentitas;
    $nomoridentitas     = $data->nomoridentitas;
    $kontak             = $data->kontak;
    $pendidikanterakhir = $data->pendidikanterakhir;
    $namainstansi       = $data->namainstansi;
    $alamatinstansi     = $data->alamatinstansi;
    $statuskeanggotaan  = $data->status_keanggotaan;
    $statuspekerjaan    = $data->statuspekerjaan;


}
// var_dump($foto);
?>
<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 12">
<meta name=Originator content="Microsoft Word 12">
<link rel=File-List href="Pekanbaru_files/filelist.xml">
<link rel=Edit-Time-Data href="Pekanbaru_files/editdata.mso">
<!--[if !mso]>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
w\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]--><!--[if gte mso 9]><xml>
 <o:DocumentProperties>
  <o:Author>puswil</o:Author>
  <o:LastAuthor>puswil</o:LastAuthor>
  <o:Revision>2</o:Revision>
  <o:TotalTime>94</o:TotalTime>
  <o:Created>2017-07-20T23:19:00Z</o:Created>
  <o:LastSaved>2017-07-20T23:19:00Z</o:LastSaved>
  <o:Pages>1</o:Pages>
  <o:Words>269</o:Words>
  <o:Characters>1534</o:Characters>
  <o:Lines>12</o:Lines>
  <o:Paragraphs>3</o:Paragraphs>
  <o:CharactersWithSpaces>1800</o:CharactersWithSpaces>
  <o:Version>12.00</o:Version>
 </o:DocumentProperties>
</xml><![endif]-->
<link rel=themeData href="Pekanbaru_files/themedata.thmx">
<link rel=colorSchemeMapping href="Pekanbaru_files/colorschememapping.xml">
<!--[if gte mso 9]><xml>
 <w:WordDocument>
  <w:SpellingState>Clean</w:SpellingState>
  <w:GrammarState>Clean</w:GrammarState>
  <w:TrackMoves>false</w:TrackMoves>
  <w:TrackFormatting/>
  <w:PunctuationKerning/>
  <w:ValidateAgainstSchemas/>
  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>
  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>
  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>
  <w:DoNotPromoteQF/>
  <w:LidThemeOther>EN-US</w:LidThemeOther>
  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>
  <w:LidThemeComplexScript>AR-SA</w:LidThemeComplexScript>
  <w:Compatibility>
   <w:BreakWrappedTables/>
   <w:SnapToGridInCell/>
   <w:WrapTextWithPunct/>
   <w:UseAsianBreakRules/>
   <w:DontGrowAutofit/>
   <w:SplitPgBreakAndParaMark/>
   <w:DontVertAlignCellWithSp/>
   <w:DontBreakConstrainedForcedTables/>
   <w:DontVertAlignInTxbx/>
   <w:Word11KerningPairs/>
   <w:CachedColBalance/>
  </w:Compatibility>
  <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>
  <m:mathPr>
   <m:mathFont m:val="Cambria Math"/>
   <m:brkBin m:val="before"/>
   <m:brkBinSub m:val="--"/>
   <m:smallFrac m:val="off"/>
   <m:dispDef/>
   <m:lMargin m:val="0"/>
   <m:rMargin m:val="0"/>
   <m:defJc m:val="centerGroup"/>
   <m:wrapIndent m:val="1440"/>
   <m:intLim m:val="subSup"/>
   <m:naryLim m:val="undOvr"/>
  </m:mathPr></w:WordDocument>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"
  DefSemiHidden="true" DefQFormat="false" DefPriority="99"
  LatentStyleCount="267">
  <w:LsdException Locked="false" Priority="0" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Normal"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="heading 1"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 1"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 2"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 3"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 4"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 5"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 6"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 7"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 8"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 9"/>
  <w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption"/>
  <w:LsdException Locked="false" Priority="10" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Title"/>
  <w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font"/>
  <w:LsdException Locked="false" Priority="11" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Subtitle"/>
  <w:LsdException Locked="false" Priority="22" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Strong"/>
  <w:LsdException Locked="false" Priority="20" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Emphasis"/>
  <w:LsdException Locked="false" Priority="59" SemiHidden="false"
   UnhideWhenUsed="false" Name="Table Grid"/>
  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text"/>
  <w:LsdException Locked="false" Priority="1" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="No Spacing"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 1"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 1"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 1"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 1"/>
  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision"/>
  <w:LsdException Locked="false" Priority="34" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="List Paragraph"/>
  <w:LsdException Locked="false" Priority="29" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Quote"/>
  <w:LsdException Locked="false" Priority="30" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Intense Quote"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 1"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 1"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 1"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 1"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 2"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 2"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 2"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 2"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 2"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 2"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 2"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 3"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 3"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 3"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 3"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 3"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 3"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 3"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 4"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 4"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 4"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 4"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 4"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 4"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 4"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 5"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 5"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 5"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 5"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 5"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 5"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 5"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 6"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 6"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 6"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 6"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 6"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 6"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 6"/>
  <w:LsdException Locked="false" Priority="19" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis"/>
  <w:LsdException Locked="false" Priority="21" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis"/>
  <w:LsdException Locked="false" Priority="31" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference"/>
  <w:LsdException Locked="false" Priority="32" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Intense Reference"/>
  <w:LsdException Locked="false" Priority="33" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Book Title"/>
  <w:LsdException Locked="false" Priority="37" Name="Bibliography"/>
  <w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading"/>
 </w:LatentStyles>
</xml><![endif]-->
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:Wingdings;
	panose-1:5 0 0 0 0 0 0 0 0 0;
	mso-font-charset:2;
	mso-generic-font-family:auto;
	mso-font-pitch:variable;
	mso-font-signature:0 268435456 0 0 -2147483648 0;}
@font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:-536870145 1107305727 0 0 415 0;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-520092929 1073786111 9 0 415 0;}
@font-face
	{font-family:Tahoma;
	panose-1:2 11 6 4 3 5 4 4 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-520081665 -1073717157 41 0 66047 0;}
@font-face
	{font-family:"Arial Narrow";
	panose-1:2 11 6 6 2 2 2 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:647 2048 0 0 159 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:.5in;
	text-align:justify;
	text-indent:-.25in;
	line-height:115%;
	mso-pagination:widow-orphan;

	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:Arial;
	mso-bidi-theme-font:minor-bidi;}
p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
	{mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-link:"Balloon Text Char";
	margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.5in;
	margin-bottom:.0001pt;
	text-align:justify;
	text-indent:-.25in;
	mso-pagination:widow-orphan;
	font-size:8.0pt;
	font-family:"Tahoma","sans-serif";
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;}
p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
	{mso-style-priority:34;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:.5in;
	mso-add-space:auto;
	text-align:justify;
	text-indent:-.25in;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:Arial;
	mso-bidi-theme-font:minor-bidi;}
p.MsoListParagraphCxSpFirst, li.MsoListParagraphCxSpFirst, div.MsoListParagraphCxSpFirst
	{mso-style-priority:34;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-type:export-only;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.5in;
	margin-bottom:.0001pt;
	mso-add-space:auto;
	text-align:justify;
	text-indent:-.25in;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:Arial;
	mso-bidi-theme-font:minor-bidi;}
p.MsoListParagraphCxSpMiddle, li.MsoListParagraphCxSpMiddle, div.MsoListParagraphCxSpMiddle
	{mso-style-priority:34;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-type:export-only;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.5in;
	margin-bottom:.0001pt;
	mso-add-space:auto;
	text-align:justify;
	text-indent:-.25in;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:Arial;
	mso-bidi-theme-font:minor-bidi;}
p.MsoListParagraphCxSpLast, li.MsoListParagraphCxSpLast, div.MsoListParagraphCxSpLast
	{mso-style-priority:34;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-type:export-only;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:.5in;
	mso-add-space:auto;
	text-align:justify;
	text-indent:-.25in;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:Arial;
	mso-bidi-theme-font:minor-bidi;}
span.BalloonTextChar
	{mso-style-name:"Balloon Text Char";
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Balloon Text";
	mso-ansi-font-size:8.0pt;
	mso-bidi-font-size:8.0pt;
	font-family:"Tahoma","sans-serif";
	mso-ascii-font-family:Tahoma;
	mso-hansi-font-family:Tahoma;
	mso-bidi-font-family:Tahoma;}
span.SpellE
	{mso-style-name:"";
	mso-spl-e:yes;}
span.GramE
	{mso-style-name:"";
	mso-gram-e:yes;}
.MsoChpDefault
	{mso-style-type:export-only;
	mso-default-props:yes;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:Arial;
	mso-bidi-theme-font:minor-bidi;}
.MsoPapDefault
	{mso-style-type:export-only;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:.5in;
	text-align:justify;
	text-indent:-.25in;
	line-height:115%;}
@page Section1
	{size:8.5in 13.0in;
	margin:45.0pt 49.7pt 1.0in .75in;
	mso-header-margin:.5in;
	mso-footer-margin:.5in;
	mso-paper-source:0;}
div.Section1
	{page:Section1;}
 /* List Definitions */
 @list l0
	{mso-list-id:793527764;
	mso-list-type:hybrid;
	mso-list-template-ids:-2014658184 67698703 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l0:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l1
	{mso-list-id:1110856948;
	mso-list-type:hybrid;
	mso-list-template-ids:1460937170 67698703 67698699 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l1:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l1:level2
	{mso-level-number-format:bullet;
	mso-level-text:\F0D8;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;}
@list l2
	{mso-list-id:1748113418;
	mso-list-type:hybrid;
	mso-list-template-ids:1642784046 67698703 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l2:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l3
	{mso-list-id:1822960230;
	mso-list-type:hybrid;
	mso-list-template-ids:-1809441878 67698699 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l3:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F0D8;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;}
ol
	{margin-bottom:0in;}
ul
	{margin-bottom:0in;}
div.MsoNormal1 {mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:.5in;
	text-align:justify;
	text-indent:-.25in;
	line-height:115%;
	mso-pagination:widow-orphan;

	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:Arial;
	mso-bidi-theme-font:minor-bidi;}
li.MsoNormal1 {mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:.5in;
	text-align:justify;
	text-indent:-.25in;
	line-height:115%;
	mso-pagination:widow-orphan;

	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:Arial;
	mso-bidi-theme-font:minor-bidi;}
p.MsoNormal1 {mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:.5in;
	text-align:justify;
	text-indent:-.25in;
	line-height:115%;
	mso-pagination:widow-orphan;

	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:Arial;
	mso-bidi-theme-font:minor-bidi;}
span.SpellE1 {mso-style-name:"";
	mso-spl-e:yes;}
-->
</style>
<!--[if gte mso 10]>
<style>
 /* Style Definitions */
 table.MsoNormalTable
	{mso-style-name:"Table Normal";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-qformat:yes;
	mso-style-parent:"";
	mso-padding-alt:0in 5.4pt 0in 5.4pt;
	mso-para-margin-top:0in;
	mso-para-margin-right:0in;
	mso-para-margin-bottom:10.0pt;
	mso-para-margin-left:.5in;
	text-align:justify;
	text-indent:-.25in;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:Arial;
	mso-bidi-theme-font:minor-bidi;}
table.MsoTableGrid
	{mso-style-name:"Table Grid";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-priority:59;
	mso-style-unhide:no;
	border:solid black 1.0pt;
	mso-border-themecolor:text1;
	mso-border-alt:solid black .5pt;
	mso-border-themecolor:text1;
	mso-padding-alt:0in 5.4pt 0in 5.4pt;
	mso-border-insideh:.5pt solid black;
	mso-border-insideh-themecolor:text1;
	mso-border-insidev:.5pt solid black;
	mso-border-insidev-themecolor:text1;
	mso-para-margin-top:0in;
	mso-para-margin-right:0in;
	mso-para-margin-bottom:0in;
	mso-para-margin-left:.5in;
	mso-para-margin-bottom:.0001pt;
	text-align:justify;
	text-indent:-.25in;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:Arial;
	mso-bidi-theme-font:minor-bidi;}
</style>
<![endif]--><!--[if gte mso 9]><xml>
 <o:shapedefaults v:ext="edit" spidmax="2050"/>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <o:shapelayout v:ext="edit">
  <o:idmap v:ext="edit" data="1"/>
 </o:shapelayout></xml><![endif]-->
</head>

<body lang=EN-US style='tab-interval:.5in' align="center">

<div class=Section1>

<p class=MsoNormal style='margin-left:0in;text-indent:0in;line-height:normal;
tab-stops:5.0in'><span style='mso-tab-count:1'>                                                                                                                                                                </span><span
class=SpellE><span style='font-size:12.0pt;'>Pekanbaru</span></span><span
style='font-size:12.0pt'>, <?=TanggalIndo(date("Y-m-d"))?><o:p></o:p></span></p>

<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-yfti-tbllook:1184;mso-padding-alt:
 0in 5.4pt 0in 5.4pt;mso-border-insideh:none;mso-border-insidev:none'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:47.3pt'>
  <td width=49 valign=top style='width:36.9pt;padding:0in 5.4pt 0in 5.4pt;
  height:47.3pt'>
  <p class=MsoNormal style='margin:0in;margin-bottom:.0001pt;text-indent:0in;
  line-height:normal;tab-stops:27.0pt 5.0in'><span style='font-family:"Times New Roman","serif";
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>Hal :<b><u><o:p></o:p></u></b></span></p>
  </td>
  <td width=412 valign=top style='width:309.15pt;padding:0in 5.4pt 0in 5.4pt;
  height:47.3pt'>
  <p class=MsoNormal style='margin:0in;margin-bottom:.0001pt;text-indent:0in;
  line-height:normal;tab-stops:5.0in'><span class=SpellE><b><span
  style='font-family:"Times New Roman","serif";mso-ascii-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>Permohonan</span></b></span><b><span
  style='font-family:"Times New Roman","serif";mso-ascii-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'> <span
  class=SpellE>menjadi</span></span></b><span style='font-family:"Times New Roman","serif";
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'><o:p></o:p></span></p>
  <p class=MsoNormal style='margin:0in;margin-bottom:.0001pt;text-indent:0in;
  line-height:normal;tab-stops:27.0pt 5.0in'><span class=SpellE><b><u><span
  style='font-family:"Times New Roman","serif";mso-ascii-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>Anggota</span></u></b></span><b><u><span
  style='font-family:"Times New Roman","serif";mso-ascii-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'> <span
  class=SpellE>Perpustakaan</span><o:p></o:p></span></u></b></p>
  </td>
  <td width=231 valign=top style='width:173.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:47.3pt'>
  <p class=MsoNormal style='margin:0in;margin-bottom:.0001pt;text-indent:0in;
  line-height:normal;tab-stops:27.0pt 5.0in'><b><u><span style='font-family:
  "Times New Roman","serif";mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:
  major-bidi;mso-bidi-theme-font:major-bidi'><o:p><span style='text-decoration:
   none'>&nbsp;</span></o:p></span></u></b></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes' width="400">
  <td width=49 valign=top style='width:36.9pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin:0in;margin-bottom:.0001pt;text-indent:0in;
  line-height:normal;tab-stops:27.0pt 5.0in'><b><u><span style='font-family:
  "Times New Roman","serif";mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:
  major-bidi;mso-bidi-theme-font:major-bidi'><o:p><span style='text-decoration:
   none'>&nbsp;</span></o:p></span></u></b></p>
  </td>
  <td width=412 valign=top style='width:309.15pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin:0in;margin-bottom:.0001pt;text-indent:0in;
  line-height:normal;tab-stops:27.0pt 5.0in'><span class=SpellE><span
  style='font-family:"Times New Roman","serif";mso-ascii-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>Kepada</span></span><span
  style='font-family:"Times New Roman","serif";mso-ascii-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'> <span
  class=SpellE>Yth</span>, :<o:p></o:p></span></p>
  <p class=MsoNormal style='margin:0in;margin-bottom:.0001pt;text-indent:0in;
  line-height:normal;tab-stops:27.0pt 5.0in'><span class=SpellE><span
  style='font-family:"Times New Roman","serif";mso-ascii-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>Bapak</span></span><span
  style='font-family:"Times New Roman","serif";mso-ascii-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'> <span
  class=SpellE>Kepala</span> <span class=SpellE>Badan</span> <span
  class=SpellE>Perpustakaan</span>, <span class=SpellE>Arsip</span> <span
  class=SpellE>dan</span> <span class=SpellE>Dokumentasi</span><o:p></o:p></span></p>
  <p class=MsoNormal style='margin:0in;margin-bottom:.0001pt;text-indent:0in;
  line-height:normal;tab-stops:27.0pt 5.0in'><span class=SpellE><span
  style='font-family:"Times New Roman","serif";mso-ascii-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>Provinsi</span></span><span
  style='font-family:"Times New Roman","serif";mso-ascii-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'> Riau<o:p></o:p></span></p>
  <p class=MsoNormal style='margin:0in;margin-bottom:.0001pt;text-indent:0in;
  line-height:normal;tab-stops:27.0pt 5.0in'><span class=SpellE><span
  style='font-family:"Times New Roman","serif";mso-ascii-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>Cq</span></span><span
  style='font-family:"Times New Roman","serif";mso-ascii-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>. <span
  class=SpellE>Kepala</span> UPT <span class=SpellE>Layanan</span> <span
  class=SpellE>Perpustakaan</span> <span class=SpellE>Soeman</span> HS<o:p></o:p></span></p>
  <p class=MsoNormal style='margin:0in;margin-bottom:.0001pt;text-indent:0in;

  line-height:normal;tab-stops:27.0pt 5.0in'><span style='font-family:"Times New Roman","serif";
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>Di – <o:p></o:p></span></p>
  <p class=MsoNormal style='margin:0in;margin-bottom:.0001pt;text-indent:26.1pt;
  line-height:normal;tab-stops:27.0pt 5.0in'><span class=SpellE><span
  style='font-family:"Times New Roman","serif";mso-ascii-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>Pekanbaru</span></span><span
  style='font-family:"Times New Roman","serif";mso-ascii-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
  </td>
  <td width=231 align="right" valign="top" style="padding-right:20px;" >
 
  <table width="26%" height="72" border="1" cellpadding="0" cellspacing="0" >
    <tr>
      <!-- foto anggota -->
      <td><img src="../<?=$foto;?>" width="60" height="72" /></td>
    </tr>
  </table></td>
 </tr>
</table>

<p class=MsoNormal style='margin:0in;margin-bottom:.0001pt;text-indent:0in;
line-height:normal;tab-stops:27.0pt 5.0in'><b><u><span style='font-family:"Times New Roman","serif";
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'><o:p><span style='text-decoration:none'>&nbsp;</span></o:p></span></u></b></p>

<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="4"><table class="MsoTableGrid" width="100%" border="1" cellspacing="0" cellpadding="0"
 style='border-collapse:collapse;border:none;mso-border-top-alt:double windowtext 1.5pt;
 mso-border-bottom-alt:double windowtext 1.5pt;mso-yfti-tbllook:1184;
 mso-padding-alt:0in 5.4pt 0in 5.4pt;mso-border-insideh:1.0pt solid black;
 mso-border-insideh-themecolor:text1;mso-border-insidev:1.0pt solid black;
 mso-border-insidev-themecolor:text1'>
      <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes'>
        <td width="346" valign="top" style='width:259.55pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid black 1.0pt;
  mso-border-right-themecolor:text1;padding:0in 5.4pt 0in 5.4pt'><p class="MsoNormal2" align="center" style='margin:0in;margin-bottom:.0001pt;
  text-align:center;text-indent:0in;line-height:normal;tab-stops:27.0pt 5.0in'><b><span
  style='mso-bidi-font-size:12.0pt;font-family:&quot;Arial Narrow&quot;,&quot;sans-serif&quot;'>
          <o:p>&nbsp;</o:p>
        </span></b></p>
            <p class="MsoNormal2" align="center" style='margin:0in;margin-bottom:.0001pt;
  text-align:center;text-indent:0in;line-height:normal;tab-stops:27.0pt 5.0in'><b><span
  style='mso-bidi-font-size:12.0pt;font-family:&quot;Arial Narrow&quot;,&quot;sans-serif&quot;'>FORMULIR
              DATA PEMOHON MENJADI ANGGOTA
                    <o:p></o:p>
            </span></b></p>
          <p class="MsoNormal2" align="center" style='margin:0in;margin-bottom:.0001pt;
  text-align:center;text-indent:0in;line-height:normal;tab-stops:27.0pt 5.0in'><span
  class="SpellE2"><span style='font-size:10.0pt;mso-bidi-font-size:12.0pt;
  font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ascii-theme-font:minor-bidi;mso-hansi-theme-font:
  minor-bidi;mso-bidi-font-family:Arial;mso-bidi-theme-font:minor-bidi'>Diisi</span></span><span
  style='font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-ascii-theme-font:minor-bidi;mso-hansi-theme-font:minor-bidi;mso-bidi-font-family:
  Arial;mso-bidi-theme-font:minor-bidi'> <span class="SpellE2">Dengan</span> <span
  class="SpellE2">Huruf</span> <span class="SpellE2">Cetak</span> / <span
  class="SpellE2">Balok</span>
                <o:p></o:p>
          </span></p>
          <p class="MsoNormal2" align="center" style='margin:0in;margin-bottom:.0001pt;
  text-align:center;text-indent:0in;line-height:normal;tab-stops:27.0pt 5.0in'><span
  style='font-size:12.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ascii-theme-font:
  minor-bidi;mso-hansi-theme-font:minor-bidi;mso-bidi-font-family:Arial;
  mso-bidi-theme-font:minor-bidi'>
            <o:p>&nbsp;</o:p>
          </span></p></td>
        <td width="346" valign="top" style='width:259.55pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:none;
  mso-border-left-alt:solid black 1.0pt;mso-border-left-themecolor:text1;
  padding:0in 5.4pt 0in 5.4pt'><p class="MsoNormal2" style='margin:0in;margin-bottom:.0001pt;text-indent:0in;
  line-height:normal;tab-stops:27.0pt 5.0in'><b><u><span style='font-family:
  &quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:
  major-bidi;mso-bidi-theme-font:major-bidi'>
          <o:p><span style='text-decoration:
   none'>&nbsp;</span></o:p>
        </span></u></b></p>
            <p class="MsoNormal2" align="left" style='margin:0in;margin-bottom:.0001pt;
  text-align:left;text-indent:0in;line-height:normal;tab-stops:27.0pt 5.0in'><span
  style='font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>No. <span
  class="SpellE2">Anggota</span> : <b>
              <?=$kodeanggota?>
              </b><br style='mso-special-character:line-break' />
              <![if !supportLineBreakNewLine]>
              <![endif]>
              </span><span style='font-size:7.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
              <o:p></o:p>
              </span></p>
          <p class="MsoNormal2" style='margin:0in;margin-bottom:.0001pt;text-indent:0in;
  line-height:normal;tab-stops:27.0pt 5.0in'><span style='font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>Status <span class="SpellE2">Keanggotaan</span> : <span
  class="SpellE2">
            <?php
              if ($statuskeanggotaan == 'Nonaktif') {
                echo 'Belum Aktif';
              }
            ?>
            </span>
                <o:p></o:p>
          </span></p></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td valign="top" class="MsoTableGrid" style='width:216.5pt;padding:0in 5.4pt 0in 5.4pt'>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="23">1.</td>
    <td width="303" valign="top" class="MsoTableGrid" style='width:216.5pt;padding:0in 5.4pt 0in 5.4pt'>Nama Lengkap (Sesuai Identitas)</td>
    <td width="19">:</td>
    <td width="392"><?=$nama?></td>
  </tr>
  <tr>
    <td>2.</td>
    <td width="303" valign="top" class="MsoTableGrid" style='width:216.5pt;padding:0in 5.4pt 0in 5.4pt'>Jenis Kelamin</td>
    <td>:</td>
    <td><?=$jeniskelamin?></td>
  </tr>
  <tr>
    <td>3.</td>
    <td width="303" valign="top" class="MsoTableGrid" style='width:216.5pt;padding:0in 5.4pt 0in 5.4pt'>Tempat / Tanggal Lahir</td>
    <td>:</td>
    <td><?=$tempatlahir.', '.TanggalIndo($tgllahir)?></td>
  </tr>
  <tr>
    <td>4.</td>
    <td width="303" valign="top" class="MsoTableGrid" style='width:216.5pt;padding:0in 5.4pt 0in 5.4pt'>Agama</td>
    <td>:</td>
    <td><?=$agama?></td>
  </tr>
  <tr>
    <td>5.</td>
    <td width="303" valign="top" class="MsoTableGrid" style='width:216.5pt;padding:0in 5.4pt 0in 5.4pt'>Alamat Lengkap</td>
    <td>:</td>
    <td><?=$alamat?></td>
  </tr>
  <tr>
    <td>6.</td>
    <td width="303" valign="top" class="MsoTableGrid" style='width:216.5pt;padding:0in 5.4pt 0in 5.4pt'>Identitas yang digunakan</td>
    <td>:</td>
    <td><?=$jenisidentitas?></td>
  </tr>
  <tr>
    <td>7.</td>
    <td width="303" valign="top" class="MsoTableGrid" style='width:216.5pt;padding:0in 5.4pt 0in 5.4pt'>Nomor Kartu Identitas</td>
    <td>:</td>
    <td><?=$nomoridentitas?></td>
  </tr>
  <tr>
    <td>8.</td>
    <td width="303" valign="top" class="MsoTableGrid" style='width:216.5pt;padding:0in 5.4pt 0in 5.4pt'>Nomor Telepon / Ponsel</td>
    <td>:</td>
    <td><?=$kontak?></td>
  </tr>
  <tr>
    <td>9.</td>
    <td width="303" valign="top" class="MsoTableGrid" style='width:216.5pt;padding:0in 5.4pt 0in 5.4pt'>Pendidikan Terakhir</td>
    <td>:</td>
    <td><?=$pendidikanterakhir?></td>
  </tr>
  <tr>
    <td>10.</td>
    <td width="303" valign="top" class="MsoTableGrid" style='width:216.5pt;padding:0in 5.4pt 0in 5.4pt'>Status Pekerjaan</td>
    <td>:</td>
    <td><?=$statuspekerjaan?></td>
  </tr>
  <tr>
    <td>11.</td>
    <td width="303" valign="top" class="MsoTableGrid" style='width:216.5pt;padding:0in 5.4pt 0in 5.4pt'>Nama Instansi / Univ / Sekolah</td>
    <td>:</td>
    <td><?=$namainstansi?></td>
  </tr>
  <tr>
    <td>12.</td>
    <td width="303" valign="top" class="MsoTableGrid" style='width:216.5pt;padding:0in 5.4pt 0in 5.4pt'>Alamat Instansi / Univ / Sekolah</td>
    <td>:</td>
    <td><?=$alamatinstansi?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><p class="MsoNormal1" style='margin-top:0in;margin-right:0in;margin-bottom:0in;
  margin-left:.25in;margin-bottom:.0001pt;text-indent:0in;line-height:normal;
  tab-stops:27.0pt 5.0in'><span class="SpellE1"><b><span style='font-size:12.0pt;
  font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>Syarat-syarat</span></b></span><b><span
  style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
  major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'> <span
  class="SpellE1">Pembuatan</span> <span class="SpellE1">Kartu</span> <span
  class="SpellE1">Anggota</span> :
              <o:p></o:p>
    </span></b></p>
      <p class="MsoListParagraphCxSpFirst" style='margin-top:0in;margin-right:0in;
  margin-bottom:0in;margin-left:31.5pt;margin-bottom:.0001pt;mso-add-space:
  auto;text-indent:-13.5pt;line-height:normal;mso-list:l1 level1 lfo2;
  tab-stops:5.0in'>
        <![if !supportLists]>
        <span style='font-size:12.0pt;
  font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:major-bidi;
  mso-fareast-font-family:&quot;Times New Roman&quot;;mso-fareast-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><span
  style='mso-list:Ignore'>1.<span style='font:7.0pt &quot;Times New Roman&quot;'>&nbsp;&nbsp; </span></span></span>
        <![endif]>
        <span dir="ltr"></span><span class="SpellE1"><span
  style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
  major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>Melampirkan</span></span><span
  style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
  major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'> Pas <span class="SpellE1">Foto</span> <span class="SpellE1">Terbaru</span> 2 x 3 <span
  class="SpellE1">Sebanyak</span> 2 <span class="SpellE1">Lembar</span>
          <o:p></o:p>
        </span></p>
      <p class="MsoListParagraphCxSpMiddle" style='margin-top:0in;margin-right:0in;
  margin-bottom:0in;margin-left:31.5pt;margin-bottom:.0001pt;mso-add-space:
  auto;text-indent:-13.5pt;line-height:normal;mso-list:l1 level1 lfo2;
  tab-stops:5.0in'>
        <![if !supportLists]>
        <span style='font-size:12.0pt;
  font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:major-bidi;
  mso-fareast-font-family:&quot;Times New Roman&quot;;mso-fareast-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><span
  style='mso-list:Ignore'>2.<span style='font:7.0pt &quot;Times New Roman&quot;'>&nbsp;&nbsp; </span></span></span>
        <![endif]>
        <span dir="ltr"></span><span class="SpellE1"><span
  style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
  major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>Melampirkan</span></span><span
  style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
  major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'> <span
  class="SpellE1">foto</span> copy <span class="SpellE1">identitas</span> <span
  class="SpellE1">diri</span> <span class="SpellE1">sebanyak</span> 1 <span
  class="SpellE1">lembar</span>
          <o:p></o:p>
        </span></p>
      <table class="MsoTableGrid" border="0" cellspacing="0" cellpadding="0"
   style='margin-left:31.5pt;border-collapse:collapse;border:none;mso-yfti-tbllook:
   1184;mso-padding-alt:0in 5.4pt 0in 5.4pt;mso-border-insideh:none;mso-border-insidev:
   none'>
        <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
          <td width="126" valign="top" style='width:94.25pt;padding:0in 5.4pt 0in 5.4pt'><p class="MsoListParagraphCxSpMiddle" style='margin-top:0in;margin-right:
    0in;margin-bottom:0in;margin-left:21.35pt;margin-bottom:.0001pt;mso-add-space:
    auto;line-height:normal;mso-list:l3 level1 lfo3;tab-stops:5.0in'>
            <![if !supportLists]>
            <span
    style='font-size:12.0pt;font-family:Wingdings;mso-fareast-font-family:Wingdings;
    mso-bidi-font-family:Wingdings'><span style='mso-list:Ignore'>&Oslash;<span
    style='font:7.0pt &quot;Times New Roman&quot;'>&nbsp; </span></span></span>
            <![endif]>
            <span
    dir="ltr"></span><span class="SpellE1"><span style='font-size:12.0pt;font-family:
    &quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:
    major-bidi;mso-bidi-theme-font:major-bidi'>Umum</span></span><span
    style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>
              <o:p></o:p>
            </span></p></td>
          <td width="509" valign="top" style='width:382.05pt;padding:0in 5.4pt 0in 5.4pt'><p class="MsoListParagraphCxSpLast" style='margin:0in;margin-bottom:.0001pt;
    mso-add-space:auto;text-indent:0in;line-height:normal;tab-stops:5.0in'><span
    style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>: <span class="SpellE1">Foto</span> copy <span class="SpellE1">Kartu</span> <span
    class="SpellE1">Tanda</span> <span class="SpellE1">Penduduk</span> (KTP) Kota <span
    class="SpellE1">Pekanbaru</span>
                  <o:p></o:p>
          </span></p></td>
        </tr>
        <tr style='mso-yfti-irow:1'>
          <td width="126" valign="top" style='width:94.25pt;padding:0in 5.4pt 0in 5.4pt'><p class="MsoListParagraphCxSpFirst" style='margin-top:0in;margin-right:0in;
    margin-bottom:0in;margin-left:21.35pt;margin-bottom:.0001pt;mso-add-space:
    auto;line-height:normal;mso-list:l3 level1 lfo3;tab-stops:5.0in'>
            <![if !supportLists]>
            <span
    style='font-size:12.0pt;font-family:Wingdings;mso-fareast-font-family:Wingdings;
    mso-bidi-font-family:Wingdings'><span style='mso-list:Ignore'>&Oslash;<span
    style='font:7.0pt &quot;Times New Roman&quot;'>&nbsp; </span></span></span>
            <![endif]>
            <span
    dir="ltr"></span><span class="SpellE1"><span style='font-size:12.0pt;font-family:
    &quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:
    major-bidi;mso-bidi-theme-font:major-bidi'>Pelajar</span></span><span
    style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>
              <o:p></o:p>
            </span></p></td>
          <td width="509" valign="top" style='width:382.05pt;padding:0in 5.4pt 0in 5.4pt'><p class="MsoListParagraphCxSpLast" style='margin:0in;margin-bottom:.0001pt;
    mso-add-space:auto;text-indent:0in;line-height:normal;tab-stops:5.0in'><span
    style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>: <span class="SpellE1">Foto</span> copy <span class="SpellE1">Kartu</span> <span
    class="SpellE1">Pelajar</span>
                  <o:p></o:p>
          </span></p></td>
        </tr>
        <tr style='mso-yfti-irow:2;mso-yfti-lastrow:yes'>
          <td width="126" valign="top" style='width:94.25pt;padding:0in 5.4pt 0in 5.4pt'><p class="MsoListParagraphCxSpFirst" style='margin-top:0in;margin-right:0in;
    margin-bottom:0in;margin-left:21.35pt;margin-bottom:.0001pt;mso-add-space:
    auto;line-height:normal;mso-list:l3 level1 lfo3;tab-stops:5.0in'>
            <![if !supportLists]>
            <span
    style='font-size:12.0pt;font-family:Wingdings;mso-fareast-font-family:Wingdings;
    mso-bidi-font-family:Wingdings'><span style='mso-list:Ignore'>&Oslash;<span
    style='font:7.0pt &quot;Times New Roman&quot;'>&nbsp; </span></span></span>
            <![endif]>
            <span
    dir="ltr"></span><span class="SpellE1"><span style='font-size:12.0pt;font-family:
    &quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:
    major-bidi;mso-bidi-theme-font:major-bidi'>Mahasiswa</span></span><span
    style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>
              <o:p></o:p>
            </span></p></td>
          <td width="509" valign="top" style='width:382.05pt;padding:0in 5.4pt 0in 5.4pt'><p class="MsoListParagraphCxSpLast" style='margin:0in;margin-bottom:.0001pt;
    mso-add-space:auto;text-indent:0in;line-height:normal;tab-stops:5.0in'><span
    style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>: <span class="SpellE1">Foto</span> copy <span class="SpellE1">Mahasiswa</span>
                  <o:p></o:p>
          </span></p></td>
        </tr>
      </table>
      <p class="MsoListParagraphCxSpFirst" style='margin-bottom:0in;margin-bottom:
  .0001pt;mso-add-space:auto;line-height:normal;mso-list:l1 level1 lfo2;
  tab-stops:5.0in'>
        <![if !supportLists]>
        <span style='font-size:12.0pt;
  font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:major-bidi;
  mso-fareast-font-family:&quot;Times New Roman&quot;;mso-fareast-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><span
  style='mso-list:Ignore'>3.<span style='font:7.0pt &quot;Times New Roman&quot;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span>
        <![endif]>
        <span dir="ltr"></span><span class="SpellE1"><span
  style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
  major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>Diketahui</span></span><span
  style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
  major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'> <span
  class="SpellE1">oleh</span> (<span class="SpellE1">Tanda</span> <span class="SpellE1">Tangan</span> <span class="SpellE1">dan</span> <span class="SpellE1">Stempel</span>) :
          <o:p></o:p>
        </span></p>
      <table class="MsoTableGrid" border="0" cellspacing="0" cellpadding="0"
   style='margin-left:31.5pt;border-collapse:collapse;border:none;mso-yfti-tbllook:
   1184;mso-padding-alt:0in 5.4pt 0in 5.4pt;mso-border-insideh:none;mso-border-insidev:
   none'>
        <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes'>
          <td width="635" valign="top" style='width:476.3pt;padding:0in 5.4pt 0in 5.4pt'><p class="MsoListParagraphCxSpMiddle" style='margin-top:0in;margin-right:
    0in;margin-bottom:0in;margin-left:21.35pt;margin-bottom:.0001pt;mso-add-space:
    auto;line-height:normal;mso-list:l3 level1 lfo3;tab-stops:5.0in'>
            <![if !supportLists]>
            <span
    style='font-size:12.0pt;font-family:Wingdings;mso-fareast-font-family:Wingdings;
    mso-bidi-font-family:Wingdings'><span style='mso-list:Ignore'>&Oslash;<span
    style='font:7.0pt &quot;Times New Roman&quot;'>&nbsp; </span></span></span>
            <![endif]>
            <span
    dir="ltr"></span><span class="SpellE1"><span style='font-size:12.0pt;font-family:
    &quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:
    major-bidi;mso-bidi-theme-font:major-bidi'>Umum</span></span><span
    style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'> <span class="SpellE1">diketahui</span> RT/RW <span class="SpellE1">tempat</span> <span
    class="SpellE1">berdomisili</span> <span class="SpellE1">tetap</span>/<span
    class="SpellE1">sementara</span> <span class="SpellE1">atau</span> <span
    class="SpellE1">atasan</span> <span class="SpellE1">tempat</span> <span
    class="SpellE1">bekerja</span> (<span class="SpellE1">Instansi</span> <span
    class="SpellE1">Pemerintah</span>) yang <span class="SpellE1">bersangkutan</span>.
              <o:p></o:p>
            </span></p>
              <p class="MsoListParagraphCxSpMiddle" style='margin-top:0in;margin-right:
    0in;margin-bottom:0in;margin-left:21.35pt;margin-bottom:.0001pt;mso-add-space:
    auto;line-height:normal;mso-list:l3 level1 lfo3;tab-stops:5.0in'>
                <![if !supportLists]>
                <span
    style='font-size:12.0pt;font-family:Wingdings;mso-fareast-font-family:Wingdings;
    mso-bidi-font-family:Wingdings'><span style='mso-list:Ignore'>&Oslash;<span
    style='font:7.0pt &quot;Times New Roman&quot;'>&nbsp; </span></span></span>
                <![endif]>
                <span
    dir="ltr"></span><span class="SpellE1"><span style='font-size:12.0pt;font-family:
    &quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:
    major-bidi;mso-bidi-theme-font:major-bidi'>Pelajar</span></span><span
    style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'> <span class="SpellE1">diketahui</span> <span class="SpellE1">oleh</span> <span
    class="SpellE1">Kepala</span> <span class="SpellE1">Sekolah</span> / Tata Usaha.
                  <o:p></o:p>
                </span></p>
            <p class="MsoListParagraphCxSpLast" style='margin-top:0in;margin-right:0in;
    margin-bottom:0in;margin-left:21.35pt;margin-bottom:.0001pt;mso-add-space:
    auto;line-height:normal;mso-list:l3 level1 lfo3;tab-stops:5.0in'>
              <![if !supportLists]>
              <span
    style='font-size:12.0pt;font-family:Wingdings;mso-fareast-font-family:Wingdings;
    mso-bidi-font-family:Wingdings'><span style='mso-list:Ignore'>&Oslash;<span
    style='font:7.0pt &quot;Times New Roman&quot;'>&nbsp; </span></span></span>
              <![endif]>
              <span
    dir="ltr"></span><span class="SpellE1"><span style='font-size:12.0pt;font-family:
    &quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:
    major-bidi;mso-bidi-theme-font:major-bidi'>Mahasiswa</span></span><span
    style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'> <span class="SpellE1">diketahui</span> <span class="SpellE1">oleh</span> <span
    class="SpellE1">Dekan</span> / Tata Usaha / <span class="SpellE1">Administrasi</span>.
                <o:p></o:p>
              </span></p></td>
        </tr>
      </table>
      <p class="MsoListParagraphCxSpFirst" style='margin-bottom:0in;margin-bottom:
  .0001pt;mso-add-space:auto;text-indent:0in;line-height:normal;tab-stops:5.0in'><span
  style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
  major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>
        <o:p>&nbsp;</o:p>
      </span></p>
      <p class="MsoListParagraphCxSpMiddle" style='margin:0in;margin-bottom:.0001pt;
  mso-add-space:auto;text-indent:0in;line-height:normal;tab-stops:5.0in'><span
  class="SpellE1"><b><span style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>Mengajukan</span></b></span><b><span style='font-size:12.0pt;
  font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'> <span
  class="SpellE1">permohonan</span> <span class="SpellE1">untuk</span> <span
  class="SpellE1">menjadi</span> <span class="SpellE1">Anggota</span> <span
  class="SpellE1">Perpustakaan</span> <span class="SpellE1">Soeman</span> Hs <span
  class="SpellE1">dan</span> <span class="SpellE1">berjanji</span> :
              <o:p></o:p>
      </span></b></p>
      <p class="MsoListParagraphCxSpMiddle" style='margin-bottom:0in;margin-bottom:
  .0001pt;mso-add-space:auto;line-height:normal;mso-list:l0 level1 lfo4;
  tab-stops:5.0in'>
        <![if !supportLists]>
        <span style='font-size:12.0pt;
  font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:major-bidi;
  mso-fareast-font-family:&quot;Times New Roman&quot;;mso-fareast-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><span
  style='mso-list:Ignore'>1.<span style='font:7.0pt &quot;Times New Roman&quot;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span>
        <![endif]>
        <span dir="ltr"></span><span class="SpellE1"><span
  style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
  major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>Memelihara</span></span><span
  style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
  major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'> <span
  class="SpellE1">buku</span> yang <span class="SpellE1">dipinjam</span>, <span
  class="SpellE1">tidak</span> <span class="SpellE1">rusak</span>, <span
  class="SpellE1">kotor</span> <span class="SpellE1">atau</span> <span class="SpellE1">hilang</span>.
          <o:p></o:p>
        </span></p>
      <p class="MsoListParagraphCxSpMiddle" style='margin-bottom:0in;margin-bottom:
  .0001pt;mso-add-space:auto;line-height:normal;mso-list:l0 level1 lfo4;
  tab-stops:5.0in'>
        <![if !supportLists]>
        <span style='font-size:12.0pt;
  font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:major-bidi;
  mso-fareast-font-family:&quot;Times New Roman&quot;;mso-fareast-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><span
  style='mso-list:Ignore'>2.<span style='font:7.0pt &quot;Times New Roman&quot;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span>
        <![endif]>
        <span dir="ltr"></span><span class="SpellE1"><span
  style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
  major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>Akan</span></span><span
  style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
  major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'> <span
  class="SpellE1">mengembalikan</span> <span class="SpellE1">buku</span> yang <span
  class="SpellE1">Saya</span> <span class="SpellE1">pinjam</span> <span class="SpellE1">tepat</span> <span class="SpellE1">pada</span> <span class="SpellE1">waktunya</span>.
          <o:p></o:p>
        </span></p>
      <p class="MsoListParagraphCxSpMiddle" style='margin-bottom:0in;margin-bottom:
  .0001pt;mso-add-space:auto;line-height:normal;mso-list:l0 level1 lfo4;
  tab-stops:5.0in'>
        <![if !supportLists]>
        <span style='font-size:12.0pt;
  font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:major-bidi;
  mso-fareast-font-family:&quot;Times New Roman&quot;;mso-fareast-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><span
  style='mso-list:Ignore'>3.<span style='font:7.0pt &quot;Times New Roman&quot;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span>
        <![endif]>
        <span dir="ltr"></span><span class="SpellE1"><span
  style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
  major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>Bersedia</span></span><span
  style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
  major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'> <span
  class="SpellE1">mengganti</span> <span class="SpellE1">buku</span> yang <span
  class="SpellE1">Saya</span> <span class="SpellE1">hilangkan</span> <span
  class="SpellE1">atau</span> <span class="SpellE1">rusak</span> <span class="SpellE1">dengan</span> <span class="SpellE1">buku</span> yang <span class="SpellE1"><span class="GramE">sama</span></span> <span class="SpellE1">ataupun</span> <span class="SpellE1">seharga</span> <span
  class="SpellE1">buku</span> yang <span class="SpellE1">dipasarkan</span>.
          <o:p></o:p>
        </span></p>
      <p class="MsoListParagraphCxSpLast" style='margin-bottom:0in;margin-bottom:
  .0001pt;mso-add-space:auto;line-height:normal;mso-list:l0 level1 lfo4;
  tab-stops:5.0in'>
        <![if !supportLists]>
        <span style='font-size:12.0pt;
  font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:major-bidi;
  mso-fareast-font-family:&quot;Times New Roman&quot;;mso-fareast-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><span
  style='mso-list:Ignore'>4.<span style='font:7.0pt &quot;Times New Roman&quot;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span>
        <![endif]>
        <span dir="ltr"></span><span class="SpellE1"><span
  style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
  major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>Mematuhi</span></span><span
  style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
  major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'> <span
  class="SpellE1">ketentuan-ketentuan</span> lain yang <span class="SpellE1">berlaku</span> <span class="SpellE1">misalnya</span> : <span class="SpellE1">menjaga</span> <span
  class="SpellE1">kebersihan</span>, <span class="SpellE1">ketenangan</span>, <span
  class="SpellE1">ketertiban</span> <span class="SpellE1">dan</span> <span
  class="SpellE1">lainya</span>
          <o:p></o:p>
        </span></p>
      <p class="MsoNormal1" style='margin-top:0in;margin-right:0in;margin-bottom:0in;
  margin-left:.25in;margin-bottom:.0001pt;text-indent:0in;line-height:normal;
  tab-stops:5.0in'><span style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
        <o:p>&nbsp;</o:p>
      </span></p>
      <p class="MsoNormal1" style='margin:0in;margin-bottom:.0001pt;text-indent:0in;
  line-height:normal;tab-stops:5.0in'><span class="SpellE1"><span
  style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
  major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>Demikian</span></span><span
  style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
  major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'> <span
  class="SpellE1">permohonan</span> <span class="SpellE1">ini</span> <span
  class="SpellE1">Saya</span> <span class="SpellE1">buat</span> <span class="SpellE1">untuk</span> <span class="SpellE1">dipergunakan</span> <span class="SpellE1">seperlunya</span>.
            <o:p></o:p>
      </span></p>
      <p class="MsoNormal1" style='margin:0in;margin-bottom:.0001pt;text-indent:0in;
  line-height:normal;tab-stops:5.0in'><span style='font-size:12.0pt;font-family:
  &quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:
  major-bidi;mso-bidi-theme-font:major-bidi'>
        <o:p>&nbsp;</o:p>
      </span></p>
      <p class="MsoNormal1" style='margin:0in;margin-bottom:.0001pt;text-indent:0in;
  line-height:normal;tab-stops:5.0in'><span style='font-size:12.0pt;font-family:
  &quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:
  major-bidi;mso-bidi-theme-font:major-bidi'>
        <o:p>&nbsp;</o:p>
      </span></p>
      <table class="MsoTableGrid" border="0" cellspacing="0" cellpadding="0"
   style='border-collapse:collapse;border:none;mso-yfti-tbllook:1184;
   mso-padding-alt:0in 5.4pt 0in 5.4pt;mso-border-insidev:none'>
        <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes'>
          <td width="338" valign="top" style='width:253.75pt;padding:0in 5.4pt 0in 5.4pt'><p class="MsoNormal1" align="center" style='margin:0in;margin-bottom:.0001pt;
    text-align:center;text-indent:0in;line-height:normal;tab-stops:5.0in'><span
    class="SpellE1"><span style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'>Diketahui</span></span><span style='font-size:12.0pt;
    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:major-bidi;
    mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'> <span
    class="SpellE1">Oleh</span>,
                  <o:p></o:p>
          </span></p>
              <p class="MsoNormal1" align="center" style='margin:0in;margin-bottom:.0001pt;
    text-align:center;text-indent:0in;line-height:normal;tab-stops:5.0in'><span
    style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>
                <o:p>&nbsp;</o:p>
              </span></p>
            <p class="MsoNormal1" align="center" style='margin:0in;margin-bottom:.0001pt;
    text-align:center;text-indent:0in;line-height:normal;tab-stops:5.0in'><span
    style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>
              <o:p>&nbsp;</o:p>
            </span></p>
            <p class="MsoNormal1" align="center" style='margin:0in;margin-bottom:.0001pt;
    text-align:center;text-indent:0in;line-height:normal;tab-stops:5.0in'><span
    style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>
              <o:p>&nbsp;</o:p>
            </span></p>
            <p class="MsoNormal1" align="center" style='margin:0in;margin-bottom:.0001pt;
    text-align:center;text-indent:0in;line-height:normal;tab-stops:5.0in'><span
    style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>
              <o:p>&nbsp;</o:p>
            </span></p>
            <p class="MsoNormal1" align="center" style='margin:0in;margin-bottom:.0001pt;
    text-align:center;text-indent:0in;line-height:normal;tab-stops:5.0in'><span
    style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><b>(_________________)</b>
                  <o:p></o:p>
            </span></p></td>
          <td width="338" valign="top" style='width:253.8pt;padding:0in 5.4pt 0in 5.4pt'><p class="MsoNormal1" align="center" style='margin:0in;margin-bottom:.0001pt;
    text-align:center;text-indent:0in;line-height:normal;tab-stops:5.0in'><span
    class="SpellE1"><span style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'>Pemohon</span></span><span style='font-size:12.0pt;font-family:
    &quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:
    major-bidi;mso-bidi-theme-font:major-bidi'>,
                  <o:p></o:p>
          </span></p>
              <p class="MsoNormal1" align="center" style='margin:0in;margin-bottom:.0001pt;
    text-align:center;text-indent:0in;line-height:normal;tab-stops:5.0in'><span
    style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>
                <o:p>&nbsp;</o:p>
              </span></p>
            <p class="MsoNormal1" align="center" style='margin:0in;margin-bottom:.0001pt;
    text-align:center;text-indent:0in;line-height:normal;tab-stops:5.0in'><span
    style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>
              <o:p>&nbsp;</o:p>
            </span></p>
            <p class="MsoNormal1" align="center" style='margin:0in;margin-bottom:.0001pt;
    text-align:center;text-indent:0in;line-height:normal;tab-stops:5.0in'><span
    style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>
              <o:p>&nbsp;</o:p>
            </span></p>
            <p class="MsoNormal1" align="center" style='margin:0in;margin-bottom:.0001pt;
    text-align:center;text-indent:0in;line-height:normal;tab-stops:5.0in'><span
    style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>
              <o:p>&nbsp;</o:p>
            </span></p>
            <p class="MsoNormal1" align="center" style='margin:0in;margin-bottom:.0001pt;
    text-align:center;text-indent:0in;line-height:normal;tab-stops:5.0in'><span
    style='font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><b>(
                    <?=$nama?>
              )</b>
                  <o:p></o:p>
            </span></p></td>
        </tr>
      </table></td>
  </tr>
</table>

<p class=MsoNormal style='margin:0in;margin-bottom:.0001pt;text-indent:0in;
line-height:normal;tab-stops:27.0pt 5.0in'><span style='font-family:"Times New Roman","serif";
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'><o:p>&nbsp;</o:p></span></p>

</div>

</body>

</html>
<script>
var printContents = document.body.innerHTML;
     //var originalContents = document.body.innerHTML;

    

     window.print(printContents);
</script>