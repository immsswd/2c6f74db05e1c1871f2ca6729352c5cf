<div class="col-md-12">
    <h2 class="text-center"><i class="fa fa-paperclip"></i> Data Calon Anggoa</h2>
    <hr>
    <?php
//var_dump($_SESSION['staffadmin']);
//$r = mysqli_query($link, "SELECT * FROM user_reg INNER JOIN anggota ON user_reg.id = anggota.iduser WHERE status = 'no' ORDER BY updated ASC");
$r = $dbase->query("SELECT * FROM user_reg INNER JOIN anggota ON user_reg.id = anggota.iduser WHERE user_reg.status = 'no' ORDER BY updated DESC");
//$r = mysqli_query($link, "SELECT * FROM user_reg INNER JOIN anggota ON user_reg.id = anggota.iduser ORDER BY anggota.id DESC");

?>
        <table class="table table-responsive table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Tempat/Tanggal lahir</th>
                    <th>Alamat</th>
                    <th>Pekerjaan</th>
                    <th>Tanggal Registrasi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
	$no = 1;
	while ($row = $r->fetch(PDO::FETCH_OBJ)) {
		$url = $row->iduser;
		$_SESSION['idsetuju'] = $url;
	?>
                    <tr>
                        <td>
                            <?php echo $no; ?>
                        </td>
                        <td><a target="_blank" href="<?=$row->foto?>"><img class="img-responsive img-thumbnail" src="<?=$row->foto;?>" width="100" height="100"></a></td>
                        <td>
                            <?php echo $row->nama?>
                        </td>
                        <td>
                            <?php echo $row->usernamea?>
                        </td>
                        <td>
                            <?php echo $row->email?>
                        </td>
                        <td>
                            <?php echo $row->tempatlahir.'/'.TanggalIndo($row->tgllahir)?>
                        </td>
                        <td>
                            <?php echo $row->alamat.' <br>HP: '.$row->kontak?></td>
                        <td>
                            <?php echo $row->statuspekerjaan ?>
                        </td>
                        <td>
                            <?php echo 'Pekanbaru, '.TanggalIndo($row->updated)?>
                        </td>
                        <td>
                            <?php if ($row->status=="no") {?>
                            <a class='btn btn-sm btn-success' data-placement="left" data-toggle="tooltip" data-original-title="setujui setelah selsai check kelengkapan berkas" onclick="return confirm('Anda yakin ingin approve <?php echo $row->firstname?> ?')" href='pages/approve.php?id=<?=$url?>'>
                                <i class="fa fa-check"></i> Setujui? 
                            </a>
                            <?php }?>
                            <form method="post" action="index.php?pages=deletereg">
                                <input name="idudel" value="<?=$url?>" type="hidden">
                                <button onclick="return confirm('Yakin dihapus?')" type="submit" name="delus" class="btn btn-sm btn-default"><i class="fa fa-trash"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <?php $no++; }?>
            </tbody>
        </table>
</div>
