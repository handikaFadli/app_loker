@extends('profile.main')

@section('content-profile')
<div class="notif-items">
	@forelse ($notifications as $notification)
	<div class="manage-content">
		<div class="row align-items-center justify-content-center">
			<div class="col-lg-1 col-md-1 col-12 ">
				<div class="title-img">
						<img src="{{ asset('assets_landing/images/notif-1.png') }}" alt="notifikasi" />
				</div>
			</div>
			<div class="col-lg-8 col-md-8 align-items-center justify-content-center">
				<p class="description text-primary mx-2">
					Lowongan {{ $notification->data['header'] }}
				</p>
				<p class="description mx-2">
					@if (empty($notification->data['notif']))
						{{ $notification->data['description'] }}
						@if (!empty($notification->data['link']))
								<a href="{{ $notification->data['link'] }}">Link</a>
						@endif
					@else
						{{ $notification->data['notif'] }}
						@if (!empty($notification->data['link']))
								<a href="{{ $notification->data['link'] }}">Link Gmeet</a>
						@endif
					@endif
				</p>
			</div>
			<div class="col-lg-3 col-md-3">
				<div class="time">
					<p><i class="lni lni-timer"></i>{{ $notification->created_at->diffForHumans() }}</p>
				</div>
			</div>
		</div>
	</div>
	@empty
	<div class="manage-content">
		<div class="row align-items-center justify-content-center">
			<div class="col-lg-12 col-md-12 d-flex justify-content-center text-center">
				<p class="description">
					Tidak ada notifikasi.
				</p>
			</div>
		</div>
	</div>
	@endforelse
</div>
@endsection