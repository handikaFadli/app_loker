@extends('admin.layouts.main')

@section('title')
	Admin App Loker - {{ $title }}
@endsection

@section('content-admin')
	<div class="container-fluid">

		@if ($lowongan)
			<div class="alert alert-warning solid alert-right-icon alert-dismissible fade show">
				<span><i class="mdi mdi-alert"></i></span>
				<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
				</button>
				<strong>Warning!</strong> Terdapat {{ $lowongan }} data lowongan yang belum diposting!.
			</div>
		@endif
		

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
								<li class="breadcrumb-item active"><a href="javascript:void(0)">Lowongan</a></li>
						</ol>
				</div>
		</div>

		<div class="row">
				<div class="col-12">
						<div class="card">
								<div class="card-header justify-content-between">
										<h4 class="card-title">Daftar</h4>
										<a href="{{ route('post-lowongan.create') }}" class="btn btn-sm btn-rounded btn-primary">
											<span class="btn-icon-left text-primary">
												<i class="fa fa-plus"></i>
											</span>
											Tambah
										</a>
								</div>
								<div class="card-body">
										<div class="table-responsive">
												<table id="example" class="display" style="min-width: 845px">
														<thead>
																<tr>
																		<th>No</th>
																		<th>Judul</th>
																		<th>Posisi</th>
																		<th>Batas Waktu</th>
																		<th>Status</th>
																		<th>Action</th>
																</tr>
														</thead>
														<tbody>
															@foreach ($data as $dt)
															@php
																	\Carbon\Carbon::setLocale('id');
															@endphp
															<tr>
																<td>{{ $loop->iteration }}</td>
																<td>{{ $dt->judul }}</td>
																<td>{{ $dt->posisi }}</td>
																<td>{{ \Carbon\Carbon::parse($dt->batas_waktu)->translatedFormat('d F Y') }}</td>
																<td>
																	@if ($dt->status == "closed")
																		<span class="badge badge-rounded badge-outline-warning">Closed</span>
																	@else
																		<span class="badge badge-rounded badge-outline-success">Open</span>
																	@endif
																</td>
																<td>
																	<span class="justify-content-center">
																		<a href="javascript:void()" class="mr-2" data-toggle="tooltip" data-placement="top" title="Detail">
																			<i class="fa fa-eye color-muted"></i>
																		</a>
																		<a href="{{ route("post-lowongan.edit", $dt->id) }}" class="mr-2" data-toggle="tooltip" data-placement="top" title="Edit">
																			<i class="fa fa-pencil color-muted"></i>
																		</a>
																		<a href="{{ route("post-lowongan.destroy", $dt->id) }}" data-toggle="tooltip" data-placement="top" title="Hapus" data-confirm-delete="true">
																			X
																		</a>
																	</span>
																</td>
															</tr>
															@endforeach
														</tbody>
														<tfoot>
																<tr>
																	<th>No</th>
																	<th>Judul</th>
																	<th>Posisi</th>
																	<th>Batas Waktu</th>
																	<th>Status</th>
																	<th>Action</th>
																</tr>
														</tfoot>
												</table>
										</div>
								</div>
						</div>
				</div>
		</div>
	</div>
@endsection