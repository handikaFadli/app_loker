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
								</div>
								<div class="card-body">
										<div class="table-responsive">
												<table id="example" class="display" style="min-width: 845px">
														<thead>
																<tr>
																		<th>No</th>
																		<th>Nama</th>
																		<th>TTL</th>
																		<th>Umur</th>
																		<th>Email</th>
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
																<td>{{ $dt->nama ? $dt->nama : '-' }}</td>
																<td>{{ $dt->tempat_lahir ? $dt->tempat_lahir .', '. \Carbon\Carbon::parse($dt->tanggal_lahir)->translatedFormat('d F Y') : '-' }}</td>
																<td>{{ $dt->umur ? $dt->umur . ' tahun' : '-' }}</td>
																<td>{{ $dt->email }}</td>
																<td>
																	<div class="dropdown">
																	<button type="button" class="btn btn-sm btn-outline-primary btn-rounded dropdown-toggle" data-toggle="dropdown">
																			Aksi
																	</button>
																	<div class="dropdown-menu dropdown-menu-right">
																		<a href="{{ route("pelamar.show", $dt->id) }}" class="dropdown-item text-muted">
																			Detail
																		</a>
																		@can('admin')
																		<a href="{{ route("pelamar.edit", $dt->id) }}" class="dropdown-item text-muted">
																			Edit
																		</a>
																		<a href="{{ route('pelamar.destroy', $dt->id) }}" class="dropdown-item text-muted" data-confirm-delete="true">
																			Hapus
																		</a>
																		@endcan
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

@endsection