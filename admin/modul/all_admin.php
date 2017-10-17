<div class="col-md-4">
    <section class="login_content">

        <form method="POST" enctype="multipart/form-data" class="text-left">
            <h2 class="text-center"><i class="fa fa-paperclip"></i> Buat akun Admin</h2>
            <hr>
            <div class="form-group">
                <label for="nip">NIP/NIK</label>
                <input type="text" name="nip" class="form-control" placeholder="NIP/NIK" required>
            </div>
            <div class="form-group">
                <label for="privillege">Bagian</label>
                <select name="privillege" class="form-control">
                    <option value="Staff Registrasi">Staff Registrasi</option>
                    <option value="Staff Peminjaman">Staff Peminjaman</option>
                    <option value="Kepala Sirkulasi">Kepala Sirkulasi</option>
                    <option value="Staff Kartu">Staff Kartu</option>
                    <option value="Admin">Admin</option>
                  </select>
            </div>
            <div class="form-group">
                <label for="username">Buat username</label>
                <input type="text" name="username" class="form-control" placeholder="eg: annisa12" required>
            </div>
            <div class="form-group">
                <label for="firstname">Nama Awal</label>
                <input type="text" name="firstname" class="form-control" placeholder="eg:Annisa" required>
            </div>
            <div class="form-group">
                <label for="firstname">Nama Akhir</label>
                <input type="text" name="lastname" class="form-control" placeholder="eg: Putri" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="eg: annisaputri@email.com" required>
            </div>
            <div class="form-group">
                <label for="contact">Kontak/WA</label>
                <input type="text" name="contact" class="form-control" placeholder="12345678" required>
            </div>
            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" name="password" class="form-control" placeholder="******" required>
            </div>
            <div class="form-group">
                <label for="profile_img">Pilih Foto</label>
                <input type="file" name="gambar" required>
            </div><br>
            <div class="form-group">
                <button type="submit" name="register" class="btn btn-success btn-block submit">Register</button>
            </div>
        </form>
        <?php 
    
      if (isset($_POST['register'])) {
           $username = htmlentities($_POST['username']);
           $firstname = htmlentities($_POST['firstname']);
           $lastname = htmlentities($_POST['lastname']);
           $email = htmlentities($_POST['email']);
          // $password = htmlentities($_POST['password']);
            $tm = md5(time());
            $fnm = $_FILES["gambar"]["name"];
            $dst = "./profileimg/".$tm.$fnm;
            $dst1 = "profileimg/".$tm.$fnm;
            move_uploaded_file($_FILES["gambar"]["tmp_name"] ,$dst); 
          
          $q = mysqli_query($link, "INSERT INTO admin_reg VALUES (null, '$_POST[nip]', '$_POST[privillege]','$_POST[username]', '$_POST[firstname]', '$_POST[lastname]', '$_POST[email]','$_POST[contact]', '".md5($_POST['password'])."','$dst')");
          
          
//          $stm = $dbase->query("INSERT INTO adminn VALUES ('', '$firstname $lastname', '')")
          if ($q) {
            echo "<script>alert('Akun admin berhasil dibuat');</script>";
          }
          
        }
      ?>
    </section>
</div>
<div class="col-md-8">
    <?php
        // $query  = mysqli_query($link, "SELECT * FROM admin_reg ORDER BY id DESC");
        // $r      = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $quer = $dbase->query("SELECT * FROM admin_reg ORDER BY id DESC");

        $no     = 1;
    ?>
        <table class="table table-responsive table-bordered">
            <h2 class="text-center"><i class="fa fa-paperclip"></i> Semua Admin</h2>
            <hr>
            <thead>
                <tr>
                    <th>#</th>
                    <th>NIP/NIK</th>
                    <th>Nama</th>
                    <th>Hak Akses</th>
                    <th>No HP/WA</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($r = $quer->fetch(PDO::FETCH_OBJ)): ?>
                <tr>
                    <td>
                        <?=$no ?>
                    </td>
                    <td>
                        <?=$r->nip ?>
                    </td>
                    <td>
                        <?=$r->firstname." ".$r->lastname  ?>
                    </td>
                    <td>
                        <?=$r->jabatan ?>
                    </td>
                    <td>
                        <?=$r->contact ?>
                    </td>
                    <td>
                        <a href="pages/deladmin.php?id=<?=$r->id?>" onclick="return confirm('anda yakin ingin menghapus?')" type="button" id="confirm" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a>
                    </td>
                    <?php
        $no++; endwhile ?>
                </tr>
            </tbody>

        </table>
</div>
