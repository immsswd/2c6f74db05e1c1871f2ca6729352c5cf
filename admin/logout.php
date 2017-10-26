<?php session_start();?>
<?php
define('_IMGSRC_', "//localhost/pw/");
session_destroy();
?>
<script>
	window.location="<?=_IMGSRC_?>";
</script>
