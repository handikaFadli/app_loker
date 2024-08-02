<div class="modal fade" id="update-{{ $lamaran->id }}">
	<div class="modal-dialog" role="document">
			<div class="modal-content">
					<div class="modal-header">
							<h5 class="modal-title text-primary">Update Lamaran</h5>
							<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
							</button>
					</div>
					<form action="{{ route('updateStatusLamaran', $lamaran->id) }}" method="POST">
						@csrf
						<div class="modal-body px-4">
							<div class="form-row">
								<input type="hidden" class="form-control" name="status_lamaran" value="{{ $lamaran->status_lamaran }}">
							</div>
							@if ($lamaran->status_lamaran == "tahap awal")
							<span> Tahapan selanjutnya pelamar akan mengisi formulir, silahkan masukkan link form untuk mendownload dan mengupload formulir.</span>
							<div class="form-row mt-3">
								<div class="form-group col-md-12">
								<label for="deskripsi">Keterangan</label>
								<textarea class="form-control" rows="5" id="deskripsi" name="deskripsi">Selamat, Anda lolos ke tahap selanjutnya. Silakan lengkapi data diri Anda.</textarea>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="link">Link Form</label>
									<input type="text" class="form-control" id="link" name="link" value="/form/tahap-dua">
								</div>
							</div>
							@elseif ($lamaran->status_lamaran == "tahap dua")
							<span>Tahapan selanjutnya adalah sesi wawancara, silahkan isi waktu wawancara dan link gmeet.</span>
							<div class="form-row mt-3">
								<div class="form-group col-md-12">
									<label for="deskripsi">Keterangan</label>
									<textarea class="form-control" rows="5" id="deskripsi" name="deskripsi">Selamat, Anda lolos ke tahap wawancara. Wawancara akan dilaksanakan melalui Gmeet.</textarea>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="waktu">Waktu wawancara</label>
									<input type="datetime-local" class="form-control" id="waktu" name="waktu">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="link">Link Gmeet</label>
									<input type="text" class="form-control" id="link" name="link">
								</div>
							</div>
							@else
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="deskripsi">Keterangan</label>
									<textarea class="form-control" rows="5" id="deskripsi" name="deskripsi">Selamat, Anda diterima! Informasi selanjutnya akan dikirim melalui Whatsapp.</textarea>
									<input type="hidden" class="form-control" id="link" name="link" value="">
								</div>
							</div>
							@endif
						</div>
						<div class="modal-footer">
								<button type="submit" class="btn btn-primary">Kirim</button>
						</div>
				</form>
			</div>
	</div>
</div>

<div class="modal fade" id="tolak-{{ $lamaran->id }}">
	<div class="modal-dialog" role="document">
			<div class="modal-content">
					<div class="modal-header">
							<h5 class="modal-title text-primary">Tolak Lamaran</h5>
							<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
							</button>
					</div>
					<form action="{{ route('tolakLamaran', $lamaran->id) }}" method="POST">
						@csrf
						<div class="modal-body px-4">
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="deskripsi">Keterangan</label>
									<textarea class="form-control" rows="5" id="deskripsi" name="deskripsi">Terima kasih atas minat dan waktu yang sudah Anda luangkan dalam melamar posisi ini. Setelah pertimbangan cermat, kami menyesal harus menginformasikan bahwa Anda belum terpilih untuk lanjut ke tahap berikutnya. Kami menghargai usaha Anda dan berharap Anda sukses dalam pencarian kerja Anda.</textarea>
								</div>
							</div>
						</div>
						<div class="modal-footer">
								<button type="submit" class="btn btn-primary">Kirim</button>
						</div>
				</form>
			</div>
	</div>
</div>