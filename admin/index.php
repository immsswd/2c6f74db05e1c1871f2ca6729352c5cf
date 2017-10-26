<?php session_start();
include "config/dbold.php";
include "config/DB.php";
include_once ("fctn/tglid.php");
date_default_timezone_set('Asia/Jakarta');

define('_BASEME_', "https://imamta.000webhostapp.com/");

if (!isset($_SESSION['staffadmin'])){
    // header("location:login.php");
    echo '<script>
    window.location="login.php";
        </script>';
}else{
?>
<!DOCTYPE html>
    <html lang="id">
    <!--immsswd.github.io-->
    <?php include 'partials/head.php';?>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;" data-placement="right" data-toggle="tooltip" data-original-title="Kembali ke HOME">
                            <a href="index.php" class="site_title"><i class="glyphicon glyphicon-home"></i> <span>Pustaka Wilayah</span></a>
                        </div>

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <?php include "partials/menu-profile.php" ?>
                        <!-- /menu profile quick info -->
                        <!-- sidebar menu -->
                        <div class="menu_fixed">
                            <?php
//                            $sql = "SELECT * FROM admin_reg";
//                            $h = mysqli_query($link, $sql);
                        $sql = "SELECT * FROM admin_reg";
                        $h = mysqli_query($link, $sql);
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
                        </div>
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                            <a>
                                <span class="glyphicon glyphicon" aria-hidden="false"></span>
                            </a>
                            <a>
                                <span class="glyphicon glyphicon" aria-hidden="false"></span>
                            </a>
                            <a href="index.php?modul=kirimpesan" data-toggle="tooltip" data-placement="top" title="Kirim Pesan">
                                <span class="fa fa-envelope" aria-hidden="true"></span>
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
                                <h3>
                                    <?php
                                    foreach($h as $ro){
                                        if($_SESSION['staffadmin']==$ro['username']){
                                            echo '<span class="label label-danger"> Halaman '.$ro["jabatan"].'</span>';
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
                                        <h2>
                                            <!-- judul content -->
                                        </h2>
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
                    // -----------------roles-------------------------//
                     if (isset($_GET['pages']) AND (isset($_SESSION['staffadmin']))){
                         if ($_GET['pages']=='ubahdataanggota') {
                             include "pages/ubahdataanggota.php";
                         }elseif($_GET['pages']=='deletereg'){
                             include "pages/deletereganggota.php";
                         }elseif($_GET['pages']=='useradminprofile'){
                             include "pages/viewuseradmin.php";
                         }elseif($_GET['pages']=='ubahdataadmin'){
                             include "pages/ubahdataadmin.php";
                         }elseif($_GET['pages']=='delmsg'){
                             include "pages/delmsg.php";
                         }elseif($_GET['pages']=='delpeminjaman'){
                             include "pages/hapuspeminjaman.php";
                         }elseif($_GET['pages']=='detailbuku'){
                             include "pages/buku.php";  
                         }elseif($_GET['pages']=='resetpass'){
                             include "pages/rp.php";  
                         }else{
                            echo '<h2 class="text-danger text-center">Halaman tidak ditemukan 404</h2>';
                            session_destroy();
                         }
                     }
                    //----------------------URI Param----------------------//
                     if (isset($_GET['modul'] )AND (isset($_SESSION['staffadmin']))){

                                if ($_GET['modul']=='modul_calon_user') {
                                    include "modul/show_calon_users.php";
                                }elseif ($_GET['modul']=='home') {
                                    include "modul/cari_buku.php";
                                }elseif ($_GET['modul']=='modul_user') {
                                    include "modul/show_users.php";
                                }elseif ($_GET['modul']=='modul_users') {
                                    include "modul/show_users_sk.php";
                                }elseif ($_GET['modul']=='kirimpesan') {
                                    include "modul/pesand.php";
                                }elseif ($_GET['modul']=='adminprofile') {
                                    include "modul/adminprofile.php";
                                }elseif ($_GET['modul']=='edituser') {
                                    include "modul/edituser.php";
                                }elseif ($_GET['modul']=='tambah_buku') {
                                     include "modul/tambah_buku.php";   
                                }elseif ($_GET['modul']=='kategori_buku'){
                                    include "modul/kategori_buku.php";
                                }elseif ($_GET['modul']=='booksdetailwithuser'){
                                    include "modul/detailuserbuku.php";
                                }elseif ($_GET['modul']=='detailbu'){
                                    include "modul/detailuserbook.php";
                                }elseif ($_GET['modul']=='show_buku'){
                                    include "modul/show_buku.php";
                                }elseif ($_GET['modul']=='cari_buku'){
                                    include "modul/cari_buku.php";
                                }elseif ($_GET['modul']=='help'){
                                    include "modul/help.php";
                                }elseif ($_GET['modul']=='booksdetailwithuser'){
                                    include "modul/detailuserbuku.php";
                                }elseif ($_GET['modul']=='hasilpencarian'){
                                    include "modul/pencarianhasil.php";
                                }elseif ($_GET['modul']=='all_user'){
                                    include "modul/all_user.php";
                                }elseif ($_GET['modul']=='forum'){
                                    include "modul/forumadmin.php";
                                }elseif ($_GET['modul']=='all_admin'){
                                    include "modul/all_admin.php";
                                }elseif ($_GET['modul']=='setting'){
                                    include "modul/setting-profile.php";
                                }elseif ($_GET['modul']=='my-profile'){
                                    include "modul/my-profile.php";
                                }elseif ($_GET['modul']=='peminjaman'){
                                    include "modul/peminjaman_buku.php";
                                }elseif ($_GET['modul']=='datapeminjaman'){
                                    include "modul/data_peminjaman.php";
                                }elseif ($_GET['modul']=='pengembalian'){
                                    include "modul/pengembalian_buku.php";                                
                                }elseif ($_GET['modul']=='datapengembalian'){
                                    include "modul/data_pengembalian.php";
                                }elseif ($_GET['modul']=='laporanpeminjaman'){
                                    include "modul/laporanpeminjaman.php";
                                }elseif ($_GET['modul']=='laporanpengembalian'){
                                    include "modul/laporanpengembalian.php";
                                }elseif ($_GET['modul']=='laporanregistrasi'){
                                    include "modul/laporanregistrasi.php";
                                }elseif ($_GET['modul']=='logatt'){
                                    include "modul/logatt.php";
                                }elseif ($_GET['modul']== 'edit'){
                                    include "modul/edit.php";
                                }else{
                                    //jika tidak ada lagi parameter lain
                                    echo '<h2 class="text-danger text-center">Halaman tidak ditemukan 404</h2>';
                                    session_destroy();
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
                <footer class="footer_fixed">
                    <div class="text-justify">
                        <div class="pull-right">
                            <i class="fa fa-copyright"></i>
                            <?=date("Y")?> <em>Perpustakaan Soeman HS | v1.0 <a target="_blank" href="https://github.com/immsswd"><span class="fa fa-github"></span> <u>GitHub</u></a></em> &mdash; <small><em>
                  Jl. Jenderal Sudirman No 23, Sukajadi Pekanbaru, Riau
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
                $(".datepicker").datepicker({
                    dateFormat: 'yy-mm-dd'
                });
            });
        </script>
    </body>

    </html>

    <?php } //endelse ?>
