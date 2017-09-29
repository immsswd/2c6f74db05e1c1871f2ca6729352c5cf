<div class="col-md-12">
	<h2 class="text-center"><i class="fa fa-paperclip"></i> Pengembalian</h2><hr>
</div>
<div class="col-md-3"></div>
<div class="col-md-6">
    <!--Input-->
  <!--   <form method="post" action="" >
        <div class="input-group">
            <input type="text" class="form-control input-lg" placeholder="Input Nomor Anggota" name="inputnoanggota">
            <div class="input-group-btn">
                <button name="carinoanggota"  class="btn btn-lg btn-primary"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form> -->
    <!--/Input-->
   <!--  <h2 class="text-center">Form Input / Pilih Nomor Anggota</h2><hr> -->

    <form method="post" action="">
        <div class="input-group">
		<?php
            $s = mysqli_query($link, "SELECT * FROM Peminjaman WHERE status_peminjaman = 'Belum Kembali'");

            ?>
            <select name="inputnoanggota" class="form-control input-lg selectpicker">
            	<?php
                while($row = mysqli_fetch_array($s)){
            	?>
                <option value="<?=$row['kodeanggota']?>"><?php echo $row['kodeanggota'] ?></option>
            	<?php }?>
            </select>
            <div class="input-group-btn">
                <button class="btn btn-primary btn-lg" name="carinoanggota" type="submit">Pilih</button>
            </div>
        </div>
    </form>

</div>
<div class="col-md-3"></div>
<!--eksekusi button carinoaanggota-->
<div class="col-md-12">
	<?php
		if (isset($_POST['carinoanggota'])) {
			$rs = $dbase->query("SELECT * FROM peminjaman WHERE kodeanggota = '$_POST[inputnoanggota]' AND status_peminjaman = 'Belum Kembali'");
			// $rs->fetch(PDO::FETCH_OBJ);
			// var_dump($rs);
			?>
			<table class="table table-responsive table-hover table-striped table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Nama Anggota</th>
						<th>Kode Anggota</th>
						<th>Kontak Anggota</th>
						<th>Buku 1</th>
						<th>Buku 2</th>
						<th>Tanggal Peminjaman</th>
						<th>Tanggal Pengembalian</th>
						<th>Status Peminjaman</th>
						<th>Command</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				require ("fctn/tglid.php");
				while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
					$_SESSION['b1'] = $row->buku1;
					$_SESSION['b2'] = $row->buku2;
					$_SESSION['idpe'] = $row->idpeminjaman;
					$_SESSION['agg'] = $row->kodeanggota;
				?>
					<tr>
						<td></td>
						<td><?=$row->namaanggota?></td>
						<td><?=$row->kodeanggota?></td>
						<td><?=$row->kontakanggota?></td>
						<td><?=$row->buku1?></td>
						<td><?=$row->buku2?></td>
						<td class="bg-info"><?=TanggalIndo($row->tglpeminjaman)?></td>
						<td><?=TanggalIndo($row->tglpengembalian)?></td>
						<td class="bg-danger text-warning"><?=$row->status_peminjaman?></td>
						<td>
							<form method="post" action="pages/returnb.php">
								<input type="hidden" name="b1" value="<?=$_SESSION['b1']?>">
								<input type="hidden" name="b2" value="<?=$_SESSION['b1']?>">
								<input type="hidden" name="agg" value="<?=$_SESSION['agg']?>">
								
								<a href="pages/returnb.php?id=<?=$row->idpeminjaman?>" class="btn btn-sm btn-success"><button class="sr-only" name="kembalikan" type="submit"></button> Proses Pengembalian</a>
							</form>
							<br>
						<!-- 	<a href="index.php?modul=perpanjang" class="btn btn-sm btn-warning">Perpanjang peminjaman</a> -->
						</td>
					</tr>
				<?php }?>	
				</tbody>
				<?php
					if (isset($_POST['kembalikan'])) {
						mysqli_query($link, "INSERT INTO pengembalian VALUES ('', '$_SESSION[agg]', '$_POST[b1]', '$_POST[b2]', '$_SESSION[staffadmin]', NOW()");
						mysqli_query($link, "UPDATE buku SET jml_stok_sekarang = jml_stok_sekarang + 1 WHERE judul = '$_POST[b1]'");
						mysqli_query($link, "UPDATE buku SET jml_stok_sekarang = jml_stok_sekarang + 1 WHERE judul = '$_POST[b2]'");
					}
				?>
			</table>
			<?php
			// var_dump($_SESSION['b1']);
			// var_dump($_SESSION['b2']);
		}
	?>
</div>