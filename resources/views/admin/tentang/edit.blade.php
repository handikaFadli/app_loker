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
								<form action="{{ route('tentang.update', $perusahaan->id) }}" method="POST" enctype="multipart/form-data">
										@method('PUT')
										@csrf
										<div class="form-row">
											<div class="form-group col-md-12">
												<label for="visi">Visi Perusahaan</label>
												<textarea class="form-control" rows="5" id="visi" name="visi">{{ old('visi', $perusahaan->visi) }}</textarea>
												@error('visi')
												<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
														*{{ $message }}
												</div>
												@enderror
											</div>
											<div class="form-group col-md-12">
												<label for="misi">Misi Perusahaan</label>
												@foreach(old('misi', $perusahaan->misi ?? []) as $index => $misi)
													<input type="text" class="form-control mb-2" id="misi" name="misi[]" value="{{ $misi }}">
													@error("misi.$index")
														<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
																*{{ $message }}
														</div>
													@enderror
												@endforeach
											</div>
											<div class="form-group col-md-12">
												<label for="tujuan">Tujuan Perusahaan</label>
												@foreach(old('tujuan', $perusahaan->tujuan ?? []) as $index => $tujuan)
													<input type="text" class="form-control mb-2" id="tujuan" name="tujuan[]" value="{{ $tujuan }}">
													@error("tujuan.$index")
														<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
																*{{ $message }}
														</div>
													@enderror
												@endforeach
											</div>
										</div>
										<div class="row mt-4 mx-1">
												<a href="/admin/tentang" class="btn btn-rounded btn-light">
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