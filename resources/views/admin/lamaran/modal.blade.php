<div class="modal fade" id="update-{{ $dtlm->id }}">
	<div class="modal-dialog" role="document">
			<div class="modal-content">
					<div class="modal-header">
							<h5 class="modal-title text-primary">Update Lamaran</h5>
							<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
							</button>
					</div>
					<form action="{{ route('updateStatusLamaran', $dtlm->id) }}" method="POST">
						@csrf
						<div class="modal-body px-4">
							<div class="form-row">
								<input type="hidden" class="form-control" name="status_lamaran" value="{{ $dtlm->status_lamaran }}">
							</div>
							@if ($dtlm->status_lamaran == "tahap awal")
							<div class="form-row">
								<div class="form-group col-md-12">
								<label for="deskripsi">Keterangan</label>
								<textarea class="form-control" rows="5" id="deskripsi" name="deskripsi">Selamat, Anda lolos ke tahap selanjutnya. Silahkan lengkapi data diri anda.</textarea>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="link">Link Form</label>
									<input type="text" class="form-control" id="link" name="link">
								</div>
							</div>
							@elseif ($dtlm->status_lamaran == "tahap dua")
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="deskripsi">Keterangan</label>
									<textarea class="form-control" rows="5" id="deskripsi" name="deskripsi">Selamat, Anda lolos ke tahap selanjutnya. Tahapan selanjutnya adalah wawancara melalui zoom.</textarea>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="link">Link Zoom</label>
									<input type="text" class="form-control" id="link" name="link">
								</div>
							</div>
							@else
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="deskripsi">Keterangan</label>
									<textarea class="form-control" rows="5" id="deskripsi" name="deskripsi">Selamat, Anda diterima, Informasi selanjutnya akan dikirim melalui Whatsapp.</textarea>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="link">Link</label>
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

<div class="modal fade" id="tolak-{{ $dtlm->id }}">
	<div class="modal-dialog" role="document">
			<div class="modal-content">
					<div class="modal-header">
							<h5 class="modal-title text-primary">Tolak Lamaran</h5>
							<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
							</button>
					</div>
					<form action="{{ route('tolakLamaran', $dtlm->id) }}" method="POST">
						@csrf
						<div class="modal-body px-4">
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="deskripsi">Keterangan</label>
									<textarea class="form-control" rows="5" id="deskripsi" name="deskripsi">Terima kasih atas minat dan waktu Anda dalam melamar posisi ini. Setelah pertimbangan cermat, kami telah memilih kandidat lain yang lebih sesuai dengan kriteria kami. Kami menghargai usaha Anda dan berharap Anda sukses dalam pencarian kerja Anda.</textarea>
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