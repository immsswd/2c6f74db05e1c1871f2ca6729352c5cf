<?php session_start();?>
<?php
define('_IMGSRC_', "https://imamta.000webhostapp.com/");
session_destroy();
?>
<script>
	window.location="<?=_IMGSRC_?>";
</script>
