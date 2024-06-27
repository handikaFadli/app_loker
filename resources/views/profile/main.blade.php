@extends('layouts.main')

@section('content')
	<!-- Start Breadcrumbs -->
	<div class="breadcrumbs overlay">
		<div class="container">
				<div class="row">
						<div class="col-12">
								<div class="breadcrumbs-content">
										<h1 class="page-title">Manage Resumes</h1>
										<p>Business plan draws on a wide range of knowledge from different business<br> disciplines.
												Business draws on a wide range of different business .</p>
								</div>
								<ul class="breadcrumb-nav">
										<li><a href="index.html">Home</a></li>
										<li>Manage Resumes</li>
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
								<li class="heading">Kelola Profil</li>
								<li>
									<a href="/profile/myprofile" class="{{ Request::is('profile/myprofile*') ? 'active' : '' }}"><i class="lni lni-clipboard"></i> Profil</a>
								</li>
								<li>
									<a href="/profile/notifikasi" class="{{ Request::is('profile/notifikasi*') ? 'active' : '' }}"><i class="lni lni-alarm"></i> Notifikasi <span class="notifi">{{ $unreadCount ? $unreadCount : '0'  }}</span></a>
								</li>
								<li>
									<a href="/profile/lamaran" class="{{ Request::is('profile/lamaran*') ? 'active' : '' }}"><i class="lni lni-envelope"></i> Kelola Lamaran</a>
								</li>
								<li>
									<a href="change-password.html"><i class="lni lni-lock"></i> Ubah Password</a>
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