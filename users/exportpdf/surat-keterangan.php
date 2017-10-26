<script src="exporting.js"></script>
<?php
session_start();

include '../modul/class_crud/classCRUD.php';
include '../function/fungsi_tanggal_indonesia.php';
include("mpdf.php");


$konfig = new konfigurasi();

if ($_SESSION['type_akun'] != "Admin") {
    $konfig->redirect(''.$_SESSION['nUser'].'/index.php');
}

$nomorSurat=isset($_GET['no']) ? $_GET['no'] : "";

$selSurat = $konfig->readAllBy('tbl_surat','no_surat',$nomorSurat);
$dSurat = $selSurat->fetch(PDO::FETCH_OBJ);
$selDataSurat = $konfig->readAllBy('tbl_data_surat','no_surat',$dSurat->no_surat);
$c = $selDataSurat->rowCount();
  
$ctn='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cetak Surat Keterangan</title>
<style type="text/css">
<!--
.kadin {
	font-size: 14px;
	color: #000000;
	text-decoration: underline;
	font-weight: bold;
}.kadin2 {
	font-size: 18px;
	color: #000000;
	text-decoration: underline;
	font-weight: bold;
}
.th{
	font-size: 12px;
	margin: 5px;
	padding: 5px;
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
}
.td{
	font-size: 11px;
	margin: 5px;
	padding: 5px;
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	
}
-->
</style>
</head>

<body>
<center>
<div align="center" class="kadin2">SURAT KETERANGAN</div>
<div align="center">NO: '.$dSurat->no_surat.' </div>
</center>
<p>Yang bertanda tangan dibawah ini Kepala Dinas Sosial Kota Pekanbaru dengan ini<br />
menerangkan bahwa :</p>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th width="3%" class="th" height="47">NO</th>
    <th width="10%" class="th">NIK</th>
    <th width="30%" class="th">NAMA</th>
    <th width="10%" class="th">JENIS KELAMIN </th>
    <th width="10%" class="th">TANGGAL LAHIR </th>
    <th width="30%" class="th">ALAMAT</th>
  </tr>';
  $n=0;
  while($dDsurat=$selDataSurat->fetch(PDO::FETCH_OBJ)){$n++;
	 $sel = $konfig->readAllBy('tbl_peserta','nik_kitas_kitap',$dDsurat->nik_kitas_kitap);
	$data = $sel->fetch(PDO::FETCH_OBJ);
	$jk='';if($data->jenis_kelamin=='P'){$jk='PEREMPUAN';}elseif($data->jenis_kelamin=='L'){$jk='LAKI-LAKI';}
	$tLhr='-';if(substr($data->tgl_lahir,0,4)!='0000'){$tLhr=tgl_indo($data->tgl_lahir);}
  $ctn.='<tr>
    <td height="28" align="center" class="td">'.$n.'</td>
    <td align="center" class="td">'.$data->nik_kitas_kitap.'</td>
    <td align="left"  class="td">'.$data->nama_lengkap.'</td>
    <td align="center" class="td">'.$jk.'</td>
    <td align="center" class="td">'.$tLhr.'</td>
    <td align="center" class="td">'.$data->alamat_tempat_tinggal.'</td>
  </tr>';
  }
  $ctn.='
</table>
<p>'.$dSurat->isi_surat.'</p>
<p>Demikian Surat Keterangan ini di buat untuk dapat dipergunakan sebagaimana mestinya.</p>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="47"><table width="25%" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center">
          <p><strong>Pekanbaru, '.tgl_indo(date("Y-m-d")).'<br />
            Kepala Dinas Sosial<br />
          Kota Pekanbaru</strong></p>
          <p>&nbsp;</p>
		  <br /><br /><br />
          <p><strong><b class="kadin" style="">'.$dSurat->kepala_dinas.'</b><br />
          NIP. '.$dSurat->nip.'</strong></p>
          </td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp; </p>
</body>
</html>


';


// ========= END SIAPAKAH SAYA SISI NEGATIF =====

// ===== END HISTORI ===


//echo"<br>TESSSS <BR>".$ctn;
//============ EXPORT PDF =====================================================================
$mpdf=new mPDF('en-x','A4',12,'',20,20,50,15,10,10,'L'); 

$mpdf->mirrorMargins = 1;	// Use different Odd/Even headers and footers and mirror margins
$header = '
<table width="90%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="18%" height="100" align="center" valign="middle"><img src="../assets/images/lambang_kota_pekanbaru.jpg" width="100" height="110"></td>
    <td width="82%" align="center" valign="middle"><h2>PEMERINTAH KOTA PEKANBARU <br>
      DINAS SOSIAL</h2>
        <p>Alamat : Jl. Melur No. 103 Telp (0761) 23213</p></td>
  </tr>
</table>
<hr>';
$headerE = '
<table width="90%" border="0" cellpadding="0" cellspacing="0">
 <tr>
    <td width="18%" height="100" align="center" valign="middle"><img src="assets/images/lambang_kota_pekanbaru.jpg" width="100" height="110"></td>
    <td width="82%" align="center" valign="middle"><h2>PEMERINTAH KOTA PEKANBARU <br>
      DINAS SOSIAL</h2>
        <p>Alamat : Jl. Melur No. 103 Telp (0761) 23213</p></td>
  </tr>
</table>
<hr>
';

$footer = '<div align="right">{PAGENO}</div>';
$footerE = '<div align="right">{PAGENO}</div>';




$mpdf->SetHTMLHeader($header);
$mpdf->SetHTMLHeader($headerE,'E');
$mpdf->SetHTMLFooter($footer);
$mpdf->SetHTMLFooter($footerE,'E');


$html = "$ctn";
$mpdf->AddPage();
$mpdf->WriteHTML($html);

$mpdf->Output();
exit;
//====== END EXPORT PDF =================================================================
/*}else { header("location:logout.php"); }*/

?>