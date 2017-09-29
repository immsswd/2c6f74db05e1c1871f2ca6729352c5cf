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

$KETERANGAN = isset($_GET['ket']) ? $_GET['ket']:"KEMUNGKINAN ADA KESALAHAN PADA NAMA DAN ALAMAT";
$idPeserta = isset($_GET['id']) ? $_GET['id']:"0";

	
	$sel = $konfig->readAllWhereOr2('tbl_peserta','psnoka_bpjs',$idPeserta,'nik_kitas_kitap',$idPeserta);
	$data=$sel->fetch(PDO::FETCH_OBJ);
	
	$sel2 = $konfig->readAllBy('tbl_master_kis','id_peserta',$data->id_peserta);
	$data2=$sel2->fetch(PDO::FETCH_OBJ);

$ctn='
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PERMOHONAN CETAK KARTU BPJS APBN</title>
<style type="text/css">
<!--
.left {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	text-transform: uppercase;
	text-align: left;
	margin-right: 5px;
	margin-left: 5px;
	border: 1px solid #000000;
	padding-left: 5px;
}
-->
</style>
</head>

<body>
<p>Pekanbaru, '.tgl_indo(date("Y-m-d")).'</p>

  <p>Kepada Yth.<br />
    BPJS Kesehatan Kota Pekanbaru<br />
    Di- 
    <blockquote>Pekanbaru</blockquote>
  </p>

<p>Mohon Pencetakan Kartu BPJS APBN atas Nama :</p>
<table width="100%" border="1" cellpadding="0" cellspacing="0" >
  <tr>
    <th width="30%"  class="left" scope="row">provinsi bps </th>
    <td width="70%"  class="left">'.$data2->provinsi_bps.'</td>
  </tr>
  <tr>
    <th  class="left" scope="row">kabupaten / kota bps </th>
    <td  class="left">'.$data2->kabupaten_bps.'</td>
  </tr>
  <tr>
    <th  class="left" scope="row">kecamatan bps </th>
    <td  class="left">'.$data2->kecamatan_bps.'</td>
  </tr>
  <tr>
    <th  class="left" scope="row">desa / kelurahan </th>
    <td  class="left">'.$data2->kelurahan_bps.'</td>
  </tr>
  <tr>
    <th  class="left" scope="row">psnoka bpjs </th>
    <td  class="left">'.$data->psnoka_bpjs.'</td>
  </tr>
  <tr>
    <th  class="left" scope="row">provinsi capil </th>
    <td  class="left">'.$data2->provinsi_capil.'</td>
  </tr>
  <tr>
    <th  class="left" scope="row">kabupaten / kota capil </th>
    <td  class="left">'.$data2->kabupaten_capil.'</td>
  </tr>
  <tr>
    <th  class="left" scope="row">kecamatan capil </th>
    <td  class="left">'.$data->nama_kecamatan.'</td>
  </tr>
  <tr>
    <th  class="left" scope="row">desa / kelurahan capil </th>
    <td  class="left">'.$data->nama_desa.'</td>
  </tr>
  <tr>
    <th  class="left" scope="row">alamat individu </th>
    <td  class="left">'.$data->alamat_tempat_tinggal.'</td>
  </tr>
  <tr>
    <th  class="left" scope="row">nama individu </th>
    <td  class="left">'.$data->nama_lengkap.'</td>
  </tr>
  <tr>
    <th  class="left" scope="row">no kk </th>
    <td  class="left">'.$data->no_kk.'</td>
  </tr>
  <tr>
    <th  class="left" scope="row">nik</th>
    <td  class="left">'.$data->nik_kitas_kitap.'</td>
  </tr>
  <tr>
    <th  class="left" scope="row">tgl lahir </th>
    <td  class="left">'.tgl_indo($data->tgl_lahir).'</td>
  </tr>
  <tr>
    <th  class="left" scope="row">jenis kelamin </th>
    <td  class="left">'.$data->jenis_kelamin.'</td>
  </tr>
  <tr>
    <th  class="left" scope="row">pisat</th>
    <td  class="left">'.$data->pisat.'</td>
  </tr>
  
  <tr>
    <th  class="left" scope="row">keterangan</th>
    <td  class="left">'.$data->keterangan.'</td>
  </tr>
</table>
<p><br />
KET :</p>
<p>- '.$KETERANGAN.'  </p>
<p>&nbsp; </p>
</body>

</html>';

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
    <td width="18%" height="100" align="center" valign="middle"><img src="../assets/images/lambang_kota_pekanbaru.jpg" width="100" height="110"></td>
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
