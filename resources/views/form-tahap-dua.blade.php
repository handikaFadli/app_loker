@extends('layouts.main')

@section('content')
<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumbs-content">
					<h1 class="page-title">Formulir Tahap Dua</h1>
					<p>Lengkapi formulir tahap dua untuk melanjutkan proses lamaran Anda.<br>Pastikan semua informasi yang diberikan akurat dan lengkap<br>untuk memperlancar proses seleksi.</p>
				</div>
				<ul class="breadcrumb-nav">
					<li><a href="/">Home</a></li>
					<li>Formulir Tahap Dua</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Add Resume Section -->
<section class="add-resume section">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1 col-12">
				<div class="add-resume-inner box">
					<div class="post-header align-items-center justify-content-center">
						<h3>Tahap Dua</h3>
						{{-- <p>Silahkan isi data diri anda terlebih dahulu!</p> --}}
					</div>
					<form class="form-ad" action="{{ route("upload-formulir") }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-lg-12 col-12">
								<div class="form-group">
									<label class="control-label" for="formulir">Download Formulir</label>
									<div class="row justify-content-between">
										<div class="col-9">
												<input type="text" id="formulir" readonly value="Formulir.xlsx">
										</div>
										<div class="col-3 d-flex align-items-center justify-content-end">
											<a href="/download-formulir" class="btn btn-light border-1 border-dark">
												<i class="lni lni-download"></i>
												Download
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<hr>
						<div class="form-group col-md-12 col-12 mt-5 mb-5">
							<label for="formulir">Upload Formulir <span class="text-danger">*</span></label>
							@if (isset($pelamar))
							<div class="row justify-content-between">
								<div class="col-10">
										<input type="text" id="formulir_display" readonly value="{{ basename($pelamar->formulir) }}">
								</div>
								<div class="col-2">
										<button type="button" class="btn btn-light border-1 border-dark" onclick="document.getElementById('formulir_input').click();">Pilih</button>
								</div>
								<input type="file" id="formulir_input" name="formulir" accept=".xlsx, .xls" style="display: none;" onchange="updateFileDisplay('formulir_input', 'formulir_display')" />
								@error('formulir')
									<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
										*{{ $message }}
									</div>
								@enderror
							</div>
							@else
							<div class="button-group col-md-6 col-12 mt-2">
								<div class="action-buttons">
									<div class="upload-button button">
										<a href="javacript:" class="btn pointer-event">
											<i class="lni lni-upload mx-1"></i>
											Upload
										</a>
										<input id="cover_img_file_2" type="file" id="formulir" name="formulir" accept=".xlsx, .xls" />
										@error('formulir')
											<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
												*{{ $message }}
											</div>
										@enderror
									</div>
								</div>
							</div>
							@endif
							<span class="mx-1 mt-1 text-muted">File yang diunggah harus .xlsx .xls dan maksimal 2mb</span>
						</div>
						<div class="row mt-5">
							<div class="col-12 align-items-center justify-content-end d-flex">
								<div class="button">
									<button type="submit" class="btn">
										<i class="lni lni-save mx-1"></i>
										Save
									</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Add Resume Section -->
@endsection

@section('script')
		<script>
			function updateFileDisplay(inputId, displayId) {
					var fileInput = document.getElementById(inputId);
					var fileName = fileInput.files[0].name;
					document.getElementById(displayId).value = fileName;
			}
		</script>
@endsection
