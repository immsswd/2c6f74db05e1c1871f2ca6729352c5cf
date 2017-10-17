<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
<!--         <div role="separator" class="divider"></div> -->
        <h3><u>Menu <?=$_SESSION['staffadmin']?></u></h3>
        <ul class="nav side-menu">
            <li><a href="index.php?modul=home"><i class="fa fa-home"></i> Home </a></li>
            <li><a><i class="fa fa-book"></i> Katalog Buku <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="index.php?modul=cari_buku">Cari buku</a></li>
                    <li><a href="index.php?modul=show_buku">Buku</a></li>
                    <li><a href="index.php?modul=booksdetailwithuser">Detail Buku-Peminjaman</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-database"></i> Data Master <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="index.php?modul=kategori_buku">Kategori Buku</a></li>
                    <li><a href="index.php?modul=tambah_buku">Tambah Buku</a></li>
                    <li><a href="index.php?modul=all_admin">Admin Sistem</a></li>
                    <li><a href="index.php?modul=logatt">Login Attempt</a></li>
                </ul>
            </li>
            <li><a href="index.php?modul=all_user"><i class="fa fa-cog"></i>Kelola User</a></li>
            <li><a><i class="fa fa-users"></i> Registrasi Kenggotaan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="index.php?modul=modul_calon_user">Data Calon Anggota</a></li>
                    <li><a href="index.php?modul=modul_user"> Data Anggota</a></li>

                </ul>
            </li>
            <li><a><i class="fa fa-file-text-o"></i> Peminjaman <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="index.php?modul=peminjaman">Peminjaman Buku</a></li>
                    <li><a href="index.php?modul=datapeminjaman">Data Peminjaman</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-file-text"></i> Pengembalian <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="index.php?modul=pengembalian">Pengembalian Buku</a></li>
                    <li><a href="index.php?modul=datapengembalian">Data Pengembalian</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-folder-open-o"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="index.php?modul=laporanregistrasi">Laporan Registrasi Anggota</a></li>
                    <li><a href="index.php?modul=laporanpeminjaman">Laporan Peminjaman/Pengembalian Koleksi Buku</a></li>
                    <!--    <li><a href="index.php?modul=laporanpengembalian">Laporan Pengembalian Buku</a></li> -->
                </ul>
            </li>
            <!--
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                      <li><a href="chartjs2.html">Chart JS2</a></li>
                      <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li>
-->
        </ul>
    </div>
</div>
