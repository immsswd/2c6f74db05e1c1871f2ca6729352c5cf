<?php
include_once "config/dbold.php";
$un = $_SESSION['staffadmin'];
//var_dump($un);
$q = mysqli_query($link, "SELECT * FROM admin_reg WHERE username='$un'");
$h = mysqli_fetch_all($q, MYSQLI_ASSOC);
?>
    <div class="col-md-2"></div>
    <div class="col-md-7">
        <h3 class="well well-sm text-center">Edit Profile</h3>
        <form method="POST" enctype="multipart/form-data">
<?php 
    if(isset($_POST["update"])){
        $sql = "UPDATE admin_reg";
    }
?>
            <?php foreach ($h as $row): ?>
            <div class="form-group">
                <label for="nip">NIP/NIK:</label>
                <input type="text" name="nip" class="form-control" value="<?php echo $row["nip"]?>" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-control" value="<?php echo $row["username"]?>" required>
            </div>
            <div class="form-group">
                <label for="firstname">Nama Awal:</label>
                <input type="text" name="firstname" class="form-control" value="<?php echo $row["firstname"]?>" required>
            </div>
            <div class="form-group">
                <label for="lastname">Nama Akhir:</label>
                <input type="text" name="lastname" class="form-control" value="<?php echo $row["lastname"]?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" value="<?php echo $row["email"]?>" required>
            </div>
            <div class="form-group">
                <label for="contact">Kontak/Hp:</label>
                <input type="text" name="contact" class="form-control" value="<?php echo $row["contact"]?>" required>
            </div>
            <div class="form-group has-warning">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control " placeholder="Password" required>
            </div>
            <div class="form-group has-success">
                <label for="upassword">Ulangi Password:</label>
                <input type="password" name="upassword" class="form-control " placeholder="Ulangi Password" required>
            </div>
            <div class="form-group">
                <label for="profile_img">Pilih Foto</label>
                <input type="file" name="gambar" required>
            </div><br>
            <div class="form-group">
                <button type="submit" name="update" class="btn btn-success btn-block submit">Update</button>
            </div>

            <div class="clearfix"></div>
        </form>
    </div>
    <div class="col-md-3">
        <div class="pull-right">
            <img class="img-circle" width="200" height="200" src="<?php echo $row['profile_img'] ?>">
        </div>
        <?php endforeach ?>
    </div>
    <div class="col-md-12">
        <?php
            if (isset($_POST['update'])) {
                $nip        = htmlentities($_POST['nip']);
                $username   = htmlentities($_POST['username']);
                $firstname  = htmlentities($_POST['firstname']);
                $lastname   = htmlentities($_POST['lastname']);
                $email      = htmlentities($_POST['email']);
                $contact    = htmlentities($_POST['contact']);
                $pass1      = htmlentities(md5($_POST['password']));
                $pass2      = htmlentities(md5($_POST['upassword']));
                
                $tm = md5(time());
                $fnm = $_FILES["gambar"]["name"];
                $dst = "./profileimg/".$tm.$fnm;
                $dst1 = "profileimg/".$tm.$fnm;
                move_uploaded_file($_FILES["gambar"]["tmp_name"] ,$dst);

                if ($pass1 == $pass2) {
                    $query = $dbase->query("UPDATE admin_reg SET nip = '$nip', username='$username', firstname = '$firstname', lastname = '$lastname', email = '$email', contact = '$contact', password = '$pass1', profile_img = '$dst' WHERE username = '$_SESSION[staffadmin]'");
                    
                    if ($query){
                        echo '<script>alert("Update Berhasil")</script>';
                    }
                }else{
                    echo '<div class="alert alert-danger">Password tidak sesuai</div>';
                }
            }
        ?>
    </div>
