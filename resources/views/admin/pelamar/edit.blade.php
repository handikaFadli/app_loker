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
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
						<h2 class="card-title">Lengkapi Data Diri</h2>
				</div>
				<div class="card-body">
					<div class="basic-form">
						<form action="{{ route("pelamar.update", $pelamar->id) }}" method="POST" enctype="multipart/form-data">
							@method('PUT')
							@csrf
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="nama">Nama Lengkap</label>
									<span class="text-danger">*</span>
									<input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $pelamar->nama) }}">
									@error('nama')
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
									<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $pelamar->tempat_lahir) }}">
									@error('tempat_lahir')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
								<div class="form-group col-md-6">
									<label for="tanggal_lahir">Tanggal Lahir</label>
									<span class="text-danger">*</span>
									<input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pelamar->tanggal_lahir) }}">
									@error('tanggal_lahir')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="tempat_tinggal">Tempat Tinggal</label>
									<span class="text-danger">*</span>
									<input type="text" class="form-control" id="tempat_tinggal" name="tempat_tinggal" value="{{ old('tempat_tinggal', $pelamar->tempat_tinggal) }}">
									@error('tempat_tinggal')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="jenis_kelamin">Jenis Kelamin</label>
									<span class="text-danger">*</span>
									<select id="inlineFormCustomSelect" name="jenis_kelamin" class="form-control custom-select">
										@if (old('jenis_kelamin', $pelamar->jenis_kelamin) == $pelamar->jenis_kelamin)
										<option value="{{ $pelamar->jenis_kelamin }}" hidden selected>{{ $pelamar->jenis_kelamin }}</option>
										@else
										<option value="{{ $pelamar->jenis_kelamin }}" hidden selected>{{ $pelamar->jenis_kelamin }}</option>
										@endif
										<option value="Laki-laki">Laki-laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
									@error('jenis_kelamin')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
								<div class="form-group col-md-6">
									<label for="status">Status</label>
									<span class="text-danger">*</span>
									<input type="text" class="form-control" id="status" name="status" value="{{ old('status', $pelamar->status) }}">
									@error('status')
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
										<input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon', $pelamar->nomor_telepon) }}">
										@error('nomor_telepon')
											<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
												*{{ $message }}
											</div>
										@enderror
									</div>
									<div class="form-group">
										<label for="linkedin">Linkedin</label>
										<span class="text-danger">*</span>
										<input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ old('linkedin', $pelamar->linkedin) }}">
										@error('linkedin')
											<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
												*{{ $message }}
											</div>
										@enderror
									</div>
									<div class="form-group">
										<label for="instagram">Instagram</label>
										<span class="text-danger">*</span>
										<input type="text" class="form-control" id="instagram" name="instagram" value="{{ old('instagram', $pelamar->instagram) }}">
										@error('instagram')
											<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
												*{{ $message }}
											</div>
										@enderror
									</div>
								</div>
								<div class="form-group col-md-6">
									<label for="foto">Foto</label>
									<span class="text-danger">*</span>
									<input type="file" id="foto" class="form-control" name="foto" accept="image/*" style="display: none;" onchange="previewAndHideOverlay(event)">
									<div class="img-output mt-1 mx-2" onclick="triggerFileInput()">
										<img src="{{ $pelamar->foto ? $pelamar->foto : asset('media/default.png') }}" id="output" width="110">
									</div>
									<span class="mx-2 mt-1 text-muted">File yang dapat diunggah jpg, jpeg, svg, png, dan webp</span>
									@error('foto')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
							</div>
							<hr>
							<div class="form-pendidikan-wrapper" id="form-pendidikan-wrapper">
								@forelse ($pelamar->pendidikan as $pendidikan)
								<div class="form-row mt-4 form-pendidikan">
									<input type="hidden" class="form-control" id="id" name="pendidikan[{{ $loop->index }}][id]" value="{{ $pendidikan->id }}" />

									<div class="col-md-6">
										<div class="form-group">
											<label for="perguruan_tinggi">Perguruan Tinggi</label>
											<span class="text-danger">*</span>
											<input type="text" class="form-control" id="perguruan_tinggi" name="pendidikan[{{ $loop->index }}][perguruan_tinggi]" value="{{ $pendidikan->perguruan_tinggi }}">
											@error('perguruan_tinggi')
												<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
													*{{ $message }}
												</div>
											@enderror
										</div>
										<div class="form-group">
											<label for="bidang_studi">Bidang Studi</label>
											<span class="text-danger">*</span>
											<input type="text" class="form-control" id="bidang_studi" name="pendidikan[{{ $loop->index }}][bidang_studi]" value="{{ $pendidikan->bidang_studi }}">
											@error('bidang_studi')
												<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
													*{{ $message }}
												</div>
											@enderror
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="ipk">IPK</label>
												<span class="text-danger">*</span>
												<input type="text" class="form-control" id="ipk" name="pendidikan[{{ $loop->index }}][ipk]" value="{{ $pendidikan->ipk }}">
												@error('ipk')
													<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
														*{{ $message }}
													</div>
												@enderror
											</div>
											<div class="form-group col-md-6">
												<label for="gelar">Gelar</label>
												<span class="text-danger">*</span>
												<input type="text" class="form-control" id="gelar" name="pendidikan[{{ $loop->index }}][gelar]" value="{{ $pendidikan->gelar }}">
												@error('gelar')
													<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
														*{{ $message }}
													</div>
												@enderror
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="mulai">Dari</label>
												<span class="text-danger">*</span>
												<input type="text" class="form-control" id="mulai" name="pendidikan[{{ $loop->index }}][mulai]" value="{{ $pendidikan->mulai }}">
												@error('mulai')
													<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
														*{{ $message }}
													</div>
												@enderror
											</div>
											<div class="form-group col-md-6">
												<label for="selesai">Ke</label>
												<span class="text-danger">*</span>
												<input type="text" class="form-control" id="selesai" name="pendidikan[{{ $loop->index }}][selesai]" value="{{ $pendidikan->selesai }}">
												@error('selesai')
													<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
														*{{ $message }}
													</div>
												@enderror
											</div>
										</div>
									</div>
									<div class="form-group col-md-12">
										<label for="transkip_nilai">Transkip Nilai</label>
										<div class="row justify-content-between">
											<div class="col-10">
													<input type="text" class="form-control" id="transkip_display_{{ $pendidikan->id }}" readonly value="{{ basename($pendidikan->transkip_nilai) }}">
											</div>
											<div class="col-2">
													<button type="button" class="btn btn-light border-1 border-dark" onclick="document.getElementById('transkip_input_{{ $pendidikan->id }}').click();">Ganti File</button>
											</div>
											<input type="file" id="transkip_input_{{ $pendidikan->id }}" name="pendidikan[{{ $loop->index }}][transkip_nilai]" accept="application/pdf" style="display: none;" onchange="updateFileDisplay('transkip_input_{{ $pendidikan->id }}', 'transkip_display_{{ $pendidikan->id }}')" />
										</div>
									</div>
									<div class="form-group col-md-12">
										<label for="ijazah">Ijazah</label>
										<div class="row justify-content-between">
											<div class="col-10">
													<input type="text" class="form-control" id="ijazah_display_{{ $pendidikan->id }}" readonly value="{{ basename($pendidikan->ijazah) }}">
											</div>
											<div class="col-2">
													<button type="button" class="btn btn-light border-1 border-dark" onclick="document.getElementById('ijazah_input_{{ $pendidikan->id }}').click();">Ganti File</button>
											</div>
											<input type="file" id="ijazah_input_{{ $pendidikan->id }}" name="pendidikan[{{ $loop->index }}][ijazah]" accept="application/pdf" style="display: none;" onchange="updateFileDisplay('ijazah_input_{{ $pendidikan->id }}', 'ijazah_display_{{ $pendidikan->id }}')" />
										</div>
									</div>
									<div class="form-group col-md-12">
										<label for="deskripsi">Deskripsi</label>
										<textarea class="form-control" rows="6" id="deskripsi" name="pendidikan[{{ $loop->index }}][deskripsi]">{{ $pendidikan->deskripsi }}</textarea>
									</div>
								</div>
								@empty
								<div class="form-row mt-4 form-pendidikan">
									<div class="col-md-6">
										<div class="form-group">
											<label for="perguruan_tinggi">Perguruan Tinggi</label>
											<span class="text-danger">*</span>
											<input type="text" class="form-control" id="perguruan_tinggi" name="pendidikan[0][perguruan_tinggi]">
											@error('perguruan_tinggi')
												<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
													*{{ $message }}
												</div>
											@enderror
										</div>
										<div class="form-group">
											<label for="bidang_studi">Bidang Studi</label>
											<span class="text-danger">*</span>
											<input type="text" class="form-control" id="bidang_studi" name="pendidikan[0][bidang_studi]">
											@error('bidang_studi')
												<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
													*{{ $message }}
												</div>
											@enderror
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="ipk">IPK</label>
												<span class="text-danger">*</span>
												<input type="text" class="form-control" id="ipk" name="pendidikan[0][ipk]">
												@error('ipk')
													<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
														*{{ $message }}
													</div>
												@enderror
											</div>
											<div class="form-group col-md-6">
												<label for="gelar">Gelar</label>
												<span class="text-danger">*</span>
												<input type="text" class="form-control" id="gelar" name="pendidikan[0][gelar]">
												@error('gelar')
													<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
														*{{ $message }}
													</div>
												@enderror
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="mulai">Dari</label>
												<span class="text-danger">*</span>
												<input type="text" class="form-control" id="mulai" name="pendidikan[0][mulai]">
												@error('mulai')
													<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
														*{{ $message }}
													</div>
												@enderror
											</div>
											<div class="form-group col-md-6">
												<label for="selesai">Ke</label>
												<span class="text-danger">*</span>
												<input type="text" class="form-control" id="selesai" name="pendidikan[0][selesai]">
												@error('selesai')
													<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
														*{{ $message }}
													</div>
												@enderror
											</div>
										</div>
									</div>
									<div class="form-group col-md-12">
										<label for="transkip_nilai">Transkip Nilai</label>
										<div class="row justify-content-between">
											<div class="col-10">
													<input type="text" class="form-control" id="transkip_display" readonly>
											</div>
											<div class="col-2">
													<button type="button" class="btn btn-light border-1 border-dark" onclick="document.getElementById('transkip_input').click();">Ganti File</button>
											</div>
											<input type="file" id="transkip_input" name="pendidikan[0][transkip_nilai]" accept="application/pdf" style="display: none;" onchange="updateFileDisplay('transkip_input', 'transkip_display')" />
										</div>
									</div>
									<div class="form-group col-md-12">
										<label for="ijazah">Ijazah</label>
										<div class="row justify-content-between">
											<div class="col-10">
													<input type="text" class="form-control" id="ijazah_display" readonly>
											</div>
											<div class="col-2">
													<button type="button" class="btn btn-light border-1 border-dark" onclick="document.getElementById('ijazah_input').click();">Ganti File</button>
											</div>
											<input type="file" id="ijazah_input" name="pendidikan[0][ijazah]" accept="application/pdf" style="display: none;" onchange="updateFileDisplay('ijazah_input', 'ijazah_display')" />
										</div>
									</div>
									<div class="form-group col-md-12">
										<label for="Deskripsi">Deskripsi</label>
										<textarea class="form-control" rows="6" id="deskripsi" name="pendidikan[0][deskripsi]"></textarea>
									</div>
								</div>
								@endforelse
							</div>
							<hr>
							<div class="form-pekerjaan-wrapper" id="form-pekerjaan-wrapper">
							@forelse ($pelamar->pekerjaan as $pekerjaan)
							<div class="form-row mt-4 form-pekerjaan">
								<input type="hidden" class="form-control" id="id" name="pekerjaan[{{ $loop->index }}][id]" value="{{ $pekerjaan->id }}" />

								<div class="form-group col-md-6">
									<label for="nama_perusahaan">Nama Perusahaan</label>
									<span class="text-danger">*</span>
									<input type="text" class="form-control" id="nama_perusahaan" name="pekerjaan[{{ $loop->index }}][nama_perusahaan]" value="{{ $pekerjaan->nama_perusahaan }}">
									@error('nama_perusahaan')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
								<div class="form-group col-md-6">
									<label for="jabatan">Jabatan</label>
									<span class="text-danger">*</span>
									<input type="text" class="form-control" id="jabatan" name="pekerjaan[{{ $loop->index }}][jabatan]" value="{{ $pekerjaan->jabatan }}">
									@error('jabatan')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
								<div class="form-group col-md-6">
									<label for="mulai">Dari</label>
									<span class="text-danger">*</span>
									<input type="text" class="form-control" id="mulai" name="pekerjaan[{{ $loop->index }}][mulai]" value="{{ $pekerjaan->mulai }}">
									@error('mulai')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
								<div class="form-group col-md-6">
									<label for="selesai">Ke</label>
									<span class="text-danger">*</span>
									<input type="text" class="form-control" id="selesai" name="pekerjaan[{{ $loop->index }}][selesai]" value="{{ $pekerjaan->selesai }}">
									@error('selesai')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
								<div class="form-group col-md-12">
									<label for="surat_keterangan">Surat Keterangan</label>
									<div class="row justify-content-between">
										<div class="col-10">
												<input type="text" class="form-control" id="surat_keterangan_display_{{ $pekerjaan->id }}" readonly value="{{ basename($pekerjaan->surat_keterangan) }}">
										</div>
										<div class="col-2">
												<button type="button" class="btn btn-light border-1 border-dark" onclick="document.getElementById('surat_keterangan_input_{{ $pekerjaan->id }}').click();">Ganti File</button>
										</div>
										<input type="file" id="surat_keterangan_input_{{ $pekerjaan->id }}" name="pekerjaan[{{ $loop->index }}][surat_keterangan]" accept="application/pdf" style="display: none;" onchange="updateFileDisplay('surat_keterangan_input_{{ $pekerjaan->id }}', 'surat_keterangan_display_{{ $pekerjaan->id }}')" />
									</div>
								</div>
								<div class="form-group col-md-12">
									<label for="Deskripsi">Deskripsi</label>
									<textarea class="form-control" rows="6" id="deskripsi" name="pekerjaan[{{ $loop->index }}][deskripsi]">{{ $pekerjaan->deskripsi }}</textarea>
								</div>
							</div>
							@empty
							<div class="form-row mt-4 form-pekerjaan">
								<div class="form-group col-md-6">
									<label for="nama_perusahaan">Nama Perusahaan</label>
									<span class="text-danger">*</span>
									<input type="text" class="form-control" id="nama_perusahaan" name="pekerjaan[0][nama_perusahaan]">
									@error('nama_perusahaan')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
								<div class="form-group col-md-6">
									<label for="jabatan">Jabatan</label>
									<span class="text-danger">*</span>
									<input type="text" class="form-control" id="jabatan" name="pekerjaan[0][jabatan]">
									@error('jabatan')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
								<div class="form-group col-md-6">
									<label for="mulai">Dari</label>
									<span class="text-danger">*</span>
									<input type="text" class="form-control" id="mulai" name="pekerjaan[0][mulai]">
									@error('mulai')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
								<div class="form-group col-md-6">
									<label for="selesai">Ke</label>
									<span class="text-danger">*</span>
									<input type="text" class="form-control" id="selesai" name="pekerjaan[0][selesai]">
									@error('selesai')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
								<div class="form-group col-md-12">
									<label for="surat_keterangan">Surat Keterangan</label>
									<div class="row justify-content-between">
										<div class="col-10">
												<input type="text" class="form-control" id="surat_keterangan_display" readonly>
										</div>
										<div class="col-2">
												<button type="button" class="btn btn-light border-1 border-dark" onclick="document.getElementById('surat_keterangan_input').click();">Ganti File</button>
										</div>
										<input type="file" id="surat_keterangan_input" name="pekerjaan[0][surat_keterangan]" accept="application/pdf" style="display: none;" onchange="updateFileDisplay('surat_keterangan_input', 'surat_keterangan_display')" />
									</div>
								</div>
								<div class="form-group col-md-12">
									<label for="Deskripsi">Deskripsi</label>
									<textarea class="form-control" rows="6" id="deskripsi" name="pekerjaan[0][deskripsi]"></textarea>
								</div>
							</div>
							@endforelse
							<div class="form-keterampilan-wrapper" id="form-keterampilan-wrapper">
							@forelse ($pelamar->keterampilan as $keterampilan)
							<div class="form-row mt-4 form-keterampilan">
								<div class="form-group col-md-6">
									<input type="hidden" class="form-control" id="id" name="keterampilan[{{ $loop->index }}][id]" value="{{ $keterampilan->id }}" />

									<label for="nama">Keterampilan</label>
									<span class="text-danger">*</span>
									<input type="text" class="form-control" id="nama" name="keterampilan[{{ $loop->index }}][nama]" value="{{ $keterampilan->nama }}">
									@error('nama')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
								<div class="form-group col-md-6">
									<label for="penguasaan">Penguasaan</label>
									<span class="text-danger">*</span>
									<input type="text" class="form-control" id="penguasaan" name="keterampilan[{{ $loop->index }}][penguasaan]" value="{{ $keterampilan->penguasaan }}">
									@error('penguasaan')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
								<div class="form-group col-md-12">
									<label for="sertifikat">Sertifikat</label>
									<div class="row justify-content-between">
										<div class="col-10">
												<input type="text" class="form-control" id="sertifikat_display_{{ $keterampilan->id }}" readonly value="{{ basename($keterampilan->sertifikat) }}">
										</div>
										<div class="col-2">
												<button type="button" class="btn btn-light border-1 border-dark" onclick="document.getElementById('sertifikat_input_{{ $keterampilan->id }}').click();">Ganti File</button>
										</div>
										<input type="file" id="sertifikat_input_{{ $keterampilan->id }}" name="keterampilan[{{ $loop->index }}][sertifikat]" accept="application/pdf" style="display: none;" onchange="updateFileDisplay('sertifikat_input_{{ $keterampilan->id }}', 'sertifikat_display_{{ $keterampilan->id }}')" />
									</div>
								</div>
							</div>
							@empty
							<div class="form-row mt-4 form-keterampilan">
								<div class="form-group col-md-6">
									<label for="nama">Keterampilan</label>
									<span class="text-danger">*</span>
									<input type="text" class="form-control" id="nama" name="keterampilan[0][nama]">
									@error('nama')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
								<div class="form-group col-md-6">
									<label for="penguasaan">Penguasaan</label>
									<span class="text-danger">*</span>
									<input type="text" class="form-control" id="penguasaan" name="keterampilan[0][penguasaan]">
									@error('penguasaan')
										<div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
											*{{ $message }}
										</div>
									@enderror
								</div>
								<div class="form-group col-md-12">
									<label for="sertifikat">Sertifikat</label>
									<div class="row justify-content-between">
										<div class="col-10">
												<input type="text" class="form-control" id="sertifikat_display" readonly>
										</div>
										<div class="col-2">
												<button type="button" class="btn btn-light border-1 border-dark" onclick="document.getElementById('sertifikat_input').click();">Ganti File</button>
										</div>
										<input type="file" id="sertifikat_input" name="keterampilan[0][sertifikat]" accept="application/pdf" style="display: none;" onchange="updateFileDisplay('sertifikat_input', 'sertifikat_display')" />
									</div>
								</div>
							</div>
							@endforelse
							<hr>
							<div class="form-row mt-4">
								<div class="form-group col-md-12">
									<label for="cv">CV (Termasuk Portfolio)<span class="text-danger">*</span></label>
									<div class="row justify-content-between">
										<div class="col-10">
												<input type="text" class="form-control" id="cv_display_{{ $pelamar->id }}" readonly value="{{ basename($pelamar->cv) }}">
										</div>
										<div class="col-2">
												<button type="button" class="btn btn-light border-1 border-dark" onclick="document.getElementById('cv_input_{{ $pelamar->id }}').click();">Ganti File</button>
										</div>
										<input type="file" id="cv_input_{{ $pelamar->id }}" name="cv" accept="application/pdf" style="display: none;" onchange="updateFileDisplay('cv_input_{{ $pelamar->id }}', 'cv_display_{{ $pelamar->id }}')" />
									</div>
								</div>
							</div>
							<div class="row mt-3 mx-1">
								<a href="/admin/pelamar" class="btn btn-rounded btn-light ml-2">
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

@section('script')
<script>
	function updateFileDisplay(inputId, displayId) {
		var fileInput = document.getElementById(inputId);
		var fileName = fileInput.files[0].name;
		document.getElementById(displayId).value = fileName;
}
</script>

<!-- Input type File -->
<script>
	function triggerFileInput() {
			document.getElementById('foto').click();
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

	document.getElementById('foto').addEventListener('change', function() {
			let overlay = this.parentElement.querySelector('.upload-overlay');
			overlay.style.display = 'none';
	});

</script>
@endsection