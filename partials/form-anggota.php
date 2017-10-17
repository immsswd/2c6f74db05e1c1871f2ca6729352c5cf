<br>
<div class="col-md-3"></div>
<div class="profile-content col-md-6">
    <?php
    include 'users/config/DB.php';
    if (isset($_POST['loginanggota'])){
        $passwrd = htmlentities(md5($_POST['pass']));
        $un      = htmlentities($_POST['username']);
        $count   = 0;
        $stmt = $dbase->query("SELECT * FROM user_reg WHERE username = '$un' && password = '$passwrd' && status = 'yes' && member = 'registered'");
        $count = $stmt->rowCount(PDO::FETCH_NUM);
        if($count == 0){
    ?>
        <div class="alert bg-danger">
            <p><i class="fa fa-warning text-danger"></i> Password/Username salah silahkan <strong><a href="users/login.php">Regstrasi</a></strong> dahulu</p>
        </div>
        <?php
        }else{
            $idmember = $dbase->query("SELECT * FROM anggota WHERE usernamea = '$_SESSION[member]'");
            while ($ro = $idmember->fetch(PDO::FETCH_OBJ)) {
                $_SESSION['idanggota']=$ro->id;
                $_SESSION['kodeanggota']=$ro->kodeanggota;
                $_SESSION['usernameanggota']=$ro->usernamea;
            }
            $_SESSION['member'] = $_POST['username'];
            echo "<script>window.location='users/index.php'</script>";
        }
    }
?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5 class="profile-name">Login Anggota</h5>
                </div>
                <div class="panel-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="username">Username anda</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Password anda</label>
                            <input type="password" name="pass" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="loginanggota" class="btn btn-block btn-success"><i class="fa fa-sign-in"></i> Login Anggota</button>
                        </div>
                    </form>
                </div>
            </div>
</div>
<div class="col-md-3"></div>
