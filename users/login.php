<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<?php include 'partials/head.php';
      include 'config/dbOldWay.php';
?>

  <body class="login">
<?php include "partials/navfix.php"; ?> 
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
             <h3 class="separator well well-sm"><a href="login-member.php"><strong><i class="fa fa-sign-in"></i> Login Anggota</strong></a></h3>

<?php 
function ai($data){
    $fltsql = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
    return $fltsql;
}
if (isset($_POST['login'])) {    
  $password = ai(md5($_POST['password']));
  $un       = ai($_POST['username']);
    
//  $getid  = mysqli_query($link, "SELECT * FROM user_reg WHERE username = '$un'");
//  $rs = mysqli_fetch_all($getid, MYSQLI_ASSOC);
    
  $count = 0;
  $r = mysqli_query($link, "SELECT * FROM user_reg WHERE username = '$un' && password = '$password' && status = 'no'");
  $count = mysqli_num_rows($r);
  $getid = mysqli_fetch_assoc($r);
  // print($count);
  if ($count==0) {
    ?>
      <div class="alert alert-danger">
        <p> Password/Username salah</p>        
      </div> 
  <?php

  }else{
    $_SESSION['iduser'] = $getid['id'];
    $_SESSION['calonanggota'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    header('location:registrasi.php');
  }
}
?>
<!-- <h2><i class="fa fa-book"></i> Perpustakaan Soeman HS Riau</h2><hr> -->
            <form method="POST">
              <div>
                <h2 class="">Login Registrasi Anggota</h2><hr>
              </div><hr>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required>
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
              </div>
              <div>
                <button type="submit" name="login" class="btn btn-primary btn-block"><i class="fa fa-sign-in"></i> Login registrasi</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Daftar Anggota?
                  <h2><a href="signup.php" class="to_register text-center"><span class="text-danger"><strong>Buat Akun registrasi</strong> </span></a></h2>
                  
                 
                </p>

                <div class="clearfix"></div>
                <br>

                <div>
                  <?php $tahun = date("Y") ?>
                  <p>© <?=$tahun?> All Rights Reserved | Perpustakaan Soeman HS</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
