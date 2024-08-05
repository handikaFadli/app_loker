<div class="modal fade" id="update-status-{{ $dtlow->id }}">
	<div class="modal-dialog" role="document">
			<div class="modal-content">
					<div class="modal-header">
							<h5 class="modal-title text-primary">Update Status Lowongan</h5>
							<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
							</button>
					</div>
					<form action="{{ route('lowongan.updateStatus', $dtlow->id) }}" method="POST">
						@csrf
						@method('PUT')
						<div class="modal-body px-4">
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="status">Status Lowongan</label>
									<select id="inlineFormCustomSelect" name="status" class="form-control custom-select">
										@if (old('status', $dtlow->status) == $dtlow->status)
										<option value="{{ $dtlow->status }}" hidden selected>{{ ucwords($dtlow->status) }}</option>
										@else
										<option value="{{ $dtlow->status }}" hidden selected>{{ ucwords($dtlow->status) }}</option>
										@endif
										<option value="open">Open</option>
										<option value="close">Close</option>
									</select>
								</div>
							</div>
						</div>
						<div class="modal-footer">
								<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
				</form>
			</div>
	</div>
</div>