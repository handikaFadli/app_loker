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

		<div class="row">
				<div class="col-12">
						<div class="card">
								<div class="card-header justify-content-between">
										<h4 class="card-title">Daftar</h4>
										<a href="{{ route('perusahaan.create') }}" class="btn btn-sm btn-rounded btn-primary">
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
																		<th width="25%">Perusahaan</th>
																		<th>Lokasi</th>
																		<th width="35%">Deskripsi</th>
																		<th>Action</th>
																</tr>
														</thead>
														<tbody>
															@foreach ($data as $dt)
															<tr>
																<td>{{ $loop->iteration }}</td>
																<td width="25%">{{ $dt->nama }}</td>
																<td>{{ $dt->lokasi }}</td>
																<td width="35%">{{ $dt->deskripsi }}</td>
																<td>
																	<span class="justify-content-center">
																		<a href="javascript:void()" class="mr-2" data-toggle="tooltip" data-placement="top" title="Detail">
																			<i class="fa fa-eye color-muted"></i>
																		</a>
																		<a href="{{ route("perusahaan.edit", $dt->id) }}" class="mr-2" data-toggle="tooltip" data-placement="top" title="Edit">
																			<i class="fa fa-pencil color-muted"></i>
																		</a>
																		<a href="{{ route("perusahaan.destroy", $dt->id) }}" data-toggle="tooltip" data-placement="top" title="Hapus" data-confirm-delete="true">
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
																	<th width="25%">Perusahaan</th>
																	<th>Lokasi</th>
																	<th width="35%">Deskripsi</th>
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