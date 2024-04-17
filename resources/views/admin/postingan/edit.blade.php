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
								<span>Ubah {{ $title }}</span>
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
								<h4 class="card-title">Form Ubah Data</h4>
						</div>
						<div class="card-body">
							<div class="basic-form">
								<form action="{{ route("post-lowongan.update", $post->id) }}" method="POST" enctype="multipart/form-data">
									@csrf
									@method("PUT")
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
														<tr>
															<td class="d-flex align-items-center">
																	<input type="radio" name="lowongan_id" value="{{ $lowongan->id }}" checked>
															</td>
															<td>{{ $lowongan->perusahaan }}</td>
															<td>{{ $lowongan->posisi }}</td>
															<td>{{ $lowongan->tipe }}</td>
														</tr>
														<tr>
															<td colspan="4" class="text-center">
																<span class="text-danger">*Data lowongan ini tidak bisa diubah. Jika ingin mengubah, hapus data dan buat data baru lagi.</span>
															</td>
														</tr>
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
													<input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $post->judul) }}">
													@error('judul')
														<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
															*{{ $message }}
														</div>
                          @enderror
												</div>
												<div class="form-group">
													<label for="post_slug">Slug</label>
													<span class="text-danger">*</span>
													<input type="text" class="form-control" id="post_slug" name="post_slug" value="{{ old('post_slug', $post->post_slug) }}" readonly>
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
														<input type="text" class="form-control" name="batas_waktu" id="mdate" value="{{ old('batas_waktu', $post->batas_waktu) }}">
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
															@if (old('status', $post->status) == $post->status)
															<option value="{{ $post->status }}" hidden selected>{{ $post->status }}</option>
															@else
															<option value="{{ $post->status }}" hidden selected>{{ $post->status }}</option>
															@endif
															<option value="open">open</option>
															<option value="close">close</option>
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
												<input type="file" id="gambar" class="form-control" name="gambar" accept="image/*" value="{{ $post->gambar }}" style="display: none;" onchange="previewAndHideOverlay(event)">
												@error('gambar')
													<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
														*{{ $message }}
													</div>
												@enderror
												<div class="img-output mt-1 mx-2" onclick="triggerFileInput()">
													<img src="{{ asset('media/'.$post->gambar) }}" id="output" width="110">
												</div>
											</div>
									</div>
									<div class="form-row">
											<div class="form-group col-md-12">
												<label for="deskripsi">Deskripsi</label>
												<span class="text-danger">*</span>
												<input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi', $post->deskripsi) }}">
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