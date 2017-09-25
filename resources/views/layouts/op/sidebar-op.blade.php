<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('operator') }}"><i class="fa fa-circle-o"></i>Dashboard</a></li>
            <li><a href="#"><i class="fa fa-address-book"></i>Users</a></li>
            <li><a href="{{ url('operator/berita') }}"><i class="fa fa-newspaper-o"></i>Berita</a></li>
            <li><a href="{{ url('operator/jadwal') }}"><i class="fa fa-calendar"></i>Jadwal</a></li>
            <li><a href="{{ url('operator/kategori') }}"><i class="fa fa-wpforms"></i>Kategori</a></li>
            <li><a href="#"><i class="fa fa-id-card"></i>Sertifikasi</a></li>
            <li><a href="{{ url('operator/konfirmasi') }}"><i class="fa fa-check-circle"></i>Konfirmasi</a></li>
            <li><a href="#"><i class="fa fa-handshake-o"></i>Transaksi</a></li>
            <li class="treeview">
                <a href="{{ url('operator/pembayaran') }}"><i class="fa fa-credit-card"></i><span>Tipe pembayaran</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('operator/pembayaran/') }}">Bank</a></li>
                    <li><a href="{{ url('operator/pembayaran/tunai') }}">Tunai</a></li>
                </ul>
            </li>
            <li><a href="{{ url('operator/slider') }}"><i class="fa fa-television"></i>Slider</a></li>
            <li><a href="#"><i class="fa fa-file-pdf-o"></i>Laporan</a></li>

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
