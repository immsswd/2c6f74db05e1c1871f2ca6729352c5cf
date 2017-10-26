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
	}
?>

<div class="col-md-12">
	<form method="post" action="pages/ubahdataanggota.php" enctype="multipart/form-data">
		<div class="form-group">
			<label for="nama">Nama lengkap</label>
			<input type="text" name="nama" value="<?=$nama?>" class="form-control">
		</div>
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" name="username" value="<?=$username?>" class="form-control">
		</div>
		<div class="form-group">
			<label for="jeniskelamin">Gender</label>
			<input type="text" name="jeniskelamin" value="<?=$jk?>" class="form-control">
		</div>
		<div class="form-group">
			<label for="tempatlahir">Tempat lahir</label>
			<input type="text" name="tempatlahir" value="<?=$tempatlahir?>" class="form-control">
		</div>
		<div class="form-group">
			<label for="tgllahir">Tanggal lahir</label>
			<input type="date" name="tgllahir" value="<?=$tgllahir?>" class="form-control datepicker">
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
			<input type="text" name="alamat" value="<?=$alamat?>" class="form-control">
		</div>
		<div class="form-group">
			<label for="kontak">Kontak</label>
			<input type="text" name="kontak" value="<?=$kontak?>" class="form-control">
		</div>
		<div class="form-group">
			<label for="jenisanggota">Jenis Keanggotaan</label>
			<input type="text" name="jenisanggota" value="<?=$jenisanggota?>" class="form-control">
		</div>
		<div class="form-group">
			<label for="jenisidentitas">Jenis Identitas</label>
			<input type="text" name="jenisidentitas" value="<?=$jenisidentitas?>" class="form-control">
		</div>
		<div class="form-group">
			<label for="nomoridentitas">Nomor Identitas</label>
			<input type="text" name="nomoridentitas" value="<?=$noidentitas?>" class="form-control">
		</div>
		<div class="form-group">
			<input type="button" name="ubah" class="btn btn-warning btn-lg btn-block" value="Update">
			<a href="pages/ubahdataanggota.php?id=<?=$id?>" type="button" name="ubah" class="btn btn-primary">Update</a>
		</div>
	</form>
</div>