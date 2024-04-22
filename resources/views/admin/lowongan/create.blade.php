@extends('admin.layouts.main')

@section('title')
		Admin App Loker - {{ $title }}
@endsection

@section('style')
		<!-- style input type date -->
    <link href="{{ asset('assets_admin/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
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

		<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
								<h2 class="card-title">Form Tambah Data</h2>
						</div>
						<div class="card-body">
							<div class="basic-form">
								<form action="{{ route("lowongan.store") }}" method="POST" enctype="multipart/form-data">
									@csrf
									<div class="form-row mb-3">
										<div class="form-group col-md-12">
											<label for="perusahaan_id">Perusahaan</label>
											<span class="text-danger">*</span>
											<div class="table-responsive">
												<table class="table table-hover table-responsive-sm">
													<thead>
														<tr>
															<th>#</th>
															<th>Perusahaan</th>
															<th>Lokasi</th>
															<th>Deskripsi</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td class="d-flex align-items-center">
																	<input type="radio" name="perusahaan_id" value="{{ $perusahaan->id }}" checked>
															</td>
															<td>{{ $perusahaan->nama }}</td>
															<td>{{ $perusahaan->lokasi }}</td>
															<td>{{ $perusahaan->deskripsi }}</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="judul">Judul</label>
											<span class="text-danger">*</span>
											<input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}">
											@error('judul')
												<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
													*{{ $message }}
												</div>
											@enderror
										</div>
										<div class="form-group col-md-6">
											<label for="slug">Slug</label>
											<span class="text-danger">*</span>
											<input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" readonly>
											@error('slug')
												<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
													*{{ $message }}
												</div>
											@enderror
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-12">
											<label for="deskripsi">Deskripsi Pekerjaan</label>
											<span class="text-danger">*</span>
											<textarea class="form-control" rows="5" id="deskripsi" name="deskripsi">{{ old('deskripsi') }}</textarea>
											@error('deskripsi')
												<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
													*{{ $message }}
												</div>
											@enderror
										</div>
									</div>
									<div class="form-row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="kategori">Kategori</label>
													<span class="text-danger">*</span>
													<input type="text" class="form-control" id="kategori" name="kategori" value="{{ old('kategori') }}">
													@error('kategori')
														<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
															*{{ $message }}
														</div>
                          @enderror
												</div>
												<div class="form-group">
													<label for="tipe">Tipe Pekerjaan</label>
													<span class="text-danger">*</span>
													<select id="inlineFormCustomSelect" name="tipe" class="form-control custom-select">
														<option value="0" hidden disabled selected>Pilih</option>
														@if (old('tipe') == "full time")
															<option value="full time" selected>Full Time</option>
														@elseif (old('tipe') == "part time")
															<option value="part time" selected>Part Time</option>
														@elseif (old('tipe') == "contract")
															<option value="contract" selected>Contract</option>
														@elseif (old('tipe') == "internship")
															<option value="internship" selected>Internship</option>
														@else
															<option value="full time">Full Time</option>
															<option value="part time">Part Time</option>
															<option value="contract">Contract</option>
															<option value="internship">Internship</option>
														@endif
													</select>
													@error('tipe')
														<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
															*{{ $message }}
														</div>
													@enderror
												</div>
												<div class="form-row">
													<div class="form-group col-md-8">
														<label for="batas_waktu">Batas Waktu</label>
														<span class="text-danger">*</span>
														<input type="text" class="form-control" name="batas_waktu" id="mdate" value="{{ old('batas_waktu') }}">
														@error('batas_waktu')
															<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
																*{{ $message }}
															</div>
														@enderror
													</div>
													<div class="form-group col-md-4">
														<label for="status">Status</label>
														<span class="text-danger">*</span>
														<select id="inlineFormCustomSelect" name="status" class="form-control custom-select">
															<option value="0" hidden disabled selected>Pilih</option>
															@if (old('status') == "close")
															<option value="close" selected>close</option>
															@elseif (old('status') == "open")
															<option value="open" selected>open</option>
															@else
															<option value="close">close</option>
															<option value="open">open</option>
															@endif
														</select>
														@error('status')
															<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
																*{{ $message }}
															</div>
														@enderror
													</div>
												</div>
											</div>
											<div class="form-group col-md-6">
												<label for="gambar">Gambar</label>
												<span class="text-danger">*</span>
												<input type="file" id="gambar" class="form-control" name="gambar" accept="image/*" style="display: none;" onchange="previewAndHideOverlay(event)">
												@error('gambar')
													<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
														*{{ $message }}
													</div>
												@enderror
												<div class="img-output mt-1 mx-2" onclick="triggerFileInput()">
													<img src="" id="output" width="110">
													<div class="upload-overlay">
														<i class="fa fa-upload"></i>
														<p>Click to upload</p>
													</div>
												</div>
											</div>
									</div>
									<div class="form-row">
											<div class="form-group col-md-12">
												<label for="informasi">Informasi Lainnya</label>
												<input id="informasi" type="hidden" name="informasi" value="{{ old('informasi') }}">
												<trix-editor input="informasi"></trix-editor>
												@error('informasi')
													<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
														*{{ $message }}
													</div>
												@enderror
											</div>
									</div>
									<div class="row mt-3 mx-1">
										<a href="/admin/lowongan" class="btn btn-rounded btn-light">
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

	<!-- Input type Date -->
	<script src="{{ asset('assets_admin/vendor/moment/moment.min.js') }}"></script>
	<script src="{{ asset('assets_admin/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
	<script src="{{ asset('assets_admin/js/plugins-init/material-date-picker-init.js') }}"></script>
	<script>
		function getTodayDate() {
			let today = new Date();
			let dd = String(today.getDate()).padStart(2, '0');
			let mm = String(today.getMonth() + 1).padStart(2, '0');
			let yyyy = today.getFullYear();

			return yyyy + '-' + mm + '-' + dd;
		}

		document.addEventListener("DOMContentLoaded", function() {
			let todayDate = getTodayDate();
			document.getElementById("mdate").setAttribute("placeholder", todayDate);
		});
	</script>
	
	<!-- Input Post Slug -->
	<script>
		const judul = document.querySelector("#judul");
    const slug = document.querySelector("#slug");

		judul.addEventListener("keyup", function() {
				let preslug = judul.value;
				preslug = preslug.replace(/ /g,"-");
				slug.value = preslug.toLowerCase();
		});
	</script>

	<!-- Input type File -->
	<script>
		function triggerFileInput() {
				document.getElementById('gambar').click();
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

		document.getElementById('gambar').addEventListener('change', function() {
				let overlay = this.parentElement.querySelector('.upload-overlay');
				overlay.style.display = 'none';
		});

	</script>

	<!-- Trix Editor -->
	<script>
		document.addEventListener('trix-file-accept', function(e){
						e.preventDefault();
				})
	</script>

@endsection