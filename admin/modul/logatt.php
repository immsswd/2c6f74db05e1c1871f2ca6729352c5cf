<div class="col-md-12">
	<h2>Log Percobaan Login</h2><hr>
	<?php
		require_once("fctn/tglid.php");
		$getdata = $dbase->query("SELECT * FROM loginattempt ORDER BY waktu DESC");
		$no = 1;
		$rs = $getdata->fetchAll(PDO::FETCH_OBJ);
	?>
    <a href="pages/hapus-logloginatt.php" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> Hapus Semua</a>
	<table class="table table-hover table-condensed table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Waktu</th>
				<th>IP Address</th>
				<th>Username</th>
				<th>Pss</th>
				<th>Halaman Percobaan</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($rs as $row):?>
				<tr>
					<td><?=$no?></td>
					<td><?=date('g:i a - j/F/Y', (strtotime($row->waktu))) ?></td>
					<td><?=$row->ip_addr?></td>
					<td><?=$row->un_attmp?></td>
					<td><?=$row->password?></td>
						<?php if($row->jenis == 'Form Login Anggota'):?>
							<td class="text-success">Form Login Anggota</td>
						<?php elseif($row->jenis == 'Form Login Registrasi'): ?>
							<td class="text-primary">Form Login Registrasi</td>
						<?php elseif($row->jenis=='Form Login Admin'): ?>
							<td class="text-warning">Form Login Admin</td>
						<?php endif ?>
				</tr>
			<?php $no++; endforeach ?>
		</tbody>
	</table>
</div>