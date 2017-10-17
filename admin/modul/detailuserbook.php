<?php
if (isset($_POST['submit'])){
//var_dump($_POST['namabuku']);
require_once("fctn/tglid.php");
$judul = htmlentities($_POST['namabuku']);
$stmt = $dbase->query("SELECT * FROM peminjaman WHERE buku1 LIKE '%".$judul."%' OR buku2 LIKE '%".$judul."%' AND status_peminjaman = 'Belum Kembali' ORDER BY tglpengembalian DESC");

$no = 1;
if ($stmt == null) {
    echo '<div class="alert alert-info">Belum ada transaksi pada buku yang dimaksud</div>';
}
?>
    <div class="col-md-12">
        <h2 class="alert bg-warning">
            <em>Daftar nama-nama Anggota yang pernah/sedang meminjam Buku: <strong class="text-primary"><?=$judul?></strong></em>
        </h2>
        <hr>
        <a href="index.php?modul=booksdetailwithuser" class="btn btn-app"><i class="fa fa-hand-o-left"></i> Kembali ke list</a>
        <hr>
        <table class="table table-responsive table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Anggota</th>
                    <th>Nomor Anggota</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status Peminjaman</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $stmt->fetch(PDO::FETCH_OBJ)):?>
                <tr>
                    <td>
                        <?=$no?>
                    </td>
                    <td>
                        <?=$row->namaanggota?>
                    </td>
                    <td>
                        <?=$row->kodeanggota?>
                    </td>
                    <td>
                        <?=TanggalIndo($row->tglpeminjaman)?>
                    </td>
                    <td class="bg-warning">
                        <?=TanggalIndo($row->tglpengembalian)?>
                    </td>
                    <td>
                        <?php if ($row->status_peminjaman == "Belum Kembali"){
                    echo '<strong class="text-danger">'.$row->status_peminjaman.'</strong>';
                }else{
                    echo '<strong class="text-success">'.$row->status_peminjaman.'</strong>';
                }
                ?>
                    </td>
                </tr>
                <?php $no++; endwhile ?>
            </tbody>
        </table>
    </div>
    <?php }else{
    echo "<script>window.location='index.php?modul=booksdetailwithuser'</script>";
} ?>
