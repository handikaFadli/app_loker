@extends('profile.main')

@section('content-profile')
<div class="inner-content">
	<!-- Start Personal Top Content -->
	<div class="personal-top-content">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-12">
				<div class="name-head">
					<a class="mb-2" href="/profile/myprofile"><img class="circle-54" width="90" src="{{ $user->foto ? asset('media/'.$user->foto) : asset('media/default.png') }}" alt="profile" /></a>
					<h4><a class="name" href="/profile/myprofile">{{ $user->nama ? ucwords($user->nama) : '-' }}</a></h4>
					<p><a class="deg" href="/profile/myprofile">{{ $user->email ? $user->email : '-' }}</a></p>
					<ul class="social">
						<li>
							<a href="#"><i class="lni lni-facebook-original"></i></a>
						</li>
						<li>
							<a href="#"><i class="lni lni-twitter-original"></i></a>
						</li>
						<li>
							<a href="{{ $user->linkedin }}"><i class="lni lni-linkedin-original"></i></a>
						</li>
						<li>
							<a href="{{ $user->instagram }}"><i class="lni lni-instagram"></i></a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-8 col-md-8 col-12">
				<div class="content-right">
					<h5 class="title-main">Detail</h5>
					<!-- Single List -->
					<div class="single-list">
						@php
								\Carbon\Carbon::setLocale('id');
						@endphp
						<h5 class="title">TTL</h5>
						<p>{{ $user->tempat_lahir ? ucwords($user->tempat_lahir).', '. \Carbon\Carbon::parse($user->tanggal_lahir)->translatedFormat('d F Y') : '-' }}</p>
					</div>
					<!-- Single List -->
					<!-- Single List -->
					<div class="single-list">
						<h5 class="title">Umur</h5>
						<p>{{ $user->umur ? $user->umur.' tahun' : '-' }}</p>
					</div>
					<!-- Single List -->
					<!-- Single List -->
					<div class="single-list">
						<h5 class="title">Status</h5>
						<p>{{ $user->status ? ucwords($user->status) : '-'  }}</p>
					</div>
					<!-- Single List -->
					<!-- Single List -->
					<div class="single-list">
						<h5 class="title">Jenis Kelamin</h5>
						<p>{{ $user->jenis_kelamin ? ucwords($user->jenis_kelamin) : '-'  }}</p>
					</div>
					<!-- Single List -->
					<div class="single-list">
						<h5 class="title">No Telepon</h5>
						<p>{{ $user->nomor_telepon ? $user->nomor_telepon : '-'  }}</p>
					</div>
					<div class="single-list">
						<h5 class="title">Tempat Tinggal</h5>
						<p>{{ $user->tempat_tinggal ? ucwords($user->tempat_tinggal) : '-' }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Personal Top Content -->
	<!-- Start Single Section -->
	{{-- <div class="single-section">
		<h4>About</h4>
		<p class="font-size-4 mb-8">A talented professional with an academic background in IT and proven commercial development experience as C++ developer since 1999. Has a sound knowledge of the software development life cycle. Was involved in more than 140 software development outsourcing projects.</p>
		<p class="font-size-4 mb-8">Programming Languages: C/C++, .NET C++, Python, Bash, Shell, PERL, Regular expressions, Python, Active-script.</p>

	</div> --}}
	<!-- End Single Section -->
	<!-- Start Single Section -->
	<div class="single-section skill">
		<h4>Skills</h4>
		<ul class="list-unstyled d-flex align-items-center flex-wrap">
			<li>
				<a href="#">Agile</a>
			</li>
			<li>
				<a href="#">Wireframing</a>
			</li>
			<li>
				<a href="#">Prototyping</a>
			</li>
			<li>
				<a href="#">Information</a>
			</li>
			<li>
				<a href="#">Waterfall Model</a>
			</li>
			<li>
				<a href="#">New Layout</a>
			</li>
			<li>
				<a href="#">Ui/Ux Design</a>
			</li>
			<li>
				<a href="#">Web Design</a>
			</li>
			<li>
				<a href="#">Graphics Design</a>
			</li>
		</ul>
	</div>
	<!-- End Single Section -->
	<!-- Start Single Section -->
	<div class="single-section exprerience">
		<h4>Work Exprerience</h4>
		<!-- Single Exp -->
		<div class="single-exp mb-30">
			<div class="d-flex align-items-center pr-11 mb-9 flex-wrap flex-sm-nowrap">
				<div class="image">
					<img src="assets/images/resume/work1.png" alt="#" />
				</div>
				<div class="w-100 mt-n2">
					<h3 class="mb-0">
						<a href="#">Lead Product Designer</a>
					</h3>
					<a href="#">Airabnb</a>
					<div class="d-flex align-items-center justify-content-md-between flex-wrap">
						<a href="#">Jun 2020 - April 2023- 3 years</a>
						<a href="#" class="font-size-3 text-gray">
							<span class="mr-2" style="margin-top: -2px"><i class="lni lni-map-marker"></i></span>New York, USA</a
						>
					</div>
				</div>
			</div>
		</div>
		<!-- End Single Exp -->
		<!-- Single Exp -->
		<div class="single-exp mb-30">
			<div class="d-flex align-items-center pr-11 mb-9 flex-wrap flex-sm-nowrap">
				<div class="image">
					<img src="assets/images/resume/work2.png" alt="#" />
				</div>
				<div class="w-100 mt-n2">
					<h3 class="mb-0">
						<a href="#">Senior UI/UX Designer</a>
					</h3>
					<a href="#">Google Inc</a>
					<div class="d-flex align-items-center justify-content-md-between flex-wrap">
						<a href="#">Jun 2020 - April 2023- 3 years</a>
						<a href="#" class="font-size-3 text-gray">
							<span class="mr-2" style="margin-top: -2px"><i class="lni lni-map-marker"></i></span>New York, USA</a
						>
					</div>
				</div>
			</div>
		</div>
		<!-- End Single Exp -->
	</div>
	<!-- End Single Section -->
	<!-- Start Single Section -->
	<div class="single-section education">
		<h4>Education</h4>
		<!-- Single Edu -->
		<div class="single-edu mb-30">
			<div class="d-flex align-items-center pr-11 mb-9 flex-wrap flex-sm-nowrap">
				<div class="image">
					<img src="assets/images/resume/edu1.svg" alt="#" />
				</div>
				<div class="w-100 mt-n2">
					<h3 class="mb-0">
						<a href="#">Masters in Art Design</a>
					</h3>
					<a href="#">Harvard University</a>
					<div class="d-flex align-items-center justify-content-md-between flex-wrap">
						<a href="#">Jun 2020 - April 2023- 3 years</a>
						<a href="#" class="font-size-3 text-gray">
							<span class="mr-2" style="margin-top: -2px"><i class="lni lni-map-marker"></i></span>Brylin, USA</a
						>
					</div>
				</div>
			</div>
		</div>
		<!-- End Single Edu -->
		<!-- Single Edu -->
		<div class="single-edu mb-30">
			<div class="d-flex align-items-center pr-11 mb-9 flex-wrap flex-sm-nowrap">
				<div class="image">
					<img src="assets/images/resume/edu2.svg" alt="#" />
				</div>
				<div class="w-100 mt-n2">
					<h3 class="mb-0">
						<a href="#">Bachelor in Software Engineering</a>
					</h3>
					<a href="#">Manipal Institute of Technology</a>
					<div class="d-flex align-items-center justify-content-md-between flex-wrap">
						<a href="#">Fed 2019 - April 2023 - 4 years </a>
						<a href="#" class="font-size-3 text-gray">
							<span class="mr-2" style="margin-top: -2px"><i class="lni lni-map-marker"></i></span>New York, USA</a
						>
					</div>
				</div>
			</div>
		</div>
		<!-- End Single Edu -->
	</div>
	<!-- End Single Section -->
</div>
@endsection