<?php
    if(isset($_POST['updatedata'])){
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
        move_uploaded_file($_FILES["foto"]["tmp_name"] ,$dst);
        
        $sql = "UPDATE anggota SET
                    iduser          = '$_SESSION[iduser]',
                    nama            = '$nama',
                    jeniskelamin    = '$jeniskelamin',
                    jenisanggota    = '$jenisanggota',
                    kontak          = '$kontak',
                    alamat          = '$alamat',
                    foto            = '$dst',
                    tanggal         = now(),
                    tempatlahir     = '$tempatlahir',
                    tgllahir        = '$tanggallahir',
                    jenisidentitas  = '$jenisidentitas',
                    nomoridentitas  = '$nomoridentitas',
                    pendidikanterakhir='$pendidikanterakhir',
                    agama           = '$agama',
                    statuspekerjaan = '$statuspekerjaan',
                    namainstansi    = '$namainstansi',
                    alamatinstansi  = '$alamatinstansi',
                WHERE iduser = '$_SESSION[iduser]'";
        
        $rs = mysqli_query($link, $sql);
        if($rs){
    ?>
        <div class="alert alert-success">
            <p>Anda sudah berhasil update data, selanjutnya silahkan minta persetujan wewenang yang disyaratkan baca <strong>Informasi</strong></p>
            <a href="" class="btn btn-danger btn-sm"><i class="fa fa-download"></i> Download FORM</a>
        </div>

    <?php
        }
        
    }
?>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
              <div class="panel panel-default"><button type="button" class="close pull-right" data-dismiss="modal">&times;</button>

          <div class="panel-heading"><h3>Hallo <span class="text text-success"><?php echo ucwords($_SESSION['calonanggota']) ?></span></h3>
          </div>
          <div class="panel-body">
    <?php foreach ($fetch as $r): ?>          
        <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama">Nama Lengkap (<small class="text-danger">Sesuai Identitas</small>)</label>
            <input type="text" class="form-control" name="nama" value="<?=$r['nama']?>" required>
        </div>
        <div class="form-group">
            <label for="jeniskelamin">Jenis Kelamin</label>
            <select name="jeniskelamin" class="form-control" >
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
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
            <input type="text" class="form-control" name="tempatlahir" value="<?=$r['tempatlahir']?>" required>
        </div>
        <div class="form-group">
            <label for="tanggallahir">Tanggal Lahir</label>
            <input id="date" data-modal="true" data-default-date="11-13-2000" data-large-mode="true" data-max-year="2000" data-min-year="1950" data-format="F m, Y" data-fx-mobile="true" type="date" class="form-control" name="tanggallahir" value="<?=$r['tgllahir']?>" required>
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
            <textarea name="alamat" class="form-control" rows="5" required><?php echo $r['alamat']?></textarea>
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
            <input type="text" class="form-control" name="nomoridentitas" value="<?=$r['nomoridentitas']?>" required>
        </div>
        <div class="form-group">
            <label for="kontak">Nomor Kontak/Telp/Hp</label>
            <input type="text" class="form-control" name="kontak" value="<?=$r['kontak']?>" required>
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
            <input type="text" class="form-control" name="namainstansi" value="<?=$r['namainstansi']?>" required>
        </div>
        <div class="form-group">
            <label for="alamatinstansi">Alamat Instansi </label>
            <textarea name="alamatinstansi" class="form-control" placeholder="Alamat lengkap Sesuai Identitas" rows="5" required><?=$r['alamatinstansi']?></textarea>
        </div>
            <input type="hidden" name="iduser" value="<?=$_SESSION['iduser']?>"  required>
        <div class="form-group">
            <label for="foto">Pilih Foto</label>
            <input type="file" name="foto"  required>
        </div>
        <div class="form-group">
            <button type="submit" name="updatedata" class="btn btn-primary btn-block">Update Data</button>
        </div>
    <?php endforeach ?>
    </form>
              
          </div>
      </div>
    </div>
  </div>
</div>