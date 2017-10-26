<?php

class Database
{
    public $isConnected;
    protected $dbase;

    public function __construct($username="id3287805_root", $password="dbpuswil", $host="localhost", $dbname="id3287805_db_lib")
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
}