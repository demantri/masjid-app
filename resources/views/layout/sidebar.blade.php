<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>

        <ul class="sidebar-menu">
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ url('dashboard') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>

            <li class="menu-header">Masterdata</li>
            <li class="{{ Request::is('masterdata/coa') ? 'active' : '' }}"><a class="nav-link" href="{{ url('masterdata/coa') }}"><i class="fas fa-database"></i> <span>COA</span></a></li>
            <li class="{{ Request::is('masterdata/kas') ? 'active' : '' }}"><a class="nav-link" href="{{ url('masterdata/kas') }}"><i class="fas fa-database"></i> <span>Kas</span></a></li>
            <li class="{{ Request::is('masterdata/detail-kas') ? 'active' : '' }}"><a class="nav-link" href="{{ url('masterdata/detail-kas') }}"><i class="fas fa-database"></i> <span>Detail Kas</span></a></li>
            <li class="{{ Request::is('masterdata/kegiatan-masjid') ? 'active' : '' }}"><a class="nav-link" href="{{ url('masterdata/kegiatan-masjid') }}"><i class="fas fa-database"></i> <span>Kegiatan Masjid</span></a></li>
            
            <li class="menu-header">Arus Kas Keuangan</li>
            <li class="{{ Request::is('keuangan/kas-masuk') ? 'active' : '' }}"><a class="nav-link" href="{{ url('keuangan/kas-masuk') }}"><i class="fas fa-dollar-sign"></i> <span>Kas Masuk</span></a></li>
            <li class="{{ Request::is('keuangan/kas-keluar') ? 'active' : '' }}"><a class="nav-link" href="{{ url('keuangan/kas-keluar') }}"><i class="fas fa-dollar-sign"></i> <span>Kas Keluar</span></a></li>
            
            <li class="menu-header">Laporan</li>
            <li class="{{ Request::is('laporan/kas-masuk') ? 'active' : '' }}"><a class="nav-link" href="{{ url('laporan/kas-masuk') }}"><i class="fas fa-file"></i> <span>Kas Masuk</span></a></li>
            <li class="{{ Request::is('laporan/kas-keluar') ? 'active' : '' }}"><a class="nav-link" href="{{ url('laporan/kas-keluar') }}"><i class="fas fa-file"></i> <span>Kas Keluar</span></a></li>
            <li class="{{ Request::is('laporan/kas-keluar') ? 'active' : '' }}"><a class="nav-link" href="{{ url('laporan/jurnal') }}"><i class="fas fa-file"></i> <span>Jurnal Umum</span></a></li>
            <li class="{{ Request::is('laporan/kas-keluar') ? 'active' : '' }}"><a class="nav-link" href="{{ url('laporan/bukubesar') }}"><i class="fas fa-file"></i> <span>Buku Besar</span></a></li>

            <li class="menu-header">Pengaturan</li>
            <li class="{{ Request::is('pengaturan/users') ? 'active' : '' }}"><a class="nav-link" href="{{ url('pengaturan/users') }}"><i class="fas fa-users"></i> <span>Users</span></a></li>
            <li class="{{ Request::is('pengaturan/roles') ? 'active' : '' }}"><a class="nav-link" href="{{ url('pengaturan/roles') }}"><i class="fas fa-home"></i> <span>Roles</span></a></li>
        </ul>
    </aside>
</div>