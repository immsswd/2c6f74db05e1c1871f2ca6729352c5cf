<script src="exporting.js"></script>
<?php
session_start();

include '../modul/class_crud/classCRUD.php';
include '../function/fungsi_tanggal_indonesia.php';
include("mpdf.php");


$konfig = new konfigurasi();

if(isset($_GET['dMember']) and !empty($_GET['dMember'])){
	$id = $_GET['dMember'];
//PROSES CETAK KARTU
	$sql = $konfig->readAllTabel2WhereDescLimit('tbl_member','tbl_user','id_user','id_user',$id,'id_member',0,1);
	$data=$sql->fetch(PDO::FETCH_OBJ);	
		
	$txtTempatLahir			= isset($data->tempat_lahir) ? $data->tempat_lahir:"";
	$txtNama		= isset($data->tgl_lahir) ? $data->tgl_lahir:"";
	$txtTglLahir		= isset($tgll) ? $tgll:"";
	$txtJenisKelamin	= isset($data->jenis_kelamin) ? $data->jenis_kelamin:"";
	$txtKontak	= isset($data->kontak) ? $data->kontak:"";
	$txtAlamat	= isset($data->alamat) ? $data->alamat:"";
	$txtNomorKartu		= isset($data->nomor_identitas) ? $data->nomor_identitas:"";
	$txtFoto2		= isset($data->foto) ? $data->foto:"";
	$kode_member		= isset($data->kode_member) ? $data->kode_member:"";
		
		
//END 
	
}

  
$ctn='<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CETAK KARTU JAMKESDA</title>
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
-->
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="top"><img src="../assets/images/lambang_kota_pekanbaru.jpg" width="52" height="63" /></td>
        <td colspan="2" align="center" valign="top"><p><span class="style2">PEMERINTAH PROVINSI RIAU<br>
                  <span class="style8">BADAN PERPUSTAKAAN ARSIP DAN DOKUMENTASI DAERAH </span><br />
                  <strong>KARTU ANGGOTA PERPUSTAKAAN </strong></span><strong><span class="style2"></span></strong><span class="style2"><br />
              </span>Nomor Kartu :  '.$kode_member.'</p></td>
        </tr>
      <tr>
        <td width="22%"  align="left" valign="top" class="style6">Nama</td>
        <td width="3%" align="left" valign="top" class="style6">:</td>
        <td width="75%" align="left" valign="top" class="style6">'.$txtNama.'</td>
      </tr>
      <tr>
        <td  align="left" valign="top" class="style6">Alamat</td>
        <td align="left" valign="top" class="style6">:</td>
        <td align="left" valign="top" class="style6">'.$txtAlamat.' Hp: '.$txtKontak.'</td>
      </tr>
      <tr>
        <td  align="left" valign="top" class="style6">T.Tgl. Lahir </td>
        <td align="left" valign="top" class="style6">:</td>
        <td align="left" valign="top" class="style6">'.$txtTempatLahir.','.tgl_indo($txtTglLahir).'</td>
      </tr>
      <tr>
        <td align="left" valign="top" class="style6">No. Identitas</td>
        <td align="left" valign="top" class="style6">:</td>
        <td align="left" valign="top" class="style6">'.$txtNomorKartu.'</td>
      </tr>
      
      <tr>
        <td colspan="2" align="right" ><img src="../foto_member/'.$txtFoto2.'" width="52" height="63" /></td>
        <td align="center" valign="top" class="style6">Pekanbaru, '.tgl_indo(date("Y-m-d")).'<br />
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