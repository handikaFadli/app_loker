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
									<h4 class="card-title">Daftar Lamaran Pada Tahap Dua</h4>
							</div>
							<div class="card-body">
									<div class="table-responsive">
											<table id="example" class="display" style="min-width: 845px">
													<thead>
															<tr>
																	<th>No</th>
																	<th width=5></th>
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
															<td class="text-center">
																<a href="{{ route("lamaran.show", $dt->id) }}" data-toggle="tooltip" data-placement="top" title="Detail">
																	<i class="fa fa-info-circle color-muted"></i> Check
																</a>
															</td>
															<td>{{ $dt->pelamar->nama }}</td>
															<td>{{ $dt->lowongan->judul }}</td>
															<td>{{ $dt->status_lamaran }}</td>
															<td>
																<span class="justify-content-center">
																	<a href="javascript:void()" class="btn btn-rounded btn-outline-success btn-md mx-1" data-toggle="modal" data-target="#update-{{ $dt->id }}">
																		<span style="font-size: 15px">&check;</span>
																	</a>
																	<a href="javascript:void()" class="btn btn-rounded btn-outline-danger btn-md mx-1" data-toggle="modal" data-target="#tolak-{{ $dt->id }}">
																		<span style="font-size: 15px">X</span>
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
	@foreach ($data as $dtlm)
  	@include('admin.lamaran.modal')
	@endforeach
@endsection