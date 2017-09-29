<!DOCTYPE html>
<html lang="en">
<?php 
include "partials/head.php";
include "config/dbOldWay.php";
?>

  <body class="login">
    <?php include "partials/navfix.php"; ?> 
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">

        <div class="animate form login_form">
        <center><h3><i class="fa fa-book"></i> Perpustakaan Soeman HS Riau</h3></center>
          <section class="login_content">
            <form method="POST" enctype="multipart/form-data">
              <h1>Create an Account</h1>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required>
              </div>
              <div>
              <input type="text" name="firstname" class="form-control" placeholder="Firstname" required>
              </div>
              <div>
              <input type="text" name="lastname" class="form-control" placeholder="Lastname">
              </div>
              <div>
              <input type="email" name="email" class="form-control" placeholder="Email" required>
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
              </div>
              <div>
                <button type="submit" name="register" class="btn btn-success btn-block submit">Register</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">
                  <a href="login.php" class="to_login"><span class="text-primary" style="font-size: 14px; font-weight: 600"><i class="fa fa-sign-in"></i> Login Registrasi</span></a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <p>©2017 | Pustaka Soeman HS - All Rights Reserved</p>
                </div>
              </div>
            </form>
      <?php 
    
      if (isset($_POST['register'])) {
          // $username = htmlentities($_POST['username']);
          // $firstname = htmlentities($_POST['firstname']);
          // $lastname = htmlentities($_POST['lastname']);
          // $email = htmlentities($_POST['email']);
          // $password = htmlentities($_POST['password']);
          $reg = "notregistered";
      
          $q = mysqli_query($link, "INSERT INTO user_reg VALUES (null, '$_POST[username]','$_POST[firstname]', '$_POST[lastname]', '$_POST[email]', '".md5($_POST['password'])."', 'no', '$reg', NOW())");
          if ($q) {
            echo '<script>alert("Register berhasil");window.location = "login.php";</script>';
          }
          
        }
      ?>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
