<?php
include "../config/dbOldWay.php";
$id = $_GET['id'];
$queri = mysqli_query($link, "UPDATE user_reg SET status = 'yes' WHERE id = $id");
?>

<script type="text/javascript">
	window.location ="../index.php?modul=modul_user";
</script>
