<?php
session_start();
include "config/dbold.php";
include "config/DB.php";
if (empty($_SESSION['staffadmin'])){
    header("location:login.php");
}else{
    $sql = "SELECT * FROM admin_reg";
    $h = mysqli_query($link, $sql);
?>
    <!DOCTYPE html>
    <html lang="en">
    <!--immsswd.github.io-->
    <?php 
include 'partials/head.php';
?>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="index.php" class="site_title"><i class="glyphicon glyphicon-book"></i> <span>Pustaka Wilayah</span></a>
                        </div>

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <?php include "partials/menu-profile.php" ?>
                        <!-- /menu profile quick info -->
                        <br>
                        <!-- sidebar menu -->
                        <?php
//                            $sql = "SELECT * FROM admin_reg";
//                            $h = mysqli_query($link, $sql);
                        while($row = mysqli_fetch_array($h)){
                            if($_SESSION['staffadmin']==$row['username'] && $row['jabatan']=='Staff Registrasi'){
                                include 'partials/sidebar-reg.php';     
                            }elseif($_SESSION['staffadmin']==$row['username'] && $row['jabatan']=='Admin'){
                                include 'partials/sidebar-admin.php';  
                            }elseif($_SESSION['staffadmin']==$row['username'] && $row['jabatan']=='Staff Peminjaman'){
                                include 'partials/sidebar-peminjaman.php'; 
                            }elseif($_SESSION['staffadmin']==$row['username'] && $row['jabatan']=='Kepala Sirkulasi'){
                                include 'partials/sidebar-kepala.php'; 
                            }elseif($_SESSION['staffadmin']==$row['username'] && $row['jabatan']=='Staff Kartu'){
                                include 'partials/sidebar-kartu.php';
                            }
                        }
                        ?>
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                          <!--   <a data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Lock">
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a> -->
                            <a data-toggle="tooltip" data-placement="top" title="Logout" href="">
                                <span class="glyphicon glyphicon-of" aria-hidden="false"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout" href="">
                                <span class="glyphicon glyphicon-of" aria-hidden="false"></span>
                            </a>
                            <a id="goFS" data-toggle="tooltip" data-placement="top" title="FullScreen">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                                <span class="text-danger glyphicon glyphicon-off" aria-hidden="false"></span>
                            </a>
                        </div>
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                <?php include "partials/top-navigation.php"; ?>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="wrapper">
                    <div id="page-content" class="right_col" role="main">

                        <div class="page-title">
                            <div class="title_left">
                                <h3> Halaman
                                <?php
                                    foreach($h as $ro){
                                        if($_SESSION['staffadmin']==$ro['username']){
                                            echo $ro['jabatan'];
                                        }
                                    }
                                ?>
                                </h3>
                            </div>

<!--
                            <div class="title_right">
                                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search for...">
                                        <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                                    </div>
                                </div>
                            </div>
-->                     
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">

                            <!--content-->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2></h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#">Settings 1</a>
                                                    </li>
                                                    <li><a href="#">Settings 2</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">

                     <?php
                    // $sq = "SELECT jabatan FROM admin_reg";
                    // $hg = mysqli_query($link, $sq);
                    //     while($r = mysqli_fetch_array($hg));

                    // $sq = $dbase->query("SELECT jabatan FROM admin_reg");
                    // $rs = $sq->fetchAll(PDO::FETCH_ASSOC);
          
                     if (isset($_GET['modul'] )AND ($_SESSION['staffadmin'])) {

                                if ($_GET['modul']=='modul_calon_user') {
                                    include "modul/show_calon_users.php";
                                }elseif ($_GET['modul']=='home') {
                                    include "modul/cari_buku.php";
                                }
                                elseif ($_GET['modul']=='modul_user') {
                                    include "modul/show_users.php";
                                }
                                elseif ($_GET['modul']=='modul_users') {
                                    include "modul/show_users_sk.php";
                                }
                                elseif ($_GET['modul']=='adminprofile') {
                                    include "modul/adminprofile.php";
                                }
                                elseif ($_GET['modul']=='edituser') {
                                    include "modul/edituser.php";
                                }
                                elseif ($_GET['modul']=='tambah_buku') {
                                     include "modul/tambah_buku.php";   
                                }
                                elseif ($_GET['modul']=='kategori_buku'){
                                    include "modul/kategori_buku.php";
                                }
                                elseif ($_GET['modul']=='show_buku'){
                                    include "modul/show_buku.php";
                                }
                                elseif ($_GET['modul']=='cari_buku'){
                                    include "modul/cari_buku.php";
                                
                                }elseif ($_GET['modul']=='help'){

                                    include "modul/help.php";
                                }
                                elseif ($_GET['modul']=='hasilpencarian'){
                                    include "modul/pencarianhasil.php";
                                }
                                elseif ($_GET['modul']=='all_user'){
                                    
                                    include "modul/all_user.php";
                                }
                                elseif ($_GET['modul']=='all_admin'){

                                    include "modul/all_admin.php";

                                }elseif ($_GET['modul']=='setting'){

                                    include "modul/setting-profile.php";

                                }
                                elseif ($_GET['modul']=='my-profile'){

                                    include "modul/my-profile.php";

                                }
                                elseif ($_GET['modul']=='peminjaman'){

                                    include "modul/peminjaman_buku.php";

                                }elseif ($_GET['modul']=='datapeminjaman'){

                                    include "modul/data_peminjaman.php";

                                }elseif ($_GET['modul']=='pengembalian'){

                                    include "modul/pengembalian_buku.php";
                                
                                }elseif ($_GET['modul']=='datapengembalian'){

                                    include "modul/data_pengembalian.php";

                                }elseif ($_GET['modul']=='laporanpeminjaman'){

                                    include "modul/laporanpeminjaman.php";

                                }
                                elseif ($_GET['modul']=='laporanpengembalian'){

                                    include "modul/laporanpengembalian.php";

                                }
                                elseif ($_GET['modul']=='laporanregistrasi'){

                                    include "modul/laporanregistrasi.php";

                                }
                                elseif ($_GET['modul']=='perpanjang'){

                                    include "modul/perpanjang.php";

                                }
                                else{
                                    //jika tidak ada lagi parameter lain
                                    echo 'Halaman Tidak Ditemukan <br>
                                    <center class="text-danger">404</center>';
                                }
                            }
                     ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/content-->

                    </div>
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <footer>
                 <div class="text-justify">
            <div class="pull-right">
              <i class="fa fa-copyright"></i> <?=date("Y")?> <em>Perpustakaan Soeman HS | v1.0 <a target="_blank" href="https://github.com/immsswd"><span class="fa fa-github"></span> GitHub</a></em> &mdash; <small><em>
                  Jl. Jenderal Sudirman No 462, Sukajadi Pekanbaru, Riau
              </em></small>
            </div>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <?php include 'partials/footer.php' ;?>
    <script>
        $(function() {
           $( ".datepicker" ).datepicker({
            dateFormat: 'yy-mm-dd'
           });
       });
    </script>
    </body>
    </html>
    <?php }?>
