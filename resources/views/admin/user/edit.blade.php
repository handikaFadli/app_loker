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
								<span>Ubah {{ $title }}</span>
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
								<h4 class="card-title">Form Ubah Data</h4>
						</div>
						<div class="card-body">
								<div class="basic-form">
										<form action="{{ route('kelola-user.update', $user->id) }}" method="POST">
											@method('PUT')
											@csrf
												<div class="form-group row">
														<label class="col-sm-2 col-form-label">Email</label>
														<div class="col-sm-10">
																<input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
																@error('email')
																	<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
																		*{{ $message }}
																	</div>
																@enderror
														</div>
												</div>
												<div class="form-group row">
														<label class="col-sm-2 col-form-label">New Password</label>
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
																				<input class="form-check-input" type="radio" name="role" value="{{ $user->role }}" checked="" disabled>
																				<label class="form-check-label">
																					{{ ucwords($user->role) }}
																				</label>
																		</div>
																		<div class="form-check">
																			<input class="form-check-input" type="radio" name="role" value="Admin">
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