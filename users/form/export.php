<?php

define('_MPDF_PATH', "../vendor/mpdf/mpdf/");
include(_MPDF_PATH."mpdf.php");
include("../config/DB.php");
$namadoc = "Formulir Registrasi Anggota";

$mpdf = new mPDF('UTF-8', 'A4', 10.5, 'Times');
ob_start();
?>
<!doctype html>
<html>
    <head>
        <title></title>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    </head>
    <body style="line-height: 1.5; font-family: Times">
        <table>
            <tr>
                <th style="margin-bottom: 20px; padding-right: 10px"><img src="../public/images/pku-logo.gif" width="40px"></th>
                <th>
                	<center><h4>Formulir Registrasi</h4> Perpustakaan Soeman HS</center>
                </th>
            </tr>
            <tr>
            </tr>
        </table><br><br><br>
        <p class="text-left">
        	<strong>Hal:</strong> Permohonan menjadi<br>
        	<u>Anggota Perpustakaan</u><br>
        </p>
        <?php
        	$q = $dbase->query("SELECT * FROM anggota WHERE usernamea = '$_SESSION[calonanggota]'");
        	// $q->fetch(PDO::OBJ);
        	while ($row = $q->fetch(PDO::FETCH_OBJ)) {
        	    $nama = $row->nama;
        	    $kode = $row->kodeanggota;
        	}
        ?>
        <h3><?php echo $nama?></h3>
        <h3><?php echo $kode?></h3>
        <p style="text-align: justify">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
            when an unknown printer took a galley of type and scrambled it to make a 
            type specimen book. It has survived not only five centuries, but also the 
            leap into electronic typesetting, remaining essentially unchanged. It was 
            popularised in the 1960s with the release of Letraset sheets containing 
            Lorem Ipsum passages, and more recently with desktop publishing software 
            like Aldus PageMaker including versions of Lorem Ipsum.
        </p>
</body>
</html>

<?php
$html = ob_get_contents();
ob_end_clean();

$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($namadoc. ".pdf", 'I');
// $hPrint = isset($_SESSION['calonanggota']);



// $ctn=$hPrint;
//

// <!-- PHP TO HTML -->


// <!-- END PHP TO HTML -->
// 



// // ========= END SIAPAKAH SAYA SISI NEGATIF =====

// // ===== END HISTORI ===


// //echo"<br>TESSSS <BR>".$ctn;
// //============ EXPORT PDF =====================================================================
// $mpdf=new mPDF('en-x','Folio',12,'',20,20,15,15,10,10,'L'); 

// $mpdf->mirrorMargins = 1;	// Use different Odd/Even headers and footers and mirror margins











// $html = "$ctn";
// $mpdf->AddPage();
// $mpdf->WriteHTML($html);

// $mpdf->Output();
// exit;
// //====== END EXPORT PDF =================================================================
// /*}else { header("location:logout.php"); }*/

?>