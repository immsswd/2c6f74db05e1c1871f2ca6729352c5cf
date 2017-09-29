<div class="col-md-12">
	<h2>Help?</h2>
<?php
$sql = $dbase->query("SELECT * FROM admin_reg WHERE username = '$_SESSION[staffadmin]'");
while ($ro = $sql->fetch(PDO::FETCH_OBJ)) {
    $uname 		= $ro->username;
    $jabatan 	= $ro->jabatan;
}
// var_dump($_SESSION['staffadmin']);
	if( $_SESSION['staffadmin']==$uname AND $jabatan=='Staff Peminjaman'){
echo '<div class="panel panel-warning">
		<div class="panel-heading">
			<h5>Detail Menu Staff/Admin Peminjaman</h5>
		</div>
		<div class="panel-body">
			hallo
		</div>
	</div>';
	}elseif($_SESSION['staffadmin']==$uname AND $jabatan == 'Admin'){
		?>
			<div class="panel panel-info">
				<div class="panel-heading"><h4>
					Admin Help
				</h4></div>
			</div>
			<div class="panel-body">
				
			</div>
		<?php
	}
?>
</div>