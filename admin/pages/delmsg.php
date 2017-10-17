<?php

$idpesan = htmlentities($_POST['pesan']);
$delmsg = $dbase->query("DELETE FROM pesan WHERE idpesan = '$idpesan'");
if($delmsg):?>
	<script>
		window.location="index.php?modul=kirimpesan";
	</script>
<?php endif ?>