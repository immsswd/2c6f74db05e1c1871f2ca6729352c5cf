<div class="col-md-12">

<?php
$sql = $dbase->query("SELECT * FROM admin_reg WHERE username = '$_SESSION[staffadmin]'");
while ($ro = $sql->fetch(PDO::FETCH_OBJ)) {
    $uname 		= $ro->username;
    $jabatan 	= $ro->jabatan;
}
// var_dump($_SESSION['staffadmin']);
// Halaman HELP berdasarkan HAK AKSES/Sistem Privillege
	if($_SESSION['staffadmin']==$uname AND $jabatan == 'Admin'){
		?>
		<div class="panel panel-info">
				<div class="panel-heading"><h4>
					Admin Help
				</h4>
				</div>
		<div class="panel-body">
				
		

			<div class="media">
  			<div class="media-left">
    			<a href="#">
      			<img class="media-object img-responsive img-thumbnail" src="public/images/helpadmin/1.png" alt="...">
   			 </a>
  			</div>
  			<div class="media-body">
   			 <h4 class="media-heading label label-danger">Admin Area</h4><hr>

             <p>
                <h2>App OS dan Piranti requirement</h2>
                 <ul>
                     <li><i class="fa fa-windows"></i> Windows min Windows 7 semua versi (Firefox/Google Chrome versi terbaru)</li>
                     <li><i class="fa fa-linux"></i> Linux (telah diujicoba di Ubuntu 17.04) (Firefox/Google Chrome versi terbaru)</li>
                     <li><i class="fa fa-apple"></i> AppleMac (Firefox/Google Chrome versi terbaru)</li>
                 </ul>


             </p>
   			 	Admin dengan hak akses <em>super user</em>
    			Berikut adalah menu-menu bagian Administrator aplikasi Sistem:

    			<ul>
    				<li><strong class="lead">Home</strong><br>
    					halaman Home dari menu
    				</li>
    				<li><strong class="lead">Katalog Buku</strong><br>
    					halaman katalog, admin dapat melihat katalog buku dan mencari buku, menu katalog buku memiliki 2 sub-menu, yaitu: Cari buku dan Melihat katalog buku.
    				</li>
    				<li><strong class="lead">Data Master</strong><br>
    					halaman Data Master, admin dapat menambah kategori buku pada katalog buku dan menambah jumlah buku, Data Master memiliki 3 sub-menu, yaitu: Kategori buku, Tambah buku dan Admin pengelola dari sistem.
    				</li>
    				<li>
    					<strong class="lead">Kelola User</strong><br>
    					Admin dapat mengelola semua pengguna sistem, menghapus dan mengedit data-data pengguna dari sistem ini.
    				</li>
    				<li><strong class="lead">Peminjaman</strong><br>
    					halaman Peminjaman, admin dapat melakukan peminjaman buku kepada anggota perpustakaan dan melihat data-data transaksi peminjaman yang telah dilakukan kepada anggota perpustakaan. Menu Peminjaman memiliki 2 sub-menu, yaitu: Peminjaman buku dan Data Peminjaman buku.
    				</li>
    				<li><strong class="lead">Pengembalian</strong><br>
    					halaman Pengembalian, admin dapat melakukan pengembalian buku kepada anggota perpustakaan dan melihat data-data transaksi pengembalian (<span class="text-warning">buku-buku yang belum dikembalikan oleh anggota</span>) yang telah dilakukan kepada anggota perpustakaan. Menu Peminjaman memiliki 2 sub-menu, yaitu: Pengembalian buku dan Data Pengembalian buku.
    				</li>
    				<li><strong class="lead">Laporan</strong><br>
    					halaman Laporan, Admin dapat melihat laporan dengan memilih jangka waktu tertentu, harian, bulanan dan tahun. terdapat 2 sub-menu yaitu: Laporan registrasi anggota dan Laporan peminjaman/pengembalian koleksi buku oleh anggota perpustakaan.
    				</li>
    			</ul>
  			</div>
			</div>

		</div>
	</div>
		<?php
	}elseif ($_SESSION['staffadmin']== $uname AND $jabatan == 'Staff Peminjaman') {
?>
	<div class="panel panel-info">
				<div class="panel-heading"><h4>
					Staff Peminjaman Help
				</h4>
				</div>
		<div class="panel-body">
				
		

			<div class="media">
  			<div class="media-left">
    			<a href="#">
      			<img class="media-object img-responsive img-thumbnail" src="public/images/staffpeminjaman/1.png" alt="...">
   			 </a>
  			</div>
  			<div class="media-body">
   			 <h4 class="media-heading label label-danger">Staff Peminjaman Koleksi buku perpustakaan</h4><hr>
   			 	Admin dengan hak akses <em>Staff Peminjaman</em>
    			Berikut adalah menu-menu bagian Administrator aplikasi Sistem:

    			<ul>
    				<li><strong class="lead">Home</strong><br>
    					halaman Home dari menu
    				</li>
    				<li><strong class="lead">Katalog Buku</strong><br>
    					halaman katalog, admin dapat melihat katalog buku dan mencari buku, menu katalog buku memiliki 2 sub-menu, yaitu: Cari buku dan Melihat katalog buku.
    				</li>
    				<li>
    					<strong class="lead">Data Anggota</strong><br>
    					Admin dapat melhat data angota perpustakaan dan menonfaktifkan akun anggota.
    				</li>
    				<li><strong class="lead">Peminjaman</strong><br>
    					halaman Peminjaman, admin dapat melakukan peminjaman buku kepada anggota perpustakaan dan melihat data-data transaksi peminjaman yang telah dilakukan kepada anggota perpustakaan. Menu Peminjaman memiliki 2 sub-menu, yaitu: Peminjaman buku dan Data Peminjaman buku, sub-menu:
    					<ol>
    						<li><strong>Peminjaman buku</strong><br>
    							Menu untuk melakukan proses peminjaman buku kepada anggota perpustakaan yang sudah terdaftar.
    						</li>
    						<li>
    							<strong>Data Peminjaman</strong><br>
    							Menu untuk melihat semua data transaksi peminjaman, buku yang sudah dikembalikan maupun yang belum dikembalikan oleh anggota.
    						</li>
    					</ol>
    				</li>
    				<li><strong class="lead">Pengembalian</strong><br>
    					halaman Pengembalian, admin dapat melakukan pengembalian buku kepada anggota perpustakaan dan melihat data-data transaksi pengembalian (<span class="text-warning">buku-buku yang belum dikembalikan oleh anggota</span>) yang telah dilakukan kepada anggota perpustakaan. Menu Peminjaman memiliki 2 sub-menu, yaitu: Pengembalian buku dan Data Pengembalian buku, sub-menu:
    					<ol>
    						<li><strong>Pengembalian buku</strong><br>
    							Menu untuk melakukan proses pengembalian buku oleh anggota perpustakaan yang sudah terdaftar.
    						</li>
    						<li>
    							<strong>Data Pengembalian</strong><br>
    							Menu untuk melihat semua data transaksi pengembalian, hanya buku yang belum dikembalikan oleh anggota.
    						</li>
    					</ol>
    				</li>
    				<li><strong class="lead">Laporan</strong><br>
    					halaman Laporan, Admin dapat melihat laporan dengan memilih jangka waktu tertentu, harian, bulanan dan tahun. terdapat 2 sub-menu yaitu: Laporan registrasi anggota dan Laporan peminjaman/pengembalian koleksi buku oleh anggota perpustakaan.
    				</li>
    			</ul>
  			</div>
			</div>

		</div>
	</div>
<?php
	}
?>
</div>