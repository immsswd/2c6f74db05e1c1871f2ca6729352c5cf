<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<?php include 'partials/head.php';
      include 'config/dbOldWay.php';
      include 'config/DB.php';
?>

<body class="login">
    <?php include "partials/navfix.php"; ?>
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <?php 
function ai($data){
    $fltsql = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
    return $fltsql;
}
if (isset($_POST['login'])) {    
  $password = ai(md5($_POST['password']));
  $un       = ai($_POST['username']);
  $ip       = $_SERVER['REMOTE_ADDR'];
  $count = 0;
  $stmt  = $dbase->query("SELECT * FROM user_reg WHERE username = '$un' && password = '$password' && status = 'no'");
//  $count = mysqli_num_rows($r);
  $count = $stmt->rowCount(PDO::FETCH_NUM);
  $getid = $stmt->fetch(PDO::FETCH_ASSOC);
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
      $dbase->query("INSERT INTO loginattempt VALUES (null, '$ip', CURRENT_TIMESTAMP, '$un', '$password', 'formregistrasi')");
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
$dbase->query("INSERT INTO loginattempt VALUES (null, '$ip', CURRENT_TIMESTAMP, '$un', '$password', 'formregistrasi')");
  }else{
    $_SESSION['iduser'] = $getid['id'];
    $_SESSION['calonanggota'] = $_POST['username'];
    header('location:registrasi.php');
    }
  }
}
?>
                        <form method="POST" class="form-label-left input_mask">
                            <div>
                                <h2 class="text-success well">Login Registrasi Keanggotaan</h2>
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
                                <button type="submit" name="login" class="btn btn-primary btn-block"><i class="fa fa-sign-in"></i> Login registrasi</button>
                                <a href="signup.php" class="to_register text-center">
                                    <span class="text-danger alert bg-success"><i class="fa fa-external-link"></i> <strong>Buat Akun registrasi</strong> </span>
                                </a>
                            </div>

                            <div class="separator form-group has-feedback col-md-12">
                                <div class="alert bg-info">
                                    <div class="change_link">Daftar Anggota? (Untuk LOGIN registrasi silahkan membuat akun registrasi dahulu, atau silahkan login sesuai username dan password yang sudah dibuat saat regsitrasi akun)

                                    </div>
                                    <h3><a href="login-member.php" class="text-success"><strong><i class="fa fa-sign-in"></i> Login Anggota</strong></a>
                                    </h3>
                                </div>
                                <div class="clearfix"></div>
                                <br>

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
</body>

</html>
