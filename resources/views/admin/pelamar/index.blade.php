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
								</div>
								<div class="card-body">
										<div class="table-responsive">
												<table id="example" class="display" style="min-width: 845px">
														<thead>
																<tr>
																		<th>No</th>
																		<th>Nama</th>
																		<th>Tanggal Lahir</th>
																		<th>Umur</th>
																		<th>Status</th>
																		<th>Action</th>
																</tr>
														</thead>
														<tbody>
															@foreach ($data as $dt)
															<tr>
																<td>{{ $loop->iteration }}</td>
																<td>{{ $dt->nama }}</td>
																<td>{{ $dt->tanggal_lahir }}</td>
																<td>{{ $dt->umur }}</td>
																<td>{{ $dt->status }}</td>
																<td>
																	<span class="justify-content-center">
																		<a href="javascript:void()" class="mr-2" data-toggle="modal" data-target="#detail-{{ $dt->id }}">
																			<i class="fa fa-eye color-muted"></i>
																		</a>
																		<a href="{{ route("pelamar.edit", $dt->id) }}" class="mr-2" data-toggle="tooltip" data-placement="top" title="Edit">
																			<i class="fa fa-pencil color-muted"></i>
																		</a>
																		<a href="{{ route("pelamar.destroy", $dt->id) }}" data-toggle="tooltip" data-placement="top" title="Hapus" data-confirm-delete="true">
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
																	<th>Nama</th>
																	<th>Tanggal Lahir</th>
																	<th>Umur</th>
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