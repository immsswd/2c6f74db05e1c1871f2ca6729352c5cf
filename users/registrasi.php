<?php session_start();?>
<?php
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT']); 

include "config/dbold.php";
if (!isset($_SESSION['calonanggota'])){
header("location:login.php");
}else{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Registrasi Anggota Perpustakaan </title>

        <!-- Bootstrap -->
        <link href="public/css/style.css" rel="stylesheet">
        <!--    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
        <!-- Custom Theme Style -->
        <link href="build/css/custom.min.css" rel="stylesheet">
        <link href="public/css/datedropper.min.css" rel="stylesheet">
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="registrasi.php?form=home" class="site_title"><i class="glyphicon glyphicon-home"></i> <span>Pustaka Wilayah</span></a>
                        </div>

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <div class="profile clearfix">
                            <div class="profile_pic">
                                <img src="public/images/user.png" alt="..." class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span>Welcome,</span>
                                <h2>
                                    <?= ucwords($_SESSION["calonanggota"]) ?>
                                </h2>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- /menu profile quick info -->

                        <br />

                        <!-- sidebar menu -->
                        <?php 
 	include 'partials/sidebar-registrasi.php'
  ?>
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top">
                <span class="glyphicon glyphicon-co" aria-hidden="true"></span>
              </a>
                            <a data-toggle="tooltip" data-placement="top">
                <span class="glyphicon glyphicon-fullscree" aria-hidden="true"></span>
              </a>
                            <a data-toggle="tooltip" data-placement="top">
                <span class="glyphicon glyphicon-eye-clos" aria-hidden="true"></span>
              </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off text-warning" aria-hidden="true"></span>
              </a>
                        </div>
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="public/images/user.png" alt=""> <?= ucwords($_SESSION["calonanggota"]);?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">

                                        <li><a href="partials/logoutr.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>Halaman Registrasi Anggota</h3>
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
                                        <!--                      <h2>Form Regisrasi</h2>-->

                    <?php
                            if(isset($_GET['form'])) {
                                
                                if(($_GET['form']=='home') OR $_GET['form']== null){
                                    include "form/home-reg.php";
                                }
                                elseif ($_GET['form']=='registrasi') {
                                    include "form/form_registrasi.php";
                                }
                                elseif ($_GET['form']=='setting') {
                                    include "modul/settingprofile.php";
                                }
                                elseif($_GET['form']=='datadiri'){
                                    include "form/data.php";
                                }
                                elseif($_GET['form']=='export'){
                                    include "form/fpdfreg.php";
                                }
                                else{
                                    //jika tidak ada lagi parameter lain
                                    echo 'Halaman Tidak Ditemukan <br>
                                    <center class="text-danger">404</center>';
                                    session_destroy();
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
                    <script src="public/js/datedropper.min.js"></script>
                    <script>
                        $('#date').dateDropper();

                    </script>
                </footer>
    </body>

    </html>
    <?php } ?>
