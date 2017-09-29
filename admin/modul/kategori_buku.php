<div class="col-md-4">
    <h2 class="text-center"><i class="fa fa-paperclip"></i> Buat Kategori Buku</h2><hr>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="cat_name"> Nama Kategori</label>
            <input name="cat_name" class="form-control" placeholder="Nama Kategori Buku" required>
        </div>
        <div class="form-group">
            <label for="cat_desc">Deskripsi</label>
            <textarea name="cat_desc" class="form-control" placeholder="Deskripsi Kategori" required></textarea>
        </div>
        <div class="form-group">
            <button name="tambah" class="btn btn-sm btn-success btn-block">Tambahkan</button>
        </div>
    </form>
</div>
<?php
    if(isset($_POST["tambah"])){
        
        $kategori       = htmlentities($_POST["cat_name"]);
        $kategoridesc   = htmlentities($_POST["cat_desc"]);
        
        $q = mysqli_query($link, "INSERT INTO buku_kategori VALUES (null, '$kategori', '$kategoridesc')");
        if($q){
            echo "<script>alert('Berhasil menambah kategori');history.go(1);</script>";
        }else{
            echo "tidak bisa ditambah";
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
        <h2 class="text-center"><i class="fa fa-paperclip"></i> Daftar Kategori</h2><hr>
        <thead>
            <tr>
            <th>#</th>
            <th>Nama Kategori</th>
            <th>Keterangan</th>
            <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($a as $r): ?>
            <tr>
            <td><?php echo $no ?></td>
            <td><strong><?php echo $r['category'] ?></strong></td>
            <td><?php echo $r['description'] ?></td>
            <td>

                <a href="pages/delkat.php?id=<?=$r['id']?>" onclick="return confirm('Anda yakin ingin menghapus Kategori: <?php echo $r['category']." ?" ?>')" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
            </td>
            </tr>
        <?php $no++; endforeach ?>
        </tbody>
    </table>
</div>