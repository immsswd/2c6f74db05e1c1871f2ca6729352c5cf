<?php session_start();?>
<?php
  include 'config/dbOldWay.php';
  include 'config/DB.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Perpustakaan Soeman HS</title>

    <!-- Bootstrap -->
    <link href="public/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="build/css/dataTables.bootstrap.min.css">
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">

    <link rel="shortcut icon" href="public/images/pku.jpg" />
</head>

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
     $dbase->query("INSERT INTO loginattempt VALUES (null, CURRENT_TIMESTAMP, '$ip', '$un', '$passwrd', 'Form Login Anggota')"); 
  }else{
    $_SESSION['member'] = $_POST['username'];

    $idmember = $dbase->query("SELECT * FROM anggota WHERE usernamea = '$_SESSION[member]'");
    while ($ro = $idmember->fetch(PDO::FETCH_OBJ)) {
        $_SESSION['idanggota']=$ro->id;
        $_SESSION['kodeanggota']=$ro->kodeanggota;
        $_SESSION['usernameanggota']=$ro->usernamea;
    }
    echo '<script>window.location="../users/"</script>';
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

                            <!-- <div class="form-group has-feedback col-md-12">
                                <label><img class="" src="captcha.php"></label>
                                <input type="number" name="nilaiCaptcha" placeholder="Masukkan Nilai Captcha" class="form-control">
                            </div> -->

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
