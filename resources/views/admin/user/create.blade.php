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
								<span>Tambah {{ $title }}</span>
						</div>
				</div>
				<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
						<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
								<li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $title }}</a></li>
						</ol>
				</div>
		</div>
		<!-- row -->

		<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
								<h4 class="card-title">Form Tambah Data</h4>
						</div>
						<div class="card-body">
								<div class="basic-form">
										<form action="{{ route('kelola-user.store') }}" method="POST">
											@csrf
												<div class="form-group row">
														<label class="col-sm-2 col-form-label">Email</label>
														<div class="col-sm-10">
																<input type="email" name="email" class="form-control" placeholder="Email">
																@error('email')
																	<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
																		*{{ $message }}
																	</div>
																@enderror
														</div>
												</div>
												<div class="form-group row">
														<label class="col-sm-2 col-form-label">Password</label>
														<div class="col-sm-10">
																<input type="password" name="password" class="form-control" placeholder="Password">
																@error('password')
																	<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
																		*{{ $message }}
																	</div>
																@enderror
														</div>
												</div>
												<fieldset class="form-group">
														<div class="row">
																<label class="col-form-label col-sm-2 pt-0">Role</label>
																<div class="col-sm-10">
																		<div class="form-check">
																				<input class="form-check-input" type="radio" name="role" value="admin" checked="">
																				<label class="form-check-label">
																						Admin
																				</label>
																		</div>
																		<div class="form-check">
																				<input class="form-check-input" type="radio" name="role" value="dekan">
																				<label class="form-check-label">
																						Dekan
																				</label>
																		</div>
																		<div class="form-check">
																			<input class="form-check-input" type="radio" name="role" value="kaprodi">
																			<label class="form-check-label">
																					Kaprodi
																			</label>
																		</div>
																		<div class="form-check">
																			<input class="form-check-input" type="radio" name="role" value="pelamar">
																			<label class="form-check-label">
																					Pelamar
																			</label>
																		</div>
																</div>
														</div>
												</fieldset>
												<div class="form-group row mt-4 mx-1">
													<a href="/admin/kelola-user" class="btn btn-rounded btn-light">
															Back
													</a>
													<button type="submit" class="btn btn-rounded btn-primary ml-2">
															Save
													</button>
												</div>
										</form>
								</div>
						</div>
					</div>
				</div>
		</div>
	</div>
@endsection