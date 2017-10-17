<?php

class Database
{
    public $isConnected;
    protected $db;

    public function __construct($username="root", $password="", $host="localhost", $dbname="db_lib")
    {
    	$this->isConnected = true;
        try {
        	$connect = new PDO("mysql:host{$host};dbname={$dbname};charset=utf8", $username, $password);
        	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        	$connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
        	$this->isConnected = false;
        	print $e->getMessage();
        }
    }
}