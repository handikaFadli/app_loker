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
								<span>Daftar {{ $title }}</span>
						</div>
				</div>
				<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
						<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
								<li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $title }}</a></li>
						</ol>
				</div>
		</div>

		@if ($data != null)
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header d-block d-flex flex-column align-items-center text-center">
						<img src="{{ $data->logo }}" class="mb-2" alt="logo perusahaan" width="110" />
						<h4>{{ $data->nama }}</h4>
					</div>
					<div class="card-body">
						<div class="profile-personal-info">
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Lokasi <span class="pull-right">:</span></h5>
								</div>
								<div class="col-9"><span>{{ $data->lokasi }}</span></div>
							</div>
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Visi <span class="pull-right">:</span></h5>
								</div>
								<div class="col-9"><span>{{ $data->visi }}</span></div>
							</div>
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Misi <span class="pull-right">:</span></h5>
								</div>
								<div class="col-9">
									<ul>
										@foreach($data->misi as $index => $misi)
											<li class="mb-1">- {{ $misi }}</li>
										@endforeach
									</ul>
								</div>
							</div>
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Tujuan <span class="pull-right">:</span></h5>
								</div>
								<div class="col-9">
									<ul>
										@foreach($data->tujuan as $index => $tujuan)
											<li class="mb-1">- {{ $tujuan }}</li>
										@endforeach
									</ul>
								</div>
							</div>
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Deskripsi <span class="pull-right">:</span></h5>
								</div>
								<div class="col-9"><span>{{ $data->deskripsi }}</span></div>
							</div>
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Telepon <span class="pull-right">:</span></h5>
								</div>
								<div class="col-9"><span>{{ $data->telepon }}</span></div>
							</div>
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Email <span class="pull-right">:</span></h5>
								</div>
								<div class="col-9"><span>{{ $data->email }}</span></div>
							</div>
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Linkedin <span class="pull-right">:</span></h5>
								</div>
								<div class="col-9"><span><a href="{{ $data->linkedin }}">Linkedin</a></span></div>
							</div>
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Instagram <span class="pull-right">:</span></h5>
								</div>
								<div class="col-9"><span><a href="{{ $data->instagram }}">Instagram</a></span></div>
							</div>
							<div class="row mb-4">
								<div class="col-3">
									<h5 class="f-w-500">Website <span class="pull-right">:</span></h5>
								</div>
								<div class="col-9"><span><a href="{{ $data->website }}">Website</a></span></div>
							</div>
							<div class="row justify-content-center">
								<a href="{{ route("perusahaan.edit", $data->id) }}" class="btn btn-rounded btn-primary">
									<i class="fa fa-pencil color-muted mr-2"></i>Edit
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@else
		<div class="row">
			<a href="{{ route("perusahaan.create") }}" class="btn btn-rounded btn-primary">
				<i class="fa fa-plus color-muted mr-2"></i> Tambah
			</a>
		</div>
		@endif
	</div>

@endsection