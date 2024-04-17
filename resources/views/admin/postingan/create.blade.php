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
								<li class="breadcrumb-item active"><a href="javascript:void(0)">Lowongan</a></li>
						</ol>
				</div>
		</div>

		<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
								<h4 class="card-title">Form Tambah Data</h4>
						</div>
						<div class="card-body">
							<div class="basic-form">
								<form action="{{ route("post-lowongan.store") }}" method="POST" enctype="multipart/form-data">
									@csrf
									<div class="form-row mb-2">
										<div class="form-group col-md-12">
											<label for="lowongan_id">Lowongan</label>
											<span class="text-danger">*</span>
											<div class="table-responsive">
												<table class="table table-hover table-responsive-sm">
													<thead>
														<tr>
															<th>#</th>
															<th>Perusahaan</th>
															<th>Posisi</th>
															<th>Tipe</th>
														</tr>
													</thead>
													<tbody>
														@if ($lowongan->count() > 0)
															@foreach ($lowongan as $lw)
																<tr>
																	<td class="d-flex align-items-center">
																			<input type="radio" name="lowongan_id" value="{{ $lw->id }}">
																	</td>
																	<td>{{ $lw->perusahaan }}</td>
																	<td>{{ $lw->posisi }}</td>
																	<td>{{ $lw->tipe }}</td>
																</tr>
															@endforeach
														@else
															<tr>
																<td colspan="4" class="text-center">
																	<span class="d-block">Data lowongan tidak ada!</span>
																	<span class="d-block">Tambah data lowongan <a href="{{ route('lowongan.create') }}" class="text-primary">disini</a></span>
																</td>
															</tr>
														@endif
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div class="form-row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="judul">Judul</label>
													<span class="text-danger">*</span>
													<input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}">
													@error('judul')
														<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
															*{{ $message }}
														</div>
                          @enderror
												</div>
												<div class="form-group">
													<label for="post_slug">Slug</label>
													<span class="text-danger">*</span>
													<input type="text" class="form-control" id="post_slug" name="post_slug" value="{{ old('post_slug') }}" readonly>
													@error('post_slug')
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
												<label for="deskripsi">Deskripsi</label>
												<span class="text-danger">*</span>
												<input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}">
												<trix-editor input="deskripsi"></trix-editor>
												@error('deskripsi')
													<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
														*{{ $message }}
													</div>
												@enderror
											</div>
									</div>
									<div class="row mt-3 mx-1">
										<a href="/admin/post-lowongan" class="btn btn-rounded btn-light">
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
    const slug = document.querySelector("#post_slug");

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