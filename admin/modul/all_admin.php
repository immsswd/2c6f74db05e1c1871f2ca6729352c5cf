<!--
<p class="change_link">
    <h2><a href="signup.php" class="to_register"><span class="text-danger"><strong>Buat Akun</strong> </span></a></h2>
</p>
-->
<div class="col-md-4">
    <section class="login_content">
            
            <form method="POST" enctype="multipart/form-data">
              <h2 class="text-center"><i class="fa fa-paperclip"></i> Buat akun Admin</h2><hr>
              <div class="form-group">
                <input type="text" name="nip" class="form-control" placeholder="NIP/NIK" required>
              </div>
              <div class="form-group">
                <select name="privillege" class="form-control">
                    <option value="Staff Registrasi">Staff Registrasi</option>
                    <option value="Staff Peminjaman">Staff Peminjaman</option>
                    <option value="Kepala Sirkulasi">Kepala Sirkulasi</option>
                    <option value="Staff Kartu">Staff Kartu</option>
                    <option value="Admin">Admin</option>
                  </select>
              </div>
              <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
              </div>
              <div class="form-group">
              <input type="text" name="firstname" class="form-control" placeholder="Firstname" required>
              </div>
              <div class="form-group">
              <input type="text" name="lastname" class="form-control" placeholder="Lastname" required>
              </div>
              <div class="form-group">
              <input type="email" name="email" class="form-control" placeholder="Email" required>
              </div>
              <div class="form-group">
              <input type="text" name="contact" class="form-control" placeholder="No Kontak" required>
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
              </div>
              <div class="form-group">
                <label for="profile_img">Pilih Foto</label>
                <input type="file" name="gambar"  required>
              </div><br>
              <div class="form-group">
                <button type="submit" name="register" class="btn btn-success btn-block submit">Register</button>
              </div>
            </form>
      <?php 
    
      if (isset($_POST['register'])) {
          // $username = htmlentities($_POST['username']);
          // $firstname = htmlentities($_POST['firstname']);
          // $lastname = htmlentities($_POST['lastname']);
          // $email = htmlentities($_POST['email']);
          // $password = htmlentities($_POST['password']);
            $tm = md5(time());
            $fnm = $_FILES["gambar"]["name"];
            $dst = "./profileimg/".$tm.$fnm;
            $dst1 = "profileimg/".$tm.$fnm;
            move_uploaded_file($_FILES["gambar"]["tmp_name"] ,$dst); 
          
          $q = mysqli_query($link, "INSERT INTO admin_reg VALUES (null, '$_POST[nip]', '$_POST[privillege]','$_POST[username]', '$_POST[firstname]', '$_POST[lastname]', '$_POST[email]','$_POST[contact]', '".md5($_POST['password'])."','$dst')");
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
    <h2 class="text-center"><i class="fa fa-paperclip"></i> Semua Admin</h2><hr>
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
                <td><?=$no ?></td>
                <td><?=$r->nip ?></td>
                <td><?=$r->firstname." ".$r->lastname  ?></td>
                <td><?=$r->jabatan ?></td>
                <td><?=$r->contact ?></td>
                <td>
                    <a class="btn btn-danger btn-sm" href=""><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                  <!--   <a class="btn btn-success btn-sm" href=""><i class="fa fa-edit" aria-hidden="true"></i></a> -->
                </td>
                <?php
        $no++; endwhile ?>
            </tr>
        </tbody>
        
    </table>
</div>
