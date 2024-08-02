@extends('layouts.main')

@section('content')
	<!-- Start Breadcrumbs -->
	<div class="breadcrumbs overlay">
		<div class="container">
				<div class="row">
						<div class="col-12">
								<div class="breadcrumbs-content">
										<h1 class="page-title">Kelola Akun</h1>
										<p>Kelola akun Anda dengan mudah. Di halaman ini, Anda dapat memperbarui<br>informasi pribadi, mengubah kata sandi,dan mengatur preferensi akun lainnya<br>untuk memastikan data Anda selalu akurat dan up-to-date.</p>
								</div>
								<ul class="breadcrumb-nav">
										<li><a href="/">Home</a></li>
										<li>Kelola Akun</li>
								</ul>
						</div>
				</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
	
	<!-- Main Content Start -->
	<div class="profile section">
		<div class="container">
			<div class="profile-inner">
				<div class="row">
					<!-- Start Main Content -->
					<div class="col-lg-4 col-12">
						<div class="dashbord-sidebar">
							<ul>
								<li class="heading">Kelola Akun</li>
								<li>
									<a href="/profile/myprofile" class="{{ Request::is('profile/myprofile*') ? 'active' : '' }}"><i class="lni lni-user"></i> Profil Saya</a>
								</li>
								<li>
									<a href="/profile/notifikasi" class="{{ Request::is('profile/notifikasi*') ? 'active' : '' }}"><i class="lni lni-alarm"></i> Notifikasi @if($unreadCount) <span class="notifi">{{ $unreadCount }}</span> @endif
									</a>
								</li>
								<li>
									<a href="/profile/lamaran" class="{{ Request::is('profile/lamaran*') ? 'active' : '' }}"><i class="lni lni-envelope"></i> Lamaran</a>
								</li>
								<li>
									<a href="/profile/ubah-password" class="{{ Request::is('profile/ubah-password*') ? 'active' : '' }}"><i class="lni lni-lock"></i> Ubah Password</a>
								</li>
								<li>
									<a>
										<form action="{{ route('logout') }}" method="POST">
											@csrf
												<button type="submit" style="border: none; background-color: transparent;">
													<i class="lni lni-upload"></i> Sign Out
												</button>
										</form>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- End Main Content -->
					<div class="col-lg-8 col-12">
						@yield('content-profile')
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Main Content end -->
@endsection