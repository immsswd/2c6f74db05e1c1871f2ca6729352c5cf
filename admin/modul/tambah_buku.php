<h2 class="text-center"><i class="fa fa-paperclip"></i> Tambah Buku</h2><hr>
<div class="col-md-2"></div>
<div class="col-md-8 col-sm-12">
	<form method="POST"  enctype="multipart/form-data">
<?php
    $sql = mysqli_query($link, "SELECT * FROM buku_kategori");
    $a = mysqli_fetch_all($sql, MYSQLI_BOTH);
//        var_dump($a);
        
?>
      <div class="form-group">
        <label for="kodebuku">Kode Buku:</label>
        <input type="number" name="kodebuku" class="form-control" required>
      </div>
      <div class="form-group">
          <label for="kategori">Kategori Buku</label>
          <select name="kategori" class="form-control selectpicker" id="kategori">
              <?php foreach($a as $row):?>
            <option value="<?= $row['id']?>"><?php echo $row['category'];?></option>
              <?php endforeach;?>
          </select>
      </div>
      <div class="form-group">
        <label for="judulbuku">Judul Buku:</label>
      	<textarea class="form-control" name="judulbuku" required></textarea>
      </div>
      <div class="form-group">
        <label for="pengarang">Pengarang:</label>
        <input type="text" name="pengarang" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="tahunterbit">Tahun terbit:</label>
        <input type="text" name="tahunterbit" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="penerbit">Penerbit:</label>
        <input type="text" name="penerbit" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="kota">Kota:</label>
        <input type="text" name="kota" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="rakbuku">Rak Buku:</label>
        <input type="text" name="rakbuku" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="stokbuku">Stok Buku:</label>
        <input type="text" name="stokbuku" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="descr">Deskripsi Buku:</label>
        <textarea name="descr" class="form-control" rows="10" required></textarea>
      </div>

      <div class="form-group">
        <label for="foto_buku">Sampul Buku</label>
        <input type="file" name="gambar" required>
      </div>
      <br>
      <div class="form-group">
        <button type="submit" name="tambahBuku" class="btn btn-success btn-block submit">Tambah Buku</button>
      </div>
  </form>
    
<?php
//    print_r($_SESSION["staffadmin"]);

  if (isset($_POST['tambahBuku'])) {

     $kategori     = htmlentities($_POST["kategori"], ENT_QUOTES, "UTF-8");
     $kodebuku     = htmlentities($_POST["kodebuku"]);
     $judulbuku    = htmlentities($_POST["judulbuku"]);
     $pengarang    = htmlentities($_POST["pengarang"]);
     $tahunterbit  = htmlentities($_POST["tahunterbit"]);
     $penerbit     = htmlentities($_POST["penerbit"]);
     $kota         = htmlentities($_POST["kota"]);
     $rakbuku      = htmlentities($_POST["rakbuku"]);
     $stokbuku     = htmlentities($_POST["stokbuku"]);
     $descr        = htmlentities($_POST["descr"]);

   define('ROOTT', "//".$_SERVER['SERVER_NAME'].'/pustaka/users/');
      
//    $tm = md5(time());
//    $fnm = $_FILES["gambar"]["name"];
//    $dst = "./pustaka/imgbooks/".$tm.$fnm;
//    $dst1 = "gambar/".$tm.$fnm;
//    move_uploaded_file($_FILES["gambar"]["tmp_name"] ,$dst); 
//     
    $tm = md5(time());
    $ng   = $_FILES['gambar']['name'];
    $fdir = "./gambar/".$tm.$ng;
    $sdir = "../users/gambar/".$tm.$ng;
    $dst1 = "gambar/".$tm.$ng;
    move_uploaded_file($_FILES["gambar"]["tmp_name"] ,$fdir);
      copy($fdir, $sdir);
      
        if ($fdir){
            echo"<script>alert('Berhasil ditambah!');history.go(-1);</script>";
        }
   
    mysqli_query($link, "INSERT INTO buku VALUES (null, '$kategori', '$kodebuku', '$judulbuku', '$pengarang', '$tahunterbit', '$penerbit', '$kota', '$rakbuku', '$stokbuku', '$stokbuku', '$descr','$dst1', '$_SESSION[staffadmin]')");
   
  }
    ?>
</div>
<div class="col-md-2"></div>