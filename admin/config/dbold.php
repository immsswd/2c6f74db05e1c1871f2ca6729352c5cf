<?php
$link	= mysqli_connect("localhost", "root", "");
$cnn = mysqli_select_db($link, "db_lib");

if (!$cnn){
    echo "check your database is not connected";
}
?>