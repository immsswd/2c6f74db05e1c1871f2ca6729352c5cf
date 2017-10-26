<?php
session_start();

include '../config/DB.php';
include '../fctn/tglid.php';
include("mpdf.php");
$id = $_GET['id'];
$q = $dbase->query("SELECT * FROM anggota WHERE id = $id");
// $res = $q->fetch(PDO::FETCH_OBJ);
while ($r = $q->fetch(PDO::FETCH_OBJ)) {
    $kode_member = $r->kodeanggota;
    $txtNama     = $r->nama;
    $txtAlamat    = $r->alamat;
    $txtKontak    =$r->kontak;
    $txtTempatLahir = $r->tempatlahir;
    $txtTglLahir = $r->tgllahir;
    $txtNomorKartu = $r->nomoridentitas;
    $jenisidentitas = $r->jenisidentitas;
    $txtFoto2 = $r->foto;

}

  
$ctn='<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CETAK KARTU ANGGOTA PUSWIL</title>
<link rel="stylesheet" href="../public/css/style.css">
<style type="text/css">
<!--
.style2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 13px;
}
.style3 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; }
.style6 {font-family: Arial, Helvetica, sans-serif; font-size: 10px; }
.style7 {font-size: 10px}
.style8 {font-size: 10px}
#font-kode{font-family: courier !important}
-->
</style>
</head>

<body>
<br><br>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="top"><img src="../public/images/pku-logo.gif" width="52" height="63" /></td>
        <td colspan="2" align="center" valign="top"><p><span class="style2">PEMERINTAH PROVINSI RIAU<br>
                  <span class="style8">BADAN PERPUSTAKAAN ARSIP DAN DOKUMENTASI DAERAH </span><br />
                  <strong>KARTU ANGGOTA PERPUSTAKAAN </strong></span><strong><span class="style2"></span></strong><span class="style2"><br />
              </span>
              <span style="font-family: arial">Nomor Kartu :</span>
              <span id="font-kode">
              '.$kode_member.'
              </span></p></td>
        </tr>
      <tr>
        <td width="22%"  align="left" valign="top" class="style6">Nama</td>
        <td width="3%" align="left" valign="top" class="style6">:</td>
        <td width="75%" align="left" valign="top" class="style6">'.$txtNama.'</td>
      </tr>
      <tr>
        <td  align="left" valign="top" class="style6">Alamat</td>
        <td align="left" valign="top" class="style6">:</td>
        <td align="left" valign="top" class="style6">'.$txtAlamat.' / Hp: '.$txtKontak.'</td>
      </tr>
      <tr>
        <td  align="left" valign="top" class="style6">T.Tgl. Lahir </td>
        <td align="left" valign="top" class="style6">:</td>
        <td align="left" valign="top" class="style6">'.$txtTempatLahir.','.TanggalIndo($txtTglLahir).'</td>
      </tr>
      <tr>
        <td align="left" valign="top" class="style6">No. Identitas</td>
        <td align="left" valign="top" class="style6">:</td>
        <td align="left" valign="top" class="style6">'.$txtNomorKartu.'/'.$jenisidentitas.'</td>
      </tr>
      
      <tr>
        <td colspan="2" align="right" ><img src="../'.$txtFoto2.'" width="60" class="img img-responsive img-rounded" height="60" /></td>
        <td align="center" valign="top" class="style6">Pekanbaru, '.TanggalIndo(date("Y-m-d")).'<br />
Walikota Pekanbaru<br />
<br />
<br />
<br />
H. Firdaus, ST, MT </td>
      </tr>
    </table>    
    </td>
  </tr>
</table>
</body>
</html>

';


// ========= END SIAPAKAH SAYA SISI NEGATIF =====

// ===== END HISTORI ===


//echo"<br>TESSSS <BR>".$ctn;
//============ EXPORT PDF =====================================================================
$mpdf=new mPDF('en-x','A4',12,'',45,45,5,15,10,10,'L'); 

$mpdf->mirrorMargins = 1;	// Use different Odd/Even headers and footers and mirror margins

$html = "$ctn";
$mpdf->AddPage();
$mpdf->WriteHTML($html);

$mpdf->Output();
exit;
//====== END EXPORT PDF =================================================================
/*}else { header("location:logout.php"); }*/

?>