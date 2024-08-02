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
								<span>Tambah {{ $title }}</span>
						</div>
				</div>
				<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
						<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
								<li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $title }}</a></li>
						</ol>
				</div>
		</div>
		<!-- row -->

		<div class="row">
			<div class="col-12">
					<div class="card">
							<div class="card-header">
									<h4 class="card-title">Form Tambah Data Perusahaan</h4>
							</div>
							<div class="card-body">
									<div class="basic-form">
											<form action="{{ route('perusahaan.store') }}" method="POST" enctype="multipart/form-data">
													@csrf
													<div class="form-row">
															<div class="form-group col-md-6">
																	<label for="nama">Nama Perusahaan</label>
																	<span class="text-danger">*</span>
																	<input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
																	@error('nama')
																	<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
																			*{{ $message }}
																	</div>
																	@enderror
															</div>
															<div class="form-group col-md-6">
																	<label for="lokasi">Lokasi Perusahaan</label>
																	<span class="text-danger">*</span>
																	<input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ old('lokasi') }}">
																	@error('lokasi')
																	<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
																			*{{ $message }}
																	</div>
																	@enderror
															</div>
													</div>
													<div class="form-row">
															<div class="form-group col-md-6">
																	<label for="email">Email</label>
																	<span class="text-danger">*</span>
																	<input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
																	@error('email')
																	<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
																			*{{ $message }}
																	</div>
																	@enderror
															</div>
															<div class="form-group col-md-6">
																	<label for="telepon">Telepon</label>
																	<span class="text-danger">*</span>
																	<input type="text" class="form-control" id="telepon" name="telepon" value="{{ old('telepon') }}">
																	@error('telepon')
																	<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
																			*{{ $message }}
																	</div>
																	@enderror
															</div>
													</div>
													<div class="form-row">
															<div class="form-group col-md-12">
																	<label for="deskripsi">Deskripsi Perusahaan</label>
																	<textarea class="form-control" rows="5" id="deskripsi" name="deskripsi">{{ old('deskripsi') }}</textarea>
																	@error('deskripsi')
																	<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
																			*{{ $message }}
																	</div>
																	@enderror
															</div>
													</div>
													<div class="form-row">
															<div class="form-group col-md-12">
																	<label for="visi">Visi Perusahaan</label>
																	<textarea class="form-control" rows="5" id="visi" name="visi">{{ old('visi') }}</textarea>
																	@error('visi')
																	<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
																			*{{ $message }}
																	</div>
																	@enderror
															</div>
													</div>
													<div class="form-row">
															<div class="form-group col-md-12">
																	<label for="misi">Misi Perusahaan</label>
																	<div id="form-misi">
																			@foreach(old('misi', []) as $misi)
																					<div class="row mb-2 input-misi">
																							<div class="col-11">
																									<input type="text" class="form-control" name="misi[]" value="{{ $misi }}">
																							</div>
																							<div class="col-1 d-flex align-items-center">
																									<a href="javascript:void()" class="btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" data-confirm-delete="true">
																											<i class="fa fa-trash color-muted"></i>
																									</a>
																							</div>
																					</div>
																			@endforeach
																			<div class="row mb-2">
																					<div class="col-11">
																							<input type="text" class="form-control" name="misi[]" value="">
																					</div>
																					<div class="col-1 d-flex align-items-center">
																							<a href="javascript:void()" class="btn-add-misi" data-toggle="tooltip" data-placement="top" title="Tambah Misi">
																									<i class="fa fa-plus color-muted"></i>
																							</a>
																					</div>
																			</div>
																	</div>
																	@error('misi')
																	<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
																			*{{ $message }}
																	</div>
																	@enderror
															</div>
															<div class="form-group col-md-12">
																	<label for="tujuan">Tujuan Perusahaan</label>
																	<div id="form-tujuan">
																			@foreach(old('tujuan', []) as $tujuan)
																					<div class="row mb-2 input-tujuan">
																							<div class="col-11">
																									<input type="text" class="form-control" name="tujuan[]" value="{{ $tujuan }}">
																							</div>
																							<div class="col-1 d-flex align-items-center">
																									<a href="javascript:void()" class="btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" data-confirm-delete="true">
																											<i class="fa fa-trash color-muted"></i>
																									</a>
																							</div>
																					</div>
																			@endforeach
																			<div class="row mb-2">
																					<div class="col-11">
																							<input type="text" class="form-control" name="tujuan[]" value="">
																					</div>
																					<div class="col-1 d-flex align-items-center">
																							<a href="javascript:void()" class="btn-add-tujuan" data-toggle="tooltip" data-placement="top" title="Tambah Tujuan">
																									<i class="fa fa-plus color-muted"></i>
																							</a>
																					</div>
																			</div>
																	</div>
																	@error('tujuan')
																	<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
																			*{{ $message }}
																	</div>
																	@enderror
															</div>
													</div>
													<hr>
													<div class="form-row">
															<div class="col-md-6">
																	<div class="form-group">
																			<label for="website">Link Website</label>
																			<input type="text" class="form-control" id="website" name="website" value="{{ old('website') }}">
																			@error('website')
																			<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
																					*{{ $message }}
																			</div>
																			@enderror
																	</div>
																	<div class="form-group">
																			<label for="linkedin">Link Linkedin</label>
																			<input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ old('linkedin') }}">
																			@error('linkedin')
																			<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
																					*{{ $message }}
																			</div>
																			@enderror
																	</div>
																	<div class="form-group">
																			<label for="instagram">Link Instagram</label>
																			<input type="text" class="form-control" id="instagram" name="instagram" value="{{ old('instagram') }}">
																			@error('instagram')
																			<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
																					*{{ $message }}
																			</div>
																			@enderror
																	</div>
															</div>
															<div class="form-group col-md-6">
																	<label for="logo">Logo Perusahaan</label>
																	<span class="text-danger">*</span>
																	<input type="file" id="logo" class="form-control" name="logo" accept="image/*" style="display: none;" onchange="previewAndHideOverlay(event)">
																	@error('logo')
																	<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
																			*{{ $message }}
																	</div>
																	@enderror
																	<div class="img-output mt-1 mx-2" onclick="triggerFileInput()">
																			<img src="{{ old('logo') }}" id="output" width="110">
																	</div>
															</div>
													</div>
													<div class="row mt-4 mx-1">
															<a href="/admin/perusahaan" class="btn btn-rounded btn-light">
																	Back
															</a>
															<button type="submit" class="btn btn-rounded btn-primary ml-2">
																	Save
															</button>
													</div>
											</form>
									</div>
							</div>
					</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<!-- Input type File -->
	<script>
		function triggerFileInput() {
				document.getElementById('logo').click();
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

		document.getElementById('logo').addEventListener('change', function() {
				let overlay = this.parentElement.querySelector('.upload-overlay');
				overlay.style.display = 'none';
		});

	</script>
	<script>
		function triggerFileInput() {
			document.getElementById('logo').click();
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

		document.getElementById('logo').addEventListener('change', function() {
			let overlay = this.parentElement.querySelector('.upload-overlay');
			overlay.style.display = 'none';
		});

		// Add more misi input fields
		document.querySelector('.btn-add-misi').addEventListener('click', function() {
			const formMisi = document.getElementById('form-misi');
			const newMisi = document.createElement('div');
			newMisi.className = 'row mb-2 input-misi';
			newMisi.innerHTML = `
					<div class="col-11">
							<input type="text" class="form-control" name="misi[]" value="">
					</div>
					<div class="col-1 d-flex align-items-center">
							<a href="javascript:void()" class="btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" data-confirm-delete="true">
									<i class="fa fa-trash color-muted"></i>
							</a>
					</div>`;
			formMisi.insertBefore(newMisi, formMisi.querySelector('.row.mb-2:last-child'));
		});

		// Add more tujuan input fields
		document.querySelector('.btn-add-tujuan').addEventListener('click', function() {
			const formTujuan = document.getElementById('form-tujuan');
			const newTujuan = document.createElement('div');
			newTujuan.className = 'row mb-2 input-tujuan';
			newTujuan.innerHTML = `
					<div class="col-11">
							<input type="text" class="form-control" name="tujuan[]" value="">
					</div>
					<div class="col-1 d-flex align-items-center">
							<a href="javascript:void()" class="btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" data-confirm-delete="true">
									<i class="fa fa-trash color-muted"></i>
							</a>
					</div>`;
			formTujuan.insertBefore(newTujuan, formTujuan.querySelector('.row.mb-2:last-child'));
		});

		// Handle deletion of input fields
		document.addEventListener('click', function(event) {
			if (event.target.classList.contains('btn-delete')) {
					const row = event.target.closest('.row');
					row.remove();
			}
		});
</script>
@endsection