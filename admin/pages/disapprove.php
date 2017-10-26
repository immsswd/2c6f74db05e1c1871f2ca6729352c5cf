<?php
include "../config/dbold.php";
$id = $_GET['id'];
$q = "UPDATE user_reg, anggota SET anggota.status_keanggotaan='Nonaktif', anggota.tanggal= now(), user_reg.status='no', user_reg.member = 'notregistered', user_reg.updated = now() WHERE anggota.iduser=user_reg.id AND user_reg.id = '$id'";
$rs = mysqli_query($link, $q);
if ($rs) {
	echo "<script>
	window.location ='../index.php?modul=modul_calon_user';
</script>";
}
?>