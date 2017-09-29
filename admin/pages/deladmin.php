<?php
require('../config/DB.php');
$idadmin=$_REQUEST['id'];
$query = $dbase->query("DELETE FROM admin_reg WHERE id='$idadmin'"); 
?>
<script type="text/javascript">
	window.location ="../index.php?modul=all_user";
</script>