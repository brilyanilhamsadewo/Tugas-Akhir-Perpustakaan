<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="{{ route('admin.author.index') }}"><i class="fa fa-user"></i> <span>Penulis</span></a></li>
        <li><a href="{{ route('admin.category.index') }}"><i class="fa fa-book"></i> <span>Kategori</span></a></li>
        <li><a href="{{ route('admin.category.index') }}"><i class="fa fa-book"></i> <span>Penerbit</span></a></li>
        <li><a href="{{ route('admin.category.index') }}"><i class="fa fa-book"></i> <span>Rak</span></a></li>
        <li><a href="{{ route('admin.book.index') }}"><i class="fa fa-book"></i> <span>Buku</span></a></li>
        {{-- <li><a href="{{ route('admin.borrowing.index') }}"><i class="fa fa-book"></i> <span>Pinjam Buku</span></a></li> --}}
        <li><a href="{{ route('admin.borrow.index') }}"><i class="fa fa-book"></i> <span>Buku Sedang Dipinjam</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.report.top-book') }}"><i class="fa fa-circle-o"></i>Buku Favorit</a></li>
            <li><a href="{{ route('admin.report.top-user') }}"><i class="fa fa-circle-o"></i>Pengguna Teraktif</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.user.index') }}"><i class="fa fa-circle-o"></i>Daftar User</a></li>
            <li><a href="{{ route('admin.report.top-user') }}"><i class="fa fa-circle-o"></i>Role</a></li>
            <li><a href="{{ route('admin.report.top-user') }}"><i class="fa fa-circle-o"></i>Role Permission</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>