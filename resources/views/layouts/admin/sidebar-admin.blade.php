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
            <li><a href="{{ url('admin/user') }}"><i class="fa fa-address-book"></i>Users</a></li>
            <li><a href="{{ url('admin/settings') }}"><i class="fa fa-newspaper-o"></i>Settings</a></li>
            <li><a href="{{ url('admin/galeri') }}"><i class="fa fa-newspaper-o"></i>Galeri</a></li>
            <li><a href="{{ url('admin/kontak') }}"><i class="fa fa-newspaper-o"></i>Kontak</a></li>
             <li><a href="{{ url('admin/tentang') }}"><i class="fa fa-newspaper-o"></i>Tentang</a></li>
            <li><a href="#"><i class="fa fa-file-pdf-o"></i>Laporan</a></li>
            <li class="treeview">
                <a href="#"><span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Link in level 2</a></li>
                    <li><a href="#">Link in level 2</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
