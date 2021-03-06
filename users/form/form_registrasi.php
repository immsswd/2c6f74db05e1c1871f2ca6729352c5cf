<div class="col-md-2">
<!--var_dump($_SESSION['iduser'])-->
<?php
// ob_start();    
    if(isset($_POST['simpandata'])){
        $nama               = htmlentities($_POST['nama']);
        $jeniskelamin       = htmlentities($_POST['jeniskelamin']);
        $jenisanggota       = htmlentities($_POST['jenisanggota']);
        $tempatlahir        = htmlentities($_POST['tempatlahir']);
        $tanggallahir       = htmlentities($_POST['tanggallahir']);
        $agama              = htmlentities($_POST['agama']);
        $alamat             = htmlentities($_POST['alamat']);
        $jenisidentitas     = htmlentities($_POST['jenisidentitas']);
        $nomoridentitas     = htmlentities($_POST['nomoridentitas']);
        $kontak             = htmlentities($_POST['kontak']);
        $pendidikanterakhir = htmlentities($_POST['pendidikanterakhir']);
        $statuspekerjaan    = htmlentities($_POST['statuspekerjaan']);
        $namainstansi       = htmlentities($_POST['namainstansi']);
        $alamatinstansi     = htmlentities($_POST['alamatinstansi']);
//        $username           = htmlentities($_POST['username']);
        
        $tm = md5(time());
        $fnm = $_FILES["foto"]["name"];
        $dst = "./profileimg/".$tm.$fnm;
        $dst1 = "profileimg/".$tm.$fnm;
        $cpdir = "../admin/profileimg/".$tm.$fnm;
        move_uploaded_file($_FILES["foto"]["tmp_name"] ,$dst);
        copy($dst, $cpdir);
        
        $q = "select max(substr(iduser, 9)) as mx from anggota where substr(iduser, 7, 2)=month(now())";
        $rss = mysqli_query($link,$q);
        $d = mysqli_fetch_array($rss);
        $str =$_SESSION['iduser'].date("Ymd");
        $str .=($d['mx']);
        $kodeanggota = $val['iduser']=$str;
        
        $sql = "INSERT INTO anggota VALUES('', '$kodeanggota', '$_SESSION[iduser]', '$nama','Nonaktif','$jeniskelamin', '$jenisanggota', '$kontak', '$alamat', '$dst', now(), '$tempatlahir', '$tanggallahir', '$jenisidentitas', '$nomoridentitas', '$pendidikanterakhir', '$agama', '$statuspekerjaan', '$namainstansi ', '$alamatinstansi', '$_SESSION[calonanggota]')";
        
        $rs = mysqli_query($link, $sql);
        if($rs){
    ?>
        <div class="alert alert-success">
            <p>Anda sudah berhasil menyimpan data, selanjutnya silahkan minta persetujan wewenang yang disyaratkan baca <strong>Informasi</strong></p>
            <a href="exportpdf/formulir.php" target="_blank" class="btn btn-info btn-sm btn-block"><i class="fa fa-download"></i> Download FORM</a>
        </div>
    <?php
        }
        
    }
?>
</div>
<div class="col-md-8">
<!--    <a href="form/export.php" target="_blank" class="btn btn-info btn-sm btn-block"><i class="fa fa-download"></i> Download FORM</a>-->
    <h2 class="well text-center"> Form Registrasi Anggota</h2>
<!--Form Registrasi-->
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama">Nama Lengkap (<small class="text-danger">Sesuai Identitas</small>)</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama lengkap sesuai Identitas" required>
        </div>
        <div class="form-group to_do">
            <label for="jeniskelamin">Jenis Kelamin</label>
            <!-- select name="jeniskelamin" class="form-control">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select> -->
            <p><input type="checkbox" class="flat"  value="Laki-laki" name="jeniskelamin"> Laki-laki</p>
            <p><input type="checkbox" class="flat"  value="Perempuan" name="jeniskelamin"> Perempuan</p>
        </div>
        <div class="form-group">
            <label for="jenisanggota">Jenis Anggota</label>
            <select name="jenisanggota" class="form-control">
                <option value="Umum">Umum</option>
                <option value="Mahasiswa">Mahasiswa</option>
                <option value="Pelajar">Siswa/Pelajar</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tempatlahir">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempatlahir" placeholder="Tempat lahir" required>
        </div>
        <div class="form-group">
            <label for="tanggallahir">Tanggal Lahir</label>
            <input id="date" data-modal="true" data-default-date="11-13-2000" data-large-mode="true" data-max-year="2000" data-min-year="1950" data-format="Y-m-d" data-fx-mobile="true" type="date" class="form-control" name="tanggallahir" placeholder="Tanggal Lahir" required>
        </div>
        <div class="form-group">
            <label for="agama">Agama</label>
            <select name="agama" class="form-control" required>
                <option value="Islam">Islam</option>
                <option value="Kristen Katolik">Kristen Katolik</option>
                <option value="Kristen Protestan">Kristen Protestan</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
            </select>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat lengkap (<small class="text-danger">Sesuai Identitas</small>)</label>
            <textarea name="alamat" class="form-control" placeholder="Alamat lengkap Sesuai Identitas" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="jenisidentitas">Jenis Kartu Identitas (<span class="text-danger"><small>Kartu Identitas wajib domisili Pekanbaru Riau</small></span>)</label>
            <select name="jenisidentitas" class="form-control" required>
                <option value="KTP">KTP</option>
                <option value="SIM">SIM</option>
                <option value="Kartu Mahasiswa">Kartu Mahasiswa</option>
                <option value="Kartu Pelajar">Kartu Pelajar</option>
            </select>
        </div>
        <div class="form-group">
            <label for="nomoridentitas">Nomor Kartu Identitas</label>
            <input type="text" class="form-control" name="nomoridentitas" placeholder="Nomor Kartu Identitas" required>
        </div>
        <div class="form-group">
            <label for="kontak">Nomor Kontak/Telp/Hp</label>
            <input type="text" class="form-control" name="kontak" placeholder="Nomor kontak aktif" required>
        </div>
        <div class="form-group">
            <label for="pendidikanterakhir">Pendidikan Terakhir</label>
            <select name="pendidikanterakhir" class="form-control" required>
                <option value="SD">SD</option>
                <option value="SLTP">SLTP</option>
                <option value="SLTA">SLTA</option>
                <option value="D3">D3</option>
                <option value="S1">S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        </div>
        <div class="form-group">
            <label for="statuspekerjaan">Status Pekerjaan</label>
            <select name="statuspekerjaan" class="form-control" required>
                <option value="PNS">PNS</option>
                <option value="Karyawan">Karyawan</option>
                <option value="Wiraswasta">Wiraswasta</option>
                <option value="Mahasiswa">Mahasiswa</option>
                <option value="Pelajar">Pelajar</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        </div>
        <div class="form-group">
            <label for="namainstansi">Nama Instansi</label>
            <input type="text" class="form-control" name="namainstansi" placeholder="nama Kantor/Perusahaan/Universitas/Sekolah" required>
        </div>
        <div class="form-group">
            <label for="alamatinstansi">Alamat Instansi </label>
            <textarea name="alamatinstansi" class="form-control" placeholder="Alamat lengkap Sesuai Identitas" rows="5" required></textarea>
        </div>
<!--        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Buat username" required>
        </div>

        <div class="form-group">
            <label for="pas">Password</label>
            <input type="password" class="form-control" name="pas" placeholder="Kombinasikan password dengan beberapa angka atau karakter" required>
        </div>
        <div class="form-group">
            <label for="pas2">Re-type Password</label>
            <input type="password" class="form-control" name="pas2" placeholder="Ketik ulang password" required>
        </div>-->
           
        <div class="form-group">
            <label for="foto">Pilih Foto (<small class="text-danger">Foto Formal Terbaru</small>)</label>
            <input type="file" name="foto"  required>
        </div>
        <div class="form-group">
            <button type="submit" name="simpandata" class="btn btn-primary btn-block">Simpan</button>
        </div>
    </form>
    
    <!--End Form-->
    
</div>
<div class="col-md-2">

</div>