	<div class="col-md-4"></div>
	<div class="col-md-4">
		<h2 class="text-center">Laporan Registrasi Anggota:</h2>
		<hr>
		<form method="post" action="" enctype="multipart/form-data">
	        <div class="form-group ">
	            <input type="text" class="form-control datepicker" placeholder="Pilih Tanggal" name="date1" required>
	        </div>
	        <div class="form-group">
	            <input type="text" class="form-control datepicker" placeholder="Pilih Tanggal" name="date2" required>
	        </div>
	        <div class="form-group">
	            <button name="submit"  class="btn btn-info btn-block">Pilih</button>
	        </div>
	    </form>
	</div>
	<div class="col-md-4"></div>
	<div class="col-md-12">
		<?php
			if (isset($_POST['submit'])) {

				$tgl1 = ($_POST['date1']);
				$tgl2 = ($_POST['date2']);
				$_SESSION['tanggal1'] = $tgl1;
				$_SESSION['tanggal2'] = $tgl2;

				// $sql = $dbase->query("	SELECT * FROM anggota WHERE date(tglpengembalian) >= '$tgl1' AND date(tglpengembalian) <= '$tgl2' ORDER BY namaanggota ASC ");
				// $sql = $dbase->query("SELECT * FROM user_reg INNER JOIN anggota ON user_reg.id = anggota.iduser WHERE date(updated) >= '$tgl1' AND date(updated) <= '$tgl2' AND member = 'registered' AND status_keanggotaan = 'Aktif'");
				$sql = $dbase->query("SELECT * FROM user_reg INNER JOIN anggota ON user_reg.id = anggota.iduser WHERE date(updated) >= '$tgl1' AND date(updated) <= '$tgl2'");
				// var_dump($s);
				include_once("fctn/tglid.php");
			?>

			<hr>
			<div class="panel panel-default">
				<div class="panel-heading">
				<h3 class="text-center">
					Laporan Registrasi Anggota
				</h3>
				<h2 class="text-center">
					Periode
					<u>
						<?=TanggalIndo($tgl1)?>
					</u>
					<strong>hingga</strong>
					<u>
						<?=TanggalIndo($tgl2)?>
					</u>
				</h2>
				</div>
				<div class="panel-body">
					<table class="table table-hover table-bordered table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Foto</th>
						<th>Nama Anggota</th>
						<th>Nomor Anggota</th>
						<th>Username</th>
						<th>Tanggal Registrasi</th>
						<th>Status Keanggotaan</th>
						<th>Jenis Kelamain</th>
						<th>Jenis Anggota</th>
						<th>Kontak/WA</th>
						<th>Alamat</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$no = 1;
					while ($s = $sql->fetch(PDO::FETCH_OBJ)) {
				?>
					<tr>
						<td><?=$no?></td>
						<td><img data-targetsize="0.45" data-duration="600" src="<?=$s->foto?>" class="img img-responsive img-thumbnail zoomTarget" width="50" height="50"></td>
						<td><?=$s->nama?></td>
						<td><?=$s->kodeanggota?></td>
						<td><?=$s->username?></td>
						<td><?=TanggalIndo($s->updated)?></td>
						<td>
						<?php
							if ($s->status_keanggotaan == 'Nonaktif') {
								echo '<span class="text-danger">Belum Aktif</span>';
							}else{
								echo '<span class="text-success">Aktif</span>';
							}
						?>	
						</td>
						<td><?=$s->jeniskelamin?></td>
						<td><?=$s->jenisanggota?></td>
						<td><?=$s->kontak?></td>
						<td><?=$s->alamat?></td>
					</tr>
				<?php
				$no++;
				 } ?>
				</tbody>
			</table>
				</div>
				<div class="panel-footer">
			<a href="export/exportreg.php" class="btn btn-info" target="_blank"><i class=" fa fa-file-pdf-o"></i> Export Laporan</a>
		</div>
	</div>
		<?php
			}
		?>
</div>