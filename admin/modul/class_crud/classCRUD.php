<?php 
class konfigurasi {
	public function __construct(){
		try {
			if(file_exists("set/cnf.php")){include"set/cnf.php";}elseif(file_exists("../set/cnf.php")){include"../set/cnf.php";}else{include"../../set/cnf.php";}
			
			//echo"<br>tes =$host";
			//$host="localhost";
			$dbname=$db;
			//$us="root";
			//$ps="";

			$this->db = new PDO('mysql:host='.$host.';dbname='.$dbname.'',''.$us.'',''.$ps.'');
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		}
		catch (PDOException $e){
			echo $e->getMessage();
		}
	}
    //
public function readAllWhereLimit2($tabel,$a,$aa,$order,$AscDsc,$limit1,$limit2){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE `$a`='$aa' ORDER BY $order $AscDsc LIMIT $limit1,$limit2");
		$query->execute();//echo"SELECT * FROM $tabel WHERE `$a`='$aa' ORDER BY $order DESC LIMIT $limit1,$limit2";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}
}
public function readAllLimit($tabel,$order,$AscDsc,$limit1,$limit2){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel  ORDER BY $order $AscDsc LIMIT $limit1,$limit2");
		$query->execute();//echo"SELECT * FROM $tabel WHERE `$a`='$aa' ORDER BY $order DESC LIMIT $limit1,$limit2";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}
}
public function readAllWhereBetweenLimit2($tabel,$a,$aa,$order,$between,$start,$end,$AscDsc,$limit1,$limit2){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE `$a`='$aa' and `$between` BETWEEN '$start' AND '$end' ORDER BY $order $AscDsc LIMIT $limit1,$limit2");
		$query->execute();//echo"SELECT * FROM $tabel WHERE `$a`='$aa' and `$between` BETWEEN '$start' AND '$end' ORDER BY $order $AscDsc LIMIT $limit1,$limit2";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}
}
public function readAllWhereTableBetweenLimit2($tabel,$tabel2,$kolom,$Ta,$a,$aa,$Tbetween,$between,$start,$end,$Torder,$order,$AscDsc,$limit1,$limit2){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel,$tabel2 WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` and  `$Ta`.`$a`='$aa' and `$Tbetween`.`$between` BETWEEN '$start' and '$end' ORDER BY $order $AscDsc LIMIT $limit1,$limit2");
		$query->execute();//echo"SELECT * FROM $tabel,$tabel2 WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` and  `$Ta`.`$a`='$aa' and `$Tbetween`.`$between` BETWEEN '$start' and '$end' ORDER BY $order $AscDsc LIMIT $limit1,$limit2";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}
}
public function readAllWhereBetweenLimit($tabel,$Tbetween,$between,$start,$end,$order,$AscDsc,$limit1,$limit2){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE  `$Tbetween`.`$between` BETWEEN '$start' and '$end' ORDER BY $order $AscDsc LIMIT $limit1,$limit2");
		$query->execute();//echo"SELECT * FROM $tabel WHERE  `$Tbetween`.`$between` BETWEEN '$start' and '$end' ORDER BY $order $AscDsc LIMIT $limit1,$limit2";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}
}
public function readAllWhereTableBetween($tabel,$tabel2,$kolom,$Ta,$a,$aa,$Tbetween,$between,$start,$end,$Torder,$order,$AscDsc){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel,$tabel2 WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` and  `$Ta`.`$a`='$aa' and `$Tbetween`.`$between` BETWEEN '$start' and '$end' ORDER BY $order $AscDsc");
		$query->execute();//echo"SELECT * FROM $tabel,$tabel2 WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` and  `$Ta`.`$a`='$aa' and `$Tbetween`.`$between` BETWEEN '$start' and '$end' ORDER BY $order $AscDsc ";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}
}
public function readAllWhereBetween($tabel,$a,$aa,$order,$between,$start,$end,$AscDsc){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE `$a`='$aa' and `$between` BETWEEN '$start' AND '$end' ORDER BY $order $AscDsc");
		$query->execute();//echo"SELECT * FROM $tabel WHERE `$a`='$aa' and `$between` BETWEEN '$start' AND '$end' ORDER BY $order $AscDsc LIMIT $limit1,$limit2";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}
}
public function readAllTabel2WhereLimit2($tabel,$tabel2,$kolom,$Ta,$a,$aa,$Torder,$order,$AscDsc,$limit1,$limit2){
	try {
		$query = $this->db->prepare("SELECT * FROM `$tabel`,`$tabel2` WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` and `$Ta`.`$a`='$aa' ORDER BY `$Torder`.`$order` $AscDsc LIMIT $limit1,$limit2");
		$query->execute();//echo"SELECT * FROM $tabel WHERE `$a`='$aa' ORDER BY $order DESC LIMIT $limit1,$limit2";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}
}
public function readAllWhere2Limit2($tabel,$a,$aa,$b,$bb,$order,$AscDsc,$limit1,$limit2){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE `$a`='$aa' and `$b`='$bb' ORDER BY $order $AscDsc LIMIT $limit1,$limit2");
		$query->execute();//echo"SELECT * FROM $tabel WHERE `$a`='$aa' ORDER BY $order DESC LIMIT $limit1,$limit2";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}
}

public function readAllLimit2($tabel,$order,$AscDsc,$limit1,$limit2){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel  ORDER BY $order $AscDsc LIMIT $limit1,$limit2");
		$query->execute();//echo"SELECT * FROM $tabel WHERE `$a`='$aa' ORDER BY $order DESC LIMIT $limit1,$limit2";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}
}

public function readAllHeving($tabel,$a,$b,$c,$d,$limita,$limitb){
	try {
		$query = $this->db->prepare("SELECT `$a`,`$b`,`$c`,`$d`, COUNT(*) AS TOTAL FROM $tabel GROUP BY `$a` HAVING ( COUNT(`$a`) > 1 ) LIMIT $limita, $limitb");
		$query->execute();//echo"SELECT `$a`, COUNT(*) FROM $tabel GROUP BY `$a` HAVING ( COUNT(`$a`) > 1 )";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}
}

	public function cek_login($username,$password){
		try {
			$select_data = $this->db->prepare("SELECT * FROM tbl_user WHERE username='$username' AND password='$password'");
			$select_data->execute();
			$userRow = $select_data->fetch(PDO::FETCH_ASSOC);
			if ($select_data->rowCount() == 1) {
					
						
					if($userRow['level']!='Member'){
						$sql = $this->db->prepare("SELECT * FROM tbl_staff WHERE id_user='".$userRow['id_user']."'");
						$sql->execute();
						$data = $sql->fetch(PDO::FETCH_ASSOC);
						$_SESSION['username'] = $userRow['username'];
						$_SESSION['id_user'] = $userRow['id_user'];
						$_SESSION['id_staff'] = $data['id_staff'];
						$_SESSION['type_akun'] = $userRow['level'];
						$_SESSION['id'] = $data['nip'];
						$_SESSION['nama_user'] = $data['nama'];
						$_SESSION['jabatan'] = $data['jabatan'];
						$_SESSION['foto'] = $data['foto'];
						
					}else{
						$sql = $this->db->prepare("SELECT * FROM tbl_member WHERE id_user='".$userRow['id_user']."'");
						$sql->execute();
						$data = $sql->fetch(PDO::FETCH_ASSOC);
						$_SESSION['username'] = $userRow['username'];
						$_SESSION['id_user'] = $userRow['id_user'];
						$_SESSION['type_akun'] = $userRow['level'];
						$_SESSION['nama_user'] = $data['nama'];
						$_SESSION['id'] = $data['id_member'];
						$_SESSION['jenis_member'] = $data['jenis_member'];
						$_SESSION['status'] = $data['status'];
						$_SESSION['foto'] = $data['foto'];
					}
				}
		}
		catch (PDOException $e){
			echo $e->getMessage();
		}
	}

public function redirect_login($link){
	header("location:".$link);
}
public function is_log(){
		if (isset($_SESSION['id']) && isset($_SESSION['nama']) && isset($_SESSION['username']) && isset($_SESSION['level']) && isset($_SESSION['kabupaten'])) {
			return true;
		}
}
public function redirect_out($link){
		header("location:$link");
		session_unset();
		session_destroy();
		unset($_SESSION['id']);$_SESSION['id']="";
		unset($_COOKIE['PHPSESSID']);
}
public function redirect($link){
	header("location:".$link);
}

public function logout(){
	session_unset();
	session_destroy();
	header("location:index.php");
}
//Read Data LAPORAN LAUT
public function readLaporanLaut($id,$tgl){
	try {
		$query = $this->db->prepare("SELECT SUM(`datang`)as DATANG, SUM(`berangkat`)AS BERANGKAT, SUM(`naik`) AS NAIK , SUM(`turun`) as TURUN FROM `dishub_laut`,`dishub_user` WHERE `dishub_laut`.`id_user`=`dishub_user`.`id_user` and `dishub_user`.`id_master`=$id and `dishub_laut`.`tgl_input`='$tgl'");
		$query->execute();/*echo "SELECT SUM(`datang`)as DATANG, SUM(`berangkat`)AS BERANGKAT, SUM(`naik`) AS NAIK , SUM(`turun`) as TURUN FROM `dishub_laut`,`dishub_user` WHERE `dishub_laut`.`id_user`=`dishub_user`.`id_user` and `dishub_user`.`id_master`=$id and `dishub_laut`.`tgl_input`='$tgl'";*/
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}
public function readAllDscLimit2($tabel,$order,$limit1,$limit2){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel ORDER BY $order DESC LIMIT $limit1,$limit2");
		$query->execute();//echo"SELECT * FROM $tabel WHERE `$a`='$aa' ORDER BY $order DESC LIMIT $limit1,$limit2";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}
}

public function readAllWhereDscLimit2($tabel,$a,$aa,$order,$limit1,$limit2){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE `$a`='$aa' ORDER BY $order DESC LIMIT $limit1,$limit2");
		$query->execute();//echo"SELECT * FROM $tabel WHERE `$a`='$aa' ORDER BY $order DESC LIMIT $limit1,$limit2";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}
}




//Read Data
public function readAll($tabel){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel");
		$query->execute();//echo"SELECT * FROM $tabel";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}
}
//Select Semua Kolom Dari Tabel order by ASC
public function readAllAsc($tabel,$order){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel ORDER BY $order ASC");
		$query->execute();//echo"SELECT * FROM $tabel ORDER BY $order ASC";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}
}

//Select Semua Kolom Dari Tabel order by DESC
public function readAllDsc($tabel,$order){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel ORDER BY $order DESC");
		$query->execute();
		return $query;//echo"<br>tes swl = SELECT * FROM $tabel ORDER BY $order DESC";
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}
}
public function readAllDscLimitNoId($tabel,$order,$limit,$limit2){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel ORDER BY $order DESC LIMIT $limit,$limit2");
		$query->execute();//echo"SELECT * FROM $tabel ORDER BY $order DESC LIMIT $limit,$limit2";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}
}
//Select Semua Kolom Dari Tabel order by DESC
public function readAllDscLimit($tabel,$order,$kondisi,$id){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE $kondisi='$id' ORDER BY $order DESC LIMIT 5");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}
}

//Select dengan kondisi where 3 ASC
public function readAllWhereAsc3($tabel,$a,$aa,$b,$bb,$c,$cc,$kolom){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE $a='$aa' AND $b='$bb' AND $c='$cc' ORDER BY $kolom ASC");
		$query->execute();//echo"SELECT * FROM $tabel WHERE $a='$aa' AND $b='$bb' AND $c='$cc' ORDER BY $kolom ASC";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}
public function readAllWhereAsc4($tabel,$a,$aa,$b,$bb,$c,$cc,$d,$dd,$kolom){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE $a='$aa' AND $b='$bb' AND $c='$cc' AND $d='$dd' ORDER BY $kolom ASC");
		$query->execute();//echo"SELECT * FROM $tabel WHERE $a='$aa' AND $b='$bb' AND $c='$cc' ORDER BY $kolom ASC";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}
public function readAllWhereDesc4($tabel,$sel,$a,$aa,$b,$bb,$c,$cc,$d,$dd,$kolom){
	try {
		$query = $this->db->prepare("SELECT `$sel` FROM $tabel WHERE $a='$aa' AND $b='$bb' AND $c='$cc' AND $d='$dd' ORDER BY $kolom DESC");
		$query->execute();//echo"SELECT `$sel` FROM $tabel WHERE $a='$aa' AND $b='$bb' AND $c='$cc' AND $d='$dd' ORDER BY $kolom DESC";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}
public function readAllWhereDesc5($tabel,$sel,$a,$aa,$b,$bb,$c,$cc,$d,$dd,$kolom){
	try {
		$query = $this->db->prepare("SELECT `$sel` FROM $tabel WHERE $a='$aa' AND $b='$bb' AND $c='$cc' AND $d='$dd' ORDER BY $kolom DESC");
		$query->execute();//echo"SELECT `$sel` FROM $tabel WHERE $a='$aa' AND $b='$bb' AND $c='$cc' AND $d='$dd' ORDER BY $kolom DESC";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

//Select dengan kondisi where 4 OR
public function readAllWhereOr4($tabel,$a,$aa,$b,$bb,$c,$cc,$d,$dd){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE $a='$aa' OR $b='$bb' OR $c='$cc' OR $d='$dd'");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}
//Select dengan kondisi where 2 OR
public function readAllWhereOr2($tabel,$a,$aa,$b,$bb){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE $a='$aa' OR $b='$bb'");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}



public function readAllWhereDescLimit6($tabel,$a,$aa,$kolom){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE $a='$aa' ORDER BY $kolom DESC LIMIT 6");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}		
}

//Select dengan kondisi SUM where 3 ASC
public function readAllSum6Where3Asc($tabel,$sumA,$sumAA,$sumB,$sumBB,$sumC,$sumCC,$sumD,$sumDD,$sumE,$sumEE,$sumF,$sumFF,$a,$aa,$b,$bb,$c,$cc,$kolom){
	try {
		$query = $this->db->prepare("SELECT SUM($sumA) as $sumAA, SUM($sumB) as $sumBB, SUM($sumC) as $sumCC, SUM($sumD) as $sumDD, SUM($sumE) as $sumEE, SUM($sumF) as $sumFF, `$tabel`.* FROM $tabel WHERE $a='$aa' AND $b='$bb' AND $c='$cc' ORDER BY $kolom ASC");
		$query->execute();//echo"<br><br>SELECT SUM($sumA) as $sumAA, SUM($sumB) as $sumBB, SUM($sumC) as $sumCC, SUM($sumD) as $sumDD, SUM($sumE) as $sumEE, SUM($sumF) as $sumFF, `$tabel`.* FROM $tabel WHERE $a='$aa' AND $b='$bb' AND $c='$cc' ORDER BY $kolom ASC";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

//Select dengan kondisi arsip
public function readAllArsip($pengguna,$npwp,$namaWp,$jenisBerkas,$masa,$tahun,$tglArsip){
	try {
		$query = $this->db->prepare("SELECT * FROM `tbl_arsip`,`tbl_jenis_berkas`,`tbl_kardus` WHERE `tbl_arsip`.`id_jenis_berkas`=`tbl_jenis_berkas`.`id_jenis_berkas` AND `tbl_arsip`.`id_kardus`=`tbl_kardus`.`id_kardus` AND `tbl_arsip`.`id_pengguna`='$pengguna' $npwp $namaWp $jenisBerkas $masa $tahun $tglArsip  ORDER BY `tbl_arsip`.`id_arsip` DESC;");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}
//Select dengan kondisi arsip
public function readAllArsipAllOperator($npwp,$namaWp,$jenisBerkas,$masa,$tahun,$tglArsip){
	try {
		$query = $this->db->prepare("SELECT * FROM `tbl_arsip`,`tbl_jenis_berkas`,`tbl_kardus` WHERE `tbl_arsip`.`id_jenis_berkas`=`tbl_jenis_berkas`.`id_jenis_berkas` AND `tbl_arsip`.`id_kardus`=`tbl_kardus`.`id_kardus` $npwp $namaWp $jenisBerkas $masa $tahun $tglArsip ORDER BY `tbl_arsip`.`id_arsip` DESC;");
		$query->execute();//echo"<br>SELECT * FROM `tbl_arsip`,`tbl_jenis_berkas`,`tbl_kardus` WHERE `tbl_arsip`.`id_jenis_berkas`=`tbl_jenis_berkas`.`id_jenis_berkas` AND `tbl_arsip`.`id_kardus`=`tbl_kardus`.`id_kardus` $npwp $namaWp $jenisBerkas $masa $tahun $tglArsip ORDER BY `tbl_arsip`.`id_arsip` DESC;";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}


//Select dengan kondisi arsip where
public function readAllArsipWhere($id){
	try {
		$query = $this->db->prepare("SELECT * FROM `tbl_arsip`,`tbl_jenis_berkas`,`tbl_kardus` WHERE  `tbl_arsip`.`id_jenis_berkas`=`tbl_jenis_berkas`.`id_jenis_berkas` AND `tbl_arsip`.`id_kardus`=`tbl_kardus`.`id_kardus`  AND `tbl_arsip`.`id_arsip`='$id' ");
		$query->execute();//echo"SELECT * FROM `tbl_arsip`,`tbl_jenis_berkas`,`tbl_kardus` WHERE  `tbl_arsip`.`id_jenis_berkas`=`tbl_jenis_berkas`.`id_jenis_berkas` AND `tbl_arsip`.`id_kardus`=`tbl_kardus`.`id_kardus`  AND `tbl_arsip`.`id_arsip`='$id' ";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

//Select dengan kondisi SUM where 3 ASC
public function readAllSum6Where4Asc($tabel,$sumA,$sumAA,$sumB,$sumBB,$sumC,$sumCC,$sumD,$sumDD,$sumE,$sumEE,$sumF,$sumFF,$a,$aa,$b,$bb,$c,$cc,$d,$dd,$kolom){
	try {
		$query = $this->db->prepare("SELECT SUM($sumA) as $sumAA, SUM($sumB) as $sumBB, SUM($sumC) as $sumCC, SUM($sumD) as $sumDD, SUM($sumE) as $sumEE, SUM($sumF) as $sumFF, `$tabel`.* FROM $tabel WHERE $a='$aa' AND $b='$bb' AND $c='$cc' AND $d='$dd' ORDER BY $kolom ASC");
		$query->execute();//echo"SELECT SUM($sumA) as $sumAA, SUM($sumB) as $sumBB, SUM($sumC) as $sumCC, SUM($sumD) as $sumDD, SUM($sumE) as $sumEE, SUM($sumF) as $sumFF, `$tabel`.* FROM $tabel WHERE $a='$aa' AND $b='$bb' AND $c='$cc' AND $d='$dd' ORDER BY $kolom ASC";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

//Select dengan kondisi SUM where 3 ASC
public function readAllSum6Where4Desc($tabel,$sumA,$sumAA,$sumB,$sumBB,$sumC,$sumCC,$sumD,$sumDD,$sumE,$sumEE,$sumF,$sumFF,$a,$aa,$b,$bb,$c,$cc,$d,$dd,$kolom){
	try {
		$query = $this->db->prepare("SELECT SUM($sumA) as $sumAA, SUM($sumB) as $sumBB, SUM($sumC) as $sumCC, SUM($sumD) as $sumDD, SUM($sumE) as $sumEE, SUM($sumF) as $sumFF, `$tabel`.* FROM $tabel WHERE $a='$aa' AND $b='$bb' AND $c='$cc' AND $d='$dd' ORDER BY $kolom DESC");
		$query->execute();//echo"SELECT SUM($sumA) as $sumAA, SUM($sumB) as $sumBB, SUM($sumC) as $sumCC, SUM($sumD) as $sumDD, SUM($sumE) as $sumEE, SUM($sumF) as $sumFF, `$tabel`.* FROM $tabel WHERE $a='$aa' AND $b='$bb' AND $c='$cc' AND $d='$dd' ORDER BY $kolom ASC";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}


//Select dengan kondisi where 1 ASC
public function readAllWhereAsc1($tabel,$a,$aa,$kolom){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE $a='$aa'  ORDER BY $kolom ASC");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

public function readAllWhereAscLimit($tabel,$a,$aa,$kolom){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE $a='$aa'  ORDER BY $kolom ASC LIMIT 1000");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}


//Select dengan kondisi where 2 ASC
public function readAllWhereAsc2($tabel,$a,$aa,$b,$bb,$kolom){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE $a='$aa'  AND $b='$bb'  ORDER BY $kolom ASC");
		$query->execute();//echo"SELECT * FROM $tabel WHERE $a='$aa'  AND $b='$bb'  ORDER BY $kolom ASC";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

public function readAllWhereDesc2($tabel,$a,$aa,$b,$bb,$kolom){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE $a='$aa'  AND $b='$bb'  ORDER BY $kolom DESC");
		$query->execute();//echo"SELECT * FROM $tabel WHERE $a='$aa'  AND $b='$bb'  ORDER BY $kolom ASC";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}
public function readAllWhereDesc3($tabel,$a,$aa,$b,$bb,$c,$cc,$kolom){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE $a='$aa'  AND $b='$bb' and $c='$cc' ORDER BY $kolom DESC");
		$query->execute();//echo"SELECT * FROM $tabel WHERE $a='$aa'  AND $b='$bb' and $c='$cc' ORDER BY $kolom DESC";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}
//Select dengan kondisi sum where 2
public function readAllSum2Where4($tabel,$sA,$sAA,$sB,$sBB,$a,$aa,$b,$bb,$c,$cc,$d,$dd){
	try {
		$query = $this->db->prepare("SELECT SUM($sA) AS $sAA, SUM($sB) AS $sBB, `$tabel`.* FROM $tabel WHERE $a='$aa'  AND $b='$bb'  AND $c='$cc'  AND $d='$dd' ");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}


//count sederhana 
public function countAll($tabel){
	try {
		$query = $this->db->prepare("SELECT COUNT(*) as jumlah FROM $tabel");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}
public function countAllDistinct($tabel,$count){
	try {
		$query = $this->db->prepare("SELECT distinct(COUNT($count)) as TOTAL_RECORD FROM $tabel");
		$query->execute();//echo"SELECT distinct(COUNT($count)) as TOTAL_RECORD FROM $tabel";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

//Select dengan count hitung record
public function readAllCountWhere($tabel,$kolomcount,$kolom,$id){
	try {
		$query = $this->db->prepare("SELECT COUNT($kolomcount) AS TOTAL_RECORD FROM $tabel WHERE $kolom = '$id'");
		$query->execute();//echo"SELECT COUNT($kolomcount) AS TOTAL_RECORD FROM $tabel WHERE $kolom = '$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}
//Select dengan count hitung record
public function readAllCountWhere2($tabel,$kolomcount,$kolom,$id,$kolom2,$id2){
	try {
		$query = $this->db->prepare("SELECT COUNT($kolomcount) AS TOTAL_RECORD FROM $tabel WHERE $kolom = '$id' and $kolom2 = '$id2'" );
		$query->execute();//echo"SELECT COUNT($kolomcount) AS TOTAL_RECORD FROM $tabel WHERE $kolom = '$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}
public function readAllCount($tabel,$kolomcount){
	try {
		$query = $this->db->prepare("SELECT COUNT($kolomcount) AS TOTAL_RECORD FROM $tabel");
		$query->execute();//echo"SELECT COUNT($kolomcount) AS TOTAL_RECORD FROM $tabel WHERE $kolom = '$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}
//Select dengan count hitung record
public function readAllCountWhereBetween($tabel,$kolomcount,$kolom,$id,$between,$start,$end){
	try {
		$query = $this->db->prepare("SELECT COUNT($kolomcount) AS TOTAL_RECORD FROM $tabel WHERE $kolom = '$id' and $between BETWEEN '$start' and '$end'");
		$query->execute();//echo"SELECT COUNT($kolomcount) AS TOTAL_RECORD FROM $tabel WHERE $kolom = '$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}
public function readAllCountBetween($tabel,$kolomcount,$between,$start,$end){
	try {
		$query = $this->db->prepare("SELECT COUNT($kolomcount) AS TOTAL_RECORD FROM $tabel WHERE  $between BETWEEN '$start' and '$end'");
		$query->execute();//echo"SELECT COUNT($kolomcount) AS TOTAL_RECORD FROM $tabel WHERE $kolom = '$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}
public function readAllCountTableWhereBetweenLimit($tabel,$tabel2,$kolomcount,$kolom,$Ta,$a,$aa,$Tbetween,$between,$start,$end,$Torder,$order,$desc,$limit1,$limit2){
	try {
		$query = $this->db->prepare("SELECT COUNT($kolomcount) AS TOTAL_RECORD FROM $tabel,$tabel2 WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` and  `$Ta`.`$a`='$aa' and `$Tbetween`.`$between` BETWEEN '$start' and '$end' ORDER BY `$Torder`.`$order` $desc LIMIT $limit1,$limit2");
		$query->execute();//echo"SELECT COUNT($kolomcount) AS TOTAL_RECORD FROM $tabel WHERE $kolom = '$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}
public function readAllCountTableWhereBetween($tabel,$tabel2,$kolomcount,$kolom,$Ta,$a,$aa,$Tbetween,$between,$start,$end){
	try {
		$query = $this->db->prepare("SELECT COUNT($kolomcount) AS TOTAL_RECORD FROM $tabel,$tabel2 WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` and  `$Ta`.`$a`='$aa' and `$Tbetween`.`$between` BETWEEN '$start' and '$end'");
		$query->execute();//echo"SELECT COUNT($kolomcount) AS TOTAL_RECORD FROM $tabel,$tabel2 WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` and  `$Ta`.`$a`='$aa' and `$Tbetween`.`$between` BETWEEN '$start' and '$end'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

//Select dengan count hitung record
public function readAllTabel2CountWhere($tabel,$tabel2,$kolomcount,$Ta){
	try {
		$query = $this->db->prepare("SELECT COUNT($kolomcount) AS TOTAL_RECORD FROM $tabel,$tabel2 WHERE `$tabel`.`$Ta`=`$tabel2`.`$Ta` ");
		$query->execute();echo"SELECT COUNT($kolomcount) AS TOTAL_RECORD FROM $tabel,$tabel2 WHERE `$tabel`.`$Ta`=`$tabel2`.`$Ta` ";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

//Select dengan count hitung record UNTK MENENTUKAN RECORD USER
public function readAllCountWhereUser($tabel,$kolomcount,$kolom,$like){
	try {
		$query = $this->db->prepare("SELECT COUNT($kolomcount) AS TOTAL_RECORD FROM $tabel WHERE $kolom LIKE '$like%'");
		$query->execute();//echo"SELECT COUNT($kolomcount) AS TOTAL_RECORD FROM $tabel WHERE $kolom LIKE '$like%'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

//Select dengan count hitung record UNTK MENENTUKAN RECORD USER
public function readAllCountWhereUser2($tabel,$kolomcount,$kolom,$id,$kolom2,$id2){
	try {
		$query = $this->db->prepare("SELECT COUNT($kolomcount) AS TOTAL_RECORD FROM $tabel WHERE `$kolom` ='$id' AND `$kolom2`='$id2'");
		$query->execute();//echo"SELECT COUNT($kolomcount) AS TOTAL_RECORD FROM $tabel WHERE `$kolom` ='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}


//Select dengan count hitung record UNTK MENENTUKAN RECORD USER
public function readAllWhereLikeDsc($tabel,$kolom,$like){
	try {
		$query = $this->db->prepare("SELECT $kolom FROM $tabel WHERE $kolom LIKE '$like%'  ORDER BY `$kolom` DESC");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

public function searchBuku($kunci,$a,$b){
	try {
		$query = $this->db->prepare("SELECT * FROM `tbl_buku` WHERE `judul_buku`  LIKE '%$kunci%' OR `pengarang` LIKE '%$kunci%' OR `tahun_terbit` LIKE '%$kunci%' or `penerbit` LIKE '%$kunci%' or `kota` LIKE '%$kunci%' or `rak_buku` LIKE '%$kunci%' or `stok_buku` LIKE '%$kunci%'  or `keterangan` LIKE '%$kunci%'    ORDER BY `id_buku` DESC LIMIT $a,$b");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}
public function searchMember($kunci,$a,$b){
	try {
		$query = $this->db->prepare("SELECT * FROM `tbl_member`,`tbl_peminjaman` WHERE `tbl_member`.`id_member`=`tbl_peminjaman`.`id_member` and `tbl_member`.`kode_member`  LIKE '%$kunci%' OR `tbl_member`.`nama` LIKE '%$kunci%' OR `tbl_member`.`jenis_member` LIKE '%$kunci%'    ORDER BY `tbl_member`.`id_member` DESC LIMIT $a,$b");
		$query->execute();//echo"SELECT * FROM `tbl_member`,`tbl_peminjaman` WHERE `tbl_member`.`id_member`=`tbl_peminjaman`.`id_member` and `tbl_member`.`kode_member`  LIKE '%$kunci%' OR `tbl_member`.`nama` LIKE '%$kunci%' OR `tbl_member`.`jenis_member` LIKE '%$kunci%'    ORDER BY `tbl_member`.`id_member` DESC LIMIT $a,$b";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}
public function searchCalonMember($kunci,$a,$b){
	try {
		$query = $this->db->prepare("SELECT * FROM `tbl_member` WHERE  `tbl_member`.`kode_member`  LIKE '%$kunci%' OR `tbl_member`.`nama` LIKE '%$kunci%' OR `tbl_member`.`jenis_member` LIKE '%$kunci%' and   `tbl_member`.`status`='Calon Anggota'  ORDER BY `tbl_member`.`id_member` DESC LIMIT $a,$b");
		$query->execute();//echo"SELECT * FROM `tbl_member` WHERE  `tbl_member`.`kode_member`  LIKE '%$kunci%' OR `tbl_member`.`nama` LIKE '%$kunci%' OR `tbl_member`.`jenis_member` LIKE '%$kunci%' and   `tbl_member`.`status`='Calon Anggota'  ORDER BY `tbl_member`.`id_member` DESC LIMIT $a,$b";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}
public function searchMember2($kunci,$a,$b){
	try {
		$query = $this->db->prepare("SELECT * FROM `tbl_member` WHERE  `tbl_member`.`kode_member`  LIKE '%$kunci%' OR `tbl_member`.`nama` LIKE '%$kunci%' OR `tbl_member`.`jenis_member` LIKE '%$kunci%' and   `tbl_member`.`status`='Calon Anggota'  ORDER BY `tbl_member`.`id_member` DESC LIMIT $a,$b");
		$query->execute();//echo"SELECT * FROM `tbl_member` WHERE  `tbl_member`.`kode_member`  LIKE '%$kunci%' OR `tbl_member`.`nama` LIKE '%$kunci%' OR `tbl_member`.`jenis_member` LIKE '%$kunci%' and   `tbl_member`.`status`='Calon Anggota'  ORDER BY `tbl_member`.`id_member` DESC LIMIT $a,$b";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

public function searchPeserta3($where,$a,$b){
	try {$where = str_replace("^"," ",$where);
		$query = $this->db->prepare("SELECT * FROM `tbl_peserta` $where  LIMIT $a,$b");
		$query->execute();//echo"SELECT * FROM `tbl_peserta`$where  LIMIT $a,$b";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}


//Select dengan kondisi where
public function readAllBy($tabel,$kolom,$id){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE $kolom=:id limit 0,1");
		$query->execute(array(":id"=>$id));//echo"SELECT * FROM $tabel WHERE $kolom=$id limit 0,1";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

public function readAllByLike($tabel,$kolom,$id){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE $kolom like '$id%' ");
		$query->execute();//echo"SELECT * FROM $tabel WHERE $kolom like '$id%' ";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}
public function readAllByLimit($tabel,$kolom,$id,$L1,$L2){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE $kolom=:id limit $L1,$L2");
		$query->execute(array(":id"=>$id));//echo"SELECT * FROM $tabel WHERE $kolom=:id limit $L1,$L2";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}
public function readAllByDescLimit($tabel,$kolom,$id,$desc,$L1,$L2){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE $kolom=:id limit ORDER BY $desc DESC $L1,$L2");
		$query->execute(array(":id"=>$id));//echo"SELECT * FROM $tabel WHERE $kolom=:id limit ORDER BY $desc DESC $L1,$L2";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

public function readAllByNolimit($tabel,$kolom,$id){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE $kolom=:id");
		$query->execute(array(":id"=>$id));
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

public function readAllByDesc($tabel,$kolom,$id,$order){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE $kolom=:id  ORDER BY $order DESC");
		$query->execute(array(":id"=>$id));
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}


//Select dengan DISCTINT YEAR
public function readAllDisctintYearDesc($tabel,$kolom){
	try {
		$query = $this->db->prepare("SELECT DISTINCT YEAR(`$kolom`) AS tahun FROM `$tabel` ORDER BY `$kolom` DESC ");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

public function readAllDisctintWhereDesc($tabel,$kolom,$a,$aa){
	try {
		$query = $this->db->prepare("SELECT DISTINCT `$kolom` FROM `$tabel` WHERE `$a` LIKE '$aa%' ORDER BY `$kolom` DESC ");
		$query->execute();//echo"SELECT DISTINCT `$kolom` FROM `$tabel` WHERE `$a` LIKE '$aa%' ORDER BY `$kolom` DESC ";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

public function readAllDisctint2Asc($tabel,$a,$b,$asc){
	try {
		$query = $this->db->prepare("SELECT DISTINCT `$a`,`$b` FROM `$tabel` ORDER BY `$asc` ASC ");
		$query->execute();//echo"SELECT DISTINCT `$a`,`$b` FROM `$tabel` ORDER BY `$asc` ASC ";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}
public function readAllDisctintAsc($tabel,$a,$asc){
	try {
		$query = $this->db->prepare("SELECT DISTINCT `$a` FROM `$tabel` ORDER BY `$asc` ASC ");
		$query->execute();//echo"SELECT DISTINCT `$a` FROM `$tabel` ORDER BY `$asc` ASC ";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

public function readAllDisctintDesc($tabel,$a,$desc){
	try {
		$query = $this->db->prepare("SELECT DISTINCT `$a` FROM `$tabel` ORDER BY `$desc` DESC ");
		$query->execute();//echo"SELECT DISTINCT `$a` FROM `$tabel` ORDER BY `$desc` DESC";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

public function readAllDisctintWhereAsc($tabel,$a,$b,$bb,$asc){
	try {
		$query = $this->db->prepare("SELECT DISTINCT `$a` FROM `$tabel` WHERE `$b`='$bb' ORDER BY `$asc` ASC ");
		$query->execute();//echo"SELECT DISTINCT `$a`,`$b` FROM `$tabel` ORDER BY `$asc` ASC ";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}
public function readAllDisctintWhere2Asc($tabel,$a,$b,$bb,$c,$cc,$asc){
	try {
		$query = $this->db->prepare("SELECT DISTINCT `$a` FROM `$tabel` WHERE `$b`='$bb' AND `$c`='$cc' ORDER BY `$asc` ASC ");
		$query->execute();//echo"SELECT DISTINCT `$a`,`$b` FROM `$tabel` ORDER BY `$asc` ASC ";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}



//Select dengan kondisi DISTINCT where BETWEEN ASC ANTARA 2 TANGGAL
public function readAllByDistinctBetweenAsc($tabel,$a,$kolom,$id,$range1,$range2,$between,$asc){
	try {
		$query = $this->db->prepare("SELECT DISTINCT `$a`,* FROM $tabel WHERE ($between BETWEEN '$range1' AND '$range2') AND $kolom=:id ORDER BY $asc ASC");
		$query->execute(array(":id"=>$id));
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

//Select dengan kondisi DISTINCT  BETWEEN ASC ANTARA 2 TANGGAL
public function readAllByDistinctBetweenAsc2($tabel,$a,$range1,$range2,$between,$asc){
	try {
		$query = $this->db->prepare("SELECT DISTINCT `$a` FROM $tabel WHERE ($between BETWEEN '$range1' AND '$range2')  ORDER BY $asc ASC");
		$query->execute(); //echo"SELECT DISTINCT `$a` FROM $tabel WHERE ($between BETWEEN '$range1' AND '$range2')  ORDER BY $asc ASC";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

//Select dengan kondisi DISTINCT  BETWEEN ASC ANTARA 2 TANGGAL
public function readAllByDistinctBetweenDesc2($tabel,$a,$range1,$range2,$between,$desc){
	try {
		$query = $this->db->prepare("SELECT DISTINCT `$a` FROM $tabel WHERE ($between BETWEEN '$range1' AND '$range2')  ORDER BY $desc DESC");
		$query->execute(); //echo"SELECT DISTINCT `$a` FROM $tabel WHERE ($between BETWEEN '$range1' AND '$range2')  ORDER BY $asc ASC";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}




//Select dengan kondisi where BETWEEN ANTARA 2 TANGGAL
public function readAllByBetween($tabel,$kolom,$id,$between,$range1,$range2){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE ($between BETWEEN '$range1' AND '$range2') AND $kolom=:id");
		$query->execute(array(":id"=>$id));
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

//Select dengan kondisi where BETWEEN ANTARA 2 TANGGAL
public function readAllByBetween2($tabel,$kolom,$id,$range1,$range2,$a,$aa,$between){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE ($between BETWEEN '$range1' AND '$range2') AND $a='$aa' and $kolom=:id");
		$query->execute(array(":id"=>$id)); 
		
		
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}


//Select dengan kondisi where BETWEEN ANTARA 2 TANGGAL ORDER BY DESC
public function readAllByBetweenDesc($tabel,$kolom,$id,$range1,$range2,$between,$order){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE ($between BETWEEN '$range1' AND '$range2') AND $kolom=:id ORDER BY $order DESC");
		$query->execute(array(":id"=>$id));
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

//Select dengan kondisi where BETWEEN ANTARA 2 TANGGAL ORDER BY ASC
public function readAllByBetweenAsc($tabel,$kolom,$id,$range1,$range2,$between,$order){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE ($between BETWEEN '$range1' AND '$range2') AND $kolom=:id ORDER BY $order ASC");
		$query->execute(array(":id"=>$id));
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

//Select dengan kondisi SUM 1 BETWEEN ANTARA 2 TANGGAL ORDER BY ASC
public function readAllByBetweenSum1Asc($tabel,$sum1,$kolom,$id,$range1,$range2,$between,$order){
	try {
		$query = $this->db->prepare("SELECT SUM($sum1) as $sum1 FROM $tabel WHERE ($between BETWEEN '$range1' AND '$range2') AND $kolom=:id ORDER BY $order ASC");
		$query->execute(array(":id"=>$id));
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}


//Select dengan kondisi SUM 1 BETWEEN ANTARA 2 TANGGAL ORDER BY ASC
public function readAllByBetweenSumWhereAsc($tabel,$sum1,$between,$range1,$range2,$a,$aa,$order){
	try {
		$query = $this->db->prepare("SELECT SUM($sum1) as $sum1 FROM $tabel WHERE ($between BETWEEN '$range1' AND '$range2') AND `$a`='$aa'  ORDER BY $order ASC");
		$query->execute(array());/*echo"<br>SELECT SUM($sum1) as $sum1 FROM $tabel WHERE ($between BETWEEN '$range1' AND '$range2') AND `$a`='$aa'  ORDER BY $order ASC";*/
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

//Select dengan kondisi SUM 1
public function readAllSumWhere($tabel,$sum,$a,$aa){
	try {
		$query = $this->db->prepare("SELECT SUM($sum) as $sum FROM $tabel WHERE `$a` LIKE '$aa%' ");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

//Select dengan kondisi SUM Where
public function readAllSumWhere1($tabel,$sum,$a,$aa){
	try {
		$query = $this->db->prepare("SELECT SUM($sum) as $sum FROM $tabel WHERE `$a`='$aa' ");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

//Select dengan kondisi SUM 2
public function readAllSumWhereLike($tabel,$sum,$a,$aa,$like,$like2){
	try {
		$query = $this->db->prepare("SELECT SUM($sum) as $sum FROM $tabel WHERE `$a`='$aa' AND `$like` LIKE '$like2%' ");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

//Select dengan kondisi SUM 2 BETWEEN ANTARA 2 TANGGAL ORDER BY ASC
public function readAllByBetweenSum2Asc($tabel,$sum1,$sum2,$kolom,$id,$range1,$range2,$between,$order){
	try {
		$query = $this->db->prepare("SELECT SUM($sum1) as $sum1, SUM($sum2) as $sum2 FROM $tabel WHERE ($between BETWEEN '$range1' AND '$range2') AND $kolom=:id ORDER BY $order ASC");
		$query->execute(array(":id"=>$id));
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

//Select dengan kondisi SUM 2 where ORDER BY ASC
public function readAllBySum2Where1Asc($tabel,$sum1,$sum2,$kolom,$id,$order){
	try {
		$query = $this->db->prepare("SELECT SUM($sum1) as $sum1, SUM($sum2) as $sum2 FROM $tabel WHERE $kolom=:id ORDER BY $order ASC");
		$query->execute(array(":id"=>$id));//echo"SELECT SUM($sum1) as $sum1, SUM($sum2) as $sum2 FROM $tabel WHERE $kolom='$id' ORDER BY $order ASC";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

//Select dengan kondisi SUM 3 BETWEEN ANTARA 2 TANGGAL ORDER BY ASC
public function readAllByBetweenSum3Asc($tabel,$sum1,$sum2,$sum3,$kolom,$id,$range1,$range2,$between,$order){
	try {
		$query = $this->db->prepare("SELECT SUM($sum1) as $sum1, SUM($sum2) as $sum2,SUM($sum3) as $sum3 FROM $tabel WHERE ($between BETWEEN '$range1' AND '$range2') AND $kolom=:id ORDER BY $order ASC");
		$query->execute(array(":id"=>$id));
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

//Select dengan kondisi SUM 4 BETWEEN ANTARA 2 TANGGAL ORDER BY ASC
public function readAllByBetweenSum4Asc($tabel,$sum1,$sum2,$sum3,$sum4,$kolom,$id,$range1,$range2,$between,$order){
	try {
		$query = $this->db->prepare("SELECT SUM($sum1) as $sum1, SUM($sum2) as $sum2,SUM($sum3) as $sum3,SUM($sum4) as $sum4 FROM $tabel WHERE ($between BETWEEN '$range1' AND '$range2') AND $kolom=':id' ORDER BY $order ASC");
		$query->execute(array(":id"=>$id));
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

//Select dengan kondisi SUM 4 BETWEEN ANTARA 2 TANGGAL ORDER BY ASC
public function readAllBySum11where2YearAsc($tabel,$sum1,$sum2,$sum3,$sum4,$sum5,$sum6,$sum7,$sum8,$sum9,$sum10,$sum11,$a,$aa,$b,$bb,$order){
	try {
		$query = $this->db->prepare("SELECT SUM($sum1) as $sum1, SUM($sum2) as $sum2,SUM($sum3) as $sum3,SUM($sum4) as $sum4,SUM($sum5) as $sum5,SUM($sum6) as $sum6,SUM($sum7) as $sum7,SUM($sum8) as $sum8,SUM($sum9) as $sum9,SUM($sum10) as $sum10,SUM($sum11) as $sum11 FROM $tabel WHERE $a=':aa' OR $b LIKE '$bb%' ORDER BY $order ASC");
		
		$query->execute(array(":aa"=>$aa));//echo"SELECT SUM($sum1) as $sum1, SUM($sum2) as $sum2,SUM($sum3) as $sum3,SUM($sum4) as $sum4,SUM($sum5) as $sum5,SUM($sum6) as $sum6,SUM($sum7) as $sum7,SUM($sum8) as $sum8,SUM($sum9) as $sum9,SUM($sum10) as $sum10,SUM($sum11) as $sum11 FROM $tabel WHERE $a='$aa' OR $b LIKE '$bb%' ORDER BY $order ASC";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

//Select dengan kondisi SUM 4 BETWEEN ANTARA 2 TANGGAL ORDER BY ASC
public function readAllBySum11where($tabel,$sum1,$sum2,$sum3,$sum4,$sum5,$sum6,$sum7,$sum8,$sum9,$sum10,$sum11,$b,$bb,$order){
	try {
		$query = $this->db->prepare("SELECT `$tabel`.`id_kabupaten` as kabupaten , SUM($sum1) as $sum1, SUM($sum2) as $sum2,SUM($sum3) as $sum3,SUM($sum4) as $sum4,SUM($sum5) as $sum5,SUM($sum6) as $sum6,SUM($sum7) as $sum7,SUM($sum8) as $sum8,SUM($sum9) as $sum9,SUM($sum10) as $sum10,SUM($sum11) as $sum11 FROM $tabel WHERE $b LIKE '$bb%' ORDER BY $order ASC");
	// echo"SELECT SUM($sum1) as $sum1, SUM($sum2) as $sum2,SUM($sum3) as $sum3,SUM($sum4) as $sum4,SUM($sum5) as $sum5,SUM($sum6) as $sum6,SUM($sum7) as $sum7,SUM($sum8) as $sum8,SUM($sum9) as $sum9,SUM($sum10) as $sum10,SUM($sum11) as $sum11 FROM $tabel WHERE $b LIKE '$bb%' ORDER BY $order ASC";
		$query->execute(array(":bb"=>$bb));
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

//Select dengan kondisi SUM 4 BETWEEN ANTARA 2 TANGGAL ORDER BY ASC
public function readAllByWhere2BetweenSum6Asc($tabel,$sum1,$sum2,$sum3,$sum4,$sum5,$sum6,$kolom,$id,$range1,$range2,$where1,$kondisi1,$where2,$kondisi2,$between,$order){
	try {
		$query = $this->db->prepare("SELECT SUM($sum1) as $sum1, SUM($sum2) as $sum2,SUM($sum3) as $sum3,SUM($sum4) as $sum4,SUM($sum5) as $sum5,SUM($sum6) as $sum6 FROM $tabel WHERE $where1='$kondisi1' AND $where2='$kondisi2' AND ($between BETWEEN '$range1' AND '$range2') AND $kolom=:id ORDER BY $order ASC");
		$query->execute(array(":id"=>$id));
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}


//Select dengan kondisi where iner join atau pencarian penggabungan 2 tabel
public function readAllTabel2($tabel,$tabel2,$kolom){
	try {
		$query = $this->db->prepare("SELECT * FROM `$tabel`,`$tabel2` WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` ");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}



//Select dengan kondisi where iner join atau pencarian penggabungan 2 tabel
public function readAllTabel2Desc($tabel,$tabel2,$kolom,$desc){
	try {
		$query = $this->db->prepare("SELECT * FROM `$tabel`,`$tabel2` WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` ORDER BY $desc DESC");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}
public function readAllTabel2DescLimit($tabel,$tabel2,$kolom,$desc,$limit1,$limit2){
	try {
		$query = $this->db->prepare("SELECT * FROM `$tabel`,`$tabel2` WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` ORDER BY $desc DESC LIMIT $limit1,$limit2");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}
public function readAllTabel2WhereDescLimit($tabel,$tabel2,$kolom,$a,$aa,$desc,$limit1,$limit2){
	try {
		$query = $this->db->prepare("SELECT * FROM `$tabel`,`$tabel2` WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` and `$tabel`.`$a`='$aa' ORDER BY $desc DESC LIMIT $limit1,$limit2");
		$query->execute();//echo"SELECT * FROM `$tabel`,`$tabel2` WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` and `$tabel`.`$a`='$aa' ORDER BY $desc DESC LIMIT $limit1,$limit2";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

//Select dengan kondisi where iner join atau pencarian penggabungan 2 tabel
public function readAllTabel3Desc($tabel,$tabel2,$tabel3,$kolom,$kolom2,$desc){
	try {
		$query = $this->db->prepare("SELECT * FROM `$tabel`,`$tabel2`,`$tabel3` WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` and `$tabel2`.`$kolom2`=`$tabel3`.`$kolom2`  ORDER BY `$tabel`.`$desc` DESC");//echo"SELECT * FROM `$tabel`,`$tabel2` WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` and `$tabel2`.`$kolom2`=`$tabel3`.`$kolom2`  ORDER BY `$tabel`.`$desc` DESC";
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

//Select dengan kondisi where iner join atau pencarian penggabungan 2 tabel
public function readAllTabel3WhereDesc($tabel,$tabel2,$tabel3,$kolom,$kolom2,$a,$aa,$desc){
	try {
		$query = $this->db->prepare("SELECT * FROM `$tabel`,`$tabel2`,`$tabel3` WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` and `$tabel2`.`$kolom2`=`$tabel3`.`$kolom2` AND `$tabel`.`$a`='$aa' ORDER BY `$desc` DESC");
		//echo"SELECT * FROM `$tabel`,`$tabel2`,`$tabel3` WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` and `$tabel2`.`$kolom2`=`$tabel3`.`$kolom2` AND `$tabel`.`$a`='$aa' ORDER BY `$desc` DESC";
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

public function readAllTabel3Where2Desc($tabel,$tabel2,$tabel3,$kolom,$kolom2,$a,$aa,$b,$bb,$desc){
	try {
		$query = $this->db->prepare("SELECT * FROM `$tabel`,`$tabel2`,`$tabel3` WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` and `$tabel2`.`$kolom2`=`$tabel3`.`$kolom2` AND `$tabel`.`$a`='$aa' AND `$tabel`.`$b`='$bb' ORDER BY `$desc` DESC");
		///echo"SELECT * FROM `$tabel`,`$tabel2`,`$tabel3` WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` and `$tabel2`.`$kolom2`=`$tabel3`.`$kolom2` AND `$tabel`.`$a`='$aa' AND `$tabel`.`$b`='$bb' ORDER BY `$desc` DESC";
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}



//Select dengan kondisi where iner join atau pencarian penggabungan 2 tabel
public function readAllTabel4Desc($tabel,$tabel2,$tabel3,$tabel4,$kolom,$kolom2,$kolom3,$desc){
	try {
		$query = $this->db->prepare("SELECT * FROM `$tabel`,`$tabel2`,`$tabel3`,`$tabel4` WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` and `$tabel2`.`$kolom2`=`$tabel3`.`$kolom2`   and `$tabel`.`$kolom3`=`$tabel4`.`$kolom3` ORDER BY `$tabel`.`$desc` DESC");
		
		//echo"SELECT * FROM `$tabel`,`$tabel2`,`$tabel3`,`$tabel4` WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` and `$tabel2`.`$kolom2`=`$tabel3`.`$kolom2`   and `$tabel`.`$kolom3`=`$tabel4`.`$kolom3` ORDER BY `$tabel`.`$desc` DESC";
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

public function readAllTabel4WhereDesc($tabel,$tabel2,$tabel3,$tabel4,$kolom,$kolom2,$kolom3,$a,$aa,$desc){
	try {
		$query = $this->db->prepare("SELECT * FROM `$tabel`,`$tabel2`,`$tabel3`,`$tabel4` WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` and `$tabel2`.`$kolom2`=`$tabel3`.`$kolom2`   and `$tabel`.`$kolom3`=`$tabel4`.`$kolom3` and $a='$aa' ORDER BY `$tabel4`.`$desc` DESC");
		
		//echo"SELECT * FROM `$tabel`,`$tabel2`,`$tabel3`,`$tabel4` WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` and `$tabel2`.`$kolom2`=`$tabel3`.`$kolom2`   and `$tabel`.`$kolom3`=`$tabel4`.`$kolom3` and $a='$aa' ORDER BY `$tabel4`.`$desc` DESC";
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

public function readAllTabel3Where3Asc($tabel,$tabel2,$tabel3,$kolom,$kolom2,$kolom3,$a,$aa,$b,$bb,$desc){
	try {
		$query = $this->db->prepare("SELECT * FROM `$tabel`,`$tabel2`,`$tabel3` WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` and `$tabel2`.`$kolom2`=`$tabel3`.`$kolom2`    and `$tabel`.`$a`='$aa' and `$tabel`.`$b`='$bb' ORDER BY `$tabel`.`$desc` ASC");
		
	//echo"SELECT * FROM `$tabel`,`$tabel2`,`$tabel3` WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` and `$tabel2`.`$kolom2`=`$tabel3`.`$kolom2`    and $a='$aa' and `$tabel`.`$b`='$bb' ORDER BY `$tabel`.`$desc` ASC";
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}


//Select dengan kondisi where iner join atau pencarian penggabungan 2 tabel
public function readAllTabel2NotDesc($tabel,$tabel2,$kolom,$desc){
	try {
		$query = $this->db->prepare("SELECT * FROM `$tabel`,`$tabel2` WHERE `$tabel`.`$kolom`!=`$tabel2`.`$kolom` ORDER BY $desc DESC ");
		$query->execute();//echo"SELECT * FROM `$tabel`,`$tabel2` WHERE `$tabel`.`$kolom`!=`$tabel2`.`$kolom` ORDER BY $desc DESC ";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}



//Select dengan kondisi where iner join atau pencarian penggabungan 2 tabel
public function readAllTabel2WhereAsc($tabel,$tabel2,$kolom,$a,$aa,$asc){
	try {
		$query = $this->db->prepare("SELECT * FROM `$tabel`,`$tabel2` WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` AND `$tabel`.`$a`='$aa' ORDER BY $asc ASC");
		$query->execute();//echo"SELECT * FROM `$tabel`,`$tabel2` WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` AND `$tabel`.`$a`='$aa' ORDER BY $asc ASC";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

public function readAllTabel2Where2($tabel,$tabel2,$kolom,$a,$aa){
	try {
		$query = $this->db->prepare("SELECT * FROM `$tabel`,`$tabel2` WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` AND `$tabel`.`$a`='$aa'");
		$query->execute();/*echo"SELECT * FROM `$tabel`,`$tabel2` WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` AND `$tabel`.`$a`='$aa'";*/
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

public function readAllTabel2Where3($tabel,$tabel2,$kolom,$a,$aa,$b,$bb,$c,$cc){
	try {
		$query = $this->db->prepare("SELECT * FROM `$tabel`,`$tabel2` WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` AND `$tabel`.`$a`='$aa' AND `$b`='$bb' AND `$c`='$cc'");
		$query->execute();//echo"<br><br>SELECT * FROM `$tabel`,`$tabel2` WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` AND `$tabel`.`$a`='$aa' AND `$b`='$bb' AND `$c`='$cc'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}


//Select dengan kondisi where iner join atau pencarian penggabungan 2 tabel where 4
public function readAllTabel2Where4($tabel,$tabel2,$kolom,$tA,$a,$aa,$tB,$b,$bb,$tC,$c,$cc){
	try {
		$query = $this->db->prepare("SELECT * FROM `$tabel`,`$tabel2` WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` AND `$tA`.`$a`='$aa' AND `$tB`.`$b`='$bb' AND `$tC`.`$c`='$cc'");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

//Select dengan kondisi where iner join atau pencarian penggabungan 2 tabel where 4
public function readAllTabel2Where4Like($tabel,$tabel2,$kolom,$tA,$a,$aa,$tB,$b,$bb,$tC,$c,$cc){
	try {
		$query = $this->db->prepare("SELECT * FROM `$tabel`,`$tabel2` WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` AND `$tA`.`$a`='$aa' AND `$tB`.`$b`='$bb' AND `$tC`.`$c` like '%$cc%'");
		$query->execute();//echo"SELECT * FROM `$tabel`,`$tabel2` WHERE `$tabel`.`$kolom`=`$tabel2`.`$kolom` AND `$tA`.`$a`='$aa' AND `$tB`.`$b`='$bb' AND `$tC`.`$c` like '%$cc%';";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}




public function sumPenumpang($tabel,$kolom){
	try {
		$query = $this->db->prepare("SELECT SUM($kolom) as $kolom FROM $tabel");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}
}

public function sumPenumpangByKab($tabel,$kolom,$kondisi){
	try {
		$query = $this->db->prepare("SELECT SUM($kolom) as $kolom FROM $tabel WHERE id_kabupaten='$kondisi'");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}
}
//Pakai LIKE
public function readAllLike($tabel,$kondisi1,$kondisi2,$kondisi3,$clue1,$clue2,$clue3){
	try {
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE $kondisi1 LIKE '%$clue1%' OR $kondisi2 LIKE '%$clue2%' OR $kondisi3 LIKE '%$clue3%' AND status='Y'");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

//Insert Data
public function insert2kolom($tabel,$a){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a')");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//Insert Data
public function insert2kolomNotNull($tabel,$a,$b){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES('$a','$b')");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}


//3 kolom 
public function insert3kolom($tabel,$a,$b){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b')");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//4 kolom
public function insert4kolom($tabel,$a,$b,$c){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c')");
		$query->execute();//echo"INSERT INTO $tabel VALUES(null,'$a','$b','$c')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}

//5 kolom
public function insert1($tabel,$a,$b,$c,$d){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d')");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}

public function insert1_1($tabel,$a,$b,$c,$d,$e){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e')");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}


//6 kolom
public function insert2($tabel,$a,$b,$c,$d,$e,$f){
	$options = [
	    	'cost' => 12,
	    	'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
		];
	$password = password_hash($d, PASSWORD_BCRYPT, $options);

	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES('$a','$b','$c','$password','$e','$f')");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}

public function insertKolom_8($tabel,$a,$b,$bb,$c,$cc,$d,$dd,$e,$ee,$f,$ff,$g,$gg,$h,$hh){
 
	try {
		$query = $this->db->prepare("INSERT INTO $tabel (`$a`,`$b`,`$c`,`$d`,`$e`,`$f`,`$g`,`$h`) VALUES(null,'$bb','$cc','$dd','$ee','$ff','$gg','$hh')");
		$query->execute();//echo"<br>INSERT INTO $tabel (`$a`,`$b`,`$c`,`$d`,`$e`,`$f`,`$g`,`$h`) VALUES(null,'$bb','$cc','$dd','$ee','$ff','$gg','$hh')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}


public function insertKolom_13($tabel,$a,$b,$bb,$c,$cc,$d,$dd,$e,$ee,$f,$ff,$g,$gg,$h,$hh,$i,$ii,$j,$jj,$k,$kk,$l,$ll,$m,$mm){
 
	try {
		$query = $this->db->prepare("INSERT INTO $tabel (`$a`,`$b`,`$c`,`$d`,`$e`,`$f`,`$g`,`$h`,`$i`,`$j`,`$k`,`$l`,`$m`) VALUES(null,'$bb','$cc','$dd','$ee','$ff','$gg','$hh','$ii','$jj','$kk','$ll','$mm')");
		$query->execute();//echo"<br>INSERT INTO $tabel (`$a`,`$b`,`$c`,`$d`,`$e`,`$f`,`$g`,`$h`,`$i`,`$j`,`$k`,`$l`,`$m`) VALUES(null,'$bb','$cc','$dd','$ee','$ff','$gg','$hh','$ii','$jj','$kk','$ll','$mm')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
public function insertKolom_14($tabel,$a,$b,$bb,$c,$cc,$d,$dd,$e,$ee,$f,$ff,$g,$gg,$h,$hh,$i,$ii,$j,$jj,$k,$kk,$l,$ll,$m,$mm,$n,$nn){
 
	try {
		$query = $this->db->prepare("INSERT INTO $tabel (`$a`,`$b`,`$c`,`$d`,`$e`,`$f`,`$g`,`$h`,`$i`,`$j`,`$k`,`$l`,`$m`,`$n`) VALUES(null,'$bb','$cc','$dd','$ee','$ff','$gg','$hh','$ii','$jj','$kk','$ll','$mm','$nn')");
		$query->execute();//echo"<br>IINSERT INTO $tabel (`$a`,`$b`,`$c`,`$d`,`$e`,`$f`,`$g`,`$h`,`$i`,`$j`,`$k`,`$l`,`$m`,`$n`) VALUES(null,'$bb','$cc','$dd','$ee','$ff','$gg','$hh','$ii','$jj','$kk','$ll','$mm','$nn')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
public function insertKolom_16($tabel,$a,$b,$bb,$c,$cc,$d,$dd,$e,$ee,$f,$ff,$g,$gg,$h,$hh,$i,$ii,$j,$jj,$k,$kk,$l,$ll,$m,$mm,$n,$nn,$o,$oo,$p,$pp){
 
	try {
		$query = $this->db->prepare("INSERT INTO $tabel (`$a`,`$b`,`$c`,`$d`,`$e`,`$f`,`$g`,`$h`,`$i`,`$j`,`$k`,`$l`,`$m`,`$n`,`$o`,`$p`) VALUES(null,'$bb','$cc','$dd','$ee','$ff','$gg','$hh','$ii','$jj','$kk','$ll','$mm','$nn','$oo','$pp')");
		$query->execute();//echo"<br>INSERT INTO $tabel (`$a`,`$b`,`$c`,`$d`,`$e`,`$f`,`$g`,`$h`,`$i`,`$j`,`$k`,`$l`,`$m`,`$n`,`$o`,`$p`) VALUES(null,'$bb','$cc','$dd','$ee','$ff','$gg','$hh','$ii','$jj','$kk','$ll','$mm','$nn','$oo','$pp')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}

public function insertKolom_36($tabel,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$a12,$a13,$a14,$a15,$a16,$a17,$a18,$a19,$a20,$a21,$a22,$a23,$a24,$a25,$a26,$a27,$a28,$a29,$a30,$a31,$a32,$a33,$a34,$a35,$a36){
 
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a2','$a3','$a4','$a5','$a6','$a7','$a8','$a9','$a10','$a11','$a12','$a13','$a14','$a15','$a16','$a17','$a18','$a19','$a20','$a21','$a22','$a23','$a24','$a25','$a26','$a27','$a28','$a29','$a30','$a31','$a32','$a33','$a34','$a35','$a36')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a2','$a3','$a4','$a5','$a6','$a7','$a8','$a9','$a10','$a11','$a12','$a13','$a14','$a15','$a16','$a17','$a18','$a19','$a20','$a21','$a22','$a23','$a24','$a25','$a26','$a27','$a28','$a29','$a30','$a31','$a32','$a33','$a34','$a35','$a36')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
public function insertKolom_37($tabel,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$a12,$a13,$a14,$a15,$a16,$a17,$a18,$a19,$a20,$a21,$a22,$a23,$a24,$a25,$a26,$a27,$a28,$a29,$a30,$a31,$a32,$a33,$a34,$a35,$a36,$a37,$a38){
 
	try {
		$query = $this->db->prepare("INSERT INTO `$tabel`  VALUES (NULL, '$a2','$a3','$a4','$a5','$a6','$a7','$a8','$a9','$a10','$a11','$a12','$a13','$a14','$a15','$a16','$a17','$a18','$a19','$a20','$a21','$a22','$a23','$a24','$a25','$a26','$a27','$a28','$a29','$a30','$a31','$a32','$a33','$a34','$a35','$a36','$a37','$a38');");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
public function insertKolom_39($tabel,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$a12,$a13,$a14,$a15,$a16,$a17,$a18,$a19,$a20,$a21,$a22,$a23,$a24,$a25,$a26,$a27,$a28,$a29,$a30,$a31,$a32,$a33,$a34,$a35,$a36,$a37,$a38,$a39,$a40){
 
	try {
		$query = $this->db->prepare("INSERT INTO `$tabel`  VALUES (NULL, '$a2','$a3','$a4','$a5','$a6','$a7','$a8','$a9','$a10','$a11','$a12','$a13','$a14','$a15','$a16','$a17','$a18','$a19','$a20','$a21','$a22','$a23','$a24','$a25','$a26','$a27','$a28','$a29','$a30','$a31','$a32','$a33','$a34','$a35','$a36','$a37','$a38','$a39','$a40');");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
public function insertPassword9($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j){
	$options = [
	    	'cost' => 12,
	    	'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
		];
	$password = password_hash($d, PASSWORD_BCRYPT, $options);

	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES('$a','$b','$c','$password','$e','$f','$g','$h','$i','$j')");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}

public function insertPassword7($tabel,$a,$b,$c,$d,$e,$f){

	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a',PASSWORD('$b'),'$c','$d','$e','$f')");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}


public function insert2_1($tabel,$a,$b,$c,$d,$e,$f){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES('$a','$b','$c','$d','$e','$f')");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//7 kolom
public function insert3($tabel,$b,$c,$d,$e,$f,$g){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$b','$c','$d','$e','$f','$g')");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//8 kolom
public function insert08($tabel,$a,$b,$c,$d,$e,$f,$g){
	$options = [
	    	'cost' => 12,
	    	'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
		];
	$password = password_hash($d, PASSWORD_BCRYPT, $options);
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES('$a','$b','$c','$password','$e','$f','$g','1')");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}

//8 kolom
public function insert4($tabel,$a,$b,$c,$d,$e,$f,$g,$h){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h')");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
public function insert4_1($tabel,$a,$b,$c,$d,$e,$f,$g){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g')");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//9 kolom
public function insert5($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i')");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//9 kolom null
public function insert9null($tabel,$a,$b,$c,$d,$e,$f,$g,$h){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h')");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
public function insert10null($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i')");
		$query->execute();//echo"INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//10 kolom
public function insert6($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j')");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//11 kolom
public function insert7($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k')");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//12 kolom
public function insert8($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l')");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//13 kolom
public function insert9($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m')");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//15 null kolom
public function insert14null($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n')");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}

//15 null kolom
public function insert15null($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o')");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}

//15  kolom
public function insert15($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}

//14 kolom
public function insert10($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n')");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//16 kolom
public function insert11($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p')");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}

//17 kolom
public function insert17($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q')");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//36 kolom
public function insert36($tabel,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$a12,$a13,$a14,$a15,$a16,$a17,$a18,$a19,$a20,$a21,$a22,$a23,$a24,$a25,$a26,$a27,$a28,$a29,$a30,$a31,$a32,$a33,$a34,$a35,$a36){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a2','$a3','$a4','$a5','$a6','$a7','$a8','$a9','$a10','$a11','$a12','$a13','$a14','$a15','$a16','$a17','$a18','$a19','$a20','$a21','$a22','$a23','$a24','$a25','$a26','$a27','$a28','$a29','$a30','$a31','$a32','$a33','$a34','$a35','$a36')");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//38 kolom
public function insert38($tabel,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$a12,$a13,$a14,$a15,$a16,$a17,$a18,$a19,$a20,$a21,$a22,$a23,$a24,$a25,$a26,$a27,$a28,$a29,$a30,$a31,$a32,$a33,$a34,$a35,$a36,$a37,$a38){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a2','$a3','$a4','$a5','$a6','$a7','$a8','$a9','$a10','$a11','$a12','$a13','$a14','$a15','$a16','$a17','$a18','$a19','$a20','$a21','$a22','$a23','$a24','$a25','$a26','$a27','$a28','$a29','$a30','$a31','$a32','$a33','$a34','$a35','$a36','$a37','$a38')");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
public function insert39($tabel,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$a12,$a13,$a14,$a15,$a16,$a17,$a18,$a19,$a20,$a21,$a22,$a23,$a24,$a25,$a26,$a27,$a28,$a29,$a30,$a31,$a32,$a33,$a34,$a35,$a36,$a37,$a38,$a39,$a40){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a2','$a3','$a4','$a5','$a6','$a7','$a8','$a9','$a10','$a11','$a12','$a13','$a14','$a15','$a16','$a17','$a18','$a19','$a20','$a21','$a22','$a23','$a24','$a25','$a26','$a27','$a28','$a29','$a30','$a31','$a32','$a33','$a34','$a35','$a36','$a37','$a38','$a39','$a40')");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//update 365
//36 kolom
public function update36($tabel,$a2,$b2,$a3,$b3,$a4,$b4,$a5,$b5,$a6,$b6,$a7,$b7,$a8,$b8,$a9,$b9,$a10,$b10,$a11,$b11,$a12,$b12,$a13,$b13,$a14,$b14,$a15,$b15,$a16,$b16,$a17,$b17,$a18,$b18,$a19,$b19,$a20,$b20,$a21,$b21,$a22,$b22,$a23,$b23,$a24,$b24,$a25,$b25,$a26,$b26,$a27,$b27,$a28,$b28,$a29,$b29,$a30,$b30,$a31,$b31,$a32,$b32,$a33,$b33,$a34,$b34,$a35,$b35,$a36,$b36,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE $tabel SET `$a2`='$b2',`$a3`='$b3',`$a4`='$b4',`$a5`='$b5',`$a6`='$b6',`$a7`='$b7',`$a8`='$b8',`$a9`='$b9',`$a10`='$b10',`$a11`='$b11',`$a12`='$b12',`$a13`='$b13',`$a14`='$b14',`$a15`='$b15',`$a16`='$b16',`$a17`='$b17',`$a18`='$b18',`$a19`='$b19',`$a20`='$b20',`$a21`='$b21',`$a22`='$b22',`$a23`='$b23',`$a24`='$b24',`$a25`='$b25',`$a26`='$b26',`$a27`='$b27',`$a28`='$b28',`$a29`='$b29',`$a30`='$b30',`$a31`='$b31',`$a32`='$b32',`$a33`='$b33',`$a34`='$b34',`$a35`='$b35',`$a36`='$b36' WHERE `$tabel`.`$kolom` ='$id'");
		$query->execute();//echo"UPDATE $tabel SET `$a2`='$b2',`$a3`='$b3',`$a4`='$b4',`$a5`='$b5',`$a6`='$b6',`$a7`='$b7',`$a8`='$b8',`$a9`='$b9',`$a10`='$b10',`$a11`='$b11',`$a12`='$b12',`$a13`='$b13',`$a14`='$b14',`$a15`='$b15',`$a16`='$b16',`$a17`='$b17',`$a18`='$b18',`$a19`='$b19',`$a20`='$b20',`$a21`='$b21',`$a22`='$b22',`$a23`='$b23',`$a24`='$b24',`$a25`='$b25',`$a26`='$b26',`$a27`='$b27',`$a28`='$b28',`$a29`='$b29',`$a30`='$b30',`$a31`='$b31',`$a32`='$b32',`$a33`='$b33',`$a34`='$b34',`$a35`='$b35',`$a36`='$b36' WHERE `$tabel`.`$kolom` ='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//34 kolom
public function update34($tabel,$a2,$b2,$a3,$b3,$a4,$b4,$a5,$b5,$a6,$b6,$a7,$b7,$a8,$b8,$a9,$b9,$a10,$b10,$a11,$b11,$a12,$b12,$a13,$b13,$a14,$b14,$a15,$b15,$a16,$b16,$a17,$b17,$a18,$b18,$a19,$b19,$a20,$b20,$a21,$b21,$a22,$b22,$a23,$b23,$a24,$b24,$a25,$b25,$a26,$b26,$a27,$b27,$a28,$b28,$a29,$b29,$a30,$b30,$a31,$b31,$a32,$b32,$a33,$b33,$a34,$b34,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE $tabel SET `$a2`='$b2',`$a3`='$b3',`$a4`='$b4',`$a5`='$b5',`$a6`='$b6',`$a7`='$b7',`$a8`='$b8',`$a9`='$b9',`$a10`='$b10',`$a11`='$b11',`$a12`='$b12',`$a13`='$b13',`$a14`='$b14',`$a15`='$b15',`$a16`='$b16',`$a17`='$b17',`$a18`='$b18',`$a19`='$b19',`$a20`='$b20',`$a21`='$b21',`$a22`='$b22',`$a23`='$b23',`$a24`='$b24',`$a25`='$b25',`$a26`='$b26',`$a27`='$b27',`$a28`='$b28',`$a29`='$b29',`$a30`='$b30',`$a31`='$b31',`$a32`='$b32',`$a33`='$b33',`$a34`='$b34' WHERE `$tabel`.`$kolom` ='$id'");
		$query->execute();//echo"UPDATE $tabel SET `$a2`='$b2',`$a3`='$b3',`$a4`='$b4',`$a5`='$b5',`$a6`='$b6',`$a7`='$b7',`$a8`='$b8',`$a9`='$b9',`$a10`='$b10',`$a11`='$b11',`$a12`='$b12',`$a13`='$b13',`$a14`='$b14',`$a15`='$b15',`$a16`='$b16',`$a17`='$b17',`$a18`='$b18',`$a19`='$b19',`$a20`='$b20',`$a21`='$b21',`$a22`='$b22',`$a23`='$b23',`$a24`='$b24',`$a25`='$b25',`$a26`='$b26',`$a27`='$b27',`$a28`='$b28',`$a29`='$b29',`$a30`='$b30',`$a31`='$b31',`$a32`='$b32',`$a33`='$b33',`$a34`='$b34' WHERE `$tabel`.`$kolom` ='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//35 kolom
public function update35($tabel,$a2,$b2,$a3,$b3,$a4,$b4,$a5,$b5,$a6,$b6,$a7,$b7,$a8,$b8,$a9,$b9,$a10,$b10,$a11,$b11,$a12,$b12,$a13,$b13,$a14,$b14,$a15,$b15,$a16,$b16,$a17,$b17,$a18,$b18,$a19,$b19,$a20,$b20,$a21,$b21,$a22,$b22,$a23,$b23,$a24,$b24,$a25,$b25,$a26,$b26,$a27,$b27,$a28,$b28,$a29,$b29,$a30,$b30,$a31,$b31,$a32,$b32,$a33,$b33,$a34,$b34,$a35,$b35,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE $tabel SET `$a2`='$b2',`$a3`='$b3',`$a4`='$b4',`$a5`='$b5',`$a6`='$b6',`$a7`='$b7',`$a8`='$b8',`$a9`='$b9',`$a10`='$b10',`$a11`='$b11',`$a12`='$b12',`$a13`='$b13',`$a14`='$b14',`$a15`='$b15',`$a16`='$b16',`$a17`='$b17',`$a18`='$b18',`$a19`='$b19',`$a20`='$b20',`$a21`='$b21',`$a22`='$b22',`$a23`='$b23',`$a24`='$b24',`$a25`='$b25',`$a26`='$b26',`$a27`='$b27',`$a28`='$b28',`$a29`='$b29',`$a30`='$b30',`$a31`='$b31',`$a32`='$b32',`$a33`='$b33',`$a34`='$b34',`$a35`='$b35' WHERE `$tabel`.`$kolom` ='$id'");
		$query->execute();//echo"UPDATE $tabel SET `$a2`='$b2',`$a3`='$b3',`$a4`='$b4',`$a5`='$b5',`$a6`='$b6',`$a7`='$b7',`$a8`='$b8',`$a9`='$b9',`$a10`='$b10',`$a11`='$b11',`$a12`='$b12',`$a13`='$b13',`$a14`='$b14',`$a15`='$b15',`$a16`='$b16',`$a17`='$b17',`$a18`='$b18',`$a19`='$b19',`$a20`='$b20',`$a21`='$b21',`$a22`='$b22',`$a23`='$b23',`$a24`='$b24',`$a25`='$b25',`$a26`='$b26',`$a27`='$b27',`$a28`='$b28',`$a29`='$b29',`$a30`='$b30',`$a31`='$b31',`$a32`='$b32',`$a33`='$b33',`$a34`='$b34' WHERE `$tabel`.`$kolom` ='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
////////////////////////////////////////////////////////////////////////////////////////////////////
//Update Data //////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
public function updateStatus($tabel , $where ,$kondisi,$nilai){
	try {
		$query = $this->db->prepare("UPDATE $tabel SET status='$nilai' WHERE $where='$kondisi'");
		$query->execute();
		return $query;
	} 	
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}
}

public function dishub_jalan($id,$a,$b,$c,$d,$e,$f,$g,$h){
	try {
		$query = $this->db->prepare("UPDATE dishub_jalan SET lintas='$a',jurusan='$b',rit='$c',seat='$d',penumpang='$e',tahun='$f',latitude='$g',longitude='$h' WHERE id_jalan='$id'");
		$query->execute();
		return $query;
	} 	
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}
}

public function dishub_kabupaten($id,$b,$c,$d,$e){
	try {
		$query = $this->db->prepare("UPDATE dishub_kabupaten SET kabupaten='$b',ibukota='$c',latitude='$d',longitude='$e' WHERE id_kabupaten='$id'");	
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;		
	}
}

public function dishub_laut($id,$a,$b,$c,$d,$e,$f,$g){
	try {
		$query = $this->db->prepare("UPDATE dishub_laut SET id_user='$a',pelabuhan_laut='$b',datang='$c',berangkat='$d',naik='$e',turun='$f',tahun='$g' WHERE id_pelabuhan_laut='$id'");	
		$query->execute();
		return $query;	
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;			
	}
}

public function dishub_berita($id,$a,$b,$c){
	try {
		$query = $this->db->prepare("UPDATE dishub_berita SET kategori='$a',judul='$b',isi='$c' WHERE id_berita='$id'");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;				
	}
}

public function updateById_1($tabel,$a,$aa,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE $tabel SET $a='$aa' WHERE $kolom='$id'");
		$query->execute();
		return $query;//echo"UPDATE $tabel SET $a='$aa' WHERE $kolom='$id'";
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;					
	}
}
public function updateById_2($tabel,$a,$aa,$b,$bb,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE $tabel SET $a='$aa' ,$b='$bb' WHERE $kolom='$id'");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;					
	}
}
public function updateById_22($tabel,$a,$aa,$b,$bb,$kolom,$id,$kolom2,$id2){
	try {
		$query = $this->db->prepare("UPDATE $tabel SET $a='$aa' ,$b='$bb' WHERE `$kolom`='$id' and `$kolom2`='$id2'");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;					
	}
}

public function updateById_2Password($tabel,$a,$aa,$b,$bb,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE $tabel SET $a=PASSWORD('$aa') ,$b='$bb' WHERE $kolom='$id'");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;					
	}
}

public function updateById_10($tabel,$a,$aa,$b,$bb,$c,$cc,$d,$dd,$e,$ee,$f,$ff,$g,$gg,$h,$hh,$i,$ii,$j,$jj,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE $tabel SET $a='$aa',$b='$bb',$c='$cc',$d='$dd',$e='$ee',$f='$ff',$g='$gg',$h='$hh',$i='$ii',$j='$jj' WHERE $kolom='$id'");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;				
	}
}


public function updateById_5($tabel,$a,$aa,$b,$bb,$c,$cc,$d,$dd,$e,$ee,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE $tabel SET $a='$aa',$b='$bb',$c='$cc',$d='$dd',$e='$ee' WHERE $kolom='$id'");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;				
	}
}

public function updateById_4($tabel,$a,$aa,$b,$bb,$c,$cc,$d,$dd,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE $tabel SET $a='$aa',$b='$bb',$c='$cc',$d='$dd' WHERE $kolom='$id'");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;				
	}
}
public function updateById_3($tabel,$a,$aa,$b,$bb,$c,$cc,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE $tabel SET $a='$aa',$b='$bb',$c='$cc' WHERE $kolom='$id'");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;				
	}
}

public function updateById_3Password($tabel,$a,$aa,$b,$bb,$c,$cc,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE $tabel SET $a=PASSWORD('$aa'),$b='$bb',$c='$cc' WHERE $kolom='$id'");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;				
	}
}

public function updateById_6($tabel,$a,$aa,$b,$bb,$c,$cc,$d,$dd,$e,$ee,$f,$ff,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE $tabel SET $a='$aa',$b='$bb',$c='$cc',$d='$dd',$e='$ee',$f='$ff' WHERE $kolom='$id'");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;				
	}
}

public function updateById_7($tabel,$a,$aa,$b,$bb,$c,$cc,$d,$dd,$e,$ee,$f,$ff,$g,$gg,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE $tabel SET $a='$aa',$b='$bb',$c='$cc',$d='$dd',$e='$ee',$f='$ff',$g='$gg' WHERE $kolom='$id'");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;				
	}
}


public function updateById_8($tabel,$a,$aa,$b,$bb,$c,$cc,$d,$dd,$e,$ee,$f,$ff,$g,$gg,$h,$hh,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE $tabel SET $a='$aa',$b='$bb',$c='$cc',$d='$dd',$e='$ee',$f='$ff',$g='$gg',$h='$hh' WHERE $kolom='$id'");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;				
	}
}

public function updateById_11($tabel,$a,$aa,$b,$bb,$c,$cc,$d,$dd,$e,$ee,$f,$ff,$g,$gg,$h,$hh,$i,$ii,$j,$jj,$k,$kk, $kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE $tabel SET $a='$aa',$b='$bb',$c='$cc',$d='$dd',$e='$ee',$f='$ff',$g='$gg',$h='$hh' WHERE $kolom='$id'");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;				
	}
}

public function updateById_12($tabel,$a,$aa,$b,$bb,$c,$cc,$d,$dd,$e,$ee,$f,$ff,$g,$gg,$h,$hh,$i,$ii,$j,$jj,$k,$kk,$l,$ll, $kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE $tabel SET $a='$aa',$b='$bb',$c='$cc',$d='$dd',$e='$ee',$f='$ff',$g='$gg',$h='$hh',$i='$ii',$j='$jj',$k='$kk',$l='$ll' WHERE $kolom='$id'");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;				
	}
}


public function updateById_17($tabel,$a,$aa,$b,$bb,$c,$cc,$d,$dd,$e,$ee,$f,$ff,$g,$gg,$h,$hh,$i,$ii,$j,$jj,$k,$kk,$l,$ll,$m,$mm,$n,$nn,$o,$oo,$p,$pp,$q,$qq,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE $tabel SET $a='$aa',$b='$bb',$c='$cc',$d='$dd',$e='$ee',$f='$ff',$g='$gg',$h='$hh',$i='$ii',$j='$jj',$k='$kk',$l='$ll',$m='$mm',$n='$nn',$o='$oo',$p='$pp',$q='$qq' WHERE $kolom='$id'");
		$query->execute();//echo"UPDATE $tabel SET $a='$aa',$b='$bb',$c='$cc',$d='$dd',$e='$ee',$f='$ff',$g='$gg',$h='$hh',$i='$ii',$j='$jj',$k='$kk',$l='$ll',$m='$mm',$n='$nn',$o='$oo',$p='$pp',$q='$qq' WHERE $kolom='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;				
	}
}

public function updateById_14($tabel,$a,$aa,$b,$bb,$c,$cc,$d,$dd,$e,$ee,$f,$ff,$g,$gg,$h,$hh,$i,$ii,$j,$jj,$k,$kk,$l,$ll,$m,$mm,$n,$nn,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE $tabel SET $a='$aa',$b='$bb',$c='$cc',$d='$dd',$e='$ee',$f='$ff',$g='$gg',$h='$hh',$i='$ii',$j='$jj',$k='$kk',$l='$ll',$m='$mm',$n='$nn' WHERE $kolom='$id'");
		$query->execute();//echo"UPDATE $tabel SET $a='$aa',$b='$bb',$c='$cc',$d='$dd',$e='$ee',$f='$ff',$g='$gg',$h='$hh',$i='$ii',$j='$jj',$k='$kk',$l='$ll',$m='$mm',$n='$nn',$o='$oo' WHERE $kolom='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;				
	}
}

public function updateById_15($tabel,$a,$aa,$b,$bb,$c,$cc,$d,$dd,$e,$ee,$f,$ff,$g,$gg,$h,$hh,$i,$ii,$j,$jj,$k,$kk,$l,$ll,$m,$mm,$n,$nn,$o,$oo,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE $tabel SET $a='$aa',$b='$bb',$c='$cc',$d='$dd',$e='$ee',$f='$ff',$g='$gg',$h='$hh',$i='$ii',$j='$jj',$k='$kk',$l='$ll',$m='$mm',$n='$nn',$o='$oo' WHERE $kolom='$id'");
		$query->execute();//echo"UPDATE $tabel SET $a='$aa',$b='$bb',$c='$cc',$d='$dd',$e='$ee',$f='$ff',$g='$gg',$h='$hh',$i='$ii',$j='$jj',$k='$kk',$l='$ll',$m='$mm',$n='$nn',$o='$oo' WHERE $kolom='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;				
	}
}

public function updateById_16($tabel,$a,$aa,$b,$bb,$c,$cc,$d,$dd,$e,$ee,$f,$ff,$g,$gg,$h,$hh,$i,$ii,$j,$jj,$k,$kk,$l,$ll,$m,$mm,$n,$nn,$o,$oo,$p,$pp,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE $tabel SET $a='$aa',$b='$bb',$c='$cc',$d='$dd',$e='$ee',$f='$ff',$g='$gg',$h='$hh',$i='$ii',$j='$jj',$k='$kk',$l='$ll',$m='$mm',$n='$nn',$o='$oo',$p='$pp' WHERE $kolom='$id'");
		$query->execute();//echo"UPDATE $tabel SET $a='$aa',$b='$bb',$c='$cc',$d='$dd',$e='$ee',$f='$ff',$g='$gg',$h='$hh',$i='$ii',$j='$jj',$k='$kk',$l='$ll',$m='$mm',$n='$nn',$o='$oo' WHERE $kolom='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;				
	}
}




public function updateById_9($tabel,$a,$aa,$b,$bb,$c,$cc,$d,$dd,$e,$ee,$f,$ff,$g,$gg,$h,$hh,$i,$ii,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE $tabel SET $a='$aa',$b='$bb',$c='$cc',$d='$dd',$e='$ee',$f='$ff',$g='$gg',$h='$hh',$i='$ii' WHERE `$kolom`='$id'");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;				
	}
}

public function updatePW($tabel,$kondisi,$nilai,$a,$b){
	$options = [
	    	'cost' => 12,
	    	'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
		];
	$password = password_hash($b, PASSWORD_BCRYPT, $options);
	try {
		$query = $this->db->prepare("UPDATE $tabel SET $a='$password' WHERE $kondisi='$nilai'");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}
}

public function updateMaster($kondisi,$nilai,$a,$b,$c){
	try {
		$query = $this->db->prepare("UPDATE master SET `id_kabupaten`='$a',`mode_master`='$b',`rincian`='$c' WHERE $kondisi='$nilai'");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;	
	}	
}

public function updateLintas($kondisi , $nilai ,$a,$b){
	try {
		$query = $this->db->prepare("UPDATE lintas SET lintas='$a' , jurusan='$b' WHERE $kondisi='$nilai'");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}

////////////////////////////////////////////////////////////////////////////////////////////////////
//Delete Data //////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
public function deleteById($tabel,$kondisi,$id){
	try {
		$query = $this->db->prepare("DELETE FROM $tabel WHERE $kondisi='$id'");
		$query->execute();
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;			
	}
}

// function untuk buat digit 00001
public function digit($n,$digit){
	
	$x = strlen($n);
	
	if($x>$digit){$t=$x;}else{$t = $digit - $x;}
	$m = "";
	for($i=1;$i<=$t;$i++){
		$m =$m."0";
	}
	$m=$m."$n";
	return $m;
}



}


/*function adddate($vardate,$added){
	$data = explode("-", $vardate);
	$date = new DateTime();
	$date->setDate($data[0], $data[1], $data[2]);
	$date->modify("".$added."");
	$day= $date->format("Y-m-d");
	return $day;
}*/

?>