@extends('layouts.main')

@section('content')

<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
	<div class="container">
			<div class="row">
					<div class="col-12">
							<div class="breadcrumbs-content">
									<h1 class="page-title">Kontak Kami</h1>
									<p>Apakah Anda memiliki pertanyaan atau memerlukan informasi lebih lanjut?<br>Jangan ragu untuk menghubungi kami. Tim kami siap membantu Anda.</p>
							</div>
							<ul class="breadcrumb-nav">
									<li><a href="/">Home</a></li>
									<li>Kontak Kami</li>
							</ul>
					</div>
			</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Contact Area -->
<section id="contact-us" class="contact-us section">
	<div class="container">
			<div class="contact-head wow fadeInUp" data-wow-delay=".4s">
					<div class="row">
							<div class="col-lg-7 col-12">
									<div class="form-main">
										<form class="form" method="post" action="{{ route('contact.submit') }}">
											@csrf
											<div class="row">
												<div class="col-lg-12 col-12">
													<div class="form-group">
														<input name="nama" type="text" placeholder="Nama" required="required">
													</div>
												</div>
												<div class="col-lg-6 col-12">
													<div class="form-group">
														<input name="email" type="email" placeholder="contoh@email.com" required="required">
													</div>
												</div>
												<div class="col-lg-6 col-12">
													<div class="form-group">
														<input name="telepon" type="text" placeholder="Nomor telepon" required="required">
													</div>
												</div>
												<div class="col-12">
													<div class="form-group message">
														<textarea name="pesan" placeholder="Silahkan tuliskan pesan anda"></textarea>
													</div>
												</div>
												<div class="col-12">
													<div class="form-group button">
														<button type="submit" class="btn">Kirim</button>
													</div>
												</div>
											</div>
										</form>
										
									</div>
							</div>
							<div class="col-lg-5 col-12">
									<div class="single-head">
											<div class="contant-inner-title">
													<h4>Informasi Kontak</h4>
													<p>Anda bisa hubungi kontak kami dibawah ini.</p>
											</div>
											<div class="single-info">
													<i class="lni lni-phone"></i>
													<ul>
															<li>0231-200418</li>
													</ul>
											</div>
											<div class="single-info">
													<i class="lni lni-envelope"></i>
													<ul>
															<li><a href="info@cic.ac.id">info@cic.ac.id</a></li>
													</ul>
											</div>
											<div class="single-info">
													<i class="lni lni-map"></i>
													<ul>
															<li>Jl. Kesambi No.202, Kesambi, Kota Cirebon</li>
													</ul>
											</div>
											<div class="contact-social">
													<h5>Ikuti kami</h5>
													<ul>
															<li><a href="https://www.instagram.com/universitas_cic"><i class="lni lni-instagram-original"></i></a></li>
															<li><a href="https://www.linkedin.com/company/universitas-catur-insan-cendekia"><i class="lni lni-linkedin-original"></i></a></li>
															<li><a href="https://www.cic.ac.id"><i class="lni lni-website"></i></a></li>
													</ul>
											</div>
									</div>
							</div>
					</div>
			</div>
	</div>
	<!-- Start Google-map Area -->
	<div class="map-section">
			<div class="container">
					<div class="row">
							<div class="col-12">
									<div class="map-container">
											<div class="mapouter">
													<div class="gmap_canvas"><iframe width="100%" height="400" id="gmap_canvas"
																	src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.296409827388!2d108.55051807370796!3d-6.733646665836777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1d8ebc133e3f%3A0x91385801f5822049!2sUniversitas%20Catur%20Insan%20Cendekia%20(CIC)!5e0!3m2!1sid!2sid!4v1720111015410!5m2!1sid!2sid"
																	frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
																	href="https://123movies-to.com/">123movies old site</a>
															<style>
																	.mapouter {
																			position: relative;
																			text-align: right;
																			height: 400px;
																			width: 100%;
																	}

																	.gmap_canvas {
																			overflow: hidden;
																			background: none !important;
																			height: 400px;
																			width: 100%;
																	}
															</style><a href="https://maps-google.github.io/embed-google-map/">embed google
																	map</a>
													</div>
											</div>
									</div>
							</div>
					</div>
			</div>
	</div>
	<!-- End Google-map Area -->
</section>
<!--/ End Contact Area -->

@endsection