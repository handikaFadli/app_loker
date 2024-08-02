@extends('layouts.main')

@section('content')

<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
	<div class="container">
			<div class="row">
					<div class="col-12">
							<div class="breadcrumbs-content">
									<h1 class="page-title">Daftar Lowongan</h1>
									<p>Temukan berbagai kesempatan kerja yang tersedia di perusahaan kami.<br>Jelajahi berbagai lowongan dan temukan karir yang sesuai dengan keahlian dan minat Anda.</p>
							</div>
							<ul class="breadcrumb-nav">
									<li><a href="/">Home</a></li>
									<li>Daftar Lowongan</li>
							</ul>
					</div>
			</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Find Job Area -->
<section class="find-job job-list section">
	<div class="container">
			<div class="single-head">
					<div class="row">
						@forelse ($lowongan as $lw)
						<div class="col-lg-6 col-12">
							<!-- Single Job -->
							<div class="single-job wow fadeInUp" data-wow-delay=".3s">
								<div class="job-image">
									<img src="{{ $lw->perusahaan->logo }}" alt="logo perusahaan" width="65" />
								</div>
								<div class="job-content">
									<h4><a href="/lowongan/detail/{{ $lw->slug }}">{{ $lw->judul }}</a></h4>
									<p>{{ $lw->informasi }}</p>
									<ul>
										<li><i class="lni lni-website"></i><a href="{{ $lw->perusahaan->website }}"> {{ $lw->perusahaan->website }}</a></li>
										<li><i class="lni lni-map-marker"></i> {{ $lw->perusahaan->lokasi }}</li>
									</ul>
								</div>
								<div class="job-button">
									<ul>
										<li><a href="/lowongan/detail/{{ $lw->slug }}">Apply</a></li>
										<li><span>{{ ucwords($lw->tipe) }}</span></li>
									</ul>
								</div>
							</div>
							<!-- End Single Job -->
						</div>
						@empty
						<h5 class="text-center">Lowongan tidak tersedia.</h5>
						@endforelse
					</div>
					<!-- Pagination -->
					{{-- <div class="row">
							<div class="col-12">
									<div class="pagination center">
											<ul class="pagination-list">
													<li><a href="#"><i class="lni lni-arrow-left"></i></a></li>
													<li class="active"><a href="#">1</a></li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#">4</a></li>
													<li><a href="#"><i class="lni lni-arrow-right"></i></a></li>
											</ul>
									</div>
							</div>
					</div> --}}
					<!--/ End Pagination -->
			</div>
	</div>
</section>
<!-- /End Find Job Area -->

@endsection