<script src="exporting.js"></script>
<?php
session_start();if(isset($_SESSION['type_user']) and isset($_SESSION['username']) and isset($_SESSION['password'])){  
////////////////////////////////////////////
include "../set/cnf.php";
include("mpdf.php");
include "../function/fungsi_tanggal_indonesia.php";
require "../fungsi_grafik_orang.php";

//echo"<br>siswa_nama = $siswa_nama<br><br>idsiswa = $idsiswa";


$pilihan_cetak = isset($_COOKIE["pilihan_cetak"]) ? $_COOKIE["pilihan_cetak"] : "";
$report = isset($_GET["report"]) ? $_GET["report"] : "Catatan";
////////////////////////////////////////////
$ids = $_GET["idsiswa"];

$sql_cr = "SELECT * FROM `tbl_siswa` WHERE `siswa_no` = $ids ";
$rs=mysql_query($sql_cr);
$dt=mysql_fetch_assoc($rs);

$ctn='
	 <table width="60%" height="125" border="0" cellpadding="0" cellspacing="0" class="margin">
              <tr>
                <td width="42%">ID / NIS </td>
                <td width="58%">: '.$dt["siswa_no"].' </td>
              </tr>
              <tr>
                <td>Nama</td>
                <td>: '.$dt["siswa_nama"].' </td>
              </tr>
              <tr>
                <td>Jenis Kelamin </td>
                <td>: '.$dt["siswa_jk"].' </td>
              </tr>
              <tr>
                <td>Kelas</td>
                <td>: '.$dt["kelas"].' </td>
              </tr>
			   <tr>
                <td>Tanggal Penilaian</td>
                <td>: '.tgl_indo(date("Y-m-d")).' </td>
              </tr>
            </table>
			<center>==================================================================</center>
			 ';

// ======== GRAFIK ORANG =============
$sql = "SELECT siswa_nama,siswa_jk, AVG(D) as RATE_D, AVG(I) AS RATE_I, AVG(S) AS RATE_S, AVG(C) AS RATE_C, AVG(visual) AS RATE_VISUAL, AVG(auditasi) AS RATE_AUDITASI, 
		AVG(kinestetik) AS RATE_KINESTETIK, 
		AVG(kiri) AS RATE_KIRI, AVG(kanan) AS RATE_KANAN FROM `tbl_tes_psikologis`,`tbl_siswa` WHERE `tbl_tes_psikologis`.`siswa_no`=`tbl_siswa`.`siswa_no` 
		AND `tbl_siswa`.`siswa_no` ='".$ids."' ";
$query = mysql_query( $sql )  or die(mysql_error());         
$ambil = mysql_fetch_assoc($query);
$hasil_akhir = personality("$ambil[RATE_D]","$ambil[RATE_I]","$ambil[RATE_S]","$ambil[RATE_C]")."".gaya_belajar("$ambil[RATE_VISUAL]","$ambil[RATE_AUDITASI]","$ambil[RATE_KINESTETIK]")."".dominan_otak("$ambil[RATE_KIRI]","$ambil[RATE_KANAN]");

$ctn.='<table align="center" width="30%" height="200" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center">POTRET DIRI ANDA';
	
if($ambil["siswa_jk"]=="Perempuan"){
	if(file_exists("../grafik_orang/perempuan/$hasil_akhir.png")){
		$ctn.='<div id="grafik_orang"><img src="../grafik_orang/perempuan/'.$hasil_akhir.'.png" width="200" height="300" /></div>';
	}else{
		$ctn.='<div id="grafik_orang"><img src="../grafik_orang/perempuan/main.png" width="200" height="300" /></div>';
	}
}else{
	if(file_exists("../grafik_orang/laki-laki/$hasil_akhir.png")){
		$ctn.='<div id="grafik_orang"><img src="../grafik_orang/laki-laki/'.$hasil_akhir.'.png" width="200" height="300" /></div>';
	}else{
		$ctn.='<div id="grafik_orang"><img src="../grafik_orang/laki-laki/main.png" width="200" height="300" /></div>';
	}
}
$ctn.='	
	</td>
  </tr>
</table>
';
$ctn.=keterangan($hasil_akhir);
// ========= END GRAFIK ==============

$ctn.='<pagebreak />';

// ========= SIAPAKAH SAYA SISI POSITIF =====
	$sql = "SELECT * FROM `tbl_kategori` WHERE  `siswa_no` = '".$ids."'";
	//$ctn.="$siswa_nama = $idsiswa key =$key ".$pos1." = ".$pos2." sql =".$sql;
	$rs=mysql_query($sql);
	$n=0;
	while($data=mysql_fetch_assoc($rs)){
		$n++;
		$rcd[$n] = $data["sering_muncul"];
	}

	$sql = "SELECT DISTINCT `sering_muncul` FROM `tbl_kategori` WHERE `siswa_no` = '".$ids."'";
//	$ctn.="<br>sql = ".$sql;
	$rs=mysql_query($sql);
	$u=0;
	while($data=mysql_fetch_assoc($rs)){
		$u++;
		$rcd_muncul[$u]["kat"] = $data["sering_muncul"];
	}
//	$ctn.="<br> UU = ".$u." NN = ".$n;
	
	
	for($i=1;$i<=$u;$i++){
		
		$tmp_sering_muncul[$i]["muncul"]=0;
		$tmp=$rcd_muncul[$i]["kat"];
		
		for($j=1;$j<=$n;$j++){
			
				if($tmp==$rcd[$j] ){
					$tmp_sering_muncul[$i]["muncul"]++;
					
				}
		}
		
		$m[$i]["muncul"]=$tmp_sering_muncul[$i]["muncul"];
		$m[$i]["kat"] = $tmp;
	}
	
	$s_p=0;$s_n=0;
	for($i=1;$i<=$u;$i++){
		//$ctn.="<br>".$rcd_muncul[$i]["kat"]." = ".$m[$i]["muncul"];
		$s_positive = str_replace("(+)","",$rcd_muncul[$i]["kat"]);
		$s_negatif = str_replace("(-)","",$rcd_muncul[$i]["kat"]);
		$tp = substr($rcd_muncul[$i]["kat"],0,3);
		if($tp=="(+)"){
			$s_p++;
			$m_p[$s_p]["kat"]=$s_positive;
			$m_p[$s_p]["muncul"]=$m[$i]["muncul"];
		}else{
			$s_n++;
			$m_n[$s_n]["kat"]=$s_negatif;
			$m_n[$s_n]["muncul"]=$m[$i]["muncul"];
		}
	}
	
	/*$kp_jarang=""; $p_jarang=""; $kn_jarang=""; $n_jarang="";
	$kp_sering=""; $p_sering=""; $kn_sering=""; $n_sering="";
	$kp_potensi=""; $p_potensi=""; $kn_potensi=""; $n_potensi="";*/
	
//========== SISI POSITIF ==================================================
	// cari nilai terbesar untuk posisi sering muncul
	$tmp_sering_muncul=0;
	for($i=1;$i<=$s_p;$i++){
		for($j=$i;$j<=$s_p;$j++){
			if($tmp_sering_muncul<$m_p[$j]["muncul"]){
				$tmp_sering_muncul=$m_p[$j]["muncul"];
			}
		}
	}
//	$ctn.="<br>Nilai max sering muncul = ".$tmp_sering_muncul;
	//////////////////////////////

	$pj=0;$ps=0;$pp=0;
//	$ctn.="<BR>SISI POSITIF ".$s_p;
	for($j=1;$j<=$s_p;$j++){
		//$ctn.="<br>".$m_p[$j]["kat"]." = ".$m_p[$j]["muncul"];
		if($m_p[$j]["muncul"]==1 and $tmp_sering_muncul!=1){ // jarang muncul
			$pj++;
			$p_jarang[$pj]=$m_p[$j]["muncul"];
			$kp_jarang[$pj]=$m_p[$j]["kat"];
		}else{ // sering muncul
			$ps++;
			$p_sering[$ps]=$m_p[$j]["muncul"];
			$kp_sering[$ps]=$m_p[$j]["kat"];
		}
	}
	
//===== SISI NEGATIF======================================================
	// cari nilai terbesar untuk posisi sering muncul
	$tmp_sering_muncul=0;
	for($i=1;$i<=$s_n;$i++){
		for($j=$i;$j<=$s_n;$j++){
			if($tmp_sering_muncul<$m_n[$j]["muncul"]){
				$tmp_sering_muncul=$m_n[$j]["muncul"];
			}
		}
	}
//	$ctn.="<br>Nilai max sering muncul = ".$tmp_sering_muncul;
	//////////////////////////////

	$nj=0;$ns=0;
//	$ctn.="<BR>SISI NEGATIF ".$s_n;
	for($j=1;$j<=$s_n;$j++){
		//$ctn.="<br>".$m_n[$j]["kat"]." = ".$m_n[$j]["muncul"];
		if($m_n[$j]["muncul"]==1 and $tmp_sering_muncul!=1){ // jarang muncul
			$nj++;
			$n_jarang[$nj]=$m_n[$j]["muncul"];
			$kn_jarang[$nj]=$m_n[$j]["kat"];
		}else{ // sering muncul
			$ns++;
			$n_sering[$ns]=$m_n[$j]["muncul"];
			$kn_sering[$ns]=$m_n[$j]["kat"];
		}
	}
	
// MENCARI POTENSI UNTUK MUNCUL
 // potensi muncul
 
 $sql_p = "SELECT `D`, `I`, `S`, `C` FROM `tbl_tes_psikologis` WHERE `siswa_no` = '".$ids."' ORDER BY `siswa_no` DESC";

 $rss=mysql_query($sql_p);
 $hs=mysql_fetch_assoc($rss);
 $hasil_akhir = personality($hs["D"],$hs["I"],$hs["S"],$hs["C"]);
 $kategori = potensi_personality($hasil_akhir);
 
 // POTENSI SISI POSITIF
 $pp=0;
 $sql_potensi = "SELECT DISTINCT `potensi` FROM `tbl_potensi` WHERE `kategori` = '".$kategori."' AND `unsur` LIKE '(+)%'";
  // $ctn.="<br>TES SQL_P =  $sql_p <br> kategori = $kategori <br> hasil_akhir = $hasil_akhir <br> sql_potensi = $sql_potensi";

 $rs=mysql_query($sql_potensi);
 while($dpotensi=mysql_fetch_assoc($rs)){
 	$sql_unsur = "SELECT `unsur` FROM `tbl_potensi` WHERE `kategori` = '".$kategori."' AND `unsur` LIKE '(+)%' AND `potensi` LIKE '".$dpotensi["potensi"]."'";
	$rw=mysql_num_rows(mysql_query($sql_unsur));
	$rss=mysql_query($sql_unsur);
	$tandai=0;
	while($temp=mysql_fetch_assoc($rss)){
		for($i=1;$i<=$s_p;$i++){
			$pos = "(+)".$m_p[$i]["kat"];
			if($temp["unsur"]==$pos){
				$tandai++;
				$i=$u+1;
			}
		}
	}
	if($tandai==$rw){
		$pp++;
		$p_potensi["$pp"] = $dpotensi["potensi"];
		//$ctn.="<br><br>p_potensi[$pp] = ".$p_potensi["$pp"];
	}
	
 }
 
 // POTENSI NEGATIF
 $pn=0;
 $sql_potensi = "SELECT DISTINCT `potensi` FROM `tbl_potensi` WHERE `kategori` = '".$kategori."' AND `unsur` LIKE '(-)%'";
 $rs=mysql_query($sql_potensi);
 while($dpotensi=mysql_fetch_assoc($rs)){
 	$sql_unsur = "SELECT `unsur` FROM `tbl_potensi` WHERE `kategori` = '".$kategori."' AND `unsur` LIKE '(-)%' AND `potensi` LIKE '".$dpotensi["potensi"]."'";
	$rw=mysql_num_rows(mysql_query($sql_unsur));
	$rss=mysql_query($sql_unsur);
	$tandai=0;
	while($temp=mysql_fetch_assoc($rss)){
		for($i=1;$i<=$s_n;$i++){
			$pos = "(-)".$m_n[$i]["kat"];
			if($temp["unsur"]==$pos){
				$tandai++;
				$i=$u+1;
			}
		}
	}
	if($tandai==$rw){
		$pn++;
		$n_potensi["$pn"] = $dpotensi["potensi"];
	}
	
 }
	
//============== SISI POSITIF =========================================================	

$ctn.='<table align="center" width="100%" height="255" border="1" cellpadding="0" cellspacing="0" class="txt_tbl">
	  <tr>
		<td height="38" colspan="3" bgcolor="#00FF33" align="center"><strong>SIAPAKAH SAYA? (SISI POSITIF)</strong></td>
	  </tr>
	  <tr align="center">
		<td width="7%" bgcolor="#FFFFCC" align="center">Intensitas</td>
		<td width="25%" bgcolor="#FFFFCC" align="center">Sisi Positive (Cepat) </td>
		<td width="7%" bgcolor="#FFFFCC" align="center">Intensitas</td>
	  </tr>
	  <tr align="center">
		<td height="67" bgcolor="#FFFFCC" align="center">Jarang Muncul </td>
		<td align="center">';
		for($i=1;$i<=$pj;$i++){
			if(file_exists('../stiker_karakter/ok/(P)'.$kp_jarang[$i].'.png')){$ctn.='<br /><br /><img src="../stiker_karakter/ok/(P)'.$kp_jarang[$i].'.png" width="60" height="60" />';}
			else{$ctn.='<br /><br /><img src="../stiker_karakter/ok/no_image.png" width="60" height="60" />';}
			$ctn.="<br /> ".$kp_jarang[$i]." <strong> (".$p_jarang[$i]."x) </strong> ";
		}
		$ctn.='
		</td>
		<td bgcolor="#FFFFCC" align="center">Jarang Muncul</td>
	  </tr>
	  <tr align="center">
		<td height="66" bgcolor="#FFFFCC" align="center">Sering Muncul </td>
		<td align="center">';
		for($i=1;$i<=$ps;$i++){
			if(file_exists('../stiker_karakter/ok/(P)'.$kp_sering[$i].'.png')){$ctn.='<br /><br /><img src="../stiker_karakter/ok/(P)'.$kp_sering[$i].'.png" width="60" height="60" />';}
			else{$ctn.='<br /><br /><img src="../stiker_karakter/ok/no_image.png" width="60" height="60" />';}
			$ctn.="<br /> ".$kp_sering[$i]." <strong> (".$p_sering[$i]."x) </strong> ";
		}
		$ctn.='
		</td>
		<td bgcolor="#FFFFCC" align="center">Sering Muncul</td>
	  </tr>
	  <tr align="center">
		<td bgcolor="#FFFFCC" align="center">Potensi Untuk Muncul </td>
		<td align="center">';
		for($i=1;$i<=$pp;$i++){
			if(file_exists('../stiker_karakter/ok/(P)'.$p_potensi[$i].'.png')){$ctn.='<br /><br /><img src="../stiker_karakter/ok/(P)'.$p_potensi[$i].'.png" width="60" height="60" />';}
			else{$ctn.='<br /><br /><img src="../stiker_karakter/ok/no_image.png" width="60" height="60" />';}
			$ctn.="<br /> ".$p_potensi[$i];
		}
		$ctn.='
		</td>
		<td bgcolor="#FFFFCC" align="center">Potensi Untuk Muncul</td>
	  </tr>
	</table><br><br>';
// ========= END SIAPAKAH SAYA SISI POSITIF =====

//========== SISI NEGATIF =============================================================	
$ctn.='<pagebreak />';


$ctn.='<table align="center" width="100%" height="255" border="1" cellpadding="0" cellspacing="0" class="txt_tbl">
	  <tr>
		<td height="38" colspan="3" bgcolor="#00FF33" align="center"><strong>SIAPAKAH SAYA? (SISI NEGATIF)</strong></td>
	  </tr>
	  <tr align="center">
		<td width="7%" bgcolor="#FFFFCC" align="center">Intensitas</td>
		<td width="25%" bgcolor="#FFFFCC" align="center">Sisi Positive (Cepat) </td>
		<td width="7%" bgcolor="#FFFFCC" align="center">Intensitas</td>
	  </tr>
	  <tr align="center">
		<td height="67" bgcolor="#FFFFCC" align="center">Jarang Muncul </td>
		<td align="center">';
		for($i=1;$i<=$nj;$i++){
			if(file_exists('../stiker_karakter/ok/(N)'.$kn_jarang[$i].'.png')){$ctn.='<br /><br /><img src="../stiker_karakter/ok/(N)'.$kn_jarang[$i].'.png" width="60" height="60" />';}
			else{$ctn.='<br /><br /><img src="../stiker_karakter/ok/no_image.png" width="60" height="60" />';}
			$ctn.="<br /> ".$kn_jarang[$i]." <strong> (".$n_jarang[$i]."x) </strong> ";
		}
		$ctn.='
		</td>
		<td bgcolor="#FFFFCC" align="center">Jarang Muncul</td>
	  </tr>
	  <tr align="center">
		<td height="66" bgcolor="#FFFFCC" align="center">Sering Muncul </td>
		<td align="center">';
		for($i=1;$i<=$ns;$i++){
			if(file_exists('../stiker_karakter/ok/(N)'.$kn_sering[$i].'.png')){$ctn.='<br /><br /><img src="../stiker_karakter/ok/(N)'.$kn_sering[$i].'.png" width="60" height="60" />';}
			else{$ctn.='<br /><br /><img src="../stiker_karakter/ok/no_image.png" width="60" height="60" />';}
			$ctn.="<br /> ".$kn_sering[$i]." <strong> (".$n_sering[$i]."x) </strong> ";
		}
		$ctn.='
		</td>
		<td bgcolor="#FFFFCC" align="center">Sering Muncul</td>
	  </tr>
	  <tr align="center">
		<td bgcolor="#FFFFCC" align="center">Potensi Untuk Muncul </td>
		<td align="center">';
		for($i=1;$i<=$pn;$i++){
			if(file_exists('../stiker_karakter/ok/(N)'.$n_potensi[$i].'.png')){$ctn.='<br /><br /><img src="../stiker_karakter/ok/(N)'.$n_potensi[$i].'.png" width="60" height="60" />';}
			else{$ctn.='<br /><br /><img src="../stiker_karakter/ok/no_image.png" width="60" height="60" />';}
			$ctn.="<br /> ".$n_potensi[$i];
		}
		$ctn.='
		</td>
		<td bgcolor="#FFFFCC" align="center">Potensi Untuk Muncul</td>
	  </tr>
	</table><br><br>';
// ========= END SIAPAKAH SAYA SISI NEGATIF =====

// ===== GAYA BELAJAR
//============== GAYA SAYA BELAJAR =============================================
$ctn.='<pagebreak />';
		$ctn.='<br>
			<table align="center" width="90%" border="1" cellspacing="0" cellpadding="0">
			  <tr>
				<th height="38" colspan="5" bgcolor="#f5bd26" scope="col">SAYA BELAJAR DENGAN?? </th>
					  </tr>
			  <tr>
				<th width="12%" bgcolor="#f5bd26" scope="col">PERIODE</th>
				<th width="18%" bgcolor="#f5bd26" scope="col">TANGGAL</th>
				<th width="23%" height="51" bgcolor="#f5bd26" scope="col">VISUAL (MATA) </th>
				<th width="25%" bgcolor="#f5bd26" scope="col">AUDITORI (TELINGA) </th>
				<th width="22%" bgcolor="#f5bd26" scope="col">KINESTETIK (TANGAN) </th>
					  </tr>';
			   $sql_gaya_belajar = "SELECT `id_tes_psikologis`, `siswa_no`, `visual`, `auditasi`, `kinestetik`,`tanggal` 
									FROM `tbl_tes_psikologis` WHERE `siswa_no` = $ids ORDER BY `id_tes_psikologis`";
			  
//			  $ctn.="<br>sql sql_gaya_belajar = ".$sql_gaya_belajar;
			  $rp=mysql_query($sql_gaya_belajar);
			  $no=0;
			  $rate_v=0;$rate_a=0;$rate_k=0;
			  $sum_v=0;$sum_a=0;$sum_k=0;
			  while($data=mysql_fetch_assoc($rp)){
			  	$no++;
				$sum=$data["visual"]+$data["auditasi"]+$data["kinestetik"];
				if($sum==0 or empty($sum)){$sum=1;}
				$persen_V=($data["visual"]*100)/$sum;		$sum_v = $sum_v +  $data["visual"];
				$persen_A=($data["auditasi"]*100)/$sum;		$sum_a = $sum_a +  $data["auditasi"];
				$persen_K=($data["kinestetik"]*100)/$sum;	$sum_k = $sum_k +  $data["kinestetik"];
				$tgl = $data["tanggal"];
				 $ctn.='
				  <tr>
							<td align="center" valign="middle"><strong>'.$no.'</strong></td>
							<td align="center" valign="middle"><strong>'.tgl_indo($tgl).'</strong></td>
							<td height="42" align="center" valign="middle">'.$data["visual"].' ('.number_format($persen_V,2).' %)</td>
							<td align="center" valign="middle">'.$data["auditasi"].' ('.number_format($persen_A,2).' %)</td>
							<td align="center" valign="middle">'.$data["kinestetik"].' ('.number_format($persen_K,2).' %)</td>
				  </tr>';
			  }
			   $total = $sum_v + $sum_a + $sum_k;
			   if($total==0){$total=1;}
			   $rate_v = ($sum_v*100)/$total;
			   $rate_a = ($sum_a*100)/$total;
			   $rate_k = ($sum_k*100)/$total;
			  $ctn.='
			  <tr>
				<td align="center" valign="middle" colspan="2" bgcolor="#FFFF99"><strong>Nilai Rata-rata </strong></td>
				<td height="32" align="center" valign="middle" bgcolor="#FFFF99">'.$sum_v.' ('.number_format($rate_v,2).' %)</td>
				<td align="center" valign="middle" bgcolor="#FFFF99">'.$sum_a.' ('.number_format($rate_a,2).' %)</td>
				<td align="center" valign="middle" bgcolor="#FFFF99">'.$sum_k.' ('.number_format($rate_k,2).' %)</td>
			  </tr>
			</table><br>';
// ===== END GAYA BELAJAR 

// ====== HISTORI JAWABAN ===========
$ctn.='<pagebreak />';
			  $sql = "SELECT DISTINCT `jawaban` FROM `tbl_jawaban`, `tbl_tes_psikologis` WHERE `tbl_jawaban`.`id_tes_psikologis` = `tbl_tes_psikologis`.`id_tes_psikologis` 
			  			and `tbl_tes_psikologis`.`siswa_no` = ".$ids." order by `tbl_tes_psikologis`.`id_tes_psikologis` asc";
			 $ctn.='<table align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr align="center">
			<td height="41" bgcolor="#f5bd26" align="center"> <strong>HISTORI PERIODE TEST PSIKOLOGIS </strong></td>
		  </tr>
		  <tr >
			<td >
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  
			
			';
			if(!empty($report) and $report=="Histori Jawaban"){
			  $rs=mysql_query($sql);$nomor=0;
			  while($data=mysql_fetch_assoc($rs)){$nomor++;
				  $ctn.='
				  <tr>
				<td width="15%" align="right" valign="top">'.$nomor.'.</td>
				<td width="2%" align="left" valign="top">&nbsp;</td>
				<td width="83%" align="left" valign="top" style="text-align:justify">'.ucfirst($data["jawaban"]).'</td>
			  </tr>';
			  }	
			 
			$ctn.='
			</table>
			';
		 	}else{
		 	 $ctn.='<span class="margin"><br><strong>Catatan :		</strong>    </span>
		 	<br /><table align="center" width="500" height="400" border="1" cellspacing="0" cellpadding="0">
			  <tr>
				<td valign="top">'.$catatan.'</td>
			  </tr>
			</table>
		   <br />	 <br />';	
			}
			$ctn.='    	</td>
		  </tr>
		</table>';

// ===== END HISTORI ===



//echo"<br>TESSSS <BR>".$ctn;
//============ EXPORT PDF =====================================================================
$mpdf=new mPDF('en-x','B5','','',15,15,47,15,10,10); 

$mpdf->mirrorMargins = 1;	// Use different Odd/Even headers and footers and mirror margins

$header = '
<table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: serif; font-size: 9pt; color: #000088;"><tr>
<td width="11%"><img src="logo.jpg" width="126px" height="119" /></td>
<td align="center" valign="top"><p><strong><font color="#000000" style="font-size:24px" face="Arial, Helvetica, sans-serif">LAPORAN HASIL TES PSIKOLOGIS SISWA</font></strong></p>
  </td>
</tr></table>
';
$headerE = '
<table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: serif; font-size: 9pt; color: #000088;"><tr>
<td width="11%"><img src="logo.jpg" width="126px" height="119" /></td>
<td align="center" valign="top"><p><strong><font color="#000000" style="font-size:24px" face="Arial, Helvetica, sans-serif">LAPORAN HASIL TES PSIKOLOGIS SISWA</font></strong></p>
  </td>
</tr></table>


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
}else { header("location:logout.php"); }

?>