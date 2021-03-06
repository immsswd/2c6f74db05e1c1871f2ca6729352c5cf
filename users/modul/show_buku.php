<div class="col-md-4">
<!--    <h2 class="text-center">Lihat berdasarakan kategori: </h2><hr>-->
    <div class="panel panel-default">
    <div class="panel-heading">Pilih berdasarakan kategori:</div>
        <div class="panel-body">
    <form method="post" action="">
        <div class="input-group">
            <?php
            $s = $dbase->query("SELECT * FROM buku_kategori ORDER BY category ASC LIMIT 10");
            ?>
            <select name="katalog" class="form-control selectpicker">
            <?php
                while($row = $s->fetch(PDO::FETCH_OBJ)){
                    $catid = $row->id;
                    $_SESSION['catid'] = $catid;
            ?>
                <option value="<?=$row->id?>"><?=$row->category?></option>
            <?php }?>
            </select>
            <div class="input-group-btn">
                <button class="btn btn-primary" name="pilihcategory" type="submit">Pilih</button>
            </div>
        </div>
    </form>
</div>
    </div>
</div>
<div class="col-lg-4">
<!--     <h2 class="text-center">Lihat semua buku: </h2><hr>-->
<div class="panel panel-default">
    <div class="panel-heading">Lihat semua buku:</div>
        <div class="panel-body">
    <form method="post" action="">
        <button class="btn btn-primary btn-block" name="lihatsemuabuku">Lihat Semua</button>
    </form>
</div>
    </div>
</div>
<div class="col-lg-4">
<?php
        $sq = "SELECT count(*) FROM buku_kategori LIMIT 10"; 
        $rs = $dbase->prepare($sq); 
        $rs->execute(); 
        $numrows = $rs->fetchColumn();    
    
        $sql = "SELECT count(*) FROM buku LIMIT 10"; 
        $result = $dbase->prepare($sql); 
        $result->execute(); 
        $number_of_rows = $result->fetchColumn(); 
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">Statistik Katalog:</div>
        <div class="panel-body">
            <h5>
                <ul>
                    <li class="label label-primary">Jumlah Katalog:    <span><?=$numrows?></span></li>
                    <li class="label label-success">Jumlah Detail Katalog:    <span><?=$number_of_rows?></span></li>
                </ul>
            </h5>
        </div>
    </div>
</div>

<div class="col-md-12">
    <hr>
<!--===========================Tampilkan berdasarkan kategori yang dipilih=============-->
<?php
if (isset($_POST['pilihcategory'])) {
    $getbukukat = $dbase->query("SELECT * FROM buku WHERE id_kategori = '$_POST[katalog]' ORDER BY judul ASC");
    $no = 1;
?>
<table class="table table-responsive table-hover table-bordered">
    <thead>
        <tr>
        <th>#</th>
        <th>Judul</th>
        <th>Pengarang</th>
        <th>Rak Buku</th>
        <th>Stok Buku</th>
        <th>Stok Tersedia</th>
        <th>Deskripsi</th>
        <th>Gambar</th>
        <th>Detail</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    while ($rw = $getbukukat->fetch(PDO::FETCH_OBJ)) {   
    ?>
    
        <tr>
            <td><?=$no?></td>
            <td><?=$rw->judul?></td>
            <td><?=$rw->pengarang?></td>
            <td><?=$rw->rakbuku?></td>
            <td><?=$rw->stokbuku?> eksemplar</td>
            <td><strong class="text-success"><?=$rw->jml_stok_sekarang?> eksemplar</strong></td>
            <td><?php $txt =  nl2br($rw->descr);
                    if(strlen($txt)>70){
                        echo substr($txt,0,200)."..<br>";
                        echo "<a href='#' class='text-warning'><u>Read more</u></a>";
                    }?></td>
            <td>
                <a><img data-targetsize="0.45" data-duration="600" class="img-responsive zoomTarget" width="80" height="100" src="<?=$rw->fotobuku?>"></a>
            </td>
            <td>
                <form method="post" action="index.php?modul=detail">
                    <input type="hidden" name="idbuku" value="<?=$rw->id?>">
                    <button type="submit" name="submitidbuku" class="btn btn-app"><i class="fa fa-list"></i> Detail buku</button>
                </form>
            </td>
        </tr>
         
    <?php
        $no++;
     }  ?>
   </tbody>
</table>
<?php
} //isset btn kategori
   
?>
<!--===========================End Tampilkan berdasarkan kategori yang dipilih=============-->
</div>
<div class="col-lg-12">
<?php
if (isset($_POST['lihatsemuabuku'])) {
    ?>
<?php
$hasil = mysqli_query($link, "SELECT * FROM buku ORDER BY tahunterbit DESC");
$no = 1;
?>
<br>
<table class="table table-responsive table-hover table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Rak Buku</th>
            <th>Stok Buku</th>
            <th>Stok Tersedia</th>
            <th>Deskripsi</th>
            <th>Foto buku</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>

<?php while ($row = mysqli_fetch_array($hasil)){ ?>
        <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $row["judul"]?></td>
        <td><?php echo $row["pengarang"]?></td>
        <td><?php echo $row["rakbuku"]?></td>
        <td><?php echo $row["stokbuku"]?> eksemplar</td>
        <td><strong class="text-success"><?php echo $row["jml_stok_sekarang"]?> eksemplar</strong></td>
        <td ><p><?php 
                    $txt =  nl2br($row["descr"]);
                    if(strlen($txt)>70){
                        echo substr($txt,0,200)."..<br>";
                        echo "<a href='#' class='text-warning'><u>Read more</u></a>";
                    }
            ?></p></td>
        <td><a><img data-targetsize="0.45" data-duration="600" class="img-responsive zoomTarget" width="80" height="100" src="<?php echo $row["fotobuku"] ?>"></a>
        </td>
         <td>
                <form method="post" action="index.php?modul=detail">
                    <input type="hidden" name="idbuku" value="<?=$row['id']?>">
                    <button type="submit" name="submitidbuku" class="btn btn-app"><i class="fa fa-list"></i> Detail buku</button>
                </form>
            </td>
        </tr>
        <?php $no++;  }  ?>
    </tbody>
</table>
<?php
}

?>
</div>