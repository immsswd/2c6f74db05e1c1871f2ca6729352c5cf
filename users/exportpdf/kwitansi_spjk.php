<script src="exporting.js"></script>
<?php
include("mpdf.php");
$hnoRangka = isset($_GET['hnoRangka']) ? $_GET['hnoRangka']:"";
$hnoMesin = isset($_GET['hnoMesin']) ? $_GET['hnoMesin']:"";
$hnamaSpjk = isset($_GET['hnamaSpjk']) ? $_GET['hnamaSpjk']:"";
$hAlamat = isset($_GET['hAlamat']) ? $_GET['hAlamat']:"";
$hjenisKendaraan = isset($_GET['hjenisKendaraan']) ? $_GET['hjenisKendaraan']:"";
$hBiaya = isset($_GET['hBiaya']) ? $_GET['hBiaya']:"";
$hidSpjk = isset($_GET['hidSpjk']) ? $_GET['hidSpjk']:"";

$datetime = gmdate("Y-m-d H:i:s", time()+60*60*7);
$ctn='';

if(!empty($hnoRangka) && !empty($hnoMesin) && !empty($hnamaSpjk) && !empty($hAlamat) && !empty($hjenisKendaraan) && !empty($hBiaya) && !empty($hidSpjk)) {
 
    $ctn='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
#khusus {		font-family: Arial;
		font-size: 16px;
}
.style1 {font-size: 24px}
-->
</style>
</head>

<body>
<table width="900" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th width="18%" scope="col">&nbsp;</th>
    <th colspan="5" align="left" scope="col"><table width="100%" border="0">
      <tr>
        <td width="70%" style=" padding-left:20px" class="style1">SURAT SETORAN RETRIBUSI DAERAH</td>
        <td width="5%" align="center" id="khusus" style="">&nbsp;</td>
        <td width="24%" align="center" id="khusus" style="padding-right:20px;">No : '. $hidSpjk."".substr($datetime,0,10).'<br />
          <font style="font-size:12px">'.$datetime.'</font></td>
      </tr>
      <tr>
        <td  width="56%" style="padding-left:20px"> Berdasarkan: PERDA KOTA PEKANBARU NO. 9 TAHUN 2012</td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
      </tr>
    </table></th>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" style="width:10.0%">Pembayaran untuk:</td>
    <td colspan="5"><table width="227">
      <tr>
        <td width="81">Nama</td>
        <td width="10">:</td>
        <td width="123"><u> '.$hnamaSpjk.' </u> </td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><u> '.$hAlamat.' </u> </td>
      </tr>
    </table></td>
  </tr>
  
  <tr>
    <td valign="top" style="width:10.0%">Kategori Pembayaran:</td>
    <td colspan="5"><table width="100%" border="1" cellspacing="0" cellpadding="0">
      <tr>
        <td width="42%" scope="col">a. Jenis Kendaraan: <u>'.$hjenisKendaraan.'</u></td>
        <td width="58%" scope="col"><span style="padding-left: 30px;">No. Uji: <u>-</u>&nbsp;&nbsp;&nbsp;No. KBM: <u>-</u></span></td>
        </tr>
      <tr>
        <td>b. Sifat Kendaraan: <u>-</u></td>
        <td><span style="padding-left: 30px;">Status Pengujian: <u>SPJK/SPSK</u></span></td>
        </tr>
      <tr>
        <td colspan="2">c. Tgl. Akhir Uji: <u> - </u></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td rowspan="5" valign="top" style="width: 10%">Biaya Pembayaran:</td>
    <td colspan="4"><table width="100%" border="1" cellspacing="0" cellpadding="0">
      <tr>
        <td width="27%" valign="top" nowrap="nowrap" style="width: 25%"> 01. Biaya Formulir Pengujian </td>
        <td width="4%"  > Rp </td>
        <td width="15%"  align="right" > - </td>
        <td width="3%"  align="right" >&nbsp;</td>
        <td colspan="3">Retribusi: </td>
        <br />
      </tr>
      <tr>
        <td nowrap="nowrap">02. Biaya Uji</td>
        <td >Rp </td>
        <td align="right">0</td>
        <td align="right">&nbsp;</td>
        <td width="22%" nowrap="nowrap">09. Ret. Numpang Uji</td>
        <td width="6%">Rp </td>
        <td width="23%" align="right">0</td>
      </tr>
      <tr>
        <td >03. Biaya Pembuatan Plat Samping</td>
        <td >Rp </td>
        <td align="right"> 0 </td>
        <td align="right">&nbsp;</td>
        <td nowrap="nowrap">10. Ret. Mutasi</td>
        <td style="width:1%">Rp </td>
        <td align="right">0</td>
      </tr>
      <tr>
        <td nowrap="nowrap">04. Biaya Administrasi</td>
        <td >Rp </td>
        <td align="right">0</td>
        <td align="right">&nbsp;</td>
        <td colspan="3" nowrap="nowrap">Stiker:</td>
      </tr>
      <tr>
        <td nowrap="nowrap">05. Biaya Plat Uji</td>
        <td >Rp </td>
        <td align="right">0</td>
        <td align="right">&nbsp;</td>
        <td nowrap="nowrap">11. Stiker Besar</td>
        <td style="width:1%">Rp </td>
        <td align="right"> 151515151510 </td>
      </tr>
      <tr>
        <td nowrap="nowrap">06. Buku Uji</td>
        <td >Rp </td>
        <td align="right"> 0 </td>
        <td align="right">&nbsp;</td>
        <td colspan="3" nowrap="nowrap">SPJK/SPSK</td>
      </tr>
      <tr>
        <td nowrap="nowrap">07. Denda Terlambat Daftar</td>
        <td >Rp </td>
        <td align="right"> 0 </td>
        <td align="right">&nbsp;</td>
        <td nowrap="nowrap">12. Biaya SPJK/SPSK</td>
        <td style="width:1%">Rp </td>
        <td align="right">'.number_format($hBiaya,0,'.',',').' </td>
      </tr>
      <tr>
        <td nowrap="nowrap">08. Denda Terlambat Uji</td>
        <td >Rp </td>
        <td align="right">0</td>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="5">.........................................................................................................................................................</td>
  </tr>
  <tr>
    <td height="32" colspan="5"><table width="591" border="1" cellspacing="0" cellpadding="0">
      <tr>
        <td width="38%" scope="col">Jumlah Pembayaran</td>
        <td width="4%" align="right" style="width:1%">Rp </td>
        <td width="58%" align="right" nowrap="nowrap" id="khusus">'.number_format($hBiaya,0,'.',',').'</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="5">..........................................................................................................................................................</td>
  </tr>
  <tr>
    <td colspan="5" style="padding-left:300px;">TANGGAL</td>
  </tr>
</table>
</body>
</html>




	';

}
else
{
	$ctn.= "<h1><center>Pilih kwitansi yang ingin dicetak!</center></h1>";
    
}

echo"<br>TESSSS <BR>".$ctn;
//============ EXPORT PDF =====================================================================
$mpdf=new mPDF('en-x','B5-L',12,'',5,5,50,5,10,10,'L'); 

$mpdf->mirrorMargins = 1;	// Use different Odd/Even headers and footers and mirror margins












$html = "$ctn";
$mpdf->AddPage();
$mpdf->WriteHTML($html);

//$mpdf->Output();
exit;
//====== END EXPORT PDF =================================================================
?>