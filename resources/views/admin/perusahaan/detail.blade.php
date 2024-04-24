<!-- Modal -->
<div class="modal fade" id="detail-{{ $dtpr->id }}">
		<div class="modal-dialog" role="document">
				<div class="modal-content">
						<div class="modal-header">
								<h5 class="modal-title text-primary">Detail</h5>
								<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
								</button>
						</div>
						<div class="modal-body px-4">
							<div class="row logo d-flex justify-content-center mb-4">
								<img src="{{ asset('media/'.$dtpr->logo) }}" width="135" alt="logo">
							</div>
							<div class="row mb-3">
								<div class="col-md-1">
									<i class="fa fa-building text-primary"></i>
								</div>
								<div class="col-md-11 text-dark">
									{{ $dtpr->nama }}
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-1">
									<i class="fa fa-location-arrow text-primary"></i>
								</div>
								<div class="col-md-11 text-dark">
									{{ $dtpr->lokasi }}
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-1">
									<i class="fa fa-globe text-primary"></i>
								</div>
								<div class="col-md-11 text-dark">
									{{ $dtpr->website }}
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-1">
									<i class="fa fa-linkedin text-primary"></i>
								</div>
								<div class="col-md-11 text-dark">
									{{ $dtpr->linkedin }}
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-1">
									<i class="fa fa-instagram text-primary"></i>
								</div>
								<div class="col-md-11 text-dark">
									{{ $dtpr->instagram }}
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-1">
									<i class="fa fa-info-circle text-primary"></i>
								</div>
								<div class="col-md-11 text-dark">
									{{ $dtpr->deskripsi }}
								</div>
							</div>
						</div>
						<div class="modal-footer">
								<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
						</div>
				</div>
		</div>
</div>