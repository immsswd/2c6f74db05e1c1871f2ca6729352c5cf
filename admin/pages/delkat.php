<?php
require('../config/dbold.php');
$id=$_REQUEST['id'];
$query = ("DELETE FROM buku_kategori WHERE id='$id'"); 
$result = mysqli_query($link,$query);
?>
<script type="text/javascript">
	window.location ="../index.php?modul=kategori_buku";
</script>