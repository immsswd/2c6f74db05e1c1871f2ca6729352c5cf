<div class="col-md-3"></div>
<div class="col-md-6">
<p class="text-center text-info lead"><i class="fa fa-paperclip"></i> Peminjaman buku</p><hr>

   <form method="post" action="">
        <div class="input-group">
<!--            <input type="text" class="form-control input-lg" placeholder="hasdf" name="search">-->
            <?php
                // $s1= mysqli_query($link, "SELECT * FROM user_reg INNER JOIN anggota ON user_reg.id = anggota.iduser ORDER BY user_reg.updated DESC");
                // $s = mysqli_query($link, "SELECT * FROM anggota WHERE status_keanggotaan = 'Aktif'");
//            $s = mysqli_query($link, "SELECT * FROM anggota WHERE status_keanggotaan = 'Aktif' ORDER BY kodeanggota ASC");
            $s = $dbase->query("SELECT * FROM anggota WHERE status_keanggotaan = 'Aktif' ORDER BY kodeanggota");

            ?>
            <select name="kodang" class="form-control input-lg selectpicker">
            <?php while($row = $s->fetch(PDO::FETCH_ASSOC)){ ?>
                <option value="<?=$row['kodeanggota']?>"><?php echo $row['kodeanggota']." - ".$row['nama']?></option>
            <?php }?>
            </select>
            <div class="input-group-btn">
                <button class="btn btn-primary btn-lg" name="exec" type="submit">Pilih Anggota</button>
            </div>
        </div>
    </form>
</div>
<div class="col-md-3"></div>
<div class="col-md-12">
    <?php
    if(isset($_POST['exec'])){
        // var_dump($_SESSION['staffadmin']);
        $kodang = $_POST['kodang'];
        
        // print_r($kodang);

        $hs = mysqli_query($link, "SELECT * FROM buku ORDER BY judul ASC");
        $hasil = mysqli_fetch_all($hs, MYSQLI_ASSOC);
//        $hs     = $dbase->query("SELECT * FROM anggota WHERE kodeanggota = '$kodang'");
//        $hasil  = $hs->fetch(PDO::FETCH_ASSOC);
        
        $qa = $dbase->query("SELECT * FROM anggota WHERE kodeanggota = '$kodang'");
        $re = $qa->fetchAll(PDO::FETCH_ASSOC);
        foreach ($re as $hss) {
            $kodeanggota = $hss['kodeanggota'];
            $namaanggota = $hss['nama'];
            $kontakanggota = $hss['kontak'];
            $foto = $hss['foto'];

            $_SESSION['kodeanggota'] = $kodeanggota;
            $_SESSION['namaanggota'] = $namaanggota;
            $_SESSION['kontak']      = $kontakanggota;
        }
        // var_dump($re);
    ?>
    <hr>
    <img src="<?=$foto?>" width="100" height="100" class="img-responsive img-thumbnail"><br>
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="kodeanggota">Kode Anggota:</label>
                <input name="kodeanggota" type="text" value="<?=$kodeanggota?>" class="form-control" disabled>
            </div>
            <div class="form-group">
                <label for="namaanggota">Nama</label>
                <input name="namaanggota" type="text" value="<?=$namaanggota?>" class="form-control" disabled>
            </div>
            <div class="form-group">
                <?php foreach($re as $hss): ?>
                <label for="contact">Kontak</label>
                <input type="text" value="<?=$kontakanggota?>" name="contact" class="form-control" disabled>
                <?php endforeach ?>
            </div>
            <div class="form-group">
                <label for="judul1">Pilih Buku 1</label>
                <select name="judul1" class="form-control selectpicker" id="kategori">
                    <?php foreach($hasil as $rw):?>
                    <option value="<?= $rw['judul']?>"><?=$rw['judul']?></option>
                    <?php endforeach;?>
                </select>
                <!-- <input type="hidden" name="idbuku1" value=""> -->
            </div>
            <div class="form-group">
                <label for="judul2">Pilih Buku 2</label>
                <select name="judul2" class="form-control selectpicker" id="kategori">
                    <option value="0">Tidak ada</option>
                    <?php foreach($hasil as $rw):?>
                    <option value="<?= $rw['judul']?>"><?=$rw['judul']?></option>
                    <?php endforeach;?>
                </select>
             <!--    <input type="hidden" name="idbuku2" value=""> -->
            </div>
            <div class="form-group">
                <label for="dateissue">Tanggal Peminjaman </label>
                <input type="text" name="dateissue" value="<?=date('Y-m-d')?>" class="form-control" disabled>
            </div>
            <div class="form-group has-feedback col-lg-12">
                <label for="datereturn">Tanggal Pengembalian (<small class="text-warning">Tahun-bulan-tanggal</small>)</label>
                <input name="datereturn" type="text" class="form-control has-feedback-left datepicker" id="inputSuccess2" placeholder="Tanggal Pengembalian" required>
                <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
            </div>
            <div class="form-group">
                <button type="submit" name="pinjam" class="btn btn-warning btn-lg btn-block">Proses</button>
            </div>
        </form>
    <?php
    }
    ?>
</div>
<div class="col-md-12">
    <?php

        if (isset($_POST['pinjam'])){
            // $kodeanggota = htmlentities($_POST['kodeanggota']); 
            // $namaanggota = htmlentities($_POST['namaanggota']); 
            // $contact     = htmlentities($_POST['contact']);
            $judul1      = htmlentities($_POST['judul1']);
            $judul2      = htmlentities($_POST['judul2']);
            // $dateissue   = htmlentities($_POST['dateissue']);
            $datereturn  = htmlentities($_POST['datereturn']);            
            $timestamp = date('Y-m-d G:i:s');
            // tidak bisa meminjam jika anggota sudah meminjam sebelumnya
            $stmt = $dbase->query("SELECT * FROM peminjaman WHERE kodeanggota = '$_SESSION[kodeanggota]'");
            while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                $stpe = $rs->status_peminjaman;
                $nama             = $rs->namaanggota;
                $buku             = '<strong>'.$rs->buku1.'</strong> dan buku: <strong>'.$rs->buku2.'</strong>';
                $tglp             = $rs->tglpeminjaman;
                $tglpeng          = $rs->tglpengembalian;
            }
            if($stpe == 'Belum Kembali'){
        ?>
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                
                <p><i class="fa fa-warning"></i> Maaf, Peminjaman tidak bisa dilakukan karna <?=$nama?> telah/sedang meminjam buku: <?=$buku?>
                <br>
                    Transaksi peminjaman pada tanggal <strong><?=TanggalIndo($tglp)?></strong> dan pengembalian pada tanggal <strong><?=TanggalIndo($tglpeng)?></strong>
                </p>
            </div>
        <?php
            }else{
            $ins = "INSERT INTO peminjaman VALUES (null, '$_SESSION[kodeanggota]', '$_SESSION[namaanggota]', '$_SESSION[kontak]', '$judul1', '$judul2', NOW(), '$datereturn','Belum Kembali', '$_SESSION[staffadmin]', '$timestamp')";
            // mysqli_query($link, "UPDATE buku SET jml_stok_sekarang = jml_stok_sekarang-1 WHERE judul = judul2");
            mysqli_query($link, "UPDATE buku SET jml_stok_sekarang = jml_stok_sekarang - 1 WHERE judul = '$judul1'");
            mysqli_query($link, "UPDATE buku SET jml_stok_sekarang = jml_stok_sekarang - 1 WHERE judul = '$judul2'");
            $exc = mysqli_query($link, $ins);
            if ($exc) {
                ?>
            <div id="sweet-20" class="alert alert-success">Peminjaman berhasil</div>

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

            $sss = $dbase->query("SELECT * FROM peminjaman WHERE namaanggota = '$_SESSION[namaanggota]'");
            $no = 1;
            while ($roww = $sss->fetch(PDO::FETCH_OBJ)) {
                $kodea = $roww->kodeanggota;
                $namaa = $roww->namaanggota;
                $j1    = $roww->buku1;
                $j2    = $roww->buku2;
                $tglpi = TanggalIndo($roww->tglpeminjaman);
                $tglpe = TanggalIndo($roww->tglpengembalian);
                $stp   = $roww->status_peminjaman;
            }
        ?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=$kodea?></td>
                    <td><?=$namaa?></td>
                    <td><?=$j1?></td>
                    <td><?=$j2?></td>
                    <td><?=$tglpi?></td>
                    <td class="text-warning"><?=$tglpe?></td>
                    <td class="text-danger"><?=$stp?></td>
                </tr>
        <?php $no++; ?>
            </tbody>
            </table>
        <?php
            }else{
                echo '<script>alert("Cek kembali form Peminjaman")</script>';
            }
        }
    }
    ?>
</div>
<script>
document.querySelector('#sweet-20'), function(){
 swal({
  title: "OK",
  text: "Buku berhasil dipinjamkan",
});
};
</script>