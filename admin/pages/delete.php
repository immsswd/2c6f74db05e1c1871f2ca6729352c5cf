<?php
require('../config/dbold.php');
$id=$_REQUEST['id'];
$query = ("DELETE FROM user_reg WHERE id=$id"); 
$result = mysqli_query($link,$query);
?>
<script type="text/javascript">
	window.location ="../index.php?modul=all_user";
</script>