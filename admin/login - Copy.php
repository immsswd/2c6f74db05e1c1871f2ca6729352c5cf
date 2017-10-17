<?php
session_start();
define('_IMGSRC_', "https://imamta.000webhostapp.com/admin/captcha.php");
      include 'partials/head.php';
      include 'config/DB.php';
?>
    <!DOCTYPE html>
    <html lang="id">

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
if ($_SESSION["Captcha"]!= $_POST["nilaiCaptcha"] OR empty($_POST["nilaiCaptcha"])) {
?>
    <div class="bs-example-popovers">
        <div class="alert bg-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <p><i class="fa fa-warning text-danger"></i> <strong>Captcha</strong> tidak sesuai (tidak boleh kosong) mohon diisikan lagi dengan benar</p>
        </div>
    </div>
<?php
    $dbase->query("INSERT INTO loginattempt VALUES (null, '$ip', CURRENT_TIMESTAMP, '$username', '$password', 'formadmin')");
}else{
  $count = $r->rowCount(PDO::FETCH_NUM);
    while($rs = $r->fetch(PDO::FETCH_OBJ)){
        $getnip = $rs->nip;
    }
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
//    setcookie("authorization","ok" );
    header('location:index.php');
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

                                    <div class="form-group has-feedback col-md-12">
                                        <label><img class="" src="captcha.php"></label>
                                        <input type="number" name="nilaiCaptcha" placeholder="Masukkan Nilai Captcha" class="form-control">
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
