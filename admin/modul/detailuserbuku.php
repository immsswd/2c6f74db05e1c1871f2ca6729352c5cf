<?php
$q = $dbase->query("SELECT * FROM buku ORDER BY judul ASC");

$no = 1;
?>
<div class="col-md-12">
    <h2> Detil Buku dan Peminjam</h2>
    <table class="table table-responsive table-bordered table-hover">
        <thead>
            <th>#</th>
            <th><em>Cover</em> Buku</th>
            <th>Nama Buku</th>
            <th>Kode Buku/ISBN</th>
            <th>Pengarang</th>
            <th>Rak Buku</th>
            <th>Tahun Terbit</th>
            <th><strong>Stock Buku</strong></th>
            <th><strong>Stock buku yang tersedia</strong></th>
        </thead>
        <?php while ($row = $q->fetch(PDO::FETCH_OBJ)):?>
        <tbody>
            
            <td><?=$no?></td>
            <td>
                <a href="<?=$row->fotobuku?>" target="_blank">
                    <img src="<?=$row->fotobuku?>" class="img image img-responsive img-thumbnail" width="100" height="100">
                </a>
            </td>
            <td><?=$row->judul?></td>
            <td><?=$row->kode?></td>
            <td><?=$row->pengarang?></td>
            <td><?=$row->rakbuku?></td>
            <td><?=$row->tahunterbit?></td>
            <td><strong class="text-success"><?=$row->stokbuku?> Eksemplar</strong></td>
            <td>
                <strong class="text-warning"><?=$row->jml_stok_sekarang?> Eksemplar </strong>
                
<!--                <a  href="index.php?modul=detailbu"></a>-->
                <form method="POST" action="index.php?modul=detailbu">
                    <input type="hidden" name="namabuku" value="<?=$row->judul?>">
                    <button class="btn btn-xs btn-primary btn-block" type="submit" name="submit">List Anggota yang pernah meminjam buku ini</button>
                </form>
            </td>
        
        </tbody>
        <?php 
                $no++; 
                endwhile 
            ?>
    </table>
</div>