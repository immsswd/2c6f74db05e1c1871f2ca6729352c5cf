<?php
if(isset($_POST['hapus'])):
    $idpeminjaman = htmlentities($_POST['idpeminjaman']);
$stmt   = $dbase->query("DELETE FROM peminjaman WHERE idpeminjaman = '$idpeminjaman'");
endif
?>
<script>
    window.location="index.php?modul=datapeminjaman";
</script>