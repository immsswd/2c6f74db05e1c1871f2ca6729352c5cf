<?php
 session_start();
      include 'partials/head.php';
      include 'config/dbold.php';
?>
<!DOCTYPE html>
<html lang="en">
  <body class="login">
<?php include "partials/navfix.php"; ?>
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">

<?php
if (isset($_POST['login']) AND isset($_POST['username']) AND isset($_POST['password'])) {
    
  $password = md5($_POST['password']);
  $username = $_POST['username'];
  $count = 0;
  $r = mysqli_query($link, "SELECT * FROM admin_reg WHERE username = '$_POST[username]' &&  password = '$password'");
     
  $count = mysqli_fetch_all($r, MYSQLI_BOTH);
  $getnip = mysqli_fetch_array($r);
  // print($count);
  if ($count==0) {
    // $_SESSION['username'] = $_POST['username'];
    // $_SESSION['password'] = $_POST['password']);
    ?>
      <div class="well">
        <p class="text-danger">Invalid Username Or Password</p>
      </div>
  <?php
  }else{
    $_SESSION["staffadmin"]= $_POST["username"];
//    setcookie("authorization","ok" );
    header('location:index.php');
  }
}
?>

            <form method="POST">
              <h2 class="well well-sm">Admin/Staff Login Form</h2><hr>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" name="login" class="btn btn-warning btn-block"><i class="fa fa-sign-in"></i> Login</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

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
<?php include "partials/footer.php" ?>
  </body>
</html>
