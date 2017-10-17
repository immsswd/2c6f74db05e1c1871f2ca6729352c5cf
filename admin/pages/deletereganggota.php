<?php
if(isset($_POST['delus'])){
//    echo ($_POST['idudel']);
    $id = htmlentities($_POST['idudel']);
//    $dbase->query("DELETE FROM user_reg WHERE id='$id'");
    $delu = $dbase->query("DELETE FROM anggota WHERE iduser = '$id'");
    $dbase->query("DELETE FROM user_reg WHERE id='$id'");
    
    if($delu):
    ?>
    <script type="text/javascript">
        window.location = "index.php?modul=modul_calon_user";

    </script>
    <?php
    endif;
    }
?>
