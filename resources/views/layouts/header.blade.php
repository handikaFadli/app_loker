<header class="header">
	<div class="navbar-area">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12">
					<nav class="navbar navbar-expand-lg">
						<a class="navbar-brand logo" href="index.html">
							<img class="logo1" src="{{ asset('assets_landing/images/logo/logo.svg') }}" alt="Logo" />
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="toggler-icon"></span>
							<span class="toggler-icon"></span>
							<span class="toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
							<ul id="nav" class="navbar-nav m-auto">
								<li class="nav-item">
									<a class="active" href="index.html">Home</a>
								</li>
								<li class="nav-item"><a href="#">Tentang</a></li>
								<li class="nav-item"><a href="#">Lowongan </a></li>
								<li class="nav-item"><a href="#">Kontak</a></li>
								{{-- <li class="nav-item">
									<a href="#">
										Profil
									</a>
									<ul class="sub-menu">
										<li><a href="about-us.html">About Us</a></li>
									</ul>
								</li> --}}
							</ul>
						</div>
						<!-- navbar collapse -->
						<div class="button">
							@guest
									<a href="/login" class="login"><i class="lni lni-lock-alt"></i> Login</a>
									<a href="/register" class="btn">Sign Up</a>
							@endguest

							@auth
									<a href="/profile/myprofile" class="login"><i class="lni lni-user"></i> Profil</a>
							@endauth
						</div>
					</nav>
					<!-- navbar -->
				</div>
			</div>
			<!-- row -->
		</div>
		<!-- container -->
	</div>
	<!-- navbar area -->
</header>