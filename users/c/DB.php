<?php
$host = "localhost";
$dbname = "db_lib";
$dbusername = "root";
$password = "";
try {
        $dbase = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $dbusername, $password);
        $dbase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
}

if (!$dbase) {
	echo '<script>alert("databse off")</script>';
}