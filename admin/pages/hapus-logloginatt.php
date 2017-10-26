<?php

include ("../config/DB.php");

$clearall = $dbase->query("TRUNCATE TABLE loginattempt");

if($clearall){
    
    echo "<script>window.location='../index.php?modul=logatt'</script>";

}
