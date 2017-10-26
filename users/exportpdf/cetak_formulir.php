<script src="exporting.js"></script>
<?php

include("mpdf.php");




$hPrint = isset($_POST['hPrint']) ? $_POST['hPrint'] : "";


$ctn=$hPrint;
?>

<!-- PHP TO HTML -->


<!-- END PHP TO HTML -->
<?php 



// ========= END SIAPAKAH SAYA SISI NEGATIF =====

// ===== END HISTORI ===


//echo"<br>TESSSS <BR>".$ctn;
//============ EXPORT PDF =====================================================================
$mpdf=new mPDF('en-x','Folio',12,'',20,20,15,15,10,10,'L'); 

$mpdf->mirrorMargins = 1;	// Use different Odd/Even headers and footers and mirror margins











$html = "$ctn";
$mpdf->AddPage();
$mpdf->WriteHTML($html);

$mpdf->Output();
exit;
//====== END EXPORT PDF =================================================================
/*}else { header("location:logout.php"); }*/

?>