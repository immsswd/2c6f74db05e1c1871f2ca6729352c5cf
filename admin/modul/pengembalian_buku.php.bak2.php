<div class="col-md-12">
	<h2 class="text-center">Pengembalian</h2><hr>
</div>
<div class="col-md-3"></div>
<div class="col-md-6">
    <!--Input-->
    <form method="post" action="" >
        <div class="input-group">
            <input type="text" class="form-control input-lg" placeholder="Input Nomor Anggota" name="inputnoanggota">
            <div class="input-group-btn">
                <button name="carinoanggota"  class="btn btn-lg btn-primary"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
    <!--/Input-->

    <form method="post" action="">
        <div class="input-group">
<!--            <input type="text" class="form-control input-lg" placeholder="hasdf" name="search">-->
            <?php
                // $s1= mysqli_query($link, "SELECT * FROM user_reg INNER JOIN anggota ON user_reg.id = anggota.iduser ORDER BY user_reg.updated DESC");
                // $s = mysqli_query($link, "SELECT * FROM anggota WHERE status_keanggotaan = 'Aktif'");
            $s = mysqli_query($link, "SELECT * FROM anggota WHERE status_keanggotaan = 'Aktif'");

            ?>
            <select name="inputnoanggota" class="form-control input-lg selectpicker">
            	<?php
                while($row = mysqli_fetch_array($s)){
            	?>
                <option value="<?=$row['kodeanggota']?>"><?php echo $row['kodeanggota'] ?></option>
            	<?php }?>
            </select>
            <div class="input-group-btn">
                <button class="btn btn-primary btn-lg" name="carinoanggota" type="submit">Pilih No Anggota</button>
            </div>
        </div>
    </form>

</div>
<div class="col-md-3"></div>

<div class="col-md-12">
<!--Hasil Input Kode Anggota-->
	<?php
	require_once("fctn/tglid.php");
		if (isset($_POST['carinoanggota']) AND (!empty($_POST['inputnoanggota']))) {
			$valuepost = htmlentities($_POST['inputnoanggota']);
        	$q = $dbase->query("SELECT * FROM peminjaman WHERE status_peminjaman = 'Belum Kembali' AND kodeanggota LIKE '%".$valuepost."%'");
        	while ($val = $q->fetch(PDO::FETCH_OBJ)) {
        		$idpeminjaman		= $val->idpeminjaman;
        		$kodeanggota		= $val->kodeanggota;
        		$namaanggota		= $val->namaanggota;
        		$kontakanggota		= $val->kontakanggota;
        		$judul1 			= $val->judulbuku1;
        		$judul2 			= $val->judulbuku2;
        		$tglpeminjaman		= $val->tglpeminjaman;
        		$tglpengembalian	= $val->tglpengembalian;
        		// Buatkan SESSION
        		$_SESSION['idpeminjaman'] 		= $idpeminjaman;
        		$_SESSION['kodeanggota']		= $kodeanggota;
        		$_SESSION['namaanggota'] 		= $namaanggota;
				$_SESSION['kontakanggota']		= $kontakanggota;
        		$_SESSION['judul1'] 			= $judul1;
        		$_SESSION['judul2'] 			= $judul2;
        		$_SESSION['tglpeminjaman'] 		= $tglpeminjaman;
        		$_SESSION['tglpengembalian'] 	= $tglpengembalian;

        		
        	}
    ?>    
<?php
// var_dump($_SESSION['staffadmin']);
	if (isset($_POST['carinoanggota'])) {
		$query = $dbase->query("SELECT * FROM peminjaman WHERE kodeanggota = '$kodeanggota'");
		$no = 1;
		?>
		<table class="table table-hover table-bordered table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Nomor Anggota</th>
					<th>Nama Anggota</th>
					<th>Kontak</th>
					<th>Judul Buku</th>
					<th>Tanggal Peminjaman</th>
					<th>Tanggal Pengembalian</th>
					<th>Status Buku</th>
				</tr>
			</thead>
			<tbody>
		<?php
			while ($row = $query->fetch(PDO::FETCH_OBJ)) {
				if (empty($row)) {
					echo 'tidak ada peminjaman';
				}
			?>
				<tr>
					<td><?=$no?></td>
					<td><?=$row->kodeanggota?></td>
					<td><?=$row->namaanggota?></td>
					<td><?=$row->kontakanggota?></td>
					<td>
						<ol>
							<li><?=$row->judulbuku1?></li>
							<li><?=$row->judulbuku2?></li>
						</ol>
					</td>
					<td><?=TanggalIndo($row->tglpeminjaman)?></td>
					<td class="text-warning bg-warning"><?=TanggalIndo($row->tglpengembalian)?></td>
					<td class="text-danger">
						<?=$row->status_peminjaman?><br>
						<a href="pages/returnb.php?id=<?=$row->idpeminjaman?>" class="btn btn-success btn-sm">Proses pengembalian</a>
						<br>
						<a href="pages/penambahan.php?id=<?=$row->idpeminjaman?>" class="btn btn-warning btn-sm">Penambahan waktu</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

<?php
	$no++;
	}
}
?>
<!--/Hasil Input Kode Anggota-->

</div>