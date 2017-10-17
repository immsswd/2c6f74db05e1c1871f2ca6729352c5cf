<?php
$host = "localhost";
$dbname = "id3287805_db_lib";
$username = "id3287805_root";
$password = "dbpuswil";
try {
        $dbase = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);
        $dbase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
}

if (!$dbase) {
	echo '<script>alert("databse off")</script>';
}