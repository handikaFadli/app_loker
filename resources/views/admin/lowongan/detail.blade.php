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
								<span>Detail {{ $title }}</span>
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
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header d-block d-flex flex-column align-items-center text-center">
						<img src="{{ $data->gambar }}" class="mb-2" alt="poster" width="110" />
						<h4>{{ $data->judul }}</h4>
					</div>
					<div class="card-body">
						<div class="profile-personal-info">
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Perusahaan <span class="pull-right">:</span></h5>
								</div>
								<div class="col-9"><span>{{ $data->perusahaan->nama }}</span></div>
							</div>
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Kategori <span class="pull-right">:</span></h5>
								</div>
								<div class="col-9"><span>{{ $data->kategori }}</span></div>
							</div>
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Tipe <span class="pull-right">:</span></h5>
								</div>
								<div class="col-9"><span>{{ $data->tipe }}</span></div>
							</div>
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Status <span class="pull-right">:</span></h5>
								</div>
								<div class="col-9"><span>{{ $data->status }}</span></div>
							</div>
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Batas Akhir <span class="pull-right">:</span></h5>
								</div>
								<div class="col-9"><span>{{ $data->batas_akhir }}</span></div>
							</div>
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Deskripsi <span class="pull-right">:</span></h5>
								</div>
								<div class="col-9"><span>{{ $data->deskripsi }}</span></div>
							</div>
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Informasi <span class="pull-right">:</span></h5>
								</div>
								<div class="col-9"><span>{{ $data->informasi }}</span></div>
							</div>
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Persyaratan <span class="pull-right">:</span></h5>
								</div>
								<div class="col-9"><span>{!! $data->persyaratan !!}</span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection