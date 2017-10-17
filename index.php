<?php 
session_start();
session_destroy() ?>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="admin/build/css/root.css">
    <link rel="stylesheet" href="admin/public/css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="shortcut icon" href="users/public/images/pku.jpg" />
</head>

<body>
<?php include("admin/partials/navfix-r.php");?>
<div class="bgimg">
    <div class="topleft">
        
        <!--    <p>Logo</p>-->
        <br>
        <small>Badan Perpustakaan Arsip dan Dokumentasi Pemerintah Provinsi Riau</small>
    </div>
    <div class="middle">
        <img width="80" height="100" src="admin/public/images/pku-logo.gif"><br>
        <h3 class="well">
            Perpustakaan Soeman HS
            <!-- <small>Sistem informasi registrasi dan peminjaman koleksi buku</small> -->
        </h3>

        <p class="body">
            <!-- <a class="btn btn-info" href="users/login.php"><i class="fa fa-user-plus"></i> Registrasi</a> --><a class="btn btn-success" href="users/login-member.php"><i class="fa fa-user"></i> Login Anggota</a>
            <a class="btn btn-primary" href="users/login.php"><span class="fa fa-edit"></span> Registrasi Anggota</a>
            <!--<a href="users/" class="btn btn-warning"><i class="fa fa-user-secret"></i> Member</a>--><br>
        </p>
        <!--  <div class="panel-heading" style="background-color: #aaa; color:#000; font-size: 14px; border-radius: 5px">
     Registrasi anggota? <a href="users/signup.php">Disini</a>
    </div> -->
        <hr>
    </div>
    <!--
  <div class="bottomleft">        
        Phone: +62 1234567<br>
        Jl. Sudirman Pekanbaru<br>
        <i class="fa fa-facebook"></i><a> layananpuswilpekanbaru</a><br>
        <i class="fa fa-twitter"></i><a> layananpuswilpekanbaru</a><br>
        <i class="fa fa-instagram"></i><a> layananpuswilpekanbaru</a>
  </div>
-->
<script src="admin/vendor/jquery/dist/jquery.min.js"></script>
<script src="admin/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
</div>
    <script>
        function openNav() {
    document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}
    </script>
</body>
</html>
