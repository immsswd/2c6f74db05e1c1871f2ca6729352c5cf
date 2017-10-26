<!DOCTYPE html>
<html lang="id">
<?php 
include "partials/head.php";
include "config/DB.php";
?>

<body class="login">
    <?php include "partials/navfix.php"; ?>
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">

            <div class="animate form login_form">
                <section class="login_content">
                    <h2 class="well">Buat akun Registrasi</h2>
                    <form method="POST" enctype="multipart/form-data">
                        <div>
                            <label class="pull-left">Username <small class="text-danger"><em>(min 7 karakter)</em></small></label>
                            <input type="text" name="username" class="form-control" placeholder="Username (minimal 7 karakter)" required pattern=".{7,}">
                        </div>
                        <div>
                            <label class="pull-left">Firstname</label>
                            <input type="text" name="firstname" class="form-control" placeholder="Nama awal" required pattern="^[A-Za-z]+">
                        </div>
                        <div>
                            <label class="pull-left">Lastname</label>
                            <input type="text" name="lastname" class="form-control" placeholder="Nama akhir" pattern="^[A-Za-z]+">
                        </div>
                        <div>
                            <label class="pull-left">Email <small>(putri@mail.com<span class="text-success"><i class="fa fa-check"></i></span>) (<span>pu7R1@mail.com<strong class="text-danger"><i class="fa fa-close"></i></strong></span>)</small></label>
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div>
                            <label class="pull-left">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required pattern="^[A-Za-z0-9]+">
                        </div>
                        <!-- <div class="">
                                <label><img class="" src="captcha.php"></label>
                                <input type="text" name="nilaiCaptcha" placeholder="Nilai Captcha" class="form-control">
                        </div> -->
                        <div>
                            <button type="submit" name="register" class="btn btn-primary btn-block submit"><i class="fa fa-save"></i> Register</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">

                            </p>

                            <div class="clearfix"></div>
                                <div class="alert bg-info">
                                    <p>
                                        <strong class="fa fa-warning text-warning"></strong> Mohon diingat <strong>username dan password untuk</strong>
                                        <a href="login.php" class="to_login"><span class="text-primary" style="font-size: 14px; font-weight: 600"><i class="fa fa-sign-in"></i> Login Registrasi</span></a>
                                    </p>
                                </div>
                            
                            <br />

                            <div>
                                <?php $tahun = date("Y") ?>
                                <p>©
                                    <?=$tahun?> Perpustakaan Soeman HS
                                </p>
                            </div>
                        </div>
                    </form>
    <?php
      if (isset($_POST['register'])) {
           $username = htmlentities($_POST['username']);
           $firstname = htmlentities($_POST['firstname']);
           $lastname = htmlentities($_POST['lastname']);
           $email = htmlentities($_POST['email']);
          // $password = htmlentities($_POST['password']);

           $stmt = $dbase->query("SELECT * FROM user_reg WHERE username = '$username'");
           $usn = $stmt->rowCount(PDO::FETCH_NUM);
           //saring duplikasi username, kesalahan/capthca tidak di input dan eksekusi jika bebas kesalahan.
          if ($usn != 0){
              echo '<script>alert("Username sudah ada, silahkan buat username yang lain")</script>';
          }else{
          $reg = "notregistered";
          $q = $dbase->query("INSERT INTO user_reg VALUES (null, '$username','$firstname', '$lastname', '$email', '".md5($_POST['password'])."', 'no', '$reg', NOW())");
            if ($q) {
                echo '<script>alert("Register berhasil");window.location = "login.php";</script>';
            }
          }
        }
      ?>
                </section>
            </div>
        </div>
    </div>
</body>

</html>
