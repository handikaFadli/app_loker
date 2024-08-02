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
					<div class="card-body">
						<div class="profile-personal-info">
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
							<div class="row justify-content-center">
								<a href="{{ route("tentang.edit", $data->id) }}" class="btn btn-rounded btn-primary">
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
			<h3>Silahkan tambahkan di halaman perusahaan!.</h3>
		</div>
		@endif
	</div>

@endsection