<div class="col-md-4"></div>
<div class="col-md-4">
	<h2 class="text-center">Laporan Peminjaman/Pengembalian Koleksi buku:</h2>
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

	// $q = $dbase->query("SELECT COUNT(buku1) FROM peminjaman");
	// $qq = $dbase->query("SELECT buku1, COUNT(idpeminjaman) FROM peminjaman GROUP BY buku1 ORDER BY buku1 ASC");

	// $s = $qq->fetchAll();
	// var_dump($s);

	// $h = $q->fetchAll();
	// var_dump($h);
		if (isset($_POST['submit'])) {

			$tgl1 = ($_POST['date1']);
			$tgl2 = ($_POST['date2']);
			$_SESSION['tanggal1'] = $tgl1;
			$_SESSION['tanggal2'] = $tgl2;

			$q = $dbase->query("SELECT COUNT(*) FROM peminjaman");
			// $qq = $dbase->query("SELECT buku1, COUNT(idpeminjaman) FROM peminjaman GROUP BY buku1 ORDER BY buku1 ASC");
			// while ($qq->fetch(PDO::FETCH_OBJ)) {
			//     $buku = $qq->buku1;
			// }

			$sql = $dbase->query("	SELECT * FROM peminjaman WHERE date(tglpeminjaman) >= '$tgl1' AND date(tglpeminjaman) <= '$tgl2' ORDER BY namaanggota ASC");
			// var_dump($s);
		?>
		<hr>
		<div class="panel panel-default">
			<div class="panel-heading">
			<h3 class="text-center">
				Laporan Peminjaman
			</h3>
			<h2 class="text-center">
				Periode
				<u><?=TanggalIndo($tgl1)?></u><strong>hingga</strong><u><?=TanggalIndo($tgl2)?></u>
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
					<th>Peminjaman Buku 1</th>
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
							echo '<td class="text-danger">'.$s->status_peminjaman.'</td>';
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
		</div>
		<div class="panel-footer">
			<a href="export/export.php" class="btn btn-info" target="_blank"><i class=" fa fa-file-pdf-o"></i> Export Laporan</a>
		</div>
	<?php
		}
	?>
</div>