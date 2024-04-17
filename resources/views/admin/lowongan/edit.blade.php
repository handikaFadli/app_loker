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
		<!-- row -->

		<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
								<h4 class="card-title">Form Ubah Data</h4>
						</div>
						<div class="card-body">
							<div class="basic-form">
								<form action="{{ route("lowongan.update",$lowongan->id) }}" method="POST">
									@method('PUT')
									@csrf
									<div class="form-row">
											<div class="form-group col-md-6">
													<label for="perusahaan">Nama Perusahaan</label>
													<span class="text-danger">*</span>
													<input type="text" class="form-control" id="perusahaan" name="perusahaan" value="{{ old('perusahaan', $lowongan->perusahaan) }}">
													@error('perusahaan')
														<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
															*{{ $message }}
														</div>
                          @enderror
											</div>
											<div class="form-group col-md-6">
												<label for="posisi">Posisi</label>
												<span class="text-danger">*</span>
												<input type="text" class="form-control" id="posisi" name="posisi" value="{{ old('posisi', $lowongan->posisi) }}">
												@error('posisi')
													<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
														*{{ $message }}
													</div>
												@enderror
											</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
												<label for="lokasi">Lokasi Perusahaan</label>
												<span class="text-danger">*</span>
												<input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ old('lokasi', $lowongan->lokasi) }}">
												@error('lokasi')
													<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
														*{{ $message }}
													</div>
												@enderror
										</div>
										<div class="form-group col-md-6">
											<label for="tipe">Tipe Pekerjaan</label>
											<span class="text-danger">*</span>
											<select id="tipe" name="tipe" class="form-control">
												@if (old('tipe', $lowongan->tipe) == $lowongan->tipe)
												<option value="{{ $lowongan->tipe }}" hidden selected>{{ $lowongan->tipe }}</option>
												@else
												<option value="{{ $lowongan->tipe }}" hidden selected>{{ $lowongan->tipe }}</option>
												@endif
												<option value="full time">full time</option>
												<option value="part time">part time</option>
											</select>
											@error('tipe')
												<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
													*{{ $message }}
												</div>
											@enderror
										</div>
									</div>
									<div class="row mt-4 mx-1">
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