<div class="modal fade" id="edit-{{ $dtlm->id }}">
	<div class="modal-dialog" role="document">
			<div class="modal-content">
					<div class="modal-header">
							<h5 class="modal-title text-primary">Update Status Lamaran</h5>
							<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
							</button>
					</div>
					<form action="{{ route('lamaran.update', $dtlm->id) }}" method="POST">
						@csrf
						<div class="modal-body px-4">
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="status_lamaran">Status Lamaran</label>
									<select id="inlineFormCustomSelect" name="status_lamaran" class="form-control custom-select">
										@if (old('status_lamaran', $dtlm->status_lamaran) == $dtlm->status_lamaran)
										<option value="{{ $dtlm->status_lamaran }}" hidden selected>{{ ucwords($dtlm->status_lamaran) }}</option>
										@else
										<option value="{{ $dtlm->status_lamaran }}" hidden selected>{{ ucwords($dtlm->status_lamaran) }}</option>
										@endif
										<option value="tahap awal">Tahap Awal</option>
										<option value="tahap dua">Tahap Dua</option>
										<option value="tahap akhir">Tahap Akhir</option>
										<option value="ditolak">Ditolak</option>
										<option value="dibatalkan">Dibatalkan</option>
										<option value="diterima">Diterima</option>
									</select>
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