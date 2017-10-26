<div class="col-md-12">
	<h2>Histori Pengembalian koleksi buku</h2><hr>
	<?php
	include ("pages/fungsitgl.php");
	// var_dump($_SESSION['kodeanggota']);
	$sql = $dbase->query("SELECT * FROM peminjaman WHERE kodeanggota = '$_SESSION[kodeanggota]' AND status_peminjaman = 'Belum Kembali'");
		$no = 1;
	?>
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Tanggal Peminjaman</th>
				<th>Judul Buku</th>
				<th>Status Peminjaman</th>
				<th>Tanggal Pengembalian</th>
			</tr>
		</thead>
		<tbody>
		<?php
			while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
		?>
			<tr>
				<td><?=$no?></td>
				<td><?=TanggalIndo($row->tglpeminjaman)?></td>
				<td>
					<ol>
						<li><?=$row->buku1?></li>
						<li><?=$row->buku2?></li>
					</ol>						
				</td>
				<?php
					if ($row->status_peminjaman=='Sudah Kembali') {
						echo '<td class="bg-success">'.$row->status_peminjaman.'</td>';
					}else{
						echo '<td class="bg-warning">'.$row->status_peminjaman.'</td>';
					}
				?>
				<td class="text-danger"><?=TanggalIndo($row->tglpengembalian)?></td>
			</tr>
		<?php
		$no++;   
			}
		?>
		</tbody>
	</table>
</div>