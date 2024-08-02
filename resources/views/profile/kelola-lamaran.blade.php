@extends('profile.main')

@section('content-profile')
@forelse ($lamaran as $lam)
<div class="job-items">
	<div class="manage-content">
			<div class="row">
					<div class="col-lg-7 col-md-7 align-items-center justify-content-start">
							<div class="title-img">
									<div class="can-img d-flex justify-content-center align-items-center mt-1">
											<img src="{{ $lam->lowongan->perusahaan->logo }}" alt="logo perusahaan">
									</div>
									<h3>{{ $lam->lowongan->judul }} <span>{{ $lam->lowongan->perusahaan->nama }}</span></h3>
							</div>
					</div>
					<div class="col-lg-2 col-md-2 d-flex align-items-center">
						@php
								\Carbon\Carbon::setLocale('id');
						@endphp
							<p>{{ \Carbon\Carbon::parse($lam->created_at)->translatedFormat('d F Y') }}</p>
					</div>
					<div class="col-lg-2 col-md-2 text-center d-flex align-items-center">
							<p><span class="time">{{ ucwords($lam->status_lamaran) }}</span></p>
					</div>
					@if ($lam->status_lamaran !== "dibatalkan" && $lam->status_lamaran !== "diterima" && $lam->status_lamaran !== "ditolak")
						<div class="col-lg-1 col-md-1 border-left border-1 d-flex align-items-center">
								<a href="{{ route('cancelLamaran', $lam->id) }}" style="border: none; background-color: transparent;">
										<i class="lni lni-circle-minus text-danger"></i>
								</a>
						</div>
					@endif
			</div>
	</div>
</div>
@empty
<div class="job-items">
	<div class="manage-content">
		<div class="row align-items-center justify-content-center">
			<div class="col-lg-12 col-md-12 d-flex justify-content-center text-center">
				<p class="description">
					Tidak ada lamaran.
				</p>
			</div>
		</div>
	</div>
</div>
@endforelse

@endsection