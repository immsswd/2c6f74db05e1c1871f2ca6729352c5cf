<div class="col-md-3">
    <?php
$sql = $dbase->query("SELECT * FROM user_reg INNER JOIN anggota ON user_reg.id = anggota.iduser WHERE iduser = '$_SESSION[idedit]' ");
	while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
		$id = $row->iduser;
		$foto   			= $row->foto;
		$noanggota   		= $row->kodeanggota;
		$nama 				= $row->nama;
		$username 			= $row->username;
		$statuspekerjaan 	= $row->statuspekerjaan;
		$alamat    			= $row->alamat;
		$jenisidentitas     = $row->jenisidentitas;
		$noidentitas    	= $row->nomoridentitas;
		$statuskeanggotaan  = $row->status_keanggotaan;
		$tempatlahir 		= $row->tempatlahir;
		$tgllahir  			= $row->tgllahir;
		$jenisanggota  		= $row->jenisanggota;
		$jk   				= $row->jeniskelamin;
		$kontak  			= $row->kontak;
		$instansi   		= $row->namainstansi;
		$email  			= $row->email;
	}
?>
</div>
<div class="col-md-6">
    <center>
        <img src="<?=$foto?>" width="100" height="100" class="img img-responsive img-thumbnail"><br>
        <strong style="font-family: courier">
				<?=$noanggota?>
			</strong>
    </center>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama">Nama lengkap</label>
            <input type="text" name="nama" value="<?=$nama?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" value="<?=$username?>" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" value="<?=$email?>" disabled>
        </div>
        <div class="form-group">
            <label for="jeniskelamin">Gender</label>
            <select name="jeniskelamin" class="form-control">
				<?php if($jk == 'Laki-laki'): ?>
					<option value="<?=$jk?>"><?=$jk?></option>
					<option value="Perempuan">Perempuan</option>
				<?php elseif($jk=='Perempuan'): ?>
					<option value="<?=$jk?>"><?=$jk?></option>
					<option value="Laki-laki">Laki-laki</option>
				<?php endif ?>
			</select>
        </div>
        <div class="form-group">
            <label for="tempatlahir">Tempat lahir</label>
            <input type="text" name="tempatlahir" value="<?=$tempatlahir?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="tgllahir">Tanggal lahir</label>
            <input type="text" name="tgllahir" value="<?=$tgllahir?>" class="form-control datepicker">
        </div>
        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" name="pekerjaan" value="<?=$statuspekerjaan?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="instansi">Instansi tempat bekerja/kuliah/sekolah</label>
            <input type="text" name="instansi" value="<?=$instansi?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" class="form-control" rows="6"><?=$alamat?></textarea>
        </div>
        <div class="form-group">
            <label for="kontak">Kontak</label>
            <input type="text" name="kontak" value="<?=$kontak?>" class="form-control">
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
            <label for="jenisidentitas">Jenis Identitas</label>
            <select name="jenisidentitas" class="form-control" required>
                <option value="KTP">KTP</option>
                <option value="SIM">SIM</option>
                <option value="Kartu Mahasiswa">Kartu Mahasiswa</option>
                <option value="Kartu Pelajar">Kartu Pelajar</option>
            </select>
        </div>
        <div class="form-group">
            <label for="nomoridentitas">Nomor Identitas</label>
            <input type="text" name="nomoridentitas" value="<?=$noidentitas?>" class="form-control">
        </div>
        <div class="form-group">

            <button type="submit" name="updated" class="btn btn-primary btn-block">Update Data</button>

        </div>
    </form>
</div>
<div class="col-md-3"></div>
<div class="col-md-12">
    <?php
		//update proses
		if (isset($_POST['updated'])) {
			$unama 			= htmlentities($_POST['nama']);
			$uusername 		= htmlentities($_POST['username']);
			$ujeniskelamin 	= htmlentities($_POST['jeniskelamin']);
			$utempatlahir 	= htmlentities($_POST['tempatlahir']);
			$utgllahir 		= htmlentities($_POST['tgllahir']);
			$upekerjaan 	= htmlentities($_POST['pekerjaan']);
			$uinstansi 		= htmlentities($_POST['instansi']);
			$ualamat 		= htmlentities($_POST['alamat']);
			$ukontak 		= htmlentities($_POST['kontak']);
			$ujenisanggota 	= htmlentities($_POST['jenisanggota']);
			$ujenisidentitas = htmlentities($_POST['jenisidentitas']);
			$unomoridentitas = htmlentities($_POST['nomoridentitas']);

			$stmt = $dbase->query("UPDATE anggota SET nama = '$unama', jeniskelamin = '$ujeniskelamin', tempatlahir = '$utempatlahir', tgllahir = '$utgllahir', statuspekerjaan = '$upekerjaan', namainstansi = '$uinstansi', alamat = '$ualamat', kontak = '$ukontak', jenisanggota = '$ujenisanggota', jenisidentitas = '$ujenisidentitas', nomoridentitas = '$unomoridentitas' WHERE iduser = '$_SESSION[idedit]' ");
			if ($stmt) {
				echo '<script>alert("Data berhasil diubah");window.location="index.php?modul=all_user"</script>';
			}
		}
	?>
</div>
<script type="text/javascript">
    $(function() {
        $(".datepicker").datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });

</script>
