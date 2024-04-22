<div class="quixnav">
	<div class="quixnav-scroll">
		<ul class="metismenu" id="menu">
			<li class="mt-2 {{ Request::is('admin/dashboard*') ? 'mm-active' : '' }}">
				<a href="/admin/dashboard" class="{{ Request::is('admin/dashboard*') ? 'mm-active' : '' }}" aria-expanded="false"><i class="icon icon-app-store"></i><span class="nav-text">Dashboard</span></a>
			</li>
			<li class="nav-label first">Menu Utama</li>
			<li class="{{ Request::is('admin/perusahaan*') ? 'mm-active' : '' }}">
				<a href="/admin/perusahaan" class="{{ Request::is('admin/perusahaan*') ? 'mm-active' : '' }}" aria-expanded="false"><i class="icon-list"></i><span class="nav-text">Perusahaan</span></a>
			</li>
			<li class="{{ Request::is('admin/lowongan*') ? 'mm-active' : '' }}">
				<a href="/admin/lowongan" class="{{ Request::is('admin/lowongan*') ? 'mm-active' : '' }}" aria-expanded="false"><i class="icon icon-layout-25"></i><span class="nav-text">Lowongan</span></a>
			</li>
			<li>
				<a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-layout-25"></i><span class="nav-text">Kelola User</span></a>
				<ul aria-expanded="false">
					<li><a href="#">Dashboard 1</a></li>
					<li><a href="#">Dashboard 1</a></li>
				</ul>
			</li>
		</ul>
	</div>
</div>