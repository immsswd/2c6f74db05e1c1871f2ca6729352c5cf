<?php
if (isset($_POST['lihat'])) {
	include_once"fctn/tglid.php";
	$id = $_POST['iduser'];
	$_SESSION['idedit'] = $id;
	$sql = $dbase->query("SELECT * FROM user_reg INNER JOIN anggota ON user_reg.id = anggota.iduser WHERE iduser = '$id' ");
	while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
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
<div class="col-md-6">
	<h4>Data User</h4><hr>
		<center>
			<img src="<?=$foto?>" width="100" height="100" class="img img-responsive img-thumbnail"><br>
			<strong style="font-family: courier">
				<?=$noanggota?>
			</strong>
		</center>
		<table class="table table-responsive table-hover">
			<tbody>
			<tr>
				<th>Nama</th>
				<td><?=$nama?></td>
			</tr>
			<tr>
				<th>Username</th>
				<td><?=$username?></td>
			</tr>
			<tr>
				<th>Gender</th>
				<td><?=$jk?></td>
			</tr>
			<tr>
				<th>Tempat dan Tanggal Lahir</th>
				<td><?=$tempatlahir.", ".TanggalIndo($tgllahir)?></td>
			</tr>
			<tr>
				<th>Pekerjaan</th>
				<td><?=$statuspekerjaan?></td>
			</tr>
			<tr>
				<th>Instansi</th>
				<td><?=$instansi?></td>
			</tr>
			<tr>
				<th>Alamat</th>
				<td><?=$alamat?></td>
			</tr>
			<tr>
				<th>Kontak</th>
				<td><?=$kontak?></td>
			</tr>
			<tr>
				<th>Jenis Keanggotaan</th>
				<td><?=$jenisanggota?></td>
			</tr>
			<tr>
				<th>Identitas: (<?=$jenisidentitas?>)</th>
				<td><?=$noidentitas?></td>
			</tr>
			<tr>
				<th>Status Keanggotaan</th>
				<td><?=$statuskeanggotaan?></td>
			</tr>
	</tbody>
		</table>
</div>
<div class="col-md-6">
	<h4>Edit Data:</h4><hr>
	<form method="post" enctype="multipart/form-data">
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
			<input type=text" name="jenisanggota" value="<?=$jenisanggota?>" class="form-control">
		</div>
		<div class="form-group">
			<label for="jenisidentitas">Jenis Identitas</label>
			<input type="text" name="jenisidentitas" value="<?=$jenisidentitas?>" class="form-control">
		</div>
		<div class="form-group">
			<label for="nomoridentitas">Nomor Identitas</label>
			<input type="text" name="nomoridentitas" value="<?=$noidentitas?>" class="form-control">
		</div><br>
		<strong class="text-center text-danger">Ubah Password</strong>
		<hr>
		<div class="form-group">
			<label for="passwordlama">Password Lama</label>
			<input type="password" placeholder="******" name="passwordlama"  class="form-control">
		</div>
		<div class="form-group">
			<label for="passwordbaru">Password Baru</label>
			<input type="password" placeholder="******" name="passwordbaru"  class="form-control">
		</div>
		<div class="form-group">
			<button type="button" class="btn btn-warning btn-lg btn-block">Update Data</button>
		</div>
	</form>
</div>
<?php }?>