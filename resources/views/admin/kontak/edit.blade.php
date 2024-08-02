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
								<span>Ubah {{ $title }}</span>
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
								<h4 class="card-title">Form Ubah Data</h4>
						</div>
						<div class="card-body">
							<div class="basic-form">
								<form action="{{ route('kontak.update', $perusahaan->id) }}" method="POST" enctype="multipart/form-data">
										@method('PUT')
										@csrf
										<div class="form-row">
											<div class="form-group col-md-12">
												<label for="telepon">Telepon</label>
												<span class="text-danger">*</span>
												<input type="text" class="form-control" id="telepon" name="telepon" value="{{ old('telepon', $perusahaan->telepon) }}">
												@error('telepon')
												<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
														*{{ $message }}
												</div>
												@enderror
											</div>
											<div class="form-group col-md-12">
												<label for="email">Email</label>
												<span class="text-danger">*</span>
												<input type="email" class="form-control" id="email" name="email" value="{{ old('email', $perusahaan->email) }}">
												@error('email')
												<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
														*{{ $message }}
												</div>
												@enderror
											</div>
											<div class="form-group col-md-12">
												<label for="linkedin">Link Linkedin</label>
												<input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ old('linkedin', $perusahaan->linkedin) }}">
												@error('linkedin')
												<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
														*{{ $message }}
												</div>
												@enderror
											</div>
											<div class="form-group col-md-12">
												<label for="instagram">Link Instagram</label>
												<input type="text" class="form-control" id="instagram" name="instagram" value="{{ old('instagram', $perusahaan->instagram) }}">
												@error('instagram')
												<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
														*{{ $message }}
												</div>
												@enderror
											</div>
											<div class="form-group col-md-12">
												<label for="website">Link Website</label>
												<input type="text" class="form-control" id="website" name="website" value="{{ old('website', $perusahaan->website) }}">
												@error('website')
												<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
														*{{ $message }}
												</div>
												@enderror
											</div>
										</div>
										<div class="row mt-4 mx-1">
												<a href="/admin/kontak" class="btn btn-rounded btn-light">
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