@extends('admin.layouts.main')

@section('title')
		Admin App Loker - {{ $title }}
@endsection

@section('content-admin')
<div class="container-fluid">
	<div class="row page-titles mx-0">
		<div class="col-sm-6 p-md-0">
			<div class="welcome-text">
				<h4>Lamaran Pekerjaan</h4>
				<p class="mb-0">Your business dashboard template</p>
			</div>
		</div>
		<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
				<li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
			</ol>
		</div>
	</div>
	<!-- row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<div class="row justify-content-start">
						<div class="col-auto d-flex justify-content-start border-right-1">
							<img src="images/profile/1.png" alt="foto perusahaan" width="80" height="80" />
						</div>
						<div class="col-auto border-right-1">
							<div class="profile-name">
								<h4 class="text-primary">Dosen FEB Fulltime</h4>
								<p>Universitas Catur Insan Cendekia</p>
							</div>
						</div>
						<div class="col-auto border-right-1">
							<div class="profile-email">
								<p>Full time</p>
							</div>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="profile-personal-info">
						<h4 class="text-primary mb-4">Informasi Pelamar</h4>
						<div class="row mb-4">
							<div class="col-3">
								<h5 class="f-w-500">Nama <span class="pull-right">:</span></h5>
							</div>
							<div class="col-9"><span>Mitchell C.Shay</span></div>
						</div>
						<div class="row mb-4">
							<div class="col-3">
								<h5 class="f-w-500">Email <span class="pull-right">:</span></h5>
							</div>
							<div class="col-9"><span>example@examplel.com</span></div>
						</div>
						<div class="row mb-4">
							<div class="col-3">
								<h5 class="f-w-500">Availability <span class="pull-right">:</span></h5>
							</div>
							<div class="col-9"><span>Full Time (Free Lancer)</span></div>
						</div>
						<div class="row mb-4">
							<div class="col-3">
								<h5 class="f-w-500">Age <span class="pull-right">:</span></h5>
							</div>
							<div class="col-9"><span>27</span></div>
						</div>
						<div class="row mb-4">
							<div class="col-3">
								<h5 class="f-w-500">Location <span class="pull-right">:</span></h5>
							</div>
							<div class="col-9"><span>Rosemont Avenue Melbourne, Florida</span></div>
						</div>
						<div class="row mb-4">
							<div class="col-3">
								<h5 class="f-w-500">Year Experience <span class="pull-right">:</span></h5>
							</div>
							<div class="col-9"><span>07 Year Experiences</span></div>
						</div>
					</div>
					<div class="profile-skills pt-2 border-bottom-1 pb-2">
						<h4 class="text-primary mb-4">Pendidikan</h4>
						<div class="row mb-4">
							<div class="col-3">
								<h5 class="f-w-500">Nama <span class="pull-right">:</span></h5>
							</div>
							<div class="col-9"><span>Mitchell C.Shay</span></div>
						</div>
					</div>
					<div class="profile-skills pt-2 border-bottom-1 pb-2">
						<h4 class="text-primary mb-4">Skills</h4>
						<a href="javascript:void()" class="btn btn-outline-dark btn-rounded pl-4 my-3 my-sm-0 pr-4 mr-3 m-b-10">Admin</a>
						<a href="javascript:void()" class="btn btn-outline-dark btn-rounded pl-4 my-3 my-sm-0 pr-4 mr-3 m-b-10">Dashboard</a>
						<a href="javascript:void()" class="btn btn-outline-dark btn-rounded pl-4 my-3 my-sm-0 pr-4 mr-3 m-b-10">Photoshop</a>
						<a href="javascript:void()" class="btn btn-outline-dark btn-rounded pl-4 my-3 my-sm-0 pr-4 mr-3 m-b-10">Bootstrap</a>
						<a href="javascript:void()" class="btn btn-outline-dark btn-rounded pl-4 my-3 my-sm-0 pr-4 mr-3 m-b-10">Responsive</a>
						<a href="javascript:void()" class="btn btn-outline-dark btn-rounded pl-4 my-3 my-sm-0 pr-4 mr-3 m-b-10">Crypto</a>
					</div>
					<div class="profile-lang pt-5 border-bottom-1 pb-5">
						<h4 class="text-primary mb-4">Language</h4>
						<a href="javascript:void()" class="text-muted pr-3 f-s-16"><i class="flag-icon flag-icon-us"></i> English</a> <a href="javascript:void()" class="text-muted pr-3 f-s-16"><i class="flag-icon flag-icon-fr"></i> French</a>
						<a href="javascript:void()" class="text-muted pr-3 f-s-16"><i class="flag-icon flag-icon-bd"></i> Bangla</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection