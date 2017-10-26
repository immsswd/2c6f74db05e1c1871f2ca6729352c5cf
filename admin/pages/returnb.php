<?php
session_start();
include ("../config/dbold.php");

$id = $_GET['id'];
$staff = $_SESSION['staffadmin'];
$date = date("Y-m-d");

$date2 = date("Y-m-d H:i:s");
$sql = "UPDATE peminjaman SET tglpengembalian = NOW(), status_peminjaman = 'Sudah Kembali', staffpeminjam = '$_SESSION[staffadmin]' WHERE idpeminjaman = '$_SESSION[idpe]'";
$rs = mysqli_query($link, $sql);

mysqli_query($link, "UPDATE buku SET jml_stok_sekarang = jml_stok_sekarang + 1 WHERE judul = '$_SESSION[b1]'");
mysqli_query($link, "UPDATE buku SET jml_stok_sekarang = jml_stok_sekarang + 1 WHERE judul = '$_SESSION[b2]'");

mysqli_query($link, "INSERT INTO pengembalian VALUES (null, '$_SESSION[agg]', '$_SESSION[b1]', '$_SESSION[b2]', '$_SESSION[staffadmin]', NOW()");

if ($rs) {
	header("location: //localhost/pw/admin/index.php?modul=datapengembalian");
}else{
	echo '<script>alert("gagal")</script>';
	header("location: //localhost/pw/admin/index.php?modul=pengembalian");
}
?>
