<?php
$date = date("Y-m-d");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulir Pendaftaran</title>
<link rel="stylesheet" type="text/css" href="../build/css/mpdf.css">
</head>
<body>
<div id="wrapper">
     
    <p style="text-align:center; font-size: 16pt; font-weight:bold; padding-top:15mm;">Form Registrasi Anggota Perpustakaan Soeman HS</p>
    <br />
    <table class="heading" style="width:100%; border:none">
        <tr style="border:none;">
            <td  style="width:80mm;">
                <strong>Hal:</strong> <span style="margin-left: 18pt; text-indent: 2mm">Permohonan Menjadi Anggota Pustaka Soeman HS</span><br>
                <div style="margin-bottom: 60mm;clear: both"></div>
            </td>
            <td rowspan="2" valign="top" align="right" style="padding:3mm;"></td>
            <td rowspan="2" valign="top" align="right" style="padding:3mm;">
                <table>
                    <tr><td></td></tr>
                    <tr><td>Pekanbaru, <?=$date?></td></tr>
                    <tr><td></td></tr>
                </table>
            </td>
        </tr>
        <tr id="kepada"  style="border:none;" valign="top" style="margin-top: 30pt !important">
            <td>
                Kepada Yth,:<br>
                Bapak Kepala Perpustakaan, Badan Arsip dan Dokumentasi<br>
                Provinsi Riau
                Cq. Kepala UPT Layanan Perpustakaan Soeman HS<br>
                Di-<br>
                 <span style="overflow: hidden;padding-left: 90pt">Tempat</span>

            </td>
        </tr>
    </table>
         
         
    <div id="content">
         
        <div id="invoice_body">
            <table>
            <tr style="background:#eee;">
            
                <td style="width:50%;"><b>
                    <h2 class="heading" style="padding-bottom: 20mm">
                        FORMULIR DATA PEMOHON MENJADI ANGGOTA<br>
                    </h2>
                </b></td>
                <td  style="width:50%;text-align:left;"><b>
                    No Anggota:   <br>
                    Status Keanggotaan:<br>
                </b></td>
            </tr>
            </table>
             
            <table>
            <tr>
                <td style="width:8%;">1</td>
                <td style="text-align:left; padding-left:10px;">Software Development<br />Description : Upgradation of telecrm</td>
                <td class="mono" style="width:15%;">1</td><td style="width:15%;" class="mono">157.00</td>
                <td style="width:15%;" class="mono">157.00</td>
            </tr>         
            <tr>
                <td colspan="3"></td>
                <td></td>
                <td></td>
            </tr>
             
            <tr>
                <td colspan="3"></td>
                <td>Total :</td>
                <td class="mono">157.00</td>
            </tr>
        </table>
        </div>
        <div id="invoice_total">
            Total Amount :
            <table>
                <tr>
                    <td style="text-align:left; padding-left:10px;">One  Hundred And Fifty Seven  only</td>
                    <td style="width:15%;">USD</td>
                    <td style="width:15%;" class="mono">157.00</td>
                </tr>
            </table>
        </div>
        <br />
        <hr />
        <br />
         
        <table style="width:100%; height:35mm;">
            <tr>
                <td style="width:65%;" valign="top">
                    Payment Information :<br />
                    Please make cheque payments payable to : <br />
                    <b>ABC Corp</b>
                    <br /><br />
                    The Invoice is payable within 7 days of issue.<br /><br />
                </td>
                <td>
                <div id="box">
                    E &amp; O.E.<br />
                    For ABC Corp<br /><br /><br /><br />
                    Authorised Signatory
                </div>
                </td>
            </tr>
        </table>
    </div>
     
    <br />
     
    </div>
     
    <htmlpagefooter name="footer">
        <hr />
        <div id="footer"> 
            <table>
                <tr><td>Software Solutions</td><td>Mobile Solutions</td><td>Web Solutions</td></tr>
            </table>
        </div>
    </htmlpagefooter>
    <sethtmlpagefooter name="footer" value="on" />
     
</body>
</html>