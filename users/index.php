<?php
session_start();
include "config/dbold.php";
include "config/DB.php";
if (empty($_SESSION['member'])){
    header("location:login.php");
}else{
?>
<!DOCTYPE html>
<html lang="en">
<?php 
include 'partials/head.php'
?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-book"></i> <span>Pustaka Wilayah</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
            <?php
              $que = $dbase->query("SELECT * FROM anggota WHERE usernamea = '$_SESSION[member]'");
              $h = $que->fetchAll();
              // var_dump($h);
              foreach ($h as $va) {
                $foto = $va['foto'];
                $nama = $va['nama'];
              }

            ?>
                <img src="<?=$foto?>" widht="100" height="100" alt="<?=$nama?>" class="img-responsive img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo ucwords($nama) ?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

    <!-- sidebar menu -->
 <?php 
 	include 'partials/sidebar-menu.php'
  ?> 
    <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
    <?php include "partials/top-navigation.php" ?>
        <!-- /top navigation -->

        <!-- page content -->
    <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Halaman Anggota</h3>
              </div>

      <!--     search input    <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div> -->
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
<!--                    <h2>Page</h2>-->
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
         if (isset($_GET['modul'])) {

                                if ($_GET['modul']=='') {
                                    
                                }elseif ($_GET['modul']=='setting') {
                                    include "modul/settingprofile.php";
                                }elseif ($_GET['modul']=='caribuku') {
                                    include "modul/cari_buku.php";
                                }elseif ($_GET['modul']=='hasil') {
                                    include "modul/pencarianhasil.php";
                                }elseif ($_GET['modul']=='history'){
                                    include "modul/history_peminjaman.php";
                                }elseif ($_GET['modul']=='history_pengembalian'){
                                   include "modul/history_pengembalian.php";
                                }elseif ($_GET['modul']=='buku'){
                                   include "modul/show_buku.php";
                                }elseif ($_GET['modul']=='profile'){
                                   include "modul/profile.php";
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
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
 <?php include 'partials/footer.php' ?>
  </body>
</html>
      <?php } ?>
