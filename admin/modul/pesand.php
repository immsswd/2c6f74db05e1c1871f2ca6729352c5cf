<?php
// mengambil fungsi TanggalIndo
include_once ("fctn/tglid.php");
// var_dump($_SESSION['staffadmin']);
	$stmt = $dbase->query("SELECT * FROM anggota WHERE status_keanggotaan = 'Aktif' ORDER BY nama ASC");
?>
<div class="col-md-6">
	<h2>Kirim Pesan Kepada pengguna/anggota</h2><hr>

<?php
		if (isset($_POST['kirim'])){

			$anggota    = htmlentities($_POST['anggota']);
			$judulpesan = htmlentities($_POST['judulpesan']);
			$isipesan 	= htmlentities($_POST['isipesan']);
			$timestamp 	= date('Y-m-d G:i:s');

			$stm = $dbase->query("INSERT INTO pesan VALUES (null, '$_SESSION[staffadmin]', '$anggota', '$judulpesan', '$isipesan', now(), 'n', '$timestamp')");

			if ($stm):
			?>
			<!-- Jika pesan terkirim munculkan alert sukses -->
				<div class="alert alert-success">
					<p><i class="fa fa-check-square-o"></i> Pesan anda terkirim! ke 
					<strong>
						<?=$anggota?>
					</strong>
					</p>
				</div>
			<?php
			endif;			
		}
	?>
	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="anggota">Kepada Sdr/i:</label>
			<select name="anggota" class="form-control">
			<?php while($row = $stmt->fetch(PDO::FETCH_OBJ)):?>
			<option value="<?=$row->usernamea?>"><?=$row->nama." (".$row->kodeanggota.")" ?></option>
			<?php endwhile ?>	
			</select>
		</div>
		<div class="form-group">
			<label for="judulpesan">Judul Pesan</label>
			<input type="text" name="judulpesan" class="form-control" placeholder="Judul Pesan">
		</div>
		<div class="form-group">
			<label for="isipesan">Pesan:</label>
			<textarea name="isipesan" rows="10" class="form-control" required placeholder="Isi Pesan"></textarea>
		</div>
		<div class="form-group">
			<button type="submit" name="kirim" class="btn btn-primary btn-block"><i class="fa fa-send"></i> Kirim Pesan</button>
		</div>
	</form>
</div>
<div class="col-md-6">
	<?php
		$n = 1;
		$st = $dbase->query("SELECT * FROM pesan WHERE susername = '$_SESSION[staffadmin]' ORDER BY timestampp DESC");
	?>
	<h2>semua pesan dari anda:</h2><hr>
	<table class="table table-responsive table-hover table-striped">
		<thead>
			<th>#</th>
			<th>Penerima</th>
			<th>Judul Pesan</th>
			<th>Isi Pesan</th>
			<th>Status Pesan</th>
		</thead>		
		<tbody>
			<?php while($ro = $st->fetch(PDO::FETCH_OBJ)):?>
			<tr>
			<td>
				<?=$n?>
				<form method="post" action="index.php?pages=delmsg"><input type="hidden" name="pesan" value="<?=$ro->idpesan?>"><button onclick="confirm('yakin hapus pesan?')" data-placement="top" data-toggle="tooltip" data-original-title="Hapus pesan?" class="btn btn-xs btn-danger" type="submit" name="idpesan"><i class="fa fa-trash-o"></i></button></form>		
			</td>
			<td><?=$ro->desusername?></td>
			<td><?=$ro->judul?></td>
			<td><?=$ro->pesan?></td>
				<?php if($ro->baca == 'n') {
					echo '<td class="text-danger">belum dibaca</td>';
				}else{
					echo '<td class="text-success"><i class="fa fa-check"></i><small><em>'.TanggalIndo($ro->timestampp).'</em></small></td>';
				}?>
			</tr>
			<?php $n++; endwhile ?>
		</tbody>
		
	</table>
</div>