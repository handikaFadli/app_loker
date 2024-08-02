@extends('admin.layouts.main')

@section('title')
Portal Lowongan Kerja - {{ $title }}
@endsection

@section('content-admin')
	<div class="container-fluid">
		<div class="row page-titles mx-0">
				<div class="col-sm-6 p-md-0">
						<div class="welcome-text">
								<h4>{{ $title }}</h4>
								<span>Detail {{ $title }}</span>
						</div>
				</div>
				<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
						<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
								<li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $title }}</a></li>
						</ol>
				</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header d-block d-flex flex-column align-items-center text-center">
						<img src="{{ $data->foto }}" class="mb-2" alt="logo perusahaan" width="110" />
						{{-- <h4>{{ $data->nama }}</h4> --}}
					</div>
					<div class="card-body">
						<div class="profile-personal-info">
							{{-- <h4 class="text-primary mb-4">Informasi Pelamar</h4> --}}
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Nama Lengkap <span class="pull-right">:</span></h5>
								</div>
								<div class="col-9"><span>{{ $data->nama }}</span></div>
							</div>
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Tempat & Tanggal Lahir <span class="pull-right">:</span></h5>
								</div>
								@php
										\Carbon\Carbon::setLocale('id');
								@endphp
								<div class="col-9"><span>{{ ucwords($data->tempat_lahir) .', '. \Carbon\Carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y') }}</span></div>
							</div>
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Umur <span class="pull-right">:</span></h5>
								</div>
								<div class="col-9"><span>{{ $data->umur . " tahun" }}</span></div>
							</div>
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Jenis Kelamin <span class="pull-right">:</span></h5>
								</div>
								<div class="col-9"><span>{{ ucwords($data->jenis_kelamin) }}</span></div>
							</div>
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Status <span class="pull-right">:</span></h5>
								</div>
								<div class="col-9"><span>{{ ucwords($data->status) }}</span></div>
							</div>
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Tempat Tinggal <span class="pull-right">:</span></h5>
								</div>
								<div class="col-9"><span>{{ $data->tempat_tinggal }}</span></div>
							</div>
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Nomor Telepon <span class="pull-right">:</span></h5>
								</div>
								<div class="col-9"><span>{{ $data->nomor_telepon }}</span></div>
							</div>
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Email <span class="pull-right">:</span></h5>
								</div>
								<div class="col-9"><span>{{ $data->email }}</span></div>
							</div>
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Linkedin <span class="pull-right">:</span></h5>
								</div>
								<div class="col-9"><span><a href="{{ $data->linkedin }}">Linkedin</a></span></div>
							</div>
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Instagram <span class="pull-right">:</span></h5>
								</div>
								<div class="col-9"><span><a href="{{ $data->instagram }}">Instagram</a></span></div>
							</div>
						</div>
						<div class="profile-tab">
							<div class="custom-tab-1">
									<ul class="nav nav-tabs">
											<li class="nav-item">
												<a href="#pendidikan" data-toggle="tab" class="nav-link active show">Riwayat Pendidikan</a>
											</li>
											<li class="nav-item">
												<a href="#pekerjaan" data-toggle="tab" class="nav-link">Riwayat Pekerjaan</a>
											</li>
											<li class="nav-item">
												<a href="#keterampilan" data-toggle="tab" class="nav-link">Keterampilan</a>
											</li>
									</ul>
									<div class="tab-content">
											<div id="pendidikan" class="tab-pane fade active show">
												<div class="profile-personal-info mt-4">
													@forelse ($data->pendidikan as $pendidikan)
														<div class="pendidikan">
															<div class="row mb-4">
																<div class="col-3">
																	<h5 class="f-w-500">Perguruan Tinggi <span class="pull-right">:</span></h5>
																</div>
																<div class="col-9"><span>{{ $pendidikan->perguruan_tinggi }}</span></div>
															</div>
															<div class="row mb-4">
																<div class="col-3">
																	<h5 class="f-w-500">Bidang Studi <span class="pull-right">:</span></h5>
																</div>
																<div class="col-9"><span>{{ $pendidikan->bidang_studi }}</span></div>
															</div>
															<div class="row mb-4">
																<div class="col-3">
																	<h5 class="f-w-500">IPK <span class="pull-right">:</span></h5>
																</div>
																<div class="col-9"><span>{{ $pendidikan->ipk }}</span></div>
															</div>
															<div class="row mb-4">
																<div class="col-3">
																	<h5 class="f-w-500">Gelar <span class="pull-right">:</span></h5>
																</div>
																<div class="col-9"><span>{{ $pendidikan->gelar }}</span></div>
															</div>
															<div class="row mb-4">
																<div class="col-3">
																	<h5 class="f-w-500">Mulai <span class="pull-right">:</span></h5>
																</div>
																<div class="col-9"><span>{{ $pendidikan->mulai }}</span></div>
															</div>
															<div class="row mb-4">
																<div class="col-3">
																	<h5 class="f-w-500">Selesai <span class="pull-right">:</span></h5>
																</div>
																<div class="col-9"><span>{{ $pendidikan->selesai }}</span></div>
															</div>
															<div class="row mb-4">
																<div class="col-3">
																	<h5 class="f-w-500">Deskripsi <span class="pull-right">:</span></h5>
																</div>
																<div class="col-9"><span>{{ $pendidikan->deskripsi ? $pendidikan->deskripsi : '-' }}</span></div>
															</div>
															<div class="row mb-4">
																<div class="col-3">
																	<h5 class="f-w-500">Transkip Nilai <span class="pull-right">:</span></h5>
																</div>
																<div class="col-9"><span><a href="{{ route('preview', ['jenis' => 'transkip', 'id' => $pendidikan->id]) }}" target="_blank">Lihat Transkip Nilai</a></span></div>
															</div>
															<div class="row mb-4">
																<div class="col-3">
																	<h5 class="f-w-500">Ijazah <span class="pull-right">:</span></h5>
																</div>
																<div class="col-9"><span><a href="{{ route('preview', ['jenis' => 'ijazah', 'id' => $pendidikan->id]) }}" target="_blank">Lihat Ijazah</a></span></div>
															</div>
														</div>
														<hr>
													@empty
														<div class="row">
															<h5 class="f-w-500">Tidak ada.</h5>
														</div>
													@endforelse
												</div>
											</div>
											<div id="pekerjaan" class="tab-pane fade">
												<div class="profile-personal-info mt-4">
													@forelse ($data->pekerjaan as $pekerjaan)
														<div class="pekerjaan">
															<div class="row mb-4">
																<div class="col-3">
																	<h5 class="f-w-500">Perusahaan <span class="pull-right">:</span></h5>
																</div>
																<div class="col-9"><span>{{ $pekerjaan->nama_perusahaan }}</span></div>
															</div>
															<div class="row mb-4">
																<div class="col-3">
																	<h5 class="f-w-500">Jabatan <span class="pull-right">:</span></h5>
																</div>
																<div class="col-9"><span>{{ $pekerjaan->jabatan }}</span></div>
															</div>
															<div class="row mb-4">
																<div class="col-3">
																	<h5 class="f-w-500">Mulai <span class="pull-right">:</span></h5>
																</div>
																<div class="col-9"><span>{{ $pekerjaan->mulai }}</span></div>
															</div>
															<div class="row mb-4">
																<div class="col-3">
																	<h5 class="f-w-500">Selesai <span class="pull-right">:</span></h5>
																</div>
																<div class="col-9"><span>{{ $pekerjaan->selesai }}</span></div>
															</div>
															<div class="row mb-4">
																<div class="col-3">
																	<h5 class="f-w-500">Deskripsi <span class="pull-right">:</span></h5>
																</div>
																<div class="col-9"><span>{{ $pekerjaan->deskripsi ? $pekerjaan->deskripsi : '-' }}</span></div>
															</div>
															<div class="row mb-4">
																<div class="col-3">
																	<h5 class="f-w-500">Surat Keterangan <span class="pull-right">:</span></h5>
																</div>
																<div class="col-9"><span><a href="{{ route('preview', ['jenis' => 'sk', 'id' => $pekerjaan->id]) }}" target="_blank">Surat Keterangan</a></span></div>
															</div>
														</div>
														<hr>
													@empty
														<div class="row">
															<h5 class="f-w-500">Tidak ada.</h5>
														</div>
													@endforelse
												</div>
											</div>
											<div id="keterampilan" class="tab-pane fade">
												<div class="profile-personal-info mt-4">
													@forelse ($data->keterampilan as $keterampilan)
														<div class="keterampilan">
															<div class="row mb-4">
																<div class="col-3">
																	<h5 class="f-w-500">Keterampilan <span class="pull-right">:</span></h5>
																</div>
																<div class="col-9"><span>{{ $keterampilan->nama }}</span></div>
															</div>
															<div class="row mb-4">
																<div class="col-3">
																	<h5 class="f-w-500">Penguasaan <span class="pull-right">:</span></h5>
																</div>
																<div class="col-9"><span>{{ $keterampilan->penguasaan }} dari 5</span></div>
															</div>
															<div class="row mb-4">
																<div class="col-3">
																	<h5 class="f-w-500">Sertifikat <span class="pull-right">:</span></h5>
																</div>
																<div class="col-9"><span><a href="{{ route('preview', ['jenis' => 'sertifikat', 'id' => $keterampilan->id]) }}" target="_blank">Sertifikat</a></span></div>
															</div>
														</div>
														<hr>
													@empty
														<div class="row">
															<h5 class="f-w-500">Tidak ada.</h5>
														</div>
													@endforelse
												</div>
											</div>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
