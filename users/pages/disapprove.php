<?php
include "../config/dbOldWay.php";
$id = $_GET['id'];
$queri = mysqli_query($link, "UPDATE user_reg SET status = 'no' WHERE id = $id");
if ($queri) {
	echo "<script>
	window.location ='../index.php?modul=modul_user';
</script>";
}
?>