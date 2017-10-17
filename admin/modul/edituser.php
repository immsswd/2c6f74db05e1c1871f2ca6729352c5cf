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

		// session update
		$_SESSION['foto']					= $foto;
		$_SESSION['noanggota']				= $noanggota;
		$_SESSION['nama']					= $nama;
		$_SESSION['username']				= $username;
		$_SESSION['statuspekerjaan']		= $statuspekerjaan;
		$_SESSION['alamat']					= $alamat;
		$_SESSION['jenisidentitas']			= $jenisidentitas;
		$_SESSION['noidentitas']			= $noidentitas;
		$_SESSION['statuskeanggotaan']		= $statuskeanggotaan;
		$_SESSION['tempatlahir']			= $tempatlahir;
		$_SESSION['tgllahir']				= $tgllahir;
		$_SESSION['jenisanggota']			= $jenisanggota;
		$_SESSION['jk']						= $jk;
		$_SESSION['kontak']					= $kontak;
		$_SESSION['instansi']				= $instansi;
	}

?>
<div class="col-md-3"></div>
<div class="col-md-6">
	<h2 class="text-center">Data User</h2><hr>
		<center>
			<img src="<?=$foto?>" width="100" height="100" class="img img-responsive img-thumbnail"><br>
			<strong style="font-family: courier">
				<?=$noanggota?>
			</strong>
		</center>
		<a href="index.php?pages=ubahdataanggota" class="btn btn-warning pull-right"><i class="fa fa-edit"></i> Ubah data</a>
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
<div class="col-md-3"></div>
<?php }?>