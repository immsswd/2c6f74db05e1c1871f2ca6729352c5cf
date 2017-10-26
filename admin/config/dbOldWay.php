<?php
$link	= mysqli_connect("localhost", "root", "");
$cnn = mysqli_select_db($link, "db_lib");

if (!$cnn){
    echo "Database tidak terkoneksi";
}

$admin = mysqli_query($link, "SELECT * FROM admin_reg WHERE username='$_SESSION[staffadmin]'");

