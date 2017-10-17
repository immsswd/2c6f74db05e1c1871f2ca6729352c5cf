<div class="col-md-12">
    <h2 class="text-center"><i class="fa fa-paperclip"></i> Data Calon Anggoa</h2>
    <hr>
    <?php
include_once ("fctn/tglid.php");
//var_dump($_SESSION['staffadmin']);
$r = mysqli_query($link, "SELECT * FROM user_reg WHERE status = 'no' ORDER BY updated ASC");
//$r = mysqli_query($link, "SELECT * FROM user_reg INNER JOIN anggota ON user_reg.id = anggota.iduser ORDER BY anggota.id DESC");

?>
        <table class="table table-responsive table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>

            <?php
	$no = 1;
	while ($row = mysqli_fetch_array($r)) {
		$url = $row['id'];
		$_SESSION['idsetuju'] = $url;


		$foto = mysqli_query($link, "SELECT * FROM anggota WHERE status_keanggotaan = 'Nonaktif' AND iduser = '$url'");
		$f = mysqli_fetch_all($foto, MYSQLI_ASSOC);
	?>
                <tbody>
                    <tr>
                        <td>
                            <?php echo $no; ?>
                        </td>
                        <?php
			foreach ($f as $fo) {
                $foo = $fo['iduser'];
			?>
                            <td><a href="<?=$fo['foto']?>"><img class="img-responsive img-thumbnail" src="<?php echo $fo['foto'] ;?>" width="100" height="100"></a></td>
                            <?php
			}
		?>
                            <td>
                                <?php echo $row['username']; ?>
                            </td>
                            <td>
                                <?php echo $row['firstname']; echo " ". $row['lastname']; ?>
                            </td>
                            <td>
                                <?php echo $row['email']; ?>
                            </td>
                            <td>
                                <?php echo 'Pekanbaru, '.TanggalIndo($row['updated']); ?>
                            </td>
                            <td>
                                <?php if ($row['status']=="no") {?>
                                <a class='btn btn-sm btn-success btn-block' data-placement="left" data-toggle="tooltip" data-original-title="setujui setelah selsai check kelengkapan berkas" onclick="return confirm('Anda yakin ingin approve <?php echo $row['firstname'] ?> ?')" href='pages/approve.php?id=<?=$url?>'>Setujui? </a>

            <?php    }?><br>
            <?php
        	   $idu = $dbase->query("SELECT * FROM user_reg INNER JOIN anggota ON user_reg.id = anggota.iduser WHERE anggota.status_keanggotaan = 'Nonaktif' AND iduser = '$foo' ORDER BY nama ASC");
                $mod = $idu->fetchAll(PDO::FETCH_BOTH);
        	   
                while ($rw = $idu->fetch(PDO::FETCH_OBJ)) {
        	    $idd = $rw->id;
        	    $name = $rw->nama;
        	}
        ?>
                                    <!-- <a href="#" class="btn btn-sm btn-primary">Lihat Data</a> -->
                                    <!--       <form method="post"><input type="hidden" name="idcalon" value="idd"><button name="btnid" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></button></form> -->
                            </td>
                        <td>
                            <form method="post" action="index.php?pages=deletereg">
                                <input name="idudel" value="<?=$url?>" type="hidden">
                                <button onclick="return confirm('Yakin dihapus?')" type="submit" name="delus" class="btn btn-sm btn-default"><i class="fa fa-trash"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                <?php $no++; }?>
        </table>
</div>

<div class="col-md-12">
    <!--==================PANEL MODAL===============================-->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="panel panel-danger">
                    <div class="panel-heading">Hallo</div>
                    <div class="panel-body">

                        <table class="table table-responsive table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kotank / WA / HP</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Jenis Anggota</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
        		foreach ($mod as $value) {
        			// var_dump($value['nama']);
        		?>
                                    <tr>
                                        <td>Nomor</td>
                                        <td>
                                            <?=$value['kontak']?>
                                        </td>
                                        <td>
                                            <?=$value['nama']?>
                                        </td>
                                        <td>
                                            <?=$value['status_keanggotaan']?>
                                        </td>
                                        <td>
                                            <?=$value['alamat']?>
                                        </td>
                                        <td>
                                            <?=$value['jeniskelamin']?>
                                        </td>
                                        <td>
                                            <?=$value['jenisanggota']?>
                                        </td>
                                    </tr>
                                    <?php
        		}
        	?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================/PANEL MODAL===============================-->
</div>
