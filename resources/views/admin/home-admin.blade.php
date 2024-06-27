@extends('admin.layouts.main')

@section('title')
		Admin App Loker
@endsection

@section('style')
		<!-- style input type date -->
    <link href="{{ asset('assets_admin/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
@endsection

@section('content-admin')
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
						<h2 class="card-title">Lengkapi Data Diri</h2>
				</div>
				<div class="card-body">
					<div class="basic-form">
						<form action="{{ route("lowongan.store") }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="nama_depan">Nama Depan</label>
									<span class="text-danger">*</span>
									<input type="text" class="form-control" id="nama_depan" name="nama_depan" value="{{ old('nama_depan') }}">
									@error('nama_depan')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
								<div class="form-group col-md-6">
									<label for="nama_belakang">Nama Belakang</label>
									<span class="text-danger">*</span>
									<input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="{{ old('nama_belakang') }}">
									@error('nama_belakang')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="tempat_lahir">Tempat Lahir</label>
									<span class="text-danger">*</span>
									<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
									@error('tempat_lahir')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
								<div class="form-group col-md-6">
									<label for="tanggal_lahir">Tanggal Lahir</label>
									<span class="text-danger">*</span>
									<input type="text" class="form-control" name="tanggal_lahir" id="mdate" value="{{ old('tanggal_lahir') }}">
									@error('tanggal_lahir')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-3">
									<label for="jenis_kelamin">Jenis Kelamin</label>
									<span class="text-danger">*</span>
									<select id="inlineFormCustomSelect" name="jenis_kelamin" class="form-control custom-select">
										<option value="0" hidden disabled selected>Pilih</option>
										@if (old('jenis_kelamin') == "Laki-laki")
											<option value="Laki-laki" selected>Laki-laki</option>
										@elseif (old('jenis_kelamin') == "Perempuan")
											<option value="Perempuan" selected>Perempuan</option>
										@else
											<option value="Laki-laki">Laki-laki</option>
											<option value="Perempuan">Perempuan</option>
										@endif
									</select>
									@error('jenis_kelamin')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
								<div class="form-group col-md-3">
									<label for="status">Status</label>
									<span class="text-danger">*</span>
									<input type="text" class="form-control" id="status" name="status" value="{{ old('status') }}">
									@error('status')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
								<div class="form-group col-md-6">
									<label for="tempat_tinggal">Tempat Tinggal</label>
									<span class="text-danger">*</span>
									<input type="text" class="form-control" id="tempat_tinggal" name="tempat_tinggal" value="{{ old('tempat_tinggal') }}">
									@error('tempat_tinggal')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="nomor_telepon">Nomor Telepon</label>
										<span class="text-danger">*</span>
										<input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}">
										@error('nomor_telepon')
											<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
												*{{ $message }}
											</div>
										@enderror
									</div>
									<div class="form-group">
										<label for="email">Email</label>
										<span class="text-danger">*</span>
										<input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
										@error('email')
											<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
												*{{ $message }}
											</div>
										@enderror
									</div>
									<div class="form-group">
										<label for="linkedin">Linkedin</label>
										<span class="text-danger">*</span>
										<input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ old('linkedin') }}">
										@error('linkedin')
											<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
												*{{ $message }}
											</div>
										@enderror
									</div>
								</div>
								<div class="form-group col-md-6">
									<label for="logo">Logo Perusahaan</label>
									<span class="text-danger">*</span>
									<input type="file" id="logo" class="form-control" name="logo" accept="image/*" style="display: none;" onchange="previewAndHideOverlay(event)">
									@error('logo')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
									<div class="img-output mt-1 mx-2" onclick="triggerFileInput()">
										<img src="" id="output" width="110">
										<div class="upload-overlay">
											<i class="fa fa-upload"></i>
											<p>Click to upload</p>
										</div>
									</div>
								</div>
							</div>
							<hr>
							<div class="form-row mt-4 pendidikan">
								<div class="col-md-6">
									<div class="form-group">
										<label for="nama_kampus">Kampus</label>
										<span class="text-danger">*</span>
										<input type="text" class="form-control" id="nama_kampus" name="nama_kampus" value="{{ old('nama_kampus') }}">
										@error('nama_kampus')
											<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
												*{{ $message }}
											</div>
										@enderror
									</div>
									<div class="form-group">
										<label for="jurusan">Jurusan</label>
										<span class="text-danger">*</span>
										<input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ old('jurusan') }}">
										@error('jurusan')
											<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
												*{{ $message }}
											</div>
										@enderror
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="IPK">IPK</label>
											<span class="text-danger">*</span>
											<input type="text" class="form-control" id="IPK" name="IPK" value="{{ old('IPK') }}">
											@error('IPK')
												<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
													*{{ $message }}
												</div>
											@enderror
										</div>
										<div class="form-group col-md-6">
											<label for="gelar">Gelar</label>
											<span class="text-danger">*</span>
											<input type="text" class="form-control" id="gelar" name="gelar" value="{{ old('gelar') }}">
											@error('gelar')
												<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
													*{{ $message }}
												</div>
											@enderror
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="transkip_nilai">Transkip Nilai</label>
											<span class="text-danger">*</span>
											<input type="file" class="form-control" id="transkip_nilai" name="transkip_nilai" value="{{ old('transkip_nilai') }}">
											@error('transkip_nilai')
												<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
													*{{ $message }}
												</div>
											@enderror
										</div>
										<div class="form-group col-md-6">
											<label for="ijazah">ijazah</label>
											<span class="text-danger">*</span>
											<input type="file" class="form-control" id="ijazah" name="ijazah" value="{{ old('ijazah') }}">
											@error('ijazah')
												<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
													*{{ $message }}
												</div>
											@enderror
										</div>
									</div>
								</div>
							</div>
							<div class="row mt-3 mx-1">
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
	<div class="row">
		<div class="col-lg-3 col-sm-6">
			<div class="card">
				<div class="stat-widget-two card-body">
					<div class="stat-content">
						<div class="stat-text">Today Expenses</div>
						<div class="stat-digit"><i class="fa fa-usd"></i>8500</div>
					</div>
					<div class="progress">
						<div class="progress-bar progress-bar-success w-85" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<div class="card">
				<div class="stat-widget-two card-body">
					<div class="stat-content">
						<div class="stat-text">Income Detail</div>
						<div class="stat-digit"><i class="fa fa-usd"></i>7800</div>
					</div>
					<div class="progress">
						<div class="progress-bar progress-bar-primary w-75" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<div class="card">
				<div class="stat-widget-two card-body">
					<div class="stat-content">
						<div class="stat-text">Task Completed</div>
						<div class="stat-digit"><i class="fa fa-usd"></i> 500</div>
					</div>
					<div class="progress">
						<div class="progress-bar progress-bar-warning w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<div class="card">
				<div class="stat-widget-two card-body">
					<div class="stat-content">
						<div class="stat-text">Task Completed</div>
						<div class="stat-digit"><i class="fa fa-usd"></i>650</div>
					</div>
					<div class="progress">
						<div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
			</div>
			<!-- /# card -->
		</div>
		<!-- /# column -->
	</div>
	<div class="row">
		<div class="col-xl-8 col-lg-8 col-md-8">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Sales Overview</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-xl-12 col-lg-8">
							<div id="morris-bar-chart"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-4 col-md-4">
			<div class="card">
				<div class="card-body text-center">
					<div class="m-t-10">
						<h4 class="card-title">Customer Feedback</h4>
						<h2 class="mt-3">385749</h2>
					</div>
					<div class="widget-card-circle mt-5 mb-5" id="info-circle-card">
						<i class="ti-control-shuffle pa"></i>
					</div>
					<ul class="widget-line-list m-b-15">
						<li class="border-right">
							92% <br /><span class="text-success"><i class="ti-hand-point-up"></i> Positive</span>
						</li>
						<li>
							8% <br /><span class="text-danger"><i class="ti-hand-point-down"></i>Negative</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Project</h4>
				</div>
				<div class="card-body">
					<div class="current-progress">
						<div class="progress-content py-2">
							<div class="row">
								<div class="col-lg-4">
									<div class="progress-text">Website</div>
								</div>
								<div class="col-lg-8">
									<div class="current-progressbar">
										<div class="progress">
											<div class="progress-bar progress-bar-primary w-40" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40%</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="progress-content py-2">
							<div class="row">
								<div class="col-lg-4">
									<div class="progress-text">Android</div>
								</div>
								<div class="col-lg-8">
									<div class="current-progressbar">
										<div class="progress">
											<div class="progress-bar progress-bar-primary w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="progress-content py-2">
							<div class="row">
								<div class="col-lg-4">
									<div class="progress-text">Ios</div>
								</div>
								<div class="col-lg-8">
									<div class="current-progressbar">
										<div class="progress">
											<div class="progress-bar progress-bar-primary w-70" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">70%</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="progress-content py-2">
							<div class="row">
								<div class="col-lg-4">
									<div class="progress-text">Mobile</div>
								</div>
								<div class="col-lg-8">
									<div class="current-progressbar">
										<div class="progress">
											<div class="progress-bar progress-bar-primary w-90" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90%</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<div class="testimonial-widget-one p-17">
						<div class="testimonial-widget-one owl-carousel owl-theme">
							<div class="item">
								<div class="testimonial-content">
									<div class="testimonial-text">
										<i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. consectetur adipisicing elit.
										<i class="fa fa-quote-right"></i>
									</div>
									<div class="media">
										<div class="media-body">
											<div class="testimonial-author">TYRION LANNISTER</div>
											<div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>
										</div>
										<img class="testimonial-author-img ml-3" src="./images/avatar/1.png" alt="" />
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimonial-content">
									<div class="testimonial-text">
										<i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. consectetur adipisicing elit.
										<i class="fa fa-quote-right"></i>
									</div>
									<div class="media">
										<div class="media-body">
											<div class="testimonial-author">TYRION LANNISTER</div>
											<div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>
										</div>
										<img class="testimonial-author-img ml-3" src="./images/avatar/1.png" alt="" />
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimonial-content">
									<div class="testimonial-text">
										<i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. consectetur adipisicing elit.
										<i class="fa fa-quote-right"></i>
									</div>
									<div class="media">
										<div class="media-body">
											<div class="testimonial-author">TYRION LANNISTER</div>
											<div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>
										</div>
										<img class="testimonial-author-img ml-3" src="./images/avatar/1.png" alt="" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Web Server</h4>
				</div>
				<div class="card-body">
					<div class="cpu-load-chart">
						<div id="cpu-load" class="cpu-load"></div>
					</div>
				</div>
			</div>
			<!-- /# card -->
		</div>
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Country</h4>
				</div>
				<div class="card-body">
					<div id="vmap13" class="vmap"></div>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">New Orders</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table mb-0">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Product</th>
									<th>quantity</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<div class="round-img">
											<a href=""><img width="35" src="./images/avatar/1.png" alt="" /></a>
										</div>
									</td>
									<td>Lew Shawon</td>
									<td><span>Dell-985</span></td>
									<td><span>456 pcs</span></td>
									<td><span class="badge badge-success">Done</span></td>
								</tr>
								<tr>
									<td>
										<div class="round-img">
											<a href=""><img width="35" src="./images/avatar/1.png" alt="" /></a>
										</div>
									</td>
									<td>Lew Shawon</td>
									<td><span>Asus-565</span></td>
									<td><span>456 pcs</span></td>
									<td><span class="badge badge-warning">Pending</span></td>
								</tr>
								<tr>
									<td>
										<div class="round-img">
											<a href=""><img width="35" src="./images/avatar/1.png" alt="" /></a>
										</div>
									</td>
									<td>lew Shawon</td>
									<td><span>Dell-985</span></td>
									<td><span>456 pcs</span></td>
									<td><span class="badge badge-success">Done</span></td>
								</tr>

								<tr>
									<td>
										<div class="round-img">
											<a href=""><img width="35" src="./images/avatar/1.png" alt="" /></a>
										</div>
									</td>
									<td>Lew Shawon</td>
									<td><span>Asus-565</span></td>
									<td><span>456 pcs</span></td>
									<td><span class="badge badge-warning">Pending</span></td>
								</tr>
								<tr>
									<td>
										<div class="round-img">
											<a href=""><img width="35" src="./images/avatar/1.png" alt="" /></a>
										</div>
									</td>
									<td>lew Shawon</td>
									<td><span>Dell-985</span></td>
									<td><span>456 pcs</span></td>
									<td><span class="badge badge-success">Done</span></td>
								</tr>

								<tr>
									<td>
										<div class="round-img">
											<a href=""><img width="35" src="./images/avatar/1.png" alt="" /></a>
										</div>
									</td>
									<td>Lew Shawon</td>
									<td><span>Asus-565</span></td>
									<td><span>456 pcs</span></td>
									<td><span class="badge badge-warning">Pending</span></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6 col-xl-4 col-xxl-6 col-md-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Timeline</h4>
				</div>
				<div class="card-body">
					<div class="widget-timeline">
						<ul class="timeline">
							<li>
								<div class="timeline-badge primary"></div>
								<a class="timeline-panel text-muted" href="#">
									<span>10 minutes ago</span>
									<h6 class="m-t-5">Youtube, a video-sharing website, goes live.</h6>
								</a>
							</li>

							<li>
								<div class="timeline-badge warning"></div>
								<a class="timeline-panel text-muted" href="#">
									<span>20 minutes ago</span>
									<h6 class="m-t-5">Mashable, a news website and blog, goes live.</h6>
								</a>
							</li>

							<li>
								<div class="timeline-badge danger"></div>
								<a class="timeline-panel text-muted" href="#">
									<span>30 minutes ago</span>
									<h6 class="m-t-5">Google acquires Youtube.</h6>
								</a>
							</li>

							<li>
								<div class="timeline-badge success"></div>
								<a class="timeline-panel text-muted" href="#">
									<span>15 minutes ago</span>
									<h6 class="m-t-5">StumbleUpon is acquired by eBay.</h6>
								</a>
							</li>

							<li>
								<div class="timeline-badge warning"></div>
								<a class="timeline-panel text-muted" href="#">
									<span>20 minutes ago</span>
									<h6 class="m-t-5">Mashable, a news website and blog, goes live.</h6>
								</a>
							</li>

							<li>
								<div class="timeline-badge dark"></div>
								<a class="timeline-panel text-muted" href="#">
									<span>20 minutes ago</span>
									<h6 class="m-t-5">Mashable, a news website and blog, goes live.</h6>
								</a>
							</li>

							<li>
								<div class="timeline-badge info"></div>
								<a class="timeline-panel text-muted" href="#">
									<span>30 minutes ago</span>
									<h6 class="m-t-5">Google acquires Youtube.</h6>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-xxl-6 col-lg-6 col-md-6 col-sm-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Todo</h4>
				</div>
				<div class="card-body px-0">
					<div class="todo-list">
						<div class="tdl-holder">
							<div class="tdl-content widget-todo mr-4">
								<ul id="todo_list">
									<li>
										<label><input type="checkbox" /><i></i><span>Get up</span><a href="#" class="ti-trash"></a></label>
									</li>
									<li>
										<label><input type="checkbox" checked /><i></i><span>Stand up</span><a href="#" class="ti-trash"></a></label>
									</li>
									<li>
										<label><input type="checkbox" /><i></i><span>Don't give up the fight.</span><a href="#" class="ti-trash"></a></label>
									</li>
									<li>
										<label><input type="checkbox" checked /><i></i><span>Do something else</span><a href="#" class="ti-trash"></a></label>
									</li>
									<li>
										<label><input type="checkbox" checked /><i></i><span>Stand up</span><a href="#" class="ti-trash"></a></label>
									</li>
									<li>
										<label><input type="checkbox" /><i></i><span>Don't give up the fight.</span><a href="#" class="ti-trash"></a></label>
									</li>
								</ul>
							</div>
							<div class="px-4">
								<input type="text" class="tdl-new form-control" placeholder="Write new item and hit 'Enter'..." />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-12 col-xxl-6 col-xl-4 col-lg-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Product Sold</h4>
					<div class="card-action">
						<div class="dropdown custom-dropdown">
							<div data-toggle="dropdown">
								<i class="ti-more-alt"></i>
							</div>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="#">Option 1</a>
								<a class="dropdown-item" href="#">Option 2</a>
								<a class="dropdown-item" href="#">Option 3</a>
							</div>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="chart py-4">
						<canvas id="sold-product"></canvas>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-12 col-xxl-6 col-lg-6 col-md-12">
			<div class="row">
				<div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6 col-md-6">
					<div class="card">
						<div class="social-graph-wrapper widget-facebook">
							<span class="s-icon"><i class="fa fa-facebook"></i></span>
						</div>
						<div class="row">
							<div class="col-6 border-right">
								<div class="pt-3 pb-3 pl-0 pr-0 text-center">
									<h4 class="m-1"><span class="counter">89</span> k</h4>
									<p class="m-0">Friends</p>
								</div>
							</div>
							<div class="col-6">
								<div class="pt-3 pb-3 pl-0 pr-0 text-center">
									<h4 class="m-1"><span class="counter">119</span> k</h4>
									<p class="m-0">Followers</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6 col-md-6">
					<div class="card">
						<div class="social-graph-wrapper widget-linkedin">
							<span class="s-icon"><i class="fa fa-linkedin"></i></span>
						</div>
						<div class="row">
							<div class="col-6 border-right">
								<div class="pt-3 pb-3 pl-0 pr-0 text-center">
									<h4 class="m-1"><span class="counter">89</span> k</h4>
									<p class="m-0">Friends</p>
								</div>
							</div>
							<div class="col-6">
								<div class="pt-3 pb-3 pl-0 pr-0 text-center">
									<h4 class="m-1"><span class="counter">119</span> k</h4>
									<p class="m-0">Followers</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6 col-md-6">
					<div class="card">
						<div class="social-graph-wrapper widget-googleplus">
							<span class="s-icon"><i class="fa fa-google-plus"></i></span>
						</div>
						<div class="row">
							<div class="col-6 border-right">
								<div class="pt-3 pb-3 pl-0 pr-0 text-center">
									<h4 class="m-1"><span class="counter">89</span> k</h4>
									<p class="m-0">Friends</p>
								</div>
							</div>
							<div class="col-6">
								<div class="pt-3 pb-3 pl-0 pr-0 text-center">
									<h4 class="m-1"><span class="counter">119</span> k</h4>
									<p class="m-0">Followers</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6 col-md-6">
					<div class="card">
						<div class="social-graph-wrapper widget-twitter">
							<span class="s-icon"><i class="fa fa-twitter"></i></span>
						</div>
						<div class="row">
							<div class="col-6 border-right">
								<div class="pt-3 pb-3 pl-0 pr-0 text-center">
									<h4 class="m-1"><span class="counter">89</span> k</h4>
									<p class="m-0">Friends</p>
								</div>
							</div>
							<div class="col-6">
								<div class="pt-3 pb-3 pl-0 pr-0 text-center">
									<h4 class="m-1"><span class="counter">119</span> k</h4>
									<p class="m-0">Followers</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-12 col-xxl-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Form step</h4>
				</div>
				<div class="card-body">
					<form action="#" id="step-form-horizontal" class="step-form-horizontal">
						<div>
							<h4>Personal Info</h4>
							<section>
								<div class="row">
									<div class="col-lg-6 mb-4">
										<div class="form-group">
											<label class="text-label">First Name*</label>
											<input type="text" name="firstName" class="form-control" placeholder="Parsley" required />
										</div>
									</div>
									<div class="col-lg-6 mb-4">
										<div class="form-group">
											<label class="text-label">Last Name*</label>
											<input type="text" name="lastName" class="form-control" placeholder="Montana" required />
										</div>
									</div>
									<div class="col-lg-12 mb-4">
										<div class="form-group">
											<label class="text-label">Email Address*</label>
											<div class="input-group">
												<input type="email" class="form-control" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="example@example.com.com" required />
											</div>
										</div>
									</div>
									<div class="col-lg-12 mb-4">
										<div class="form-group">
											<label class="text-label">Phone Number*</label>
											<div class="input-group">
												<input type="text" name="phoneNumber" class="form-control" placeholder="(+1)408-657-9007" required />
											</div>
										</div>
									</div>
									<div class="col-lg-12 mb-4">
										<div class="form-group">
											<label class="text-label">Where are you from*</label>
											<input type="text" name="place" class="form-control" required />
										</div>
									</div>
								</div>
							</section>
							<h4>Company Info</h4>
							<section>
								<div class="row">
									<div class="col-lg-12 mb-4">
										<div class="form-group">
											<label class="text-label">Company Name*</label>
											<input type="text" name="firstName" class="form-control" placeholder="Cellophane Square" required />
										</div>
									</div>
									<div class="col-lg-12 mb-4">
										<div class="form-group">
											<label class="text-label">Company Email Address*</label>
											<div class="input-group">
												<input type="email" class="form-control" id="emial1" placeholder="example@example.com.com" required />
											</div>
										</div>
									</div>
									<div class="col-lg-12 mb-4">
										<div class="form-group">
											<label class="text-label">Company Phone Number*</label>
											<div class="input-group">
												<input type="text" name="phoneNumber" class="form-control" placeholder="(+1)408-657-9007" required />
											</div>
										</div>
									</div>
									<div class="col-lg-12 mb-4">
										<div class="form-group">
											<label class="text-label">Your position in Company*</label>
											<input type="text" name="place" class="form-control" required />
										</div>
									</div>
								</div>
							</section>
							<h4>Business Hours</h4>
							<section>
								<div class="row">
									<div class="col-4 col-sm-3 mb-4">
										<h4>Monday *</h4>
									</div>
									<div class="col-4 col-sm-3 mb-4">
										<div class="form-group">
											<input class="form-control" value="9.00" type="number" name="input1" id="input1" />
										</div>
									</div>
									<div class="col-4 col-sm-3 mb-4">
										<div class="form-group">
											<input class="form-control" value="6.00" type="number" name="input2" id="input2" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-4 col-sm-3 mb-4">
										<h4>Tuesday *</h4>
									</div>
									<div class="col-4 col-sm-3 mb-4">
										<div class="form-group">
											<input class="form-control" value="9.00" type="number" name="input3" id="input3" />
										</div>
									</div>
									<div class="col-4 col-sm-3 mb-4">
										<div class="form-group">
											<input class="form-control" value="6.00" type="number" name="input4" id="input4" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-4 col-sm-3 mb-4">
										<h4>Wednesday *</h4>
									</div>
									<div class="col-4 col-sm-3 mb-4">
										<div class="form-group">
											<input class="form-control" value="9.00" type="number" name="input5" id="input5" />
										</div>
									</div>
									<div class="col-4 col-sm-3 mb-4">
										<div class="form-group">
											<input class="form-control" value="6.00" type="number" name="input6" id="input6" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-4 col-sm-3 mb-4">
										<h4>Thrusday *</h4>
									</div>
									<div class="col-4 col-sm-3 mb-4">
										<div class="form-group">
											<input class="form-control" value="9.00" type="number" name="input7" id="input7" />
										</div>
									</div>
									<div class="col-4 col-sm-3 mb-4">
										<div class="form-group">
											<input class="form-control" value="6.00" type="number" name="input8" id="input8" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-4 col-sm-3 mb-4">
										<h4>Friday *</h4>
									</div>
									<div class="col-4 col-sm-3 mb-4">
										<div class="form-group">
											<input class="form-control" value="9.00" type="number" name="input9" id="input9" />
										</div>
									</div>
									<div class="col-4 col-sm-3 mb-4">
										<div class="form-group">
											<input class="form-control" value="6.00" type="number" name="input10" id="input10" />
										</div>
									</div>
								</div>
							</section>
							<h4>Email Setup</h4>
							<section>
								<div class="row emial-setup">
									<div class="col-sm-3 col-6">
										<div class="form-group">
											<label for="mailclient11" class="mailclinet mailclinet-gmail">
												<input type="radio" name="emailclient" id="mailclient11" />
												<span class="mail-icon">
													<i class="mdi mdi-google-plus" aria-hidden="true"></i>
												</span>
												<span class="mail-text">I'm using Gmail</span>
											</label>
										</div>
									</div>
									<div class="col-sm-3 col-6">
										<div class="form-group">
											<label for="mailclient12" class="mailclinet mailclinet-office">
												<input type="radio" name="emailclient" id="mailclient12" />
												<span class="mail-icon">
													<i class="mdi mdi-office" aria-hidden="true"></i>
												</span>
												<span class="mail-text">I'm using Office</span>
											</label>
										</div>
									</div>
									<div class="col-sm-3 col-6">
										<div class="form-group">
											<label for="mailclient13" class="mailclinet mailclinet-drive">
												<input type="radio" name="emailclient" id="mailclient13" />
												<span class="mail-icon">
													<i class="mdi mdi-google-drive" aria-hidden="true"></i>
												</span>
												<span class="mail-text">I'm using Drive</span>
											</label>
										</div>
									</div>
									<div class="col-sm-3 col-6">
										<div class="form-group">
											<label for="mailclient14" class="mailclinet mailclinet-another">
												<input type="radio" name="emailclient" id="mailclient14" />
												<span class="mail-icon">
													<i class="fa fa-question-circle-o" aria-hidden="true"></i>
												</span>
												<span class="mail-text">Another Service</span>
											</label>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-12">
										<div class="skip-email text-center">
											<p>Or if want skip this step entirely and setup it later</p>
											<a href="javascript:void()">Skip step</a>
										</div>
									</div>
								</div>
							</section>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


@section('script')

	<!-- Input type Date -->
	<script src="{{ asset('assets_admin/vendor/moment/moment.min.js') }}"></script>
	<script src="{{ asset('assets_admin/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
	<script src="{{ asset('assets_admin/js/plugins-init/material-date-picker-init.js') }}"></script>
	<script>
		function getTodayDate() {
			let today = new Date();
			let dd = String(today.getDate()).padStart(2, '0');
			let mm = String(today.getMonth() + 1).padStart(2, '0');
			let yyyy = today.getFullYear();

			return yyyy + '-' + mm + '-' + dd;
		}

		document.addEventListener("DOMContentLoaded", function() {
			let todayDate = getTodayDate();
			document.getElementById("mdate").setAttribute("placeholder", todayDate);
		});
	</script>

	<!-- Input type File -->
	<script>
		function triggerFileInput() {
				document.getElementById('gambar').click();
		}

		function previewAndHideOverlay(event) {
				let input = event.target;
				let output = document.getElementById('output');
				let overlay = input.parentElement.querySelector('.upload-overlay');

				if (input.files && input.files[0]) {
						let reader = new FileReader();
						reader.onload = function(e) {
								output.src = e.target.result;
								// Mengubah style overlay menjadi none saat gambar dipilih
								overlay.style.display = 'none';
						}
						reader.readAsDataURL(input.files[0]);
				}
		}

		document.getElementById('gambar').addEventListener('change', function() {
				let overlay = this.parentElement.querySelector('.upload-overlay');
				overlay.style.display = 'none';
		});

	</script>

	<!-- Trix Editor -->
	<script>
		document.addEventListener('trix-file-accept', function(e){
						e.preventDefault();
				})
	</script>

@endsection