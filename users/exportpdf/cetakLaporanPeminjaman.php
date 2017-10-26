<script src="exporting.js"></script>
<?php
session_start();

include '../modul/class_crud/classCRUD.php';
include '../function/fungsi_tanggal_indonesia.php';
include("mpdf.php");


$konfig = new konfigurasi();
if(isset($_GET['start']) and isset($_GET['end'])){
	$start=$_GET['start'];
	$end=$_GET['end'];

$ctn='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CETAK LAPORAN</title>
<style type="text/css">
<!--
.f {font-size: 10px}
-->
</style>
</head>

<body><h3 align="center"><u>LAPORAN PEMINJAMAN</u></h3>
<p align="center">Periode '.tgl_indo(convert_tgl($start)).' s/d '.tgl_indo(convert_tgl($end)).' </p>
<table width="100%"  border="1" cellspacing="0" cellpadding="0">
  <tr class="f">
    <th height="31" bgcolor="#CCCCCC" scope="col">NO</th>
    <th bgcolor="#CCCCCC" scope="col">ID ANGGOTA </th>
    <th bgcolor="#CCCCCC" scope="col">NAMA</th>
    <th bgcolor="#CCCCCC" scope="col">JENIS KELAMIN </th>
    <th bgcolor="#CCCCCC" scope="col">ALAMAT</th>
    <th bgcolor="#CCCCCC" scope="col">JENIS ANGGOTA </th>

    <th bgcolor="#CCCCCC" scope="col">PINJAM</th>
    <th bgcolor="#CCCCCC" scope="col">KEMBALI</th>
    <th bgcolor="#CCCCCC" scope="col">STATUS ANGGOTA</th>
    <th bgcolor="#CCCCCC" scope="col">TANGGAL</th>
  </tr>
  ';
  $getTampil = $konfig->readAllWhereBetween('tbl_member','status','Anggota','id_member','tanggal',convert_tgl($start),convert_tgl($end),'Desc');
  $no=0;
  while($data=$getTampil->fetch(PDO::FETCH_OBJ)){$no++;
	$pinjam = $konfig->readAllCountWhere('tbl_peminjaman','id_member','id_member',$data->id_member);
	$dPinjam=$pinjam->fetch(PDO::FETCH_OBJ);
	$kembali = $konfig->readAllCountWhere('tbl_pengembalian','id_member','id_member',$data->id_member);
	$dkembali=$kembali->fetch(PDO::FETCH_OBJ);
	
  $ctn.='
  <tr >
    <td align="center" class="f">'.$no.'</td>
    <td align="center" class="f">'.$data->kode_member.'</td>
    <td class="f">'.$data->nama.'</td>
    <td align="center">'.$data->jenis_kelamin.'</td>
    <td align="center" class="f">'.$data->alamat.' Hp: '.$data->kontak.'</td>
    <td align="center" class="f">'.$data->jenis_member.'</td>
   
    <td align="center" class="f">'.$dPinjam->TOTAL_RECORD.'</td>
    <td align="center" class="f">'.$dkembali->TOTAL_RECORD.'</td>
    <td align="center" class="f">'.$data->status.'</td>
    <td align="center" class="f" >'.tgl_indo($data->tanggal).'</td>
  </tr>';
  }
  $ctn.='
</table>
</body>
</html>

';
}else{$ctn='';}

// ========= END SIAPAKAH SAYA SISI NEGATIF =====

// ===== END HISTORI ===


//echo"<br>TESSSS <BR>".$ctn;
//============ EXPORT PDF =====================================================================
$mpdf=new mPDF('en-x','A4-L',12,'',20,20,50,15,10,10,'L'); 

$mpdf->mirrorMargins = 1;	// Use different Odd/Even headers and footers and mirror margins

$header = '
<table width="90%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="18%" height="100" align="center" valign="middle"><img src="../assets/images/lambang_kota_pekanbaru.jpg" width="100" height="110"></td>
    <td width="82%" align="center" valign="middle"><h2>PEMERINTAH KOTA PEKANBARU <br>
      PUSTAKA WILAYAH</h2>
        <p>Alamat : Jl. Sudirman No.23 Pekanbaru. Telp (0761) 21094</p></td>
  </tr>
</table>
<hr>';
$headerE = '
<table width="90%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="18%" height="100" align="center" valign="middle"><img src="../assets/images/lambang_kota_pekanbaru.jpg" width="100" height="110"></td>
    <td width="82%" align="center" valign="middle"><h2>PEMERINTAH KOTA PEKANBARU <br>
      PUSTAKA WILAYAH</h2>
        <p>Alamat : Jl. Sudirman No.23 Pekanbaru. Telp (0761) 21094</p></td>
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