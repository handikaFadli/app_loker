@extends('profile.main')

@section('content-profile')
<div class="inner-content">
	<!-- Start Personal Top Content -->
	<div class="personal-top-content">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-12">
				<div class="name-head">
					<a class="mb-2" href="/profile/myprofile"><img class="circle-54" width="90" src="{{ $user->foto ? $user->foto : asset('assets_landing/images/profile/default-profile.jpeg') }}" alt="profile" /></a>
					<h4><a class="name" href="/profile/myprofile">{{ $user->nama ? ucwords($user->nama) : '-' }}</a></h4>
					<p><a class="deg" href="{{ $user->email ? $user->email : '/' }}">{{ $user->email ? $user->email : '-' }}</a></p>
					<ul class="social">
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
					<div class="row justify-content-between">
						<div class="col-11">
							<h5 class="title-main">Detail</h5>
						</div>
						<div class="col-1">
							@if (!is_null($user->nama) && !is_null($user->tempat_lahir) && !is_null($user->tanggal_lahir))
							<a href="/profile/edit" class="text-primary">
								<i class="lni lni-pencil-alt"></i>
							</a>
							@else
							<a href="/profile/create" class="text-primary">
								<i class="lni lni-plus"></i>
							</a>
							@endif
						</div>
					</div>
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

	<!-- Start Single Section -->
	<div class="single-section education">
		<h4>Riwayat Pendidikan</h4>
		@forelse ($user->pendidikan as $pendidikan)
			<!-- Single Edu -->
			<div class="single-edu mb-30">
				<div class="d-flex align-items-center pr-11 mb-9 flex-wrap flex-sm-nowrap">
					<div class="image">
						<img src="{{ asset('assets_landing/images/institution.png') }}" alt="#" />
					</div>
					<div class="w-100 mt-n2">
						<h3 class="mb-0">
							<a href="#">{{ $pendidikan->bidang_studi ? ucwords($pendidikan->bidang_studi) : '-'  }}</a>
						</h3>
						<a href="#">{{ $pendidikan->perguruan_tinggi ? ucwords($pendidikan->perguruan_tinggi) : '-'  }}</a>
						<div class="d-flex align-items-center justify-content-md-between flex-wrap">
							<a href="#">{{ $pendidikan->mulai }} - {{  $pendidikan->selesai ?? 'Sekarang' }}. {{ $pendidikan->lama_pendidikan }}</a>
							{{-- <a href="#" class="font-size-3 text-gray">
								<span class="mr-2" style="margin-top: -2px"><i class="lni lni-map-marker"></i></span>Brylin, USA</a> --}}
						</div>
					</div>
				</div>
			</div>
			<!-- End Single Edu -->
		@empty
			-
		@endforelse
	</div>
	<!-- End Single Section -->

	<!-- Start Single Section -->
	<div class="single-section exprerience">
		<h4>Riwayat Pekerjaan</h4>
		@forelse ($user->pekerjaan as $pekerjaan)
			<!-- Single Exp -->
			<div class="single-exp mb-30">
				<div class="d-flex align-items-center pr-11 mb-9 flex-wrap flex-sm-nowrap">
					<div class="image">
						<img src="{{ asset('assets_landing/images/building.png') }}" alt="building" />
					</div>
					<div class="w-100 mt-n2">
						<h3 class="mb-0">
							<a href="#">{{ $pekerjaan->jabatan ? ucwords($pekerjaan->jabatan) : '-'  }}</a>
						</h3>
						<a href="#">{{ $pekerjaan->nama_perusahaan ? ucwords($pekerjaan->nama_perusahaan) : '-'  }}</a>
						<div class="d-flex align-items-center justify-content-md-between flex-wrap">
							<a href="#">{{ $pekerjaan->mulai }} - {{  $pekerjaan->selesai ?? 'Sekarang' }}. {{ $pekerjaan->lama_bekerja }}</a>
							{{-- <a href="#" class="font-size-3 text-gray">
								<span class="mr-2" style="margin-top: -2px"><i class="lni lni-map-marker"></i></span>New York, USA
							</a> --}}
						</div>
					</div>
				</div>
			</div>
			<!-- End Single Exp -->
		@empty
			-
		@endforelse
	</div>
	<!-- End Single Section -->

	<!-- Start Single Section -->
	<div class="single-section skill">
		<h4>Keterampilan</h4>
		<ul class="list-unstyled d-flex align-items-center flex-wrap">
			@forelse ($user->keterampilan as $keterampilan)
			<li>
				<a href="#">{{ $keterampilan->nama }}</a>
			</li>
			@empty
			-
			@endforelse
		</ul>
	</div>
	<!-- End Single Section -->

	<!-- End Personal Top Content -->
	<!-- Start Single Section -->
	{{-- <div class="single-section">
		<h4>About</h4>
		<p class="font-size-4 mb-8">A talented professional with an academic background in IT and proven commercial development experience as C++ developer since 1999. Has a sound knowledge of the software development life cycle. Was involved in more than 140 software development outsourcing projects.</p>
		<p class="font-size-4 mb-8">Programming Languages: C/C++, .NET C++, Python, Bash, Shell, PERL, Regular expressions, Python, Active-script.</p>

	</div> --}}
	<!-- End Single Section -->
</div>
@endsection