<?php
class Read{
    
    public $isConnected;
    protected $db;

    public function __construct($username="root", $password="", $host="localhost", $dbname="db_lib")
    {
    	$this->isConnected = true;
        try {
        	$dbase = new PDO("mysql:host{$host};dbname={$dbname};charset=utf8", $username, $password);
        	$dbase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        	$dbase->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
        	$this->isConnected = false;
        	print $e->getMessage();
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
}