<?php
class DB{

    public function __construct(){
     include "dbOldWay.php" ;
    mysqli_query($link, "SELECT * FROM admin_reg");
    }
}