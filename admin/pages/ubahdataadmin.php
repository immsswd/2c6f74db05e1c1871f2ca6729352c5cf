<?php
//var_dump($_SESSION['idadmin']);
$stmt   = $dbase->query("SELECT * FROM admin_reg WHERE id = '$_SESSION[idadmin]'");
while($row = $stmt->fetch(PDO::FETCH_OBJ)){
    $foto       = $row->profile_img;
    $nip        = $row->nip;
    $nama       = $row->firstname.' '.$row->lastname;
    $username   = $row->username;
    $email      = $row->email;
    $jabatan    = $row->jabatan;
    $contact    = $row->contact;
}
?>
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <center>
            <img src="<?=$foto?>" width="100" height="100" class="img img-responsive img-thumbnail"><br>
            <strong style="font-family: courier">
				<?=$nip?>
			</strong>
        </center>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" value="<?=$nama?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" value="<?=$username ?>" class="form-control" disabled>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" value="<?=$email?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" name="jabatan" value="<?=$jabatan?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="contact">Kontak</label>
                <input type="text" name="contact" value="<?=$contact?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" placeholder="isi alamat" class="form-control" rows="4"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="ubahdata" class="btn btn-success btn-block">Ubah Data</button>
            </div>
        </form>
    </div>
    <div class="col-md-3">
        <?php
    if (isset($_POST['ubahdata'])){
        $nama       = htmlentities($_POST['nama']);
//   $una = htmlentities($_POST['username']);
        $email      = htmlentities($_POST['email']);
        $jabatan    = htmlentities($_POST['jabatan']);
        $contact    = htmlentities($_POST['contact']);
        $alamat     = htmlentities($_POST['alamat']);
        
        $upd  = $dbase->query("INSERT INTO adminn VALUES (null, '$_SESSION[idadmin]', '$nama', '$jabatan', '$contact', '$email', '$alamat', NOW())");
        if($upd){
            echo '<script>alert("data berhasil di update")</script>';
            }
    }
    ?>
    </div>
