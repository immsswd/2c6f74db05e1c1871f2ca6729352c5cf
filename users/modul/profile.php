<div class="col-md-3"></div>
<div class="col-md-6">
<?php
$q = $dbase->query("SELECT * FROM anggota WHERE id = $_SESSION[idanggota]");
while ($f = $q->fetch(PDO::FETCH_OBJ)) {
    $ft 	= $f->foto;
    $nama 	= $f->nama;
    $kode 	= $f->kodeanggota;
    $status = $f->status_keanggotaan;
    $jk		= $f->jeniskelamin;
    $ja 	= $f->jenisanggota;
    $nhp 	= $f->kontak;
    $alamat = $f->alamat;
    $stpk 	= $f->statuspekerjaan;
    $agama 	= $f->agama;
    $identi	= $f->nomoridentitas;
    $jident = $f->jenisidentitas;
    $inst 	= $f->namainstansi;
}

$no=1;
?>
        <h2 class="text-center">Profile saya: <u> <?=$nama?></u></h2>
        <hr>
        <center>
            <img src="<?=$ft?>" width="100" height="100" class="img img-responsive img-thumbnail">
            <h3><?=$nama?></h3>
            <ul class="list-unstyled user_data">
                <li><i class="fa fa-map-marker user-profile-icon"></i>
                    <?=$alamat?>
                </li>

                <li>
                    <i class="fa fa-user user-profile-icon"></i>
                    <?=$stpk?>
                </li>
            </ul>

        </center>
        <table class="table table-hover table-responsive">
            <tbody>
                <tr>
                    <th>Nomor Anggota</th>
                    <td>
                        <?=$kode?>
                    </td>
                </tr>
                <tr>
                    <th>Agama</th>
                    <td>
                        <?=$agama?>
                    </td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>
                        <?=$jk?>
                    </td>
                </tr>
                <tr>
                    <th>Status Keanggotaan</th>
                    <td class="text-success">
                        <?=$status?>
                    </td>
                </tr>
                <tr>
                    <th>Jenis Keanggotaan</th>
                    <td>
                        <?=$ja?>
                    </td>
                </tr>
                <tr>
                    <th>Kontak/WA</th>
                    <td>
                        <?=$nhp?>
                    </td>
                </tr>
                <tr>
                    <th>Pekerjaan</th>
                    <td>
                        <?=$stpk?>
                    </td>
                </tr>
                <tr>
                    <th>Nomor & Jenis Identitas</th>
                    <td>
                        <?=$identi?>/
                            <?=$jident?>
                    </td>
                </tr>
                <tr>
                    <th>Bekerja/Kuliah/Sekolah di:</th>
                    <td>
                        <?=$inst?>
                    </td>
                </tr>
            </tbody>
        </table>
</div>
<div class="col-md-3"></div>
