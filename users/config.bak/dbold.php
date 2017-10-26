<?php
$link	= mysqli_connect("localhost", "id3287805_root", "dbpuswil");
$cnn = mysqli_select_db($link, "id3287805_db_lib");

if (!$cnn){
    echo "Database tidak terkoneksi";
}
?>