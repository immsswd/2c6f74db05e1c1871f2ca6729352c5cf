<div class="col-md-12">
    <h2 class="text-center"><i class="fa fa-paperclip"></i> Data Peminjaman Koleksi Buku</h2>
    <hr>
    <?php
	$query = $dbase->query("SELECT * FROM peminjaman ORDER BY tglpengembalian DESC");
    
//    $number_of_rows = $query->fetch(PDO::FETCH_COLUMN);
//print($today);
?>
        <table class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nomor Anggota</th>
                    <th>Nama Anggota</th>
                    <th>Judul Buku 1</th>
                    <th>Judul Buku 2</th>
                    <th>Staff/Peminjam</th>
                    <th>Tgl Peminjaman</th>
                    <th>Tgl Pengembalian</th>
                    <th>Status Peminjaman</th>
                </tr>
            </thead>
            <tbody>
                <?php 
		require ("fctn/tglid.php");
		$no = 1;
        $today = date('Y-m-d');
		while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        ?>
                <tr>
                    <td>
                        <?=$no?>
                    </td>
                    <td>
                        <?=$row->kodeanggota?>
                    </td>
                    <td>
                        <?=$row->namaanggota?>
                    </td>
                    <td>
                        <?=$row->buku1?>
                    </td>
                    <td>
                        <?=$row->buku2?>
                    </td>
                    <td>
                        <?=$row->staffpeminjam?>
                    </td>
                    <td>
                        <?=TanggalIndo($row->tglpeminjaman)?>
                    </td>
                    <td class="text-warning bg-warning">
                        <?=TanggalIndo($row->tglpengembalian)?>
                    </td>
                    <?php
				if ($row->status_peminjaman == 'Sudah Kembali') {
					echo '<td class="bg-success text-info">'.$row->status_peminjaman.'</td>';
				}else{
					echo '<td class="bg-danger text-warning">'.$row->status_peminjaman.'</td>';
				}
			?>

                </tr>
                <?php $no++; } ?>
            </tbody>
        </table>
        <!-- <a href="export/export.php" class="btn btn-info" target="_blank"><i class=" fa fa-file-pdf-o"></i> Export data peminjaman</a> -->
</div>
<div class="col-md-4">
    <hr>
    <h2><i class="fa fa-paperclip"></i> Pilih berdasarkan Nama</h2>
    <hr>
    <form method="post" action="">
        <div class="input-group">
            <?php
                // $s1= mysqli_query($link, "SELECT * FROM user_reg INNER JOIN anggota ON user_reg.id = anggota.iduser ORDER BY user_reg.updated DESC");
                // $s = mysqli_query($link, "SELECT * FROM anggota WHERE status_keanggotaan = 'Aktif'");
            // $s = $dbase->query("SELECT * FROM peminjaman WHERE status_peminjaman = 'Belum Kembali' ORDER BY namaanggota ASC");
            $s = $dbase->query("SELECT * FROM anggota WHERE status_keanggotaan = 'Aktif' ORDER BY kodeanggota ASC");
            ?>
                <select name="anggotak" class="form-control selectpicker">
            <?php
                while($row = $s->fetch(PDO::FETCH_OBJ)){
            ?>
                <option value="<?=$row->nama?>"><?=$row->nama?></option>
            <?php }?>
            </select>
                <div class="input-group-btn">
                    <button class="btn btn-primary" name="pilihanggota" type="submit">Pilih</button>
                </div>
        </div>
    </form>
</div>
<div class="col-md-4"></div>
<div class="col-md-4"></div>
<div class="col-md-12">
    <?php
		if (isset($_POST['pilihanggota'])) {

			$anggota = isset($_POST['anggotak']);
			$ss = $dbase->query("SELECT * FROM peminjaman WHERE namaanggota = '$_POST[anggotak]' ORDER BY tglpengembalian DESC");
			$no = 1;
	?>
        <!--	<h2 class="text-center"><i class="fa fa-paperclip"></i> Data Peminjam</h2><hr>-->
        <div class="alert bg-info">
            <h2>Daftar Peminjaman Buku oleh:<strong> <?=$_POST['anggotak']?></strong></h2>
        </div>
        <table class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nomor Anggota</th>
                    <th>Nama Anggota</th>
                    <th>Judul Buku 1</th>
                    <th>Judul Buku 2</th>
                    <th>Tgl Peminjaman</th>
                    <th>Tgl Pengembalian</th>
                    <th>Status Peminjaman</th>
                </tr>
            </thead>
            <tbody>
                <?php 
		while ($row = $ss->fetch(PDO::FETCH_OBJ)) {
		 ?>
                <tr>
                    <td>
                        <?=$no?>
                    </td>
                    <td>
                        <?=$row->kodeanggota?>
                    </td>
                    <td>
                        <?=$row->namaanggota?>
                    </td>
                    <td>
                        <?=$row->buku1?>
                    </td>
                    <td>
                        <?=$row->buku2?>
                    </td>
                    <td>
                        <?=TanggalIndo($row->tglpeminjaman)?>
                    </td>
                    <td class="text-warning bg-warning">
                        <?=TanggalIndo($row->tglpengembalian)?>
                    </td>
                    <?php if ($row->status_peminjaman=="Sudah Kembali") {
			
				echo '<td class="bg-success">'.$row->status_peminjaman.'</td>';
			}else{
				echo '<td class="bg-danger">'.$row->status_peminjaman.'</td>';
			}
			?>


                </tr>
                <?php $no++; } ?>
            </tbody>
        </table>
        <?php	
		}
	?>
</div>
<br>
