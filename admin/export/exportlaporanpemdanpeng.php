<?php session_start();

include '../config/DB.php';
include '../fctn/tglid.php';
include("mpdf.php");


if(isset($_POST['cetak'])){    
    $start  =    htmlentities($_POST['tanggal1']);
    $end    =    htmlentities($_POST['tanggal2']);

$ctn='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Export Laporan Peminjaman/Pengembalian</title>
<style type="text/css">
<!--
.f {font-size: 8pt}
table{
    border-collapse: collapse;
}
-->
</style>
</head>

<body style="font-family:arial"><h3 align="center"><u>LAPORAN PEMINJAMAN/PENGEMBALIAN</u></h3>
<p align="center">Periode '.TanggalIndo($start).' s/d '.TanggalIndo($end).' </p>
<table width="100%"  border="1" cellspacing="0" cellpadding="0">
  <tr class="f">
    <th height="31" bgcolor="#CCCCCC" scope="col">NO</th>
    <th bgcolor="#CCCCCC" scope="col">ID ANGGOTA </th>
    <th bgcolor="#CCCCCC" scope="col">NAMA</th>
    <th bgcolor="#CCCCCC" scope="col">JENIS KELAMIN </th>
    <th bgcolor="#CCCCCC" scope="col">ALAMAT</th>
    <th bgcolor="#CCCCCC" scope="col">JENIS ANGGOTA</th>
    <th bgcolor="#CCCCCC" scope="col">BUKU1 </th>

    <th bgcolor="#CCCCCC" scope="col">BUKU2</th>
    <th bgcolor="#CCCCCC" scope="col">STATUS PEMINJAMAN</th>
    <th bgcolor="#CCCCCC" scope="col">TANGGAL</th>
  </tr>
  ';
    $no=0;
    $stmt = $dbase->query("SELECT * FROM peminjaman INNER JOIN anggota ON peminjaman.kodeanggota = anggota.kodeanggota WHERE date(tglpeminjaman) >= '$start' AND date(tglpeminjaman) <= '$end' ORDER BY namaanggota ASC");
    while($data = $stmt->fetch(PDO::FETCH_OBJ)){
        $no++;
  $ctn.='
  <tr >
    <td align="center" class="f">'.$no.'</td>
    <td align="center" class="f">'.$data->kodeanggota.'</td>
    <td class="f">'.$data->namaanggota.'</td>
    <td align="center" class="f">'.$data->jeniskelamin.'</td>
    <td align="center" class="f">'.$data->alamat.' Hp: '.$data->kontak.'</td>
    <td align="center" class="f">'.$data->jenisanggota.'</td>
    <td align="center" class="f">'.$data->buku1.'</td>
    <td align="center" class="f">'.$data->buku2.'</td>
    <td align="center" class="f">'.$data->status_peminjaman.'</td>
    <td align="center" class="f" >'.TanggalIndo($data->tanggal).'</td>
  </tr>';
  }
  $ctn.='
</table>
</body>
</html>

';
}else{$ctn='';}

//============ EXPORT PDF =====================================================================
$mpdf=new mPDF('en-x','A4-L',12,'',20,20,50,15,10,10,'L'); 

$mpdf->mirrorMargins = 1;	// Use different Odd/Even headers and footers and mirror margins

$header = '
<table width="90%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="120" height="100" align="center" valign="middle"><img src="../public/images/pku.jpg" width="90" height="100"></td>
    <td width="82%" align="center" valign="middle"><h2>PEMERINTAH KOTA PEKANBARU <br>
      PUSTAKA SOEMAN HS</h2>
        <p>Alamat : Jl. Sudirman No.23 Pekanbaru. Telp (0761) 21094</p>
        <p><small><em>pustakasoeman.hs.mail@mail.com</em></small></p>
        </td>
  </tr>
</table>
<hr>';
$headerE = '
<table width="90%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="18%" height="100" align="center" valign="middle"><img src="../public/images/pku.jpg" width="90" height="100"></td>
    <td width="82%" align="center" valign="middle"><h2>PEMERINTAH KOTA PEKANBARU <br>
      PUSTAKA SOEMAN HS</h2>
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
$mpdf->setTitle('File Export Registrasi Anggota');
$mpdf->WriteHTML($html);

$mpdf->Output('Laporan_peminjaman_dan_pengembalian_buku_puswil.pdf', 'I');
exit;
//====== END EXPORT PDF =================================================================
/*}else { header("location:logout.php"); }*/

?>
