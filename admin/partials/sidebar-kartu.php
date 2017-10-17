<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3><u>Menu <?=$_SESSION['staffadmin']?></u></h3>
        <ul class="nav side-menu">
            <li><a href="index.php?modul=home"><i class="fa fa-home"></i> Home </a></li>
            <li><a><i class="fa fa-book"></i> Katalog Buku <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="index.php?modul=cari_buku">Cari buku</a></li>
                    <li><a href="index.php?modul=show_buku">Buku</a></li>
                </ul>
            </li>
            <li><a href="index.php?modul=modul_users"><i class="fa fa-users"></i> Data Anggota/Cetak Kartu</a></li>
            <li><a><i class="fa fa-folder-open-o"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="index.php?modul=laporanregistrasi">Laporan Registrasi Anggota</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
