<div class="col-md-2">
    <a href="index.php?modul=buku" class="btn btn-app"><i class="fa fa-hand-o-left"></i> Kembali ke list</a>
</div>

<div class="col-md-8">
    <?php
    if(isset($_POST['submitidbuku'])){
        $idbuku     = htmlentities(htmlspecialchars($_POST['idbuku']));
        $_SESSION['idbukud']    = $idbuku;
        
    $stmt = $dbase->query("SELECT * FROM buku WHERE id = '$_SESSION[idbukud]'");
    
        while($row = $stmt->fetch(PDO::FETCH_OBJ)){
            $gambar         = $row->fotobuku;
            $judul          = $row->judul;
            $kode           = $row->kode;
            $idkat          = $row->id_kategori;
            $pengarang      = $row->pengarang;
            $tahun          = $row->tahunterbit;
            $penerbit       = $row->penerbit;
            $kota           = $row->kota;
            $rakbuku        = $row->rakbuku;
            $stock          = $row->stokbuku;
            $stock_avail    = $row->jml_stok_sekarang;
            $rev            = $row->descr;
    }
    $sqlkat     = $dbase->query("SELECT * FROM buku_kategori WHERE id = '$idkat'");
?>
        <center class="alert bg-warning">
            <img src="<?=$gambar?>" width="100" height="100" class="img img-responsive img-thumbnail zooomin">
            <h3>
                <?=$judul?>
            </h3>
            <h4><strong class="text-success">Stok buku: <?=$stock?></strong></h4>
            <h4><strong class="text-warning">Stok buku yang tersedia: <?=$stock_avail?></strong></h4>
        </center>
        <p>
            <span class="lead">Review:</span><br>
            <?=nl2br($rev)?>
        </p>
        <table class="table table-responsive">
            <tbody>

                <tr>
                    <th>Kode buku / ISBN</th>
                    <td>
                        <?=$kode?>
                    </td>
                </tr>
                <tr>
                    <th>Kategori Buku</th>
                    <td>
                        <?php
                            while($r = $sqlkat->fetch(PDO::FETCH_OBJ)){
                                echo $r->category;
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Pengarang</th>
                    <td>
                        <?=$pengarang?>
                    </td>
                </tr>
                <tr>
                    <th>Tahun Terbit</th>
                    <td>
                        <?=$tahun?>
                    </td>
                </tr>
                <tr>
                    <th>Penerbit</th>
                    <td>
                        <?=$penerbit?>
                    </td>
                </tr>
                <tr>
                    <th>Kota</th>
                    <td>
                        <?=$kota?>
                    </td>
                </tr>
                <tr>
                    <th>Kode Rak Buku</th>
                    <td>
                        <?=$rakbuku?>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php  }else{
        echo "<script>window.location='index.php?modul=show_buku'</script>";
    } ?>
</div>
<div class="col-md-2"></div>
