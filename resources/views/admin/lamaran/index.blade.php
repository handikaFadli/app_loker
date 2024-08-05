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
									<h4 class="card-title">Daftar Riwayat Lamaran</h4>
									<a href="{{ route('lamaran.print') }}" target="_blank" class="btn btn-sm btn-rounded btn-primary">
										<span class="btn-icon-left text-primary">
											<i class="fa fa-print"></i>
										</span>
										Print
									</a>
							</div>
							<div class="card-body">
									<div class="table-responsive">
											<table id="example" class="display" style="min-width: 845px">
													<thead>
															<tr>
																	<th>No</th>
																	<th>Pelamar</th>
																	<th>Lowongan</th>
																	<th>Status</th>
																	<th>Waktu</th>
																	<th>Aksi</th>
															</tr>
													</thead>
													<tbody>
														@foreach ($data as $dt)
														<tr>
															<td>{{ $loop->iteration }} </td>
															<td>{{ ucwords($dt->pelamar->nama) }}</td>
															<td>{{ $dt->lowongan->judul }}</td>
															<td>{{ ucwords($dt->status_lamaran) }}</td>
															<td>{{ \Carbon\Carbon::parse($dt->updated_at)->format('d-m-Y, H.i') }}</td>
															<td>
																<div class="dropdown">
																	<button type="button" class="btn btn-sm btn-outline-primary btn-rounded dropdown-toggle" data-toggle="dropdown">
																			Aksi
																	</button>
																	<div class="dropdown-menu dropdown-menu-right">
																		<a href="/admin/lamaran/detail/{{ $dt->id }}" class="dropdown-item text-muted">
																			Detail
																		</a>
																		@can('admin')
																			<a href="javascript:void()" class="dropdown-item text-muted" data-toggle="modal" data-target="#edit-{{ $dt->id }}">
																				Edit
																			</a>
																			<a href="{{ route('lamaran.destroy', $dt->id) }}" class="dropdown-item text-muted" data-confirm-delete="true">
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
	@foreach ($data as $dtlm)
  	@include('admin.lamaran.modal')
	@endforeach
@endsection