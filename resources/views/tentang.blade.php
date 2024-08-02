@extends('layouts.main')

@section('content')

<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
	<div class="container">
			<div class="row">
					<div class="col-12">
							<div class="breadcrumbs-content">
									<h1 class="page-title">Tentang Kami</h1>
									<p>Selamat datang di Universitas Catur Insan Cendekia<br>tempat di mana setiap langkah Anda menuju masa depan yang cerah dimulai.</p>
							</div>
							<ul class="breadcrumb-nav">
									<li><a href="/">Home</a></li>
									<li>Tentang</li>
							</ul>
					</div>
			</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Blog Singel Area -->
<section class="section blog-single">
	<div class="container">
			<div class="row">
					<div class="col-lg-10 offset-lg-1 col-12">
							<div class="single-inner">
									<div class="post-details">
											<div class="detail-inner">
													<h2 class="post-title">
															<a href="/">Lowongan Pekerjaan Universitas Catur Insan Cendekia</a>
													</h2>
													<p>Universitas Catur Insan Cendekia (CIC) Cirebon, didirikan pada tahun 1999 oleh Yayasan Catur Insan Cendekia (CIC), berlokasi di Jl. Kesambi No. 202, Kota Cirebon. Lebih dari sekadar kampus, CIC adalah rumah bagi para pencari ilmu, inovator, dan pemimpin masa depan. Di sini, setiap langkah Anda berarti, setiap ide dihargai, dan setiap mimpi didukung sepenuhnya. Kami juga membuka peluang lamaran untuk posisi Dosen dan Tenaga Kependidikan (Tendik). Bergabunglah dengan kami dan temukan mengapa CIC adalah tempat terbaik untuk mengembangkan potensi dan mewujudkan impian karir Anda dalam dunia pendidikan.</p>
													<!-- post image -->
													{{-- <div class="post-image">
															<div class="row">
																	<div class="col-lg-6 col-md-6 col-12">
																			<a href="#" class="mb-4">
																					<img src="{{ asset('assets_landing/images/blog/blog-single2.jpg') }}" alt="#">
																			</a>
																	</div>
																	<div class="col-lg-6 col-md-6 col-12">
																			<a href="#">
																					<img src="{{ asset('assets_landing/images/blog/blog-single3.jpg') }}" alt="#">
																			</a>
																	</div>
															</div>
													</div> --}}
													<h3>Visi dan Misi</h3>
													<p>
														Menjadi universitas yang berorientasi dalam bidang teknologi dan kewirausahaan, untuk mendukung masyarakat daerah dengan menghasilkan lulusan yang marnpu untuk menanggapi perubahan jaman.
													</p>
													<ul class="list">
															<li><i class="lni lni-chevron-right"></i>Menyelenggarakan pengajaran yang berfokus untuk menghasilkan lulusan-lulusan yang mampu untuk menanggapi perubahan jaman.</li>
															<li><i class="lni lni-chevron-right"></i> Mendukung dan menciptakan lingkungan yang positif untuk pembelajaran, inovasi, dan penerapan dalam bidang teknologi dan kewirausahaan.</li>
															<li><i class="lni lni-chevron-right"></i>Menjalankan aktivitas Tri Dharma untuk memberikan kontribusi terhadap masyarakat daerah.</li>
															<li><i class="lni lni-chevron-right"></i>Menyelenggarakan pendidikan tinggi yang terjangkau dalam memperluas akses pendidikan di masyarakat daerah.</li>
													</ul>
											</div>
									</div>
							</div>
					</div>
			</div>
	</div>
</section>
<!-- End Blog Singel Area -->

@endsection