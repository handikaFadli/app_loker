@extends('layouts.main')

@section('content')
<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumbs-content">
					<h1 class="page-title">Add Resume</h1>
					<p>
						Business plan draws on a wide range of knowledge from different business<br />
						disciplines. Business draws on a wide range of different business .
					</p>
				</div>
				<ul class="breadcrumb-nav">
					<li><a href="index.html">Home</a></li>
					<li>Add Resume</li>
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
					<form class="form-ad" action="{{ route("profile-create") }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-lg-6 col-12">
								<div class="form-group">
									<label class="control-label" for="nama_depan">Nama Depan <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="nama_depan" name="nama_depan" value="{{ old('nama_depan') }}" />
									@error('nama_depan')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="form-group">
									<label class="control-label" for="nama_belakang">Nama Belakang <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="{{ old('nama_belakang') }}" />
									@error('nama_belakang')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="form-group">
									<label class="control-label" for="tempat_lahir">Tempat Lahir <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" />
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
									<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" />
									@error('tanggal_lahir')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label class="control-label" for="tempat_tinggal">Tempat Tinggal <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="tempat_tinggal" name="tempat_tinggal" value="{{ old('tempat_tinggal') }}" />
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
											<option value="0" hidden disabled selected>Silahkan Pilih</option>
											@if (old('jenis_kelamin') == "Laki-laki")
											<option value="Laki-laki" selected>Laki-laki</option>
											@elseif (old('jenis_kelamin') == "Perempuan")
											<option value="Perempuan" selected>Perempuan</option>
											@else
											<option value="Laki-laki">Laki-laki</option>
											<option value="Perempuan">Perempuan</option>
										@endif
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
									<input type="text" class="form-control" id="status" name="status" value="{{ old('status') }}" />
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
							<input type="file" id="foto" name="foto" accept="image/*" style="display: none" onchange="previewAndHideOverlay(event)" />
							<div class="img-output mt-1 mx-2" onclick="triggerFileInput()">
								<img src="" id="output" width="110">
								<div class="upload-overlay">
									<i class="lni lni-upload"></i>
									<p>Click to upload</p>
								</div>
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
									<input type="number" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}" />
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
									<input type="email" class="form-control" id="email" name="email" value="{{ auth()->user() ? auth()->user()->email : '' }}" readonly />
									@error('email')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="form-group">
									<label class="control-label" for="instagram">Instagram</label>
									<input type="text" class="form-control" id="instagram" name="instagram" value="{{ old('instagram') }}" />
									@error('instagram')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="form-group">
									<label class="control-label" for="linkedin">Linkedin</label>
									<input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ old('linkedin') }}" />
									@error('linkedin')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
							</div>
						</div>
						<h3 class="single-section-title">Informasi Pendidikan</h3>
						<div class="form-pendidikan-wrapper" id="form-pendidikan-wrapper">
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
											<label class="control-label" for="nama_universitas">Nama Universitas <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="nama_universitas" name="pendidikan[0][nama_universitas]" required />
										</div>
									</div>
									<div class="col-lg-6 col-12">
										<div class="form-group">
											<label class="control-label" for="bidang_studi">Bidang Studi <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="bidang_studi" name="pendidikan[0][bidang_studi]" required />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-6">
										<div class="form-group">
											<label class="control-label" for="gelar">Gelar <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="gelar" name="pendidikan[0][gelar]" required />
										</div>
									</div>
									<div class="col-md-6 col-6">
										<div class="form-group">
											<label class="control-label" for="ipk">IPK <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="ipk" name="pendidikan[0][ipk]" required />
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
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label" for="deskripsi">Deskripsi</label>
									<textarea class="form-control" rows="6" id="deskripsi" name="deskripsi">{{ old('deskripsi') }}</textarea>
								</div>
							</div>
						</div>
						<div class="row align-items-center justify-content-center">
							<div class="col-lg-12 col-md-12 col-12">
								<div class="add-post-btn float-right">
										<ul>
												<li><a href="#" class="btn-added"><i class="lni lni-add-files"></i> Add New
																Education</a></li>
										</ul>
								</div>
							</div>
						</div>
						<div class="form-group col-md-6 col-12 mt-3 mb-5">
							<label for="cv">Dokumen CV <span class="text-danger">*</span></label>
							<div class="button-group col-md-6 col-12 mt-2">
								<div class="action-buttons">
									<div class="upload-button button">
										<a href="javacript:" class="btn pointer-event">
											<i class="lni lni-upload mx-1"></i>
											Upload
										</a>
										<input id="cover_img_file_2" type="file" id="cv" name="cv" accept="application/pdf" />
										@error('cv')
											<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
												*{{ $message }}
											</div>
										@enderror
									</div>
								</div>
							</div>
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
				let pendidikanIndex = 1;

				document.querySelector('.btn-added').addEventListener('click', function (e) {
						e.preventDefault();
						let formPendidikan = document.querySelector('.form-pendidikan').cloneNode(true);
						formPendidikan.querySelectorAll('input, textarea').forEach((input) => {
								let name = input.name;
								name = name.replace(/\d+/, pendidikanIndex);
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
@endsection