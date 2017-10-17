<?php session_start();?>
<?php
define('_IMGSRC_', "https://imamta.000webhostapp.com/admin/captcha.php");
      include 'config/DB.php';
?>
    <!DOCTYPE html>
    <html lang="id">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta name="robots" content="no-index, no-follow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin | Perpustakaan Soeman HS</title>
    <!--Tugas Akhir -> immsswd.github.io-->
    <!-- Bootstrap -->
    <!--  <link rel="stylesheet" type="text/css" href="build/css/bootstrap.min.css"> -->
    <link href="public/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="build/css/dataTables.bootstrap.min.css">
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link href="build/css/jquery-ui.css" rel="stylesheet">

    <link rel="shortcut icon" href="public/images/pku.jpg" />
    <link href="build/css/sweetalert.min.css" rel="stylesheet"> 
    
</head>
    <body class="login">
        <?php include "partials/navfix.php"; ?>
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>

            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content ">

                        <?php
if (isset($_POST['login']) AND isset($_POST['username']) AND isset($_POST['password'])) {
    
  $password = htmlentities(md5($_POST['password']));
  $username = htmlentities($_POST['username']);
  $ip       = $_SERVER['REMOTE_ADDR'];
  // $nip      = htmlentities($_POST['nip']);
  $count = 0;
  $r = $dbase->query("SELECT * FROM admin_reg WHERE username = '$username' AND  password = '$password'");

    $dbase->query("INSERT INTO loginattempt VALUES (null, '$ip', CURRENT_TIMESTAMP, '$username', '$password', 'formadmin')");
  $count = $r->rowCount(PDO::FETCH_NUM);
    while($rs = $r->fetch(PDO::FETCH_OBJ)){
        $getnip = $rs->nip;

  if ($count == 0) {
      session_destroy();
    ?>
    <div class="bs-example-popovers">
        <div class="alert bg-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <p class="text-danger"><i class="fa fa-warning text-danger"></i> Username atau Password anda salah</p>
        </div>
    </div>
<?php
      $dbase->query("INSERT INTO loginattempt VALUES (null, '$ip', CURRENT_TIMESTAMP, '$username', '$password', 'formadmin')");
  }else{
    $_SESSION["staffadmin"] = $_POST["username"];
    $_SESSION["nipadmin"]   = $getnip;
    echo '<script>window.location="index.php"</script>';
  }
  }
}
?>

                                <form method="POST" class="form-label-left input_mask">
                                    <div>
                                        <h2 class="well">Admin/Staff Login</h2>
                                    </div>
                                    <hr>
                                    <div class="form-group has-feedback col-sm-12 col-md-12">
                                        <input name="username" type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Username" required>
                                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <!-- <div class="form-group has-feedback col-sm-12 col-md-12">
                                        <input name="nip" type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="nip" required>
                                        <span class="fa fa-pencil form-control-feedback left" aria-hidden="true"></span>
                                    </div> -->

                                    <div class="form-group has-feedback col-sm-12 col-md-12">
                                        <input name="password" type="password" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Password" required>
                                        <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <button type="submit" name="login" class="btn btn-warning btn-block"><i class="fa fa-sign-in"></i> Login</button>
                                        <a class="reset_pass pull-right" href="#">Lost your password?</a>
                                    </div>

                                    <div class="separator form-group has-feedback col-md-12">

                                        <div class="clearfix"></div>
                                        <br />

                                        <div>
                                            <?php $tahun = date("Y");?>
                                            <p>©
                                                <?=$tahun?> Perpustakaan Soeman HS</p>
                                        </div>
                                    </div>
                                </form>
                    </section>
                </div>
            </div>
        </div>
        <?php include "partials/footer.php" ?>
    </body>

    </html>
