<div class="col-md-4"></div>
<div class="col-md-4">
	<h2 class="text-center">Laporan Pengembalian Koleksi buku:</h2>
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
	include_once("fctn/tglid.php");
		if (isset($_POST['submit'])) {

			$tgl1 = ($_POST['date1']);
			$tgl2 = ($_POST['date2']);
			$_SESSION['tanggal1'] = $tgl1;
			$_SESSION['tanggal2'] = $tgl2;

			$sql = $dbase->query("SELECT * FROM peminjaman WHERE date(tglpengembalian) >= '$tgl1' AND date(tglpengembalian) <= '$tgl2' AND status_peminjaman = 'Belum Kembali' ORDER BY namaanggota ASC");
			// var_dump($s);
		?>

		<hr>
		<div class="panel panel-default">
			<div class="panel-heading">
			<h3 class="text-center">
				Laporan Pengembalian
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
					<th>Nama Anggota</th>
					<th>Nomor Anggota</th>
					<th>Peminjaman Buku 1</th>
					<th>Peminjaman Buku 2</th>
					<th>Tanggal Peminjaman</th>
					<th>Tanggal Pengembalian</th>
					<th>Status Peminjaman</th>
					<th>Staff Peminjam</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$no = 1;
				while ($s = $sql->fetch(PDO::FETCH_OBJ)) {
			?>
				<tr>
					<td><?=$no?></td>
					<td><?=$s->namaanggota?></td>
					<td><?=$s->kodeanggota?></td>
					<td><?=$s->buku1?></td>
					<td><?=$s->buku2?></td>
					<td><?=TanggalIndo($s->tglpeminjaman)?></td>
					<td><?=TanggalIndo($s->tglpengembalian)?></td>
					<?php
						if ($s->status_peminjaman=='Belum Kembali') {
							echo '<td class="text-danger bg-warning">'.$s->status_peminjaman.'</td>';
						}else{
							echo '<td class="text-success">'.$s->status_peminjaman.'</td>';
						}
					?>
					<td><?=$s->staffpeminjam?></td>
				</tr>
			<?php
			$no++;
			 } ?>
			</tbody>
		</table>
			</div>
			<div class="panel-footer">
			<a href="export/export-datapengembalian.php" class="btn btn-info" target="_blank"><i class=" fa fa-file-pdf-o"></i> Export Laporan</a>
		</div>
</div>
<?php
		}
	?>
</div>