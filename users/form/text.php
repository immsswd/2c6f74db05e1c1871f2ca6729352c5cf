<?php
        $rs = mysqli_query($link,$q);
        $d = mysqli_fetch_array($rs);
        $str =$_SESSION['iduser'].date("Ymd");
        $str .=($d['mx']+1);
        $kodeanggota = $val['iduser']=$str;

var_dump($kodeanggota);
