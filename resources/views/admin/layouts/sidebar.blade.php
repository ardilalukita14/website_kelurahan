 <!-- Left Panel -->

 <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="img/logokelurahan3.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="/admin"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>

                    <!-- /.menu-title -->
                    <h3 class="menu-title">Informasi</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-newspaper-o"></i>Berita</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="{{route('main.create')}}">Tambah Data</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ route('main.berita')}}">Show Data</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-info-circle"></i>Pengumuman</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="{{route('pengumuman.create')}}">Tambah Data</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ route('pengumuman.index')}}">Show Data</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="/kategori"> <i class="menu-icon fa fa-check-square-o"></i>Kategori</a>
                    </li>

                    <!-- /.menu-title -->
                    <h3 class="menu-title">Profile</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-rocket"></i>Visi & Misi</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="{{route('visimisi.create')}}">Tambah Data</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ route('visimisi.index')}}">Show Data</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-history"></i>Sejarah</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="{{route('sejarah.create')}}">Tambah Data</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ route('sejarah.index')}}">Show Data</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="/struktur"> <i class="menu-icon fa fa-sitemap"></i>Struktur Organisasi</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Daftar Pegawai</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="{{route('pegawai.create')}}">Tambah Data</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ route('pegawai.index')}}">Show Data</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="/maklumat"> <i class="menu-icon fa fa-bell "></i>Maklumat Pelayanan </a>
                    </li>
                    <li>
                        <a href="/maklumat"> <i class="menu-icon fa fa-briefcase"></i>Tugas Pokok & Fungsi</a>
                    </li>

                    <!-- /.menu-title -->
                    <h3 class="menu-title">Layanan</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-handshake-o"></i>Pelayanan Publik</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="{{route('layanan.do_layanan')}}">Tambah Data</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ route('layanan.index')}}">Show Data</a></li>
                        </ul>
                    </li>

                    <!-- /.menu-title -->
                    <h3 class="menu-title">Kotak Saran</h3>
                    <li>
                        <a href="/saran"> <i class="menu-icon ti-email"></i>Kritik dan Saran </a>
                    </li>
                    <li>
                        <a href="/komentar"> <i class="menu-icon fa fa-comments"></i>Komentar</a>
                    </li>

                    <!-- /.menu-title -->
                    <h3 class="menu-title">More</h3>
                    <li>
                        <a href="/"> <i class="menu-icon fa fa-home"></i>Home </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->
