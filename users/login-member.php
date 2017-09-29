<?php session_start();
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
  $passwrd = htmlentities(md5($_POST['password']));
  $un       = htmlentities($_POST['username']);
  $count = 0;
  $r = mysqli_query($link, "SELECT * FROM user_reg WHERE username = '$un' && password = '$passwrd' && status = 'yes' && member = 'registered'");
  $count = mysqli_num_rows($r);
//  print($count);
  if ($count==0) {
    ?>
      <div class="alert bg-danger">
        <p> Password/Username salah</p>        
      </div>
  <?php
  }else{

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
?>
            <h2><i class="fa fa-book"></i> Perpustakaan Soeman HS Riau</h2>
            <form method="POST">
              <div>
                <h2 class="text-success well">Login Anggota</h2>
              </div><hr>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" name="login_anggota" class="btn btn-success btn-block"><i class="fa fa-sign-in"></i> Login anggota</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">
                  <a href="login.php" ><strong><i class="fa fa-list-alt"></i> Registrasi Anggota?</strong></a>
                </p>

                <div class="clearfix"></div>
                <br />

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
<?php include "partials/footer.php"; ?>
  </body>
</html>
