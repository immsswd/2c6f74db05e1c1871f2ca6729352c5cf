<div class="col-md-12">
	<h2 class="text-center"><i class="fa fa-paperclip"></i> Data Pengembalian Koleksi Buku</h2><hr>
<?php
	$query = $dbase->query("SELECT * FROM peminjaman WHERE status_peminjaman = 'Belum Kembali' ORDER BY tglpengembalian DESC");
	
?>
<table class="table table-hover table-striped table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Nama Anggota</th>
			<th>Nomor Anggota</th>
			<th>Judul Buku 1</th>
			<th>Judul Buku 2</th>
            <th>Transaksi Peminjaman</th>
			<th>Tgl Pengembalian</th>
			<th>Status Peminjaman</th>
            <th>Staff Peminjam</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		require ("fctn/tglid.php");
		$no = 1;
		$today = date('Y-m-d');
		while ($row = $query->fetch(PDO::FETCH_OBJ)) {
			if($row->tglpengembalian == $today AND $row->status_peminjaman == 'Belum Kembali'){?>
            <div class="bs-example-popovers col-xs-3 col-md-6">
                  <div class="alert alert-warning alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <i class="text-danger fa fa-warning"></i><strong>(<?=$row->namaanggota.'/'.$row->kodeanggota?>)</strong>  Warning pengembalian hari ini, tanggal: <?=TanggalIndo($row->tglpengembalian)?>
                  </div>
              </div>

            <?php }elseif($row->tglpengembalian < $today AND $row->status_peminjaman == 'Belum Kembali') {?>
<!--            x_content class-->
             <div class="bs-example-popovers col-xs-3 col-md-6">
                  <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <i class="text-danger fa fa-warning"></i> <strong>(<?=$row->namaanggota.'/'.$row->kodeanggota?>)</strong> Peminjaman melebihi tempo waktu yang telah ditentukan, tanggal pengembalian seharusnya: <?=TanggalIndo($row->tglpengembalian)?>
                  </div>
              </div>
            <?php }?>
		<tr>
			<td><?=$no?></td>
			<td><?=$row->kodeanggota?></td>
			<td><?=$row->namaanggota?></td>
			<td><?=$row->buku1?></td>
			<td><?=$row->buku2?></td>
		    <td><?=date('g:i a - F j, Y', (strtotime($row->timestampp))) ?></td>
			<?php
				if ($row->status_peminjaman=='Sudah Kembali') {
					echo '<td class="text-info bg-success">'.TanggalIndo($row->tglpengembalian).'</td>';
				}else{
					echo '<td class="text-warning">'.TanggalIndo($row->tglpengembalian).'</td>';
				}
			?>	
			<?php
				if ($row->status_peminjaman=='Sudah Kembali') {
					echo '<td class="text-info bg-success">'.$row->status_peminjaman.'</td>';
				}else{
					echo '<td class="text-info bg-danger">'.$row->status_peminjaman.'</td>';
				}
			?>
            <td><?=$row->staffpeminjam?></td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>
<!-- <a target="_blank" href="export/export-datapengembalian.php" class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export data pengembalian</a> -->
</div>

<br>