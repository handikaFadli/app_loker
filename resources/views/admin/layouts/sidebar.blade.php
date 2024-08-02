<div class="quixnav">
	<div class="quixnav-scroll">
		<ul class="metismenu" id="menu">
			<li class="mt-2 {{ Request::is('admin/dashboard*') ? 'mm-active' : '' }}">
				<a href="/admin/dashboard" class="{{ Request::is('admin/dashboard*') ? 'mm-active' : '' }}" aria-expanded="false"><i class="icon icon-app-store"></i><span class="nav-text">Dashboard</span></a>
			</li>
			<li class="nav-label first">Menu Utama</li>
			<li class="{{ Request::is('admin/perusahaan*') ? 'mm-active' : '' }}">
				<a href="/admin/perusahaan" class="{{ Request::is('admin/perusahaan*') ? 'mm-active' : '' }}" aria-expanded="false"><i class="icon icon-layout-25"></i><span class="nav-text">Perusahaan</span></a>
			</li>
			<li class="{{ Request::is('admin/lowongan*') ? 'mm-active' : '' }}">
				<a href="/admin/lowongan" class="{{ Request::is('admin/lowongan*') ? 'mm-active' : '' }}" aria-expanded="false"><i class="icon-doc"></i><span class="nav-text">Lowongan</span></a>
			</li>
			<li class="{{ Request::is('admin/lamaran*') ? 'mm-active' : '' }}">
				<a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-email-84"></i><span class="nav-text">Lamaran</span></a>
				<ul aria-expanded="false">
					<li><a class="{{ Request::is('admin/lamaran/tahap-awal*') ? 'mm-active' : '' }}" href="/admin/lamaran/tahap-awal">Tahap Awal</a></li>
					<li><a class="{{ Request::is('admin/lamaran/tahap-dua*') ? 'mm-active' : '' }}" href="/admin/lamaran/tahap-dua">Tahap Dua</a></li>
					<li><a {{ Request::is('admin/lamaran/tahap-akhir*') ? 'mm-active' : '' }} href="/admin/lamaran/tahap-akhir">Tahap Akhir</a></li>
					<li><a class="{{ Request::is('admin/lamaran/riwayat*') ? 'mm-active' : '' }}" href="/admin/lamaran/riwayat">Riwayat</a></li>
				</ul>
			</li>
			<li class="{{ Request::is('admin/pelamar*') ? 'mm-active' : '' }}">
				<a href="/admin/pelamar" class="{{ Request::is('admin/pelamar*') ? 'mm-active' : '' }}" aria-expanded="false"><i class="icon-people"></i><span class="nav-text">Pelamar</span></a>
			</li>
			@can('admin')
				<li class="nav-label first">Lainnya</li>
				<li class="{{ Request::is('admin/tentang*') ? 'mm-active' : '' }}">
					<a href="/admin/tentang" class="{{ Request::is('admin/tentang*') ? 'mm-active' : '' }}" aria-expanded="false"><i class="icon icon-layout-25"></i><span class="nav-text">Tentang</span></a>
				</li>
				<li class="{{ Request::is('admin/kontak*') ? 'mm-active' : '' }}">
					<a href="/admin/kontak" class="{{ Request::is('admin/kontak*') ? 'mm-active' : '' }}" aria-expanded="false"><i class="icon icon-layout-25"></i><span class="nav-text">Kontak</span></a>
				</li>
				<li class="{{ Request::is('admin/kelola-user*') ? 'mm-active' : '' }}">
					<a href="/admin/kelola-user" class="{{ Request::is('admin/kelola-user*') ? 'mm-active' : '' }}" aria-expanded="false"><i class="icon-user-following"></i><span class="nav-text">Kelola User</span></a>
				</li>
			@endcan
		</ul>
	</div>
</div>