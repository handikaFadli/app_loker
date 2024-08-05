@extends('admin.layouts.main')

@section('title')
Portal Lowongan Kerja - {{ $title }}
@endsection

@section('content-admin')
<div class="container-fluid">
	<div class="row page-titles mx-0">
		<div class="col-sm-6 p-md-0">
			<div class="welcome-text">
				<h4>Lamaran Pekerjaan</h4>
				<p class="mb-0">Periksa Lamaran Pekerjaan</p>
			</div>
		</div>
		<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/admin/lamaran/riwayat">Lamaran Pekerjaan</a></li>
				<li class="breadcrumb-item active"><a href="javascript:void(0)">Periksa Lamaran</a></li>
			</ol>
		</div>
	</div>
	<!-- row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<h4 class="text-primary mb-4">Informasi Lowongan</h4>
					<div class="row mb-4">
						<div class="col-2 d-flex justify-content-center align-items-center">
							<img src="{{ $lamaran->lowongan->gambar }}" alt="poster" width="140"  />
						</div>
						<div class="col-10">
							<h4>{{ $lamaran->lowongan->judul }}</h4>
							<p class="text-muted">{{ $lamaran->lowongan->deskripsi }}</p>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-2">
							<h5 class="f-w-500">Kategori <span class="pull-right text-muted">:</span></h5>
						</div>
						<div class="col-10"><span class="text-muted">{{ ucwords($lamaran->lowongan->kategori) }}</span></div>
					</div>
					<div class="row mb-3">
						<div class="col-2">
							<h5 class="f-w-500">Tipe <span class="pull-right text-muted">:</span></h5>
						</div>
						<div class="col-10"><span class="text-muted">{{ ucwords($lamaran->lowongan->tipe) }}</span></div>
					</div>
					<div class="row mb-3">
						<div class="col-2">
							<h5 class="f-w-500">Status <span class="pull-right text-muted">:</span></h5>
						</div>
						<div class="col-10"><span class="text-muted">{{ ucwords($lamaran->lowongan->status) }}</span></div>
					</div>
					<div class="row mb-3">
						@php
								\Carbon\Carbon::setLocale('id');
						@endphp
						<div class="col-2">
							<h5 class="f-w-500">Batas Akhir <span class="pull-right text-muted">:</span></h5>
						</div>
						<div class="col-10"><span class="text-muted">{{ \Carbon\Carbon::parse($lamaran->lowongan->batas_akhir)->translatedFormat('d F Y') }}</span></div>
					</div>
					<div class="row mb-3">
						<div class="col-2">
							<h5 class="f-w-500">Detail <span class="pull-right text-muted">:</span></h5>
						</div>
						<div class="col-10 text-muted">{!! $lamaran->lowongan->persyaratan !!}</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<div class="profile-personal-info mb-2">
						<h4 class="text-primary mb-4">Informasi Pelamar</h4>
						<div class="row">
							<div class="col-lg-6">
								<div class="row mb-4">
									<div class="col-5">
										<h5 class="f-w-500">Nama Lengkap <span class="pull-right text-muted">:</span></h5>
									</div>
									<div class="col-7"><span class="text-muted">{{ $lamaran->pelamar->nama }}</span></div>
								</div>
								<div class="row mb-4">
									<div class="col-5">
										<h5 class="f-w-500">Tempat, Tanggal Lahir <span class="pull-right">:</span></h5>
									</div>
									@php
											\Carbon\Carbon::setLocale('id');
									@endphp
									<div class="col-7"><span class="text-muted">{{ ucwords($lamaran->pelamar->tempat_lahir) .', '. \Carbon\Carbon::parse($lamaran->pelamar->tanggal_lahir)->translatedFormat('d F Y') }}</span></div>
								</div>
								<div class="row mb-4">
									<div class="col-5">
										<h5 class="f-w-500">Umur <span class="pull-right text-muted">:</span></h5>
									</div>
									<div class="col-7"><span class="text-muted">{{ $lamaran->pelamar->umur . " tahun" }}</span></div>
								</div>
								<div class="row mb-4">
									<div class="col-5">
										<h5 class="f-w-500">Jenis Kelamin <span class="pull-right text-muted">:</span></h5>
									</div>
									<div class="col-7"><span class="text-muted">{{ ucwords($lamaran->pelamar->jenis_kelamin) }}</span></div>
								</div>
								<div class="row mb-4">
									<div class="col-5">
										<h5 class="f-w-500">Status <span class="pull-right text-muted">:</span></h5>
									</div>
									<div class="col-7"><span class="text-muted">{{ ucwords($lamaran->pelamar->status) }}</span></div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row mb-4">
									<div class="col-5">
										<h5 class="f-w-500">Tempat Tinggal <span class="pull-right text-muted">:</span></h5>
									</div>
									<div class="col-7"><span class="text-muted">{{ $lamaran->pelamar->tempat_tinggal }}</span></div>
								</div>
								<div class="row mb-4">
									<div class="col-5">
										<h5 class="f-w-500">Nomor Telepon <span class="pull-right text-muted">:</span></h5>
									</div>
									<div class="col-7"><span class="text-muted">{{ $lamaran->pelamar->nomor_telepon }}</span></div>
								</div>
								<div class="row mb-4">
									<div class="col-5">
										<h5 class="f-w-500">Email <span class="pull-right text-muted">:</span></h5>
									</div>
									<div class="col-7"><span class="text-muted">{{ $lamaran->pelamar->email }}</span></div>
								</div>
								<div class="row mb-4">
									<div class="col-5">
										<h5 class="f-w-500">Linkedin <span class="pull-right text-muted">:</span></h5>
									</div>
									<div class="col-7"><a class="text-muted" href="{{ $lamaran->pelamar->linkedin }}">Linkedin (Link)</a></div>
								</div>
								<div class="row mb-4">
									<div class="col-5">
										<h5 class="f-w-500">Instagram <span class="pull-right text-muted">:</span></h5>
									</div>
									<div class="col-7"><a class="text-muted" href="{{ $lamaran->pelamar->instagram }}">Instagram (Link)</a></div>
								</div>
							</div>
						</div>
					</div>
					<div class="profile-tab mb-4">
						<div class="custom-tab-1">
								<ul class="nav nav-tabs d-flex justify-content-center">
										<li class="nav-item mx-3">
											<a href="#pendidikan" data-toggle="tab" class="nav-link active show">Riwayat Pendidikan</a>
										</li>
										<li class="nav-item mx-3">
											<a href="#pekerjaan" data-toggle="tab" class="nav-link">Riwayat Pekerjaan</a>
										</li>
										<li class="nav-item mx-3">
											<a href="#keterampilan" data-toggle="tab" class="nav-link">Keterampilan</a>
										</li>
								</ul>
								<div class="tab-content">
										<div id="pendidikan" class="tab-pane fade active show">
											<div class="profile-personal-info mt-4">
												@forelse ($lamaran->pelamar->pendidikan as $pendidikan)
													<div class="pendidikan">
														<div class="row">
															<div class="col-lg-6">
																<div class="row mb-4">
																	<div class="col-5">
																		<h5 class="f-w-500">Perguruan Tinggi <span class="pull-right text-muted">:</span></h5>
																	</div>
																	<div class="col-7"><span class="text-muted">{{ $pendidikan->perguruan_tinggi }}</span></div>
																</div>
																<div class="row mb-4">
																	<div class="col-5">
																		<h5 class="f-w-500">Bidang Studi <span class="pull-right text-muted">:</span></h5>
																	</div>
																	<div class="col-7"><span class="text-muted">{{ $pendidikan->bidang_studi }}</span></div>
																</div>
																<div class="row mb-4">
																	<div class="col-5">
																		<h5 class="f-w-500">IPK <span class="pull-right text-muted">:</span></h5>
																	</div>
																	<div class="col-7"><span class="text-muted">{{ $pendidikan->ipk }}</span></div>
																</div>
																<div class="row mb-4">
																	<div class="col-5">
																		<h5 class="f-w-500">Transkip Nilai <span class="pull-right text-muted">:</span></h5>
																	</div>
																	<div class="col-7">
																		<a class="text-muted" href="{{ route('preview', ['jenis' => 'transkip', 'id' => $pendidikan->id]) }}" target="_blank"><i class="fa fa-info-circle"></i> Lihat Transkip Nilai</a>
																		{{-- <a href="{{ route('preview', ['jenis' => 'transkip', 'id' => $pendidikan->id]) }}" target="_blank" class="btn btn-sm btn-rounded btn-primary"><span class="btn-icon-left text-primary"><i class="fa fa-eye color-primary"></i>
                                    </span>Preview</a> --}}
																	</div>
																</div>
															</div>
															<div class="col-lg-6">
																<div class="row mb-4">
																	<div class="col-5">
																		<h5 class="f-w-500">Gelar <span class="pull-right text-muted">:</span></h5>
																	</div>
																	<div class="col-7"><span class="text-muted">{{ $pendidikan->gelar }}</span></div>
																</div>
																<div class="row mb-4">
																	<div class="col-5">
																		<h5 class="f-w-500">Tahun <span class="pull-right text-muted">:</span></h5>
																	</div>
																	<div class="col-7"><span class="text-muted">{{ $pendidikan->mulai.' - '.$pendidikan->selesai}}</span></div>
																</div>
																<div class="row mb-4">
																	<div class="col-5">
																		<h5 class="f-w-500">Deskripsi <span class="pull-right text-muted">:</span></h5>
																	</div>
																	<div class="col-7"><span class="text-muted">{{ $pendidikan->deskripsi ? $pendidikan->deskripsi : '-' }}</span></div>
																</div>
																<div class="row mb-4">
																	<div class="col-5">
																		<h5 class="f-w-500">Ijazah <span class="pull-right text-muted">:</span></h5>
																	</div>
																	<div class="col-7">
																		<a class="text-muted" href="{{ route('preview', ['jenis' => 'ijazah', 'id' => $pendidikan->id]) }}" target="_blank"><i class="fa fa-info-circle"></i> Lihat Ijazah</a>
																		{{-- <a href="{{ route('preview', ['jenis' => 'ijazah', 'id' => $pendidikan->id]) }}" target="_blank" class="btn btn-sm btn-rounded btn-primary"><span class="btn-icon-left text-primary"><i class="fa fa-eye color-primary"></i>
                                    </span>Preview</a> --}}
																	</div>
																</div>
															</div>
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
												@forelse ($lamaran->pelamar->pekerjaan as $pekerjaan)
													<div class="pekerjaan">
														<div class="row mb-4">
															<div class="col-3">
																<h5 class="f-w-500">Perusahaan <span class="pull-right text-muted">:</span></h5>
															</div>
															<div class="col-9"><span class="text-muted">{{ $pekerjaan->nama_perusahaan }}</span></div>
														</div>
														<div class="row mb-4">
															<div class="col-3">
																<h5 class="f-w-500">Jabatan <span class="pull-right text-muted">:</span></h5>
															</div>
															<div class="col-9"><span class="text-muted">{{ $pekerjaan->jabatan }}</span></div>
														</div>
														<div class="row mb-4">
															<div class="col-3">
																<h5 class="f-w-500">Tahun <span class="pull-right text-muted">:</span></h5>
															</div>
															<div class="col-9"><span class="text-muted">{{ $pekerjaan->mulai.' - '.$pekerjaan->selesai}}</span></div>
														</div>
														<div class="row mb-4">
															<div class="col-3">
																<h5 class="f-w-500">Deskripsi <span class="pull-right text-muted">:</span></h5>
															</div>
															<div class="col-9"><span class="text-muted">{{ $pekerjaan->deskripsi ? $pekerjaan->deskripsi : '-' }}</span></div>
														</div>
														<div class="row mb-4">
															<div class="col-3">
																<h5 class="f-w-500">Surat Keterangan <span class="pull-right text-muted">:</span></h5>
															</div>
															<div class="col-9">
																<a class="text-muted" href="{{ route('preview', ['jenis' => 'sk', 'id' => $pekerjaan->id]) }}" target="_blank"><i class="fa fa-info-circle"></i> Lihat Surat Keterangan</a>
																{{-- <a href="{{ route('preview', ['jenis' => 'sk', 'id' => $pekerjaan->id]) }}" target="_blank" class="btn btn-sm btn-rounded btn-primary"><span class="btn-icon-left text-primary"><i class="fa fa-eye color-primary"></i>
																</span>Preview</a> --}}
															</div>
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
												@forelse ($lamaran->pelamar->keterampilan as $keterampilan)
													<div class="keterampilan">
														<div class="row mb-4">
															<div class="col-3">
																<h5 class="f-w-500">Keterampilan <span class="pull-right text-muted">:</span></h5>
															</div>
															<div class="col-9"><span class=" text-muted">{{ $keterampilan->nama }}</span></div>
														</div>
														<div class="row mb-4">
															<div class="col-3">
																<h5 class="f-w-500">Penguasaan <span class="pull-right text-muted">:</span></h5>
															</div>
															<div class="col-9"><span class=" text-muted">{{ $keterampilan->penguasaan }} dari 5</span></div>
														</div>
														<div class="row mb-4">
															<div class="col-3">
																<h5 class="f-w-500">Sertifikat <span class="pull-right text-muted">:</span></h5>
															</div>
															<div class="col-9">
																<a class="text-muted" href="{{ route('preview', ['jenis' => 'sertifikat', 'id' => $keterampilan->id]) }}" target="_blank"><i class="fa fa-info-circle"></i> Lihat Sertifikat</a>
																{{-- <a href="{{ route('preview', ['jenis' => 'sertifikat', 'id' => $keterampilan->id]) }}" target="_blank" class="btn btn-sm btn-rounded btn-primary"><span class="btn-icon-left text-primary"><i class="fa fa-eye color-primary"></i>
																</span>Preview</a> --}}
															</div>
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
					<div class="row justify-content-between align-items-center text-center">
						@if (!$lamaran->pelamar->formulir)
						<div class="col-lg-12">
									<h5 class="f-w-500">CV :</h5>
									<a href="{{ route('preview', ['jenis' => 'cv', 'id' => $pendidikan->id]) }}" target="_blank" class="btn btn-sm btn-rounded btn-primary"><span class="btn-icon-left text-primary"><i class="fa fa-eye color-primary"></i>
									</span>Lihat</a>
						</div>
						@else
						<div class="col-lg-6">
							<h5 class="f-w-500">CV (Portfolio) :</h5>
							<a href="{{ route('preview', ['jenis' => 'cv', 'id' => $lamaran->pelamar_id]) }}" target="_blank" class="btn btn-sm btn-rounded btn-primary"><span class="btn-icon-left text-primary"><i class="fa fa-eye color-primary"></i>
							</span>Lihat</a>
						</div>
						<div class="col-lg-6">
							<h5 class="f-w-500">Formulir :</h5>
							<a href="{{ route('downloadFormulirPelamar', $lamaran->pelamar_id) }}" target="_blank" class="btn btn-sm btn-rounded btn-primary"><span class="btn-icon-left text-primary"><i class="fa fa-download color-primary"></i>
							</span>Download</a>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<div class="row justify-content-center mb-2">
						<span class="text-muted">Periksa data pelamar terlebih dahulu sebelum melakukan perubahan status.</span>
					</div>
					<div class="row justify-content-center">
						<a href="javascript:void()" class="btn btn-rounded btn-success mx-1" data-toggle="modal" data-target="#update-{{ $lamaran->id }}">
							<span class="text-light">Terima</span>
						</a>
						
						<a href="javascript:void()" class="btn btn-rounded btn-danger mx-1" data-toggle="modal" data-target="#tolak-{{ $lamaran->id }}">
							<span class="text-light">Tolak</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

@include('admin.lamaran.modal-update-status-lamaran')
@endsection