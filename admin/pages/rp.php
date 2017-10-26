<div class="col-md-2">
</div>
<div class="col-md-8">
    <div class="alert bg-info">
        <i class="fa fa-warning text-danger"></i> Mohon diingat Password yang akan diubah
    </div>
    <span class="lead text-center">Nama: <?=$_SESSION['nama']?></span><br>
    <span class="lead text-center">Kode Anggota: <?=$_SESSION['noanggota']?></span>
    <hr>
    <?php
    $d = $dbase->query("SELECT * FROM anggota INNER JOIN user_reg ON anggota.iduser = user_reg.id WHERE kodeanggota = '$_SESSION[noanggota]'");
    while($row = $d->fetch(PDO::FETCH_OBJ)):
        $emailuser      = $row->email;
        $un             = $row->username;
    endwhile;
    if(isset($_POST['resetp'])){
            $newpass    = md5($_POST['pass']);
            $repetp     = md5($_POST['ulangipass']);
        if($newpass == $repetp){
            $rest       = $dbase->query("UPDATE anggota INNER JOIN user_reg ON anggota.iduser = user_reg.id SET password = '$newpass' WHERE username = '$_SESSION[username]'");
            if($rest){
                echo "<script>alert('password berhasil diubah');window.location='index.php?modul=all_user'</script>";
            }
        }else{
            ?>
        <div class="alert bg-warning alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <p><strong>Maaf Password tidak <em>Matching</em></strong></p>
        </div>
        <?php
        }
    }
?>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label form="newpass">Masukkan Password baru (min 10 karakter)</label>
                    <input type="password" name="pass" class="form-control" placeholder="*******" required pattern=".{3,}">
                </div>
                <div class="form-group">
                    <label form="newpass">Ulangi Password (min 10 karakter)</label>
                    <input type="password" name="ulangipass" class="form-control" placeholder="*******" required pattern=".{3,}">
                </div>
                <div class="form-group">
                    <button class="btn btn-danger btn-block" name="resetp">Reset Password??</button>
                </div>
            </form>
</div>
<div class="col-md-2"></div>
