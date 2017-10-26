<?php
/**
 * 

 */
class Pengguna extends DBs
{

    public function ambilGalo($table, $a){
        $sql = "SELECT * FROM $table WHERE id = $a";
        $hasil = $this->connect()->query($sql);

        $num = $hasil->num_rows;
    }
}

?>