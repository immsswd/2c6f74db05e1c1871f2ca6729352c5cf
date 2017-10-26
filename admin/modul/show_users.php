<div class="col-md-12">
    <h2 class="text-center"><i class="fa fa-paperclip"></i> Anggota <span class="text-success">Aktif</span></h2>
    <hr>
    <hr>
<?php
// $r = mysqli_query($link, "SELECT * FROM user_reg ORDER BY id DESC");
// $r = mysqli_query($link, "SELECT * FROM user_reg INNER JOIN anggota ON user_reg.id = anggota.iduser ORDER BY user_reg.updated DESC");
//$six_digit_random_number = mt_rand(100000, 999999);
//
//echo $six_digit_random_number ;
	$r = "SELECT * FROM user_reg INNER JOIN anggota ON user_reg.id = anggota.iduser WHERE status_keanggotaan = 'Aktif' ORDER BY user_reg.updated DESC";
	$query = $dbase->query($r);
	$l = $query->fetchAll(PDO::FETCH_OBJ);
?>
        <table class="table table-responsive table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nomor Anggota</th>
                    <th>Nama Lengkap</th>
                    <th>Status</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Kontak/Hp</th>
                    <th>Alamat</th>
                    <th>Tanggal Terdaftar</th>
                    <th>Status</th>

                </tr>
            </thead>
            <tbody>
                <?php
	$no = 1;
	foreach ($l as $row) {
		$url = $row->iduser;
		$status = $row->status=='yes';
		$_SESSION['update'] = $row->updated;
	?>
                    <tr>
                        <?php if ($status){?>
                        <td>
                            <?=$no?>
                        </td>
                        <td><img src="<?=$row->foto?>" alt="<?=$row->nama?>" width="100" heigth="80" class="img-responsive img-thumbnail"></td>
                        <td>
                            <?=$row->kodeanggota?>
                        </td>
                        <td>
                            <?=$row->nama?>
                        </td>
                        <td>
                            <?=$row->statuspekerjaan?>
                        </td>
                        <td>
                            <?=$row->username ?>
                        </td>
                        <td>
                            <?=$row->email ?>
                        </td>
                        <td>
                            <?=$row->kontak ?>
                        </td>
                        <td>
                            <?=$row->alamat ?>
                        </td>
                        <td>
                            <?=TanggalIndo($_SESSION['update']) ?>
                        </td>
                        <td>
                            <?php 
			echo "<span class='text-success'>Anggota Aktif</span>";
            ?>
                            <hr>
                            <a data-placement="left" data-toggle="tooltip" data-original-title="Nonaktifkan?" class='btn btn-sm btn-danger' onclick="return confirm('Anda yakin Menonaktifkan <?=$row->nama ?> ?')" href='pages/disapprove.php?id=<?=$url?>'>
                                <i class="fa fa-power-off"></i>
                            </a>
                        </td>

                        <?php $no++; } ?>

                    </tr>
                    <?php  }?>
            </tbody>
        </table>
</div>
