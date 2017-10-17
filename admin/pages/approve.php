<?php
include "../config/dbold.php";
include "../config/DB.php";
$id = $_GET['id'];
// $queri = mysqli_query($link, "UPDATE user_reg SET status = 'yes', member = 'registered', updated = now() WHERE id = $id");

// $q2 = mysqli_query($link, "UPDATE anggota SET tanggal = now(), status_keanggotaan = 'Aktif' WHERE id = '$id'");

$q = "UPDATE user_reg, anggota SET anggota.status_keanggotaan='Aktif', anggota.tanggal= now(), user_reg.status='yes', user_reg.member = 'registered', user_reg.updated = now() WHERE anggota.iduser=user_reg.id AND user_reg.id = '$id'";
$rs = mysqli_query($link, $q);

?>

    <script type="text/javascript">
        window.location = "../index.php?modul=modul_calon_user";

    </script>
