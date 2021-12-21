 <!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{ asset('images/avatar.png') }}" alt="User Image" width="48">
	<div>
	  <p class="app-sidebar__user-name">John Doe</p>
	  <p class="app-sidebar__user-designation">Frontend Developer</p>
	</div>
  </div>
  <ul class="app-menu">
	<li><a class="app-menu__item" href="dashboard.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
	<li class="treeview @if(Request::is('master/*')) is-expanded @endif"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-folder"></i><span class="app-menu__label">Master</span><i class="treeview-indicator fa fa-angle-right"></i></a>
	  <ul class="treeview-menu">
		<li><a class="treeview-item @if(Request::is('master/jam-kerja')) active @endif" href="{{ url('master/jam-kerja') }}"><i class="icon fa fa-circle-o"></i> Jam Kerja</a></li>
		<li><a class="treeview-item @if(Request::is('master/jam-kerja-pegawai')) active @endif" href="{{ url('master/jam-kerja-pegawai') }}"><i class="icon fa fa-circle-o"></i> Jam Kerja Pegawai</a></li>
		<li><a class="treeview-item @if(Request::is('master/libur')) active @endif" href="{{ url('master/libur') }}"><i class="icon fa fa-circle-o"></i> Jadwal Hari Libur</a></li>
		<li><a class="treeview-item @if(Request::is('master/puasa')) active @endif" href="{{ url('master/puasa') }}"><i class="icon fa fa-circle-o"></i> Jadwal Puasa</a></li>
	  </ul>
	</li>
	
	<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Manajemen User</span><i class="treeview-indicator fa fa-angle-right"></i></a>
	  <ul class="treeview-menu">
		<li><a class="treeview-item" href="form-components.html"><i class="icon fa fa-circle-o"></i> Form Components</a></li>
		<li><a class="treeview-item" href="form-custom.html"><i class="icon fa fa-circle-o"></i> Custom Components</a></li>
		<li><a class="treeview-item" href="form-samples.html"><i class="icon fa fa-circle-o"></i> Form Samples</a></li>
		<li><a class="treeview-item" href="form-notifications.html"><i class="icon fa fa-circle-o"></i> Form Notifications</a></li>
	  </ul>
	</li>
	<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Laporan</span><i class="treeview-indicator fa fa-angle-right"></i></a>
	  <ul class="treeview-menu">
		<li><a class="treeview-item" href="table-basic.html"><i class="icon fa fa-circle-o"></i> Basic Tables</a></li>
		<li><a class="treeview-item" href="table-data-table.html"><i class="icon fa fa-circle-o"></i> Data Tables</a></li>
	  </ul>
	</li>
	
	<li><a class="app-menu__item" href="docs.html"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Docs</span></a></li>
  </ul>
</aside>