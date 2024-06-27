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
																	<th>Pelamar</th>
																	<th>Lowongan</th>
																	<th>Status</th>
																	<th>Action</th>
															</tr>
													</thead>
													<tbody>
														@foreach ($data as $dt)
														<tr>
															<td>{{ $loop->iteration }} </td>
															<td>{{ $dt->pelamar->nama }}</td>
															<td>{{ $dt->lowongan->judul }}</td>
															<td>{{ $dt->status_lamaran }}</td>
															<td>
																<span class="justify-content-center">
																	<a href="/admin/lamaran/detail/{{ $dt->id }}" data-toggle="tooltip" data-placement="top" title="Detail">
																		<i class="fa fa-info-circle color-muted"></i> Detail
																	</a>
																</span>
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