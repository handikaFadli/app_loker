@extends('admin.layouts.main')

@section('title')
		Admin App Loker - {{ $title }}
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
								<h4 class="card-title">Form Tambah Data</h4>
						</div>
						<div class="card-body">
							<div class="basic-form">
								<form action="{{ route("perusahaan.store") }}" method="POST">
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
										<div class="form-group col-md-12">
											<label for="deskripsi">Deskripsi Perusahaan</label>
											<span class="text-danger">*</span>
											<textarea class="form-control" rows="5" id="deskripsi" name="deskripsi">{{ old('deskripsi') }}</textarea>
											@error('deskripsi')
												<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
													*{{ $message }}
												</div>
											@enderror
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