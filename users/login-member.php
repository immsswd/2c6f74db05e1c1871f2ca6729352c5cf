<?php session_start()?>
<?php
  include 'config/dbOldWay.php';
  include 'config/DB.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'partials/head.php';?>

<body class="login">
    <?php include "partials/navfix.php"; ?>
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <?php  
if (isset($_POST['login_anggota'])) {
  $passwrd  = htmlentities(md5($_POST['password']));
  $un       = htmlentities($_POST['username']);
  $count    = 0;
  $ip       = $_SERVER['REMOTE_ADDR'];
    
  $stmt = $dbase->query("SELECT * FROM user_reg WHERE username = '$un' && password = '$passwrd' && status = 'yes' && member = 'registered'");
  $count = $stmt->rowCount(PDO::FETCH_NUM);
//  print($count);
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
       $dbase->query("INSERT INTO loginattempt VALUES (null, '$ip', CURRENT_TIMESTAMP, '$un', '$passwrd', 'formanggota')");
}else{
  if ($count==0) {
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
     $dbase->query("INSERT INTO loginattempt VALUES (null, '$ip', CURRENT_TIMESTAMP, '$un', '$passwrd', 'formanggota')"); 
  }else{
    // $_SESSION['num'] = $count;
    $_SESSION['member'] = $_POST['username'];

    $idmember = $dbase->query("SELECT * FROM anggota WHERE usernamea = '$_SESSION[member]'");
    while ($ro = $idmember->fetch(PDO::FETCH_OBJ)) {
        $_SESSION['idanggota']=$ro->id;
        $_SESSION['kodeanggota']=$ro->kodeanggota;
        $_SESSION['usernameanggota']=$ro->usernamea;
    }

    header('location:index.php');
  }
  }
}
?>

                        <form method="POST" class="form-label-left input_mask">
                            <div>
                                <h2 class="text-success well">Login Anggota</h2>
                            </div>
                            <hr>
                            <div class="form-group has-feedback col-md-12">
                                <input name="username" type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Username" required>
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <div class="form-group has-feedback col-md-12">
                                <input name="password" type="password" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Password" required>
                                <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <div class="form-group has-feedback col-md-12">
                                <label><img class="" src="captcha.php"></label>
                                <input type="number" name="nilaiCaptcha" placeholder="Masukkan Nilai Captcha" class="form-control">
                            </div>

                            <div class="form-group has-feedback col-md-12">
                                <button type="submit" name="login_anggota" class="btn btn-success btn-block"><i class="fa fa-sign-in"></i> Login anggota</button>
                                <a class="reset_pass pull-right" href="#">Lost your password?</a>
                            </div>

                            <div class="separator form-group has-feedback col-md-12">
                                <p class="change_link">
                                    <a href="login.php"><strong><i class="fa fa-list-alt"></i> Registrasi Anggota?</strong></a>
                                </p>

                                <div class="clearfix"></div>
                                <br />

                                <div>
                                    <?php $tahun = date("Y") ?>
                                    <p>©
                                        <?=$tahun?> Perpustakaan Soeman HS</p>
                                </div>
                            </div>
                        </form>
                </section>
            </div>
        </div>
    </div>
    <?php include "partials/footer.php"; ?>
</body>

</html>
