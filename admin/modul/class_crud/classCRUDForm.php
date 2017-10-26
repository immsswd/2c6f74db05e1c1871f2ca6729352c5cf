<?php 

class konfigurasi_form {
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
public function redirect_login($link){
	header("location:pages/".$link);
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
	header("location:index.php");
}


//======================================= INSERT DATA ===============================================================

//Read All data
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


//======================================= INSERT DATA ===============================================================

//1 kolom
public function insert1form($tabel,$a){
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

//2 kolom 
public function insert2form($tabel,$a,$b){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//3 kolom 
public function insert3form($tabel,$a,$b,$c){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//4 kolom 
public function insert4form($tabel,$a,$b,$c,$d){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//5 kolom 
public function insert5form($tabel,$a,$b,$c,$d,$e){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//6 kolom 
public function insert6form($tabel,$a,$b,$c,$d,$e,$f){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//7 kolom 
public function insert7form($tabel,$a,$b,$c,$d,$e,$f,$g){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//8 kolom 
public function insert8form($tabel,$a,$b,$c,$d,$e,$f,$g,$h){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}

//9 kolom 
public function insert9form($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//10 kolom 
public function insert10form($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//11 kolom 
public function insert11form($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//12 kolom 
public function insert12form($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}

//13 kolom 
public function insert13form($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}

//14 kolom 
public function insert14form($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}

//15 kolom 
public function insert15form($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}

//16 kolom 
public function insert16form($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//17 kolom 
public function insert17form($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//18 kolom 
public function insert18form($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//19 kolom 
public function insert19form($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}

//20 kolom 
public function insert20form($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//21 kolom 
public function insert21form($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}

//22 kolom 
public function insert22form($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u,$v){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u','$v')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u','$v')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//23 kolom 
public function insert23form($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u,$v,$w){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u','$v','$w')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u','$v','$w')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//24 kolom 
public function insert24form($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u,$v,$w,$x){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u','$v','$w','$x')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u','$v','$w','$x')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//27 kolom 
public function insert27form($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u,$v,$w,$x,$y,$z,$aa){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u','$v','$w','$x','$y','$z','$aa')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u','$v','$w')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//28 kolom 
public function insert28form($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u,$v,$w,$x,$y,$z,$aa,$bb){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u','$v','$w','$x','$y','$z','$aa','$bb')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u','$v','$w','$x','$y','$z','$aa','$bb')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//29 kolom 
public function insert29form($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u,$v,$w,$x,$y,$z,$aa,$bb,$cc){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u','$v','$w','$x','$y','$z','$aa','$bb','$cc')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u','$v','$w','$x','$y','$z','$aa','$bb','$cc')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//31 kolom 
public function insert31form($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u,$v,$w,$x,$y,$z,$aa,$bb,$cc,$dd,$ee){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u','$v','$w','$x','$y','$z','$aa','$bb','$cc','$dd','$ee')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u','$v','$w','$x','$y','$z','$aa','$bb','$cc','$dd','$ee')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}

//38 kolom 
public function insert38form($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u,$v,$w,$x,$y,$z,$aa,$bb,$cc,$dd,$ee,$ff,$gg,$hh,$ii,$jj,$kk,$ll){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u','$v','$w','$x','$y','$z','$aa','$bb','$cc','$dd','$ee','$ff','$gg','$hh','$ii','$jj','$kk','$ll')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u','$v','$w','$x','$y','$z','$aa','$bb','$cc','$dd','$ee','$ff','$gg','$hh','$ii','$jj','$kk','$ll')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//41 kolom 
public function insert41form($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u,$v,$w,$x,$y,$z,$aa,$bb,$cc,$dd,$ee,$ff,$gg,$hh,$ii,$jj,$kk,$ll,$mm,$nn,$oo){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u','$v','$w','$x','$y','$z','$aa','$bb','$cc','$dd','$ee','$ff','$gg','$hh','$ii','$jj','$kk','$ll','$mm','$nn','$oo')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u','$v','$w','$x','$y','$z','$aa','$bb','$cc','$dd','$ee','$ff','$gg','$hh','$ii','$jj','$kk','$ll','$mm','$nn','$oo')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//42 kolom 
public function insert42form($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u,$v,$w,$x,$y,$z,$aa,$bb,$cc,$dd,$ee,$ff,$gg,$hh,$ii,$jj,$kk,$ll,$mm,$nn,$oo,$pp){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u','$v','$w','$x','$y','$z','$aa','$bb','$cc','$dd','$ee','$ff','$gg','$hh','$ii','$jj','$kk','$ll','$mm','$nn','$oo','$pp')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u','$v','$w','$x','$y','$z','$aa','$bb','$cc','$dd','$ee','$ff','$gg','$hh','$ii','$jj','$kk','$ll','$mm','$nn','$oo','$pp')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}

//43 kolom 
public function insert43form($tabel,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u,$v,$w,$x,$y,$z,$aa,$bb,$cc,$dd,$ee,$ff,$gg,$hh,$ii,$jj,$kk,$ll,$mm,$nn,$oo,$pp,$qq){
	try {
		$query = $this->db->prepare("INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u','$v','$w','$x','$y','$z','$aa','$bb','$cc','$dd','$ee','$ff','$gg','$hh','$ii','$jj','$kk','$ll','$mm','$nn','$oo','$pp','$qq')");
		$query->execute();//echo"<br>INSERT INTO $tabel VALUES(null,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u','$v','$w','$x','$y','$z','$aa','$bb','$cc','$dd','$ee','$ff','$gg','$hh','$ii','$jj','$kk','$ll','$mm','$nn','$oo','$pp','$qq')";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}




/////////////////////UPDATE///////////////////////////////////////////////////////////////
//1 UPDATE kolom 
public function update1form($tabel,$Ta,$a,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE `$tabel` SET `$Ta`='$a' WHERE `$kolom`='$id'");
		$query->execute();//echo"UPDATE `$tabel` SET  `$Ta`='$a' WHERE `$kolom`='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//1 UPDATE kolom WHERE 2 
public function update1formWhere2($tabel,$Ta,$a,$kolom,$id,$kolom2,$id2){
	try {
		$query = $this->db->prepare("UPDATE `$tabel` SET `$Ta`='$a' WHERE `$kolom`='$id' and `$kolom2`='$id2'");
		$query->execute();//echo"UPDATE `$tabel` SET  `$Ta`='$a' WHERE `$kolom`='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//2 UPDATE kolom 
public function update2form($tabel,$Ta,$a,$Tb,$b,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE `$tabel` SET `$Ta`='$a',`$Tb`='$b' WHERE `$kolom`='$id'");
		$query->execute();//echo"UPDATE `$tabel` SET  `$Ta`='$a',`$Tb`='$b' WHERE `$kolom`='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//3 UPDATE kolom 
public function update3form($tabel,$Ta,$a,$Tb,$b,$Tc,$c,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE `$tabel` SET `$Ta`='$a',`$Tb`='$b',`$Tc`='$c' WHERE `$kolom`='$id'");
		$query->execute();//echo"UPDATE `$tabel` SET  `$Ta`='$a',`$Tb`='$b',`$Tc`='$c' WHERE `$kolom`='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//6 UPDATE kolom 
public function update6form($tabel,$Ta,$a,$Tb,$b,$Tc,$c,$Td,$d,$Te,$e,$Tf,$f,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE `$tabel` SET `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f'WHERE `$kolom`='$id'");
		$query->execute();//echo"UPDATE `$tabel` SET  `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f' WHERE `$kolom`='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//7 UPDATE kolom 
public function update7form($tabel,$Ta,$a,$Tb,$b,$Tc,$c,$Td,$d,$Te,$e,$Tf,$f,$Tg,$g,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE `$tabel` SET `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g' WHERE `$kolom`='$id'");
		$query->execute();//echo"UPDATE `$tabel` SET  `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g' WHERE `$kolom`='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//8 UPDATE kolom 
public function update8form($tabel,$Ta,$a,$Tb,$b,$Tc,$c,$Td,$d,$Te,$e,$Tf,$f,$Tg,$g,$Th,$h,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE `$tabel` SET `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h' WHERE `$kolom`='$id'");
		$query->execute();//echo"UPDATE `$tabel` SET  `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h' WHERE `$kolom`='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}

//10 UPDATE kolom 
public function update10form($tabel,$Ta,$a,$Tb,$b,$Tc,$c,$Td,$d,$Te,$e,$Tf,$f,$Tg,$g,$Th,$h,$Ti,$i,$Tj,$j,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE `$tabel` SET `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j' WHERE `$kolom`='$id'");
		$query->execute();//echo"UPDATE `$tabel` SET  `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j' WHERE `$kolom`='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//12 UPDATE kolom 
public function update12form($tabel,$Ta,$a,$Tb,$b,$Tc,$c,$Td,$d,$Te,$e,$Tf,$f,$Tg,$g,$Th,$h,$Ti,$i,$Tj,$j,$Tk,$k,$Tl,$l,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE `$tabel` SET `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j',`$Tk`='$k',`$Tl`='$l' WHERE `$kolom`='$id'");
		$query->execute();//echo"UPDATE `$tabel` SET  `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j',`$Tk`='$k',`$Tl`='$l' WHERE `$kolom`='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//13 UPDATE kolom 
public function update13form($tabel,$Ta,$a,$Tb,$b,$Tc,$c,$Td,$d,$Te,$e,$Tf,$f,$Tg,$g,$Th,$h,$Ti,$i,$Tj,$j,$Tk,$k,$Tl,$l,$Tm,$m,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE `$tabel` SET `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j',`$Tk`='$k',`$Tl`='$l',`$Tm`='$m' WHERE `$kolom`='$id'");
		$query->execute();//echo"UPDATE `$tabel` SET  `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j',`$Tk`='$k',`$Tl`='$l',`$Tm`='$m' WHERE `$kolom`='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//14 UPDATE kolom 
public function update14form($tabel,$Ta,$a,$Tb,$b,$Tc,$c,$Td,$d,$Te,$e,$Tf,$f,$Tg,$g,$Th,$h,$Ti,$i,$Tj,$j,$Tk,$k,$Tl,$l,$Tm,$m,$Tn,$n,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE `$tabel` SET `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j',`$Tk`='$k',`$Tl`='$l',`$Tm`='$m',`$Tn`='$n' WHERE `$kolom`='$id'");
		$query->execute();//echo"UPDATE `$tabel` SET  `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j',`$Tk`='$k',`$Tl`='$l',`$Tm`='$m',`$Tn`='$n' WHERE `$kolom`='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//15 UPDATE kolom 
public function update15form($tabel,$Ta,$a,$Tb,$b,$Tc,$c,$Td,$d,$Te,$e,$Tf,$f,$Tg,$g,$Th,$h,$Ti,$i,$Tj,$j,$Tk,$k,$Tl,$l,$Tm,$m,$Tn,$n,$To,$o,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE `$tabel` SET `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j',`$Tk`='$k',`$Tl`='$l',`$Tm`='$m',`$Tn`='$n',`$To`='$o' WHERE `$kolom`='$id'");
		$query->execute();//echo"UPDATE `$tabel` SET  `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j',`$Tk`='$k',`$Tl`='$l',`$Tm`='$m',`$Tn`='$n',`$To`='$o' WHERE `$kolom`='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}

//16 UPDATE kolom 
public function update16form($tabel,$Ta,$a,$Tb,$b,$Tc,$c,$Td,$d,$Te,$e,$Tf,$f,$Tg,$g,$Th,$h,$Ti,$i,$Tj,$j,$Tk,$k,$Tl,$l,$Tm,$m,$Tn,$n,$To,$o,$Tp,$p,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE `$tabel` SET `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j',`$Tk`='$k',`$Tl`='$l',`$Tm`='$m',`$Tn`='$n',`$To`='$o',`$Tp`='$p' WHERE `$kolom`='$id'");
		$query->execute();//echo"UPDATE `$tabel` SET  `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j',`$Tk`='$k',`$Tl`='$l',`$Tm`='$m',`$Tn`='$n',`$To`='$o',`$Tp`='$p' WHERE `$kolom`='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}

//17 UPDATE kolom 
public function update17form($tabel,$Ta,$a,$Tb,$b,$Tc,$c,$Td,$d,$Te,$e,$Tf,$f,$Tg,$g,$Th,$h,$Ti,$i,$Tj,$j,$Tk,$k,$Tl,$l,$Tm,$m,$Tn,$n,$To,$o,$Tp,$p,$Tq,$q,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE `$tabel` SET `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j',`$Tk`='$k',`$Tl`='$l',`$Tm`='$m',`$Tn`='$n',`$To`='$o',`$Tp`='$p',`$Tq`='$q' WHERE `$kolom`='$id'");
		$query->execute();//echo"UPDATE `$tabel` SET  `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j',`$Tk`='$k',`$Tl`='$l',`$Tm`='$m',`$Tn`='$n',`$To`='$o',`$Tp`='$p',`$Tq`='$q' WHERE `$kolom`='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}

//18 UPDATE kolom 
public function update18form($tabel,$Ta,$a,$Tb,$b,$Tc,$c,$Td,$d,$Te,$e,$Tf,$f,$Tg,$g,$Th,$h,$Ti,$i,$Tj,$j,$Tk,$k,$Tl,$l,$Tm,$m,$Tn,$n,$To,$o,$Tp,$p,$Tq,$q,$Tr,$r,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE `$tabel` SET `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j',`$Tk`='$k',`$Tl`='$l',`$Tm`='$m',`$Tn`='$n',`$To`='$o',`$Tp`='$p',`$Tq`='$q',`$Tr`='$r' WHERE `$kolom`='$id'");
		$query->execute();//echo"UPDATE `$tabel` SET  `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j',`$Tk`='$k',`$Tl`='$l',`$Tm`='$m',`$Tn`='$n',`$To`='$o',`$Tp`='$p',`$Tq`='$q',`$Tr`='$r' WHERE `$kolom`='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//19 UPDATE kolom 
public function update19form($tabel,$Ta,$a,$Tb,$b,$Tc,$c,$Td,$d,$Te,$e,$Tf,$f,$Tg,$g,$Th,$h,$Ti,$i,$Tj,$j,$Tk,$k,$Tl,$l,$Tm,$m,$Tn,$n,$To,$o,$Tp,$p,$Tq,$q,$Tr,$r,$Ts,$s,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE `$tabel` SET `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j',`$Tk`='$k',`$Tl`='$l',`$Tm`='$m',`$Tn`='$n',`$To`='$o',`$Tp`='$p',`$Tq`='$q',`$Tr`='$r',`$Ts`='$s' WHERE `$kolom`='$id'");
		$query->execute();//echo"UPDATE `$tabel` SET `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j',`$Tk`='$k',`$Tl`='$l',`$Tm`='$m',`$Tn`='$n',`$To`='$o',`$Tp`='$p',`$Tq`='$q',`$Tr`='$r',`$Ts`='$s' WHERE `$kolom`='$id'";
		echo"UPDATE `surat_izinapotek` SET  `tanggal_permohonan`='".convert_tgl($tanggal_permohonan)."',`nama_pemohon`='$nama_pemohon',`alamatJln_pemilik`='$alamat',`sipa`='$sipa',`nama_sarana`='$nama_sarana',`alamatJln_klinik`='$alamat_jalan',`alamatKec_klinik`='".LOKASI($txtKecamatanPerusahaan)."',`alamatKab_klinik`='".LOKASI($txtKabupatenPerusahaan)."',`alamatProv_klinik`='".LOKASI($txtProvinsi)."',`menggunakan_sarana`='$menggunakan_sarana',`nama_pemilik`='$pemilik_sarana',`akte_perjanjianKerjasama`='$perjanjian_kerjasama',`tanggal`='".convert_tgl($tanggal_perjanjian)."',`notaris`='$notaris',`mengingat`='$mengingat',`ketentuan`='$ketentuan',`berlaku_sampai`='".convert_tgl($berlaku_sampai)."',`daerah_penetapan`='$daerah',`tgl_surat`='".convert_tgl($tanggal_surat)."' WHERE `no_resi`=$idResi";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//20 UPDATE kolom 
public function update20form($tabel,$Ta,$a,$Tb,$b,$Tc,$c,$Td,$d,$Te,$e,$Tf,$f,$Tg,$g,$Th,$h,$Ti,$i,$Tj,$j,$Tk,$k,$Tl,$l,$Tm,$m,$Tn,$n,$To,$o,$Tp,$p,$Tq,$q,$Tr,$r,$Ts,$s,$Tt,$t,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE `$tabel` SET `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j',`$Tk`='$k',`$Tl`='$l',`$Tm`='$m',`$Tn`='$n',`$To`='$o',`$Tp`='$p',`$Tq`='$q',`$Tr`='$r',`$Ts`='$s',`$Tt`='$t' WHERE `$kolom`='$id'");
		$query->execute();//echo"UPDATE `$tabel` SET  `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j',`$Tk`='$k',`$Tl`='$l',`$Tm`='$m',`$Tn`='$n',`$To`='$o',`$Tp`='$p',`$Tq`='$q',`$Tr`='$r',`$Ts`='$s`,`$Tt`='$t' WHERE `$kolom`='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//21 UPDATE kolom 
public function update21form($tabel,$Ta,$a,$Tb,$b,$Tc,$c,$Td,$d,$Te,$e,$Tf,$f,$Tg,$g,$Th,$h,$Ti,$i,$Tj,$j,$Tk,$k,$Tl,$l,$Tm,$m,$Tn,$n,$To,$o,$Tp,$p,$Tq,$q,$Tr,$r,$Ts,$s,$Tt,$t,$Tu,$u,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE `$tabel` SET `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j',`$Tk`='$k',`$Tl`='$l',`$Tm`='$m',`$Tn`='$n',`$To`='$o',`$Tp`='$p',`$Tq`='$q',`$Tr`='$r',`$Ts`='$s',`$Tt`='$t',`$Tu`='$u' WHERE `$kolom`='$id'");
		$query->execute();//echo"UPDATE `$tabel` SET  `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j',`$Tk`='$k',`$Tl`='$l',`$Tm`='$m',`$Tn`='$n',`$To`='$o',`$Tp`='$p',`$Tq`='$q',`$Tr`='$r',`$Ts`='$s`,`$Tt`='$t',`$Tu`='$u' WHERE `$kolom`='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//25 UPDATE kolom 
public function update25form($tabel,$Ta,$a,$Tb,$b,$Tc,$c,$Td,$d,$Te,$e,$Tf,$f,$Tg,$g,$Th,$h,$Ti,$i,$Tj,$j,$Tk,$k,$Tl,$l,$Tm,$m,$Tn,$n,$To,$o,$Tp,$p,$Tq,$q,$Tr,$r,$Ts,$s,$Tt,$t,$Tu,$u,$Tv,$v,$Tw,$w,$Tx,$x,$Ty,$y,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE `$tabel` SET `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j',`$Tk`='$k',`$Tl`='$l',`$Tm`='$m',`$Tn`='$n',`$To`='$o',`$Tp`='$p',`$Tq`='$q',`$Tr`='$r',`$Ts`='$s',`$Tt`='$t',`$Tu`='$u',`$Tv`='$v',`$Tw`='$w',`$Tx`='$x',`$Ty`='$y' WHERE `$kolom`='$id'");
		$query->execute();//echo"UPDATE `$tabel` SET  `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j',`$Tk`='$k',`$Tl`='$l',`$Tm`='$m',`$Tn`='$n',`$To`='$o',`$Tp`='$p',`$Tq`='$q',`$Tr`='$r',`$Ts`='$s`,`$Tt`='$t',`$Tu`='$u',`$Tv`='$v',`$Tw`='$w',`$Tx`='$x',`$Ty`='$y' WHERE `$kolom`='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//27 UPDATE kolom 
public function update27form($tabel,$Ta,$a,$Tb,$b,$Tc,$c,$Td,$d,$Te,$e,$Tf,$f,$Tg,$g,$Th,$h,$Ti,$i,$Tj,$j,$Tk,$k,$Tl,$l,$Tm,$m,$Tn,$n,$To,$o,$Tp,$p,$Tq,$q,$Tr,$r,$Ts,$s,$Tt,$t,$Tu,$u,$Tv,$v,$Tw,$w,$Tx,$x,$Ty,$y,$Tz,$z,$Taa,$aa,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE `$tabel` SET `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j',`$Tk`='$k',`$Tl`='$l',`$Tm`='$m',`$Tn`='$n',`$To`='$o',`$Tp`='$p',`$Tq`='$q',`$Tr`='$r',`$Ts`='$s',`$Tt`='$t',`$Tu`='$u',`$Tv`='$v',`$Tw`='$w',`$Tx`='$x',`$Ty`='$y',`$Tz`='$z',`$Taa`='$aa' WHERE `$kolom`='$id'");
		$query->execute();//echo"UPDATE `$tabel` SET  `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j',`$Tk`='$k',`$Tl`='$l',`$Tm`='$m',`$Tn`='$n',`$To`='$o',`$Tp`='$p',`$Tq`='$q',`$Tr`='$r',`$Ts`='$s`,`$Tt`='$t',`$Tu`='$u',`$Tv`='$v',`$Tw`='$w',`$Tx`='$x',`$Ty`='$y',`$Tz`='$z',`$Taa`='$aa' WHERE `$kolom`='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}
//39 UPDATE kolom 
public function update39form($tabel,$Ta,$a,$Tb,$b,$Tc,$c,$Td,$d,$Te,$e,$Tf,$f,$Tg,$g,$Th,$h,$Ti,$i,$Tj,$j,$Tk,$k,$Tl,$l,$Tm,$m,$Tn,$n,$To,$o,$Tp,$p,$Tq,$q,$Tr,$r,$Ts,$s,$Tt,$t,$Tu,$u,$Tv,$v,$Tw,$w,$Tx,$x,$Ty,$y,$Tz,$z,$Taa,$aa,$Tbb,$bb,$Tcc,$cc,$Tdd,$dd,$Tee,$ee,$Tff,$ff,$Tgg,$gg,$Thh,$hh,$Tii,$ii,$Tjj,$jj,$Tkk,$kk,$Tll,$ll,$Tmm,$mm,$kolom,$id){
	try {
		$query = $this->db->prepare("UPDATE `$tabel` SET `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j',`$Tk`='$k',`$Tl`='$l',`$Tm`='$m',`$Tn`='$n',`$To`='$o',`$Tp`='$p',`$Tq`='$q',`$Tr`='$r',`$Ts`='$s',`$Tt`='$t',`$Tu`='$u',`$Tv`='$v',`$Tw`='$w',`$Tx`='$x',`$Ty`='$y',`$Tz`='$z',`$Taa`='$aa',`$Tbb`='$bb',`$Tcc`='$cc',`$Tdd`='$dd',`$Tee`='$ee',`$Tff`='$ff',`$Tgg`='$gg',`$Thh`='$hh',`$Tii`='$ii',`$Tjj`='$jj',`$Tkk`='$kk',`$Tll`='$ll',`$Tmm`='$mm' WHERE `$kolom`='$id'");
		$query->execute();//echo"UPDATE `$tabel` SET `$Ta`='$a',`$Tb`='$b',`$Tc`='$c',`$Td`='$d',`$Te`='$e',`$Tf`='$f',`$Tg`='$g',`$Th`='$h',`$Ti`='$i',`$Tj`='$j',`$Tk`='$k',`$Tl`='$l',`$Tm`='$m',`$Tn`='$n',`$To`='$o',`$Tp`='$p',`$Tq`='$q',`$Tr`='$r',`$Ts`='$s',`$Tt`='$t',`$Tu`='$u',`$Tv`='$v',`$Tw`='$w',`$Tx`='$x',`$Ty`='$y',`$Tz`='$z',`$Taa`='$aa',`$Tbb`='$bb',`$Tcc`='$cc',`$Tdd`='$dd',`$Tee`='$ee',`$Tff`='$ff',`$Tgg`='$gg',`$Thh`='$hh',`$Tii`='$ii',`$Tjj`='$jj',`$Tkk`='$kk',`$Tll`='$ll',`$Tmm`='$mm' WHERE `$kolom`='$id'";
		return $query;
	} 
	catch (PDOException $e) {
		$error = $e->getMessage();	
		echo "<script>alert('$error')</script>";
		return false;
	}
}


}
?>