<?php
$stmt = $dbase->query("SELECT * FROM admin_reg");
$rs = $stmt->rowCount(PDO::FETCH_NUM);
?>
    <div class="col-md-4">
        <h2 class="text-center"><i class="fa fa-paperclip"></i> Buat Kategori Buku</h2>
        <hr>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="cat_name"> Nama Kategori</label>
                <input name="cat_name" class="form-control" placeholder="Nama Kategori Buku" required>
            </div>
            <div class="form-group">
                <label for="alias_name"> Alias</label>
                <input name="alias_name" class="form-control" placeholder="eg: psikologi" required>
            </div>
            <div class="form-group">
                <label for="cat_desc">Deskripsi</label>
                <textarea name="cat_desc" class="form-control" placeholder="Deskripsi Kategori" required></textarea>
            </div>
            <div class="form-group">
                <button name="tambah" id="sweet-10" onclick="confirm('yakin ingin menambah kategori?')" class="btn btn-sm btn-success btn-block"><i class="fa fa-plus"></i> Tambah Kategori</button>
            </div>
        </form>
    </div>
    <?php
    if(isset($_POST["tambah"])){
        
        $kategori       = htmlentities($_POST["cat_name"]);
        $alias          = htmlentities($_POST["alias_name"]);
        $kategoridesc   = htmlentities($_POST["cat_desc"]);
        
        $alias_count = 0;
        $stmt = $dbase->query("SELECT * FROM buku_kategori WHERE alias_cat = '$alias'");
        $alias_count = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($alias_count != NULL){
            ?>
            <div class="alert bg-danger">
                Nama kategori yang dimaksud sudah ada.
            </div>
        <?php
        }else{
        $q = mysqli_query($link, "INSERT INTO buku_kategori VALUES (null, '$kategori', '$alias', '$kategoridesc')");
        if(!$q){
           echo "tidak bisa menambah kategori";
        }
    }
}
?>
        <div class="col-md-8">
            <?php
    $sql = mysqli_query($link, "SELECT * FROM buku_kategori");
    $a = mysqli_fetch_all($sql, MYSQLI_ASSOC);
    $no = 1;
?>
                <table class="table table-responsive table-bordered">
                    <h2 class="text-center"><i class="fa fa-paperclip"></i> Daftar Kategori</h2>
                    <p><strong> Jumlah Semua Kategori katalog: <?=$rs?></strong></p>
                    <hr>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kategori</th>
                            <th>Alias</th>
                            <th>Keterangan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($a as $r): ?>
                        <tr>
                            <td>
                                <?php echo $no ?>
                            </td>
                            <td><strong><?php echo $r['category'] ?></strong></td>
                            <td><?=$r['alias_cat']?></td>
                            <td>
                                <?php echo $r['description'] ?>
                            </td>
                            <td>

                                <a href="pages/delkat.php?id=<?=$r['id']?>" onclick="return confirm('Anda yakin ingin menghapus Kategori: <?php echo $r['category']." ? " ?>')" class="btn btn-danger btn-sm btn-app"><span class="fa fa-trash"></span> Hapus</a>
                            </td>
                        </tr>
                        <?php $no++; endforeach ?>
                    </tbody>
                </table>
        </div>
       <!-- <script>
//            document.querySelector('#sweet-10').onclick = function() {
//                swal({ confirm: 'Text from input' })
//            };

        </script>-->
