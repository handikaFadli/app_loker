@extends('layouts.main')

@section('content')
<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumbs-content">
					<h1 class="page-title">Edit Profil</h1>
					<p>Perbarui informasi pribadi Anda di halaman ini. Pastikan semua data yang Anda masukkan<br>akurat dan terbaru untuk memaksimalkan pengalaman Anda di platform kami.</p>
				</div>
				<ul class="breadcrumb-nav">
					<li><a href="/">Home</a></li>
					<li><a href="/profile/myprofile">Profil</a></li>
					<li>Edit Profil</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Add Resume Section -->
<section class="add-resume section">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1 col-12">
				<div class="add-resume-inner box">
					<div class="post-header align-items-center justify-content-center">
						<h3>Informasi Pribadi</h3>
						<p>Silahkan isi data diri anda terlebih dahulu!</p>
					</div>
					<form class="form-ad" action="{{ route("profile-update") }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-lg-12 col-12">
								<div class="form-group">
									<label class="control-label" for="nama">Nama Lengkap <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $pelamar->nama) }}" placeholder="Nama Lengkap" />
									@error('nama')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="form-group">
									<label class="control-label" for="tempat_lahir">Tempat Lahir <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $pelamar->tempat_lahir) }}" placeholder="Tempat Lahir" />
									@error('tempat_lahir')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="form-group">
									<label class="control-label" for="tanggal_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
									<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pelamar->tanggal_lahir) }}" />
									@error('tanggal_lahir')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
							</div>
							<div class="col-lg-12 col-12">
								<div class="form-group">
									<label class="control-label" for="tempat_tinggal">Tempat Tinggal <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="tempat_tinggal" name="tempat_tinggal" value="{{ old('tempat_tinggal', $pelamar->tempat_tinggal) }}" placeholder="Tempat Tinggal" />
									@error('tempat_tinggal')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="form-group">
									<label class="control-label" for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
									<select class="select" id="jenis_kelamin" name="jenis_kelamin">
										@if (old('jenis_kelamin', $pelamar->jenis_kelamin) == $pelamar->jenis_kelamin)
										<option value="{{ $pelamar->jenis_kelamin }}" hidden selected>{{ $pelamar->jenis_kelamin }}</option>
										@else
										<option value="{{ $pelamar->jenis_kelamin }}" hidden selected>{{ $pelamar->jenis_kelamin }}</option>
										@endif
										<option value="Laki-laki">Laki-laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
									@error('jenis_kelamin')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="form-group">
									<label class="control-label" for="status">Status <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="status" name="status" value="{{ old('status', $pelamar->status) }}" placeholder="cth Menikah" />
									@error('status')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="foto">Foto Diri <span class="text-danger">*</span></label>
							<input type="file" id="foto" name="foto" accept="image/*" value="{{ $pelamar->foto }}" style="display: none" onchange="previewAndHideOverlay(event)" />
							<div class="img-output mt-1 mx-2" onclick="triggerFileInput()">
								<img src="{{ $pelamar->foto ? $pelamar->foto : asset('media/default.png') }}" id="output" width="110">
							</div>
							<span class="mx-2 mt-1 text-muted">File yang dapat diunggah jpg, jpeg, svg, png, dan webp</span>
							@error('foto')
								<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
									*{{ $message }}
								</div>
							@enderror
						</div>
						<h3 class="single-section-title">Informasi Kontak</h3>
						<div class="row">
							<div class="col-lg-6 col-12">
								<div class="form-group">
									<label class="control-label" for="nomor_telepon">Nomor Telepon <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon', $pelamar->nomor_telepon) }}" placeholder="cth 0888888888" />
									@error('nomor_telepon')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="form-group">
									<label class="control-label" for="email">Email <span class="text-danger">*</span></label>
									<input type="email" class="form-control" id="email" name="email" value="{{ $pelamar->email }}" readonly />
									@error('email')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="form-group">
									<label class="control-label" for="instagram">Instagram (Link)</label>
									<input type="text" class="form-control" id="instagram" name="instagram" value="{{ old('instagram', $pelamar->instagram) }}" placeholder="cth https://instagram.com/[username]" />
									@error('instagram')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="form-group">
									<label class="control-label" for="linkedin">Linkedin {Link}</label>
									<input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ old('linkedin', $pelamar->linkedin) }}" placeholder="cth https://linkedin.com/[username]" />
									@error('linkedin')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
							</div>
						</div>
						<h3 class="single-section-title">Riwayat Pendidikan</h3>
						<div class="form-pendidikan-wrapper" id="form-pendidikan-wrapper">
							@forelse ($pelamar->pendidikan as $pendidikan)
							<div class="form-pendidikan">
								<div class="row align-items-center justify-content-center">
									<div class="col-lg-12 col-md-12 col-12">
										<div class="add-post-btn float-right">
												<ul>
														<li>
															<a href="#" class="btn-delete">
																<i class="lni lni-remove-file"></i>
																	Delete This
															</a>
														</li>
												</ul>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-12">
										<input type="hidden" class="form-control" id="id" name="pendidikan[{{ $loop->index }}][id]" value="{{ $pendidikan->id }}" />

										<div class="form-group">
											<label class="control-label" for="perguruan_tinggi">Perguruan Tinggi <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="perguruan_tinggi" name="pendidikan[{{ $loop->index }}][perguruan_tinggi]" value="{{ $pendidikan->perguruan_tinggi }}" required placeholder="cth Universitas Indonesia" />
										</div>
									</div>
									<div class="col-lg-6 col-12">
										<div class="form-group">
											<label class="control-label" for="bidang_studi">Bidang Studi <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="bidang_studi" name="pendidikan[{{ $loop->index }}][bidang_studi]" value="{{ $pendidikan->bidang_studi }}" required placeholder="cth Teknik Informatika" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-6">
										<div class="form-group">
											<label class="control-label" for="gelar">Gelar <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="gelar" name="pendidikan[{{ $loop->index }}][gelar]" value="{{ $pendidikan->gelar }}" required placeholder="cth S.KOM" />
										</div>
									</div>
									<div class="col-md-6 col-6">
										<div class="form-group">
											<label class="control-label" for="ipk">IPK <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="ipk" name="pendidikan[{{ $loop->index }}][ipk]" value="{{ $pendidikan->ipk }}" required placeholder="cth 3.80" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-6">
										<div class="form-group">
											<label class="control-label" for="mulai">Dari <span class="text-danger">*</span></label>
											<input type="number" class="form-control" id="mulai" name="pendidikan[{{ $loop->index }}][mulai]" value="{{ $pendidikan->mulai }}" required placeholder="cth 2019" />
										</div>
									</div>
									<div class="col-md-6 col-6">
										<div class="form-group">
											<label class="control-label" for="selesai">Ke <span class="text-danger">*</span></label>
											<input type="number" class="form-control" id="selesai" name="pendidikan[{{ $loop->index }}][selesai]" value="{{ $pendidikan->selesai }}" required placeholder="cth 2023" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label for="transkip_nilai">Transkip Nilai</label>
											<div class="row justify-content-between">
												<div class="col-10">
														<input type="text" id="transkip_display_{{ $pendidikan->id }}" readonly value="{{ basename($pendidikan->transkip_nilai) }}">
												</div>
												<div class="col-2">
														<button type="button" class="btn btn-light border-1 border-dark" onclick="document.getElementById('transkip_input_{{ $pendidikan->id }}').click();">Ganti File</button>
												</div>
												<input type="file" id="transkip_input_{{ $pendidikan->id }}" name="pendidikan[{{ $loop->index }}][transkip_nilai]" accept="application/pdf" style="display: none;" onchange="updateFileDisplay('transkip_input_{{ $pendidikan->id }}', 'transkip_display_{{ $pendidikan->id }}')" />
											</div>
											<span class="mx-1 mt-1 text-muted">File yang diunggah harus .pdf</span>
										</div>
									</div>
								</div>
								<div class="row mb-1">
									<div class="col-12">
										<div class="form-group">
											<label for="ijazah">Ijazah</label>
											<div class="row justify-content-between">
												<div class="col-10">
														<input type="text" id="ijazah_display_{{ $pendidikan->id }}" readonly value="{{ basename($pendidikan->ijazah) }}">
												</div>
												<div class="col-2">
														<button type="button" class="btn btn-light border-1 border-dark" onclick="document.getElementById('ijazah_input_{{ $pendidikan->id }}').click();">Ganti File</button>
												</div>
												<input type="file" id="ijazah_input_{{ $pendidikan->id }}" name="pendidikan[{{ $loop->index }}][ijazah]" accept="application/pdf" style="display: none;" onchange="updateFileDisplay('ijazah_input_{{ $pendidikan->id }}', 'ijazah_display_{{ $pendidikan->id }}')" />
											</div>
											<span class="mx-1 mt-1 text-muted">File yang diunggah harus .pdf</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label" for="deskripsi">Deskripsi</label>
									<textarea class="form-control" rows="6" id="deskripsi" name="pendidikan[{{ $loop->index }}][deskripsi]">{{ $pendidikan->deskripsi }}</textarea>
								</div>
							</div>
							@empty
							<div class="form-pendidikan">
								<div class="row align-items-center justify-content-center">
									<div class="col-lg-12 col-md-12 col-12">
										<div class="add-post-btn float-right">
												<ul>
														<li>
															<a href="#" class="btn-delete">
																<i class="lni lni-remove-file"></i>
																	Delete This
															</a>
														</li>
												</ul>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-12">
										<div class="form-group">
											<label class="control-label" for="perguruan_tinggi">Perguruan Tinggi <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="perguruan_tinggi" name="pendidikan[0][perguruan_tinggi]" required placeholder="cth Universitas Indonesia" />
										</div>
									</div>
									<div class="col-lg-6 col-12">
										<div class="form-group">
											<label class="control-label" for="bidang_studi">Bidang Studi <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="bidang_studi" name="pendidikan[0][bidang_studi]" required placeholder="cth Teknik Informatika" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-6">
										<div class="form-group">
											<label class="control-label" for="gelar">Gelar <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="gelar" name="pendidikan[0][gelar]" required placeholder="cth S.KOM" />
										</div>
									</div>
									<div class="col-md-6 col-6">
										<div class="form-group">
											<label class="control-label" for="ipk">IPK <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="ipk" name="pendidikan[0][ipk]" required placeholder="cth 3.80" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-6">
										<div class="form-group">
											<label class="control-label" for="mulai">Dari <span class="text-danger">*</span></label>
											<input type="number" class="form-control" id="mulai" name="pendidikan[0][mulai]" required placeholder="cth 2019" />
										</div>
									</div>
									<div class="col-md-6 col-6">
										<div class="form-group">
											<label class="control-label" for="selesai">Ke <span class="text-danger">*</span></label>
											<input type="number" class="form-control" id="selesai" name="pendidikan[0][selesai]" required placeholder="cth 2023" />
										</div>
									</div>
								</div>
								<div class="row mb-1">
									<div class="col-md-6 col-12">
										<div class="form-group">
											<label for="transkip_nilai">Transkip Nilai</label>
											<div class="button-group col-md-4 col-12 mt-2">
												<div class="action-buttons">
													<div class="upload-button button">
														<a href="javacript:" class="btn pointer-event">
															<i class="lni lni-upload mx-1"></i>
															Upload
														</a>
														<input type="file" name="pendidikan[0][transkip_nilai]" accept="application/pdf" />
													</div>
												</div>
											</div>
											<span class="mx-1 mt-1 text-muted">File yang diunggah harus .pdf</span>
										</div>
									</div>
									<div class="col-md-6 col-12">
										<div class="form-group">
											<label for="ijazah">Ijazah</label>
											<div class="button-group col-md-4 col-12 mt-2">
												<div class="action-buttons">
													<div class="upload-button button">
														<a href="javacript:" class="btn pointer-event">
															<i class="lni lni-upload mx-1"></i>
															Upload
														</a>
														<input id="cover_img_file_2" type="file" name="pendidikan[0][ijazah]" accept="application/pdf" />
													</div>
												</div>
											</div>
											<span class="mx-1 mt-1 text-muted">File yang diunggah harus .pdf</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label" for="deskripsi">Deskripsi</label>
									<textarea class="form-control" rows="6" id="deskripsi" name="pendidikan[0][deskripsi]"></textarea>
								</div>
							</div>
							@endforelse
						</div>
						<div class="row align-items-center justify-content-center">
							<div class="col-lg-12 col-md-12 col-12">
								<div class="add-post-btn float-right">
										<ul>
												<li>
													<a href="#" class="btn-added"><i class="lni lni-add-files"></i> Add New Education</a>
												</li>
										</ul>
								</div>
							</div>
						</div>
						<h3 class="single-section-title">Riwayat Pekerjaan</h3>
						<div class="form-pekerjaan-wrapper" id="form-pekerjaan-wrapper">
							@forelse ($pelamar->pekerjaan as $pekerjaan)
							<div class="form-pekerjaan">
								<div class="row align-items-center justify-content-center">
									<div class="col-lg-12 col-md-12 col-12">
										<div class="add-post-btn float-right">
												<ul>
														<li>
															<a href="#" class="btn-delete-job">
																<i class="lni lni-remove-file"></i>
																	Delete This
															</a>
														</li>
												</ul>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-12">
										<input type="hidden" class="form-control" id="id" name="pekerjaan[{{ $loop->index }}][id]" value="{{ $pekerjaan->id }}" />

										<div class="form-group">
											<label class="control-label" for="nama_perusahaan">Nama Perusahaan</label>
											<input type="text" class="form-control" id="nama_perusahaan" name="pekerjaan[{{ $loop->index }}][nama_perusahaan]" value="{{ $pekerjaan->nama_perusahaan }}" placeholder="cth Pt. Indonesia Maju" />
										</div>
									</div>
									<div class="col-lg-6 col-12">
										<div class="form-group">
											<label class="control-label" for="jabatan">Jabatan</label>
											<input type="text" class="form-control" id="jabatan" name="pekerjaan[{{ $loop->index }}][jabatan]" value="{{ $pekerjaan->jabatan }}" placeholder="cth Direktur" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-6">
										<div class="form-group">
											<label class="control-label" for="mulai">Dari</label>
											<input type="number" class="form-control" id="mulai" name="pekerjaan[{{ $loop->index }}][mulai]" value="{{ $pekerjaan->mulai }}" placeholder="cth 2019" />
										</div>
									</div>
									<div class="col-md-6 col-6">
										<div class="form-group">
											<label class="control-label" for="selesai">Ke</label>
											<input type="number" class="form-control" id="selesai" name="pekerjaan[{{ $loop->index }}][selesai]" value="{{ $pekerjaan->selesai }}" required placeholder="cth 2023" />
										</div>
									</div>
								</div>
								<div class="row mb-1">
									<div class="col-md-12 col-12">
										<div class="form-group">
											<label for="surat_keterangan">Surat Keterangan</label>
											<div class="row justify-content-between">
												<div class="col-10">
														<input type="text" id="surat_keterangan_display_{{ $pekerjaan->id }}" readonly value="{{ basename($pekerjaan->surat_keterangan) }}">
												</div>
												<div class="col-2">
														<button type="button" class="btn btn-light border-1 border-dark" onclick="document.getElementById('surat_keterangan_input_{{ $pekerjaan->id }}').click();">Ganti File</button>
												</div>
												<input type="file" id="surat_keterangan_input_{{ $pekerjaan->id }}" name="pekerjaan[{{ $loop->index }}][surat_keterangan]" accept="application/pdf" style="display: none;" onchange="updateFileDisplay('surat_keterangan_input_{{ $pekerjaan->id }}', 'surat_keterangan_display_{{ $pekerjaan->id }}')" />
											</div>
											<span class="mx-1 mt-1 text-muted">File yang diunggah harus .pdf</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label" for="deskripsi">Deskripsi</label>
									<textarea class="form-control" rows="6" id="deskripsi" name="pekerjaan[{{ $loop->index }}][deskripsi]">{{ $pekerjaan->deskripsi }}</textarea>
								</div>
							</div>
							@empty
							<div class="form-pekerjaan">
								<div class="row align-items-center justify-content-center">
									<div class="col-lg-12 col-md-12 col-12">
										<div class="add-post-btn float-right">
												<ul>
														<li>
															<a href="#" class="btn-delete-job">
																<i class="lni lni-remove-file"></i>
																	Delete This
															</a>
														</li>
												</ul>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-12">
										<div class="form-group">
											<label class="control-label" for="nama_perusahaan">Nama Perusahaan</label>
											<input type="text" class="form-control" id="nama_perusahaan" name="pekerjaan[0][nama_perusahaan]" placeholder="cth Pt. Indonesia Maju" />
										</div>
									</div>
									<div class="col-lg-6 col-12">
										<div class="form-group">
											<label class="control-label" for="jabatan">Jabatan</label>
											<input type="text" class="form-control" id="jabatan" name="pekerjaan[0][jabatan]" placeholder="cth Direktur" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-6">
										<div class="form-group">
											<label class="control-label" for="mulai">Dari</label>
											<input type="number" class="form-control" id="mulai" name="pekerjaan[0][mulai]" placeholder="cth 2019" />
										</div>
									</div>
									<div class="col-md-6 col-6">
										<div class="form-group">
											<label class="control-label" for="selesai">Ke</label>
											<input type="number" class="form-control" id="selesai" name="pekerjaan[0][selesai]" required placeholder="cth 2023" />
										</div>
									</div>
								</div>
								<div class="row mb-1">
									<div class="col-md-12 col-12">
										<div class="form-group">
											<label for="surat_keterangan">Surat Keterangan</label>
											<div class="button-group col-md-4 col-12 mt-2">
												<div class="action-buttons">
													<div class="upload-button button">
														<a href="javacript:" class="btn pointer-event">
															<i class="lni lni-upload mx-1"></i>
															Upload
														</a>
														<input type="file" name="pekerjaan[0][surat_keterangan]" accept="application/pdf" />
													</div>
												</div>
											</div>
											<span class="mx-1 mt-1 text-muted">File yang diunggah harus .pdf</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label" for="deskripsi">Deskripsi</label>
									<textarea class="form-control" rows="6" id="deskripsi" name="pekerjaan[0][deskripsi]"></textarea>
								</div>
							</div>
							@endforelse
						</div>
						<div class="row align-items-center justify-content-center">
							<div class="col-lg-12 col-md-12 col-12">
								<div class="add-post-btn float-right">
										<ul>
												<li>
													<a href="#" class="btn-added-job"><i class="lni lni-add-files"></i> Add New Job</a>
												</li>
										</ul>
								</div>
							</div>
						</div>
						<h3 class="single-section-title">Keterampilan</h3>
						<div class="form-keterampilan-wrapper" id="form-keterampilan-wrapper">
							@forelse ($pelamar->keterampilan as $keterampilan)
							<div class="form-keterampilan">
								<div class="row align-items-center justify-content-center">
									<div class="col-lg-12 col-md-12 col-12">
										<div class="add-post-btn float-right">
												<ul>
														<li>
															<a href="#" class="btn-delete-skill">
																<i class="lni lni-remove-file"></i>
																	Delete This
															</a>
														</li>
												</ul>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-12">
										<input type="hidden" class="form-control" id="id" name="keterampilan[{{ $loop->index }}][id]" value="{{ $keterampilan->id }}" />

										<div class="form-group">
											<label class="control-label" for="nama">Keterampilan</label>
											<input type="text" class="form-control" id="nama" name="keterampilan[{{ $loop->index }}][nama]" value="{{ $keterampilan->nama }}" placeholder="Keterampilan" />
										</div>
									</div>
									<div class="col-lg-6 col-12">
										<div class="form-group">
											<label class="control-label" for="penguasaan">(1 - 5)</label>
											<input type="number" class="form-control" id="penguasaan" name="keterampilan[{{ $loop->index }}][penguasaan]" value="{{ $keterampilan->penguasaan }}" placeholder="Penguasaan, cth 4" min="1" max="5" />
										</div>
									</div>
								</div>
								<div class="row mb-1">
									<div class="col-md-12 col-12">
										<div class="form-group">
											<label for="sertifikat">Sertifikat</label>
											<div class="row justify-content-between">
													<div class="col-10">
															<input type="text" id="sertifikat_display_{{ $loop->index }}" readonly value="{{ basename($keterampilan->sertifikat) }}">
													</div>
													<div class="col-2">
															<button type="button" class="btn btn-light border-1 border-dark" onclick="document.getElementById('sertifikat_input_{{ $loop->index }}').click();">Ganti File</button>
													</div>
													<input type="file" id="sertifikat_input_{{ $loop->index }}" name="keterampilan[{{ $loop->index }}][sertifikat]" accept="application/pdf" style="display: none;" onchange="updateFileDisplay('sertifikat_input_{{ $loop->index }}', 'sertifikat_display_{{ $loop->index }}')" />
											</div>
											<span class="mx-1 mt-1 text-muted">File yang diunggah harus .pdf</span>
									</div>
									</div>
								</div>
							</div>
							@empty
							<div class="form-keterampilan">
								<div class="row align-items-center justify-content-center">
									<div class="col-lg-12 col-md-12 col-12">
										<div class="add-post-btn float-right">
												<ul>
														<li>
															<a href="#" class="btn-delete-skill">
																<i class="lni lni-remove-file"></i>
																	Delete This
															</a>
														</li>
												</ul>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-12">
										<div class="form-group">
											<label class="control-label" for="nama">Keterampilan</label>
											<input type="text" class="form-control" id="nama" name="keterampilan[0][nama]" placeholder="Keterampilan" />
										</div>
									</div>
									<div class="col-lg-6 col-12">
										<div class="form-group">
											<label class="control-label" for="penguasaan">(1 - 5)</label>
											<input type="number" class="form-control" id="penguasaan" name="keterampilan[0][penguasaan]" placeholder="Penguasaan, cth 4" min="1" max="5" />
										</div>
									</div>
								</div>
								<div class="row mb-1">
									<div class="col-md-12 col-12">
										<div class="form-group">
											<label for="sertifikat">Sertifikat</label>
											<div class="button-group col-md-4 col-12 mt-2">
												<div class="action-buttons">
													<div class="upload-button button">
														<a href="javacript:" class="btn pointer-event">
															<i class="lni lni-upload mx-1"></i>
															Upload
														</a>
														<input type="file" name="keterampilan[0][sertifikat]" accept="application/pdf" />
													</div>
												</div>
											</div>
											<span class="mx-1 mt-1 text-muted">File yang diunggah harus .pdf</span>
										</div>
									</div>
								</div>
							</div>
							@endforelse
						</div>
						<div class="row align-items-center justify-content-center">
							<div class="col-lg-12 col-md-12 col-12">
								<div class="add-post-btn float-right">
										<ul>
												<li>
													<a href="#" class="btn-added-skill"><i class="lni lni-add-files"></i> Add New Skill</a>
												</li>
										</ul>
								</div>
							</div>
						</div>
						<div class="form-group col-md-12 col-12 mt-3 mb-5">
							<label for="cv">CV (Termasuk Portfolio)<span class="text-danger">*</span></label>
							<div class="row justify-content-between">
								<div class="col-10">
										<input type="text" id="cv_display_{{ $pelamar->id }}" readonly value="{{ basename($pelamar->cv) }}">
								</div>
								<div class="col-2">
										<button type="button" class="btn btn-light border-1 border-dark" onclick="document.getElementById('cv_input_{{ $pelamar->id }}').click();">Ganti File</button>
								</div>
								<input type="file" id="cv_input_{{ $pelamar->id }}" name="cv" accept="application/pdf" style="display: none;" onchange="updateFileDisplay('cv_input_{{ $pelamar->id }}', 'cv_display_{{ $pelamar->id }}')" />
							</div>
							@error('cv')
								<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
									*{{ $message }}
								</div>
							@enderror
							<span class="mx-1 mt-1 text-muted">File yang diunggah harus .pdf</span>
						</div>
						<div class="row mt-5">
							<div class="col-12 align-items-center justify-content-end d-flex">
								<div class="button">
									<button type="submit" class="btn">
										<i class="lni lni-save mx-1"></i>
										Save
									</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Add Resume Section -->
@endsection

@section('script')

	<script>
		function updateFileDisplay(inputId, displayId) {
			var fileInput = document.getElementById(inputId);
			var fileName = fileInput.files[0].name;
			document.getElementById(displayId).value = fileName;
	}
	</script>

	<!-- Input type File -->
	<script>
		function triggerFileInput() {
				document.getElementById('foto').click();
		}

		function previewAndHideOverlay(event) {
				let input = event.target;
				let output = document.getElementById('output');
				let overlay = input.parentElement.querySelector('.upload-overlay');

				if (input.files && input.files[0]) {
						let reader = new FileReader();
						reader.onload = function(e) {
								output.src = e.target.result;
								// Mengubah style overlay menjadi none saat gambar dipilih
								overlay.style.display = 'none';
						}
						reader.readAsDataURL(input.files[0]);
				}
		}

		document.getElementById('foto').addEventListener('change', function() {
				let overlay = this.parentElement.querySelector('.upload-overlay');
				overlay.style.display = 'none';
		});

	</script>

	<!-- Form pendidikan -->
	<script>
    document.addEventListener('DOMContentLoaded', function () {
        let pendidikanIndex = document.querySelectorAll('.form-pendidikan').length;

        document.querySelector('.btn-added').addEventListener('click', function (e) {
            e.preventDefault();
            let formPendidikan = document.querySelector('.form-pendidikan').cloneNode(true);
            formPendidikan.querySelectorAll('input, textarea').forEach((input) => {
                let name = input.name;
                name = name.replace(/\[\d+\]/, '[' + pendidikanIndex + ']');
                input.name = name;
                input.value = '';
            });
            formPendidikan.querySelectorAll('.btn-delete').forEach((button) => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    this.closest('.form-pendidikan').remove();
                });
            });
            document.querySelector('#form-pendidikan-wrapper').appendChild(formPendidikan);
            pendidikanIndex++;
        });

        document.querySelectorAll('.btn-delete').forEach((button) => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                this.closest('.form-pendidikan').remove();
            });
        });
    });
	</script>

	<!-- Form pekerjaan -->
	<script>
    document.addEventListener('DOMContentLoaded', function () {
        let pekerjaanIndex = document.querySelectorAll('.form-pekerjaan').length;

        document.querySelector('.btn-added-job').addEventListener('click', function (e) {
            e.preventDefault();
            let formPekerjaan = document.querySelector('.form-pekerjaan').cloneNode(true);
            formPekerjaan.querySelectorAll('input, textarea').forEach((input) => {
                let name = input.name;
                name = name.replace(/\[\d+\]/, '[' + pekerjaanIndex + ']');
                input.name = name;
                input.value = '';
            });
            formPekerjaan.querySelectorAll('.btn-delete-job').forEach((button) => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    this.closest('.form-pekerjaan').remove();
                });
            });
            document.querySelector('#form-pekerjaan-wrapper').appendChild(formPekerjaan);
            pekerjaanIndex++;
        });

        document.querySelectorAll('.btn-delete-job').forEach((button) => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                this.closest('.form-pekerjaan').remove();
            });
        });
    });
	</script>

	<!-- Form Keterampilan -->
	<script>
    document.addEventListener('DOMContentLoaded', function () {
        let keterampilanIndex = document.querySelectorAll('.form-keterampilan').length;

        document.querySelector('.btn-added-skill').addEventListener('click', function (e) {
            e.preventDefault();
            let formKeterampilan = document.querySelector('.form-keterampilan').cloneNode(true);
            formKeterampilan.querySelectorAll('input').forEach((input) => {
                let name = input.name;
                name = name.replace(/\[\d+\]/, '[' + keterampilanIndex + ']');
                input.name = name;
                input.value = '';
            });
            formKeterampilan.querySelectorAll('.btn-delete-skill').forEach((button) => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    this.closest('.form-keterampilan').remove();
                });
            });
            document.querySelector('#form-keterampilan-wrapper').appendChild(formKeterampilan);
            keterampilanIndex++;
        });

        document.querySelectorAll('.btn-delete-skill').forEach((button) => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                this.closest('.form-keterampilan').remove();
            });
        });
    });
	</script>
@endsection