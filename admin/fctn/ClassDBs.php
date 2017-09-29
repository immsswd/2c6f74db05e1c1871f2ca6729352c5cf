<?php
/**
 * 

 */
class DBs
{
    
    private $host;
    private $username;
    private $pass;
    private $db;

    protected function connect(){
    	$this->host 	= "localhost";
    	$this->username = "root";
    	$this->pass  	= "";
    	$this->db       = "db_lib";


    	$conn = new mysqli($this->host, $this->username, $this->pass, $this->db);

    	return $conn;
    }
}

?>