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

		<div class="row">
				<div class="col-12">
						<div class="card">
								<div class="card-header justify-content-between">
										<h4 class="card-title">Daftar</h4>
										<a href="{{ route('lowongan.create') }}" class="btn btn-sm btn-rounded btn-primary">
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
																		<th>Kategori</th>
																		<th>Tipe</th>
																		<th>Batas Akhir</th>
																		<th>Status</th>
																		<th>Aksi</th>
																</tr>
														</thead>
														<tbody>
															@php
																	\Carbon\Carbon::setLocale('id');
															@endphp
															@foreach ($data as $dt)
															<tr>
																<td>{{ $loop->iteration }}</td>
																<td>{{ $dt->judul }}</td>
																<td>{{ ucwords($dt->kategori) }}</td>
																<td>{{ ucwords($dt->tipe) }}</td>
																<td>{{ \Carbon\Carbon::parse($dt->batas_akhir)->translatedFormat('d F Y') }}</td>
																<td>
																		<button class="btn btn-sm btn-outline-primary btn-rounded" data-toggle="modal" data-target="#update-status-{{ $dt->id }}">{{ ucwords($dt->status) }}</button>
																</td>
																<td>
																	<div class="dropdown">
																		<button type="button" class="btn btn-sm btn-outline-primary btn-rounded dropdown-toggle" data-toggle="dropdown">
																				Aksi
																		</button>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a href="{{ route("lowongan.show", $dt->id) }}" class="dropdown-item text-muted">
																				Detail
																			</a>
																			<a href="{{ route("lowongan.edit", $dt->id) }}" class="dropdown-item text-muted">
																				Edit
																			</a>
																			<a href="{{ route('lowongan.destroy', $dt->id) }}" class="dropdown-item text-muted" data-confirm-delete="true">
																				Hapus
																			</a>
																		</div>
																	</div>
																</td>
															</tr>
															@endforeach
														</tbody>
												</table>
										</div>
								</div>
						</div>
				</div>
		</div>
	</div>

	@foreach ($data as $dtlow)
  	@include('admin.lowongan.modal')
	@endforeach
@endsection