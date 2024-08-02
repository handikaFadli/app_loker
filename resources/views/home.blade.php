@extends('layouts.main')

@section('content')
<!-- Start Hero Area -->
<section class="hero-area">
  <!-- Single Slider -->
  <div class="hero-inner">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 co-12">
          <div class="inner-content">
            <div class="hero-text">
              <h1 class="wow fadeInUp" data-wow-delay=".3s">Langkah Awal <br />Menuju Karir Gemilang</h1>
              <p class="wow fadeInUp" data-wow-delay=".5s">
                Selamat datang di portal lowongan kerja UCIC! <br />
                Temukan pekerjaan yang sesuai dengan keahlian dan minat Anda.<br />
                Mari mulai perjalanan karir Anda bersama kami!
              </p>
            </div>
            <div class="job-search-wrap-two mt-50 wow fadeInUp" data-wow-delay=".7s">
              <div class="job-search-form">
                <form action="#">
                  <!-- Single Field Item Start  -->
                  <div class="single-field-item keyword">
                    <label for="keyword">Lowongan</label>
                    <input id="keyword" placeholder="Cari lowongan yang anda inginkan" name="keyword" type="text" />
                  </div>
                  <!-- Single Field Item End  -->
                  <!-- Single Field Item Start  -->
                  {{-- <div class="single-field-item location">
                    <label for="location">Where</label>
                    <input id="location" class="input-field input-field-location" placeholder="Location" name="location" type="text" />
                  </div> --}}
                  <!-- Single Field Item End  -->
                  <div class="submit-btn">
                    <button class="btn" type="submit">Search</button>
                  </div>
                </form>
              </div>
              {{-- <div class="trending-keywords mt-30">
                <div class="keywords style-two">
                  <span class="title">Popular Keywords:</span>
                  <ul>
                    <li><a href="#">Administrative</a></li>
                    <li><a href="#">Android</a></li>
                    <li><a href="#">app</a></li>
                    <li><a href="#">ASP.NET</a></li>
                  </ul>
                </div>
              </div> --}}
            </div>
          </div>
        </div>
        <div class="col-lg-6 co-12">
          <div class="hero-video-head wow fadeInRight" data-wow-delay=".5s">
            <div class="video-inner">
              <img src="{{ asset('assets_landing/images/hero/hero.jpg') }}" alt="logo" />
              <a href="https://youtu.be/FQFHdgRE544?si=M_A2KArERuXBSJTC" class="glightbox hero-video"><i class="lni lni-play"></i></a>
              <!-- Video Animation -->
              <div class="promo-video">
                <div class="waves-block">
                  <div class="waves wave-1"></div>
                  <div class="waves wave-2"></div>
                  <div class="waves wave-3"></div>
                </div>
              </div>
              <!--/ End Video Animation -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ End Single Slider -->
</section>
<!--/ End Hero Area -->

<!-- Start Apply Process Area -->
<section class="apply-process section">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-12">
        <div class="process-item">
          <i class="lni lni-user"></i>
          <h4>Registrasi Akun</h4>
          <p>Mulailah dengan membuat akun. Hanya dengan beberapa langkah mudah, Anda dapat mengakses berbagai lowongan pekerjaan yang tersedia.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-12">
        <div class="process-item">
          <i class="lni lni-book"></i>
          <h4>Lengkapi Data Diri</h4>
          <p>Isi informasi pribadi. Pastikan semua data terisi dengan benar agar perusahaan dapat melihat kualifikasi Anda secara lengkap.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-12">
        <div class="process-item">
          <i class="lni lni-briefcase"></i>
          <h4>Apply Lowongan</h4>
          <p>Setelah melengkapi profil Anda, cari dan lamar lowongan pekerjaan yang sesuai dengan keahlian dan minat Anda.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!--/ End Apply Process Area -->

<!-- Start Job Category Area -->
{{-- <section class="job-category section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title">
          <span class="wow fadeInDown" data-wow-delay=".2s">Job Category</span>
          <h2 class="wow fadeInUp" data-wow-delay=".4s">Choose Your Desire Category</h2>
          <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
        </div>
      </div>
    </div>
    <div class="cat-head">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-12">
          <a href="job-details.html" class="single-cat wow fadeInUp" data-wow-delay=".2s">
            <div class="icon">
              <i class="lni lni-cog"></i>
            </div>
            <h3>
              Technical<br />
              Support
            </h3>
          </a>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <a href="job-details.html" class="single-cat wow fadeInUp" data-wow-delay=".4s">
            <div class="icon">
              <i class="lni lni-layers"></i>
            </div>
            <h3>
              Business<br />
              Development
            </h3>
          </a>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <a href="job-details.html" class="single-cat wow fadeInUp" data-wow-delay=".6s">
            <div class="icon">
              <i class="lni lni-home"></i>
            </div>
            <h3>
              Real Estate<br />
              Business
            </h3>
          </a>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <a href="job-details.html" class="single-cat wow fadeInUp" data-wow-delay=".8s">
            <div class="icon">
              <i class="lni lni-search"></i>
            </div>
            <h3>
              Share Maeket<br />
              Analysis
            </h3>
          </a>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <a href="job-details.html" class="single-cat wow fadeInUp" data-wow-delay=".2s">
            <div class="icon">
              <i class="lni lni-investment"></i>
            </div>
            <h3>
              Finance & Banking <br />
              Service
            </h3>
          </a>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <a href="job-details.html" class="single-cat wow fadeInUp" data-wow-delay=".4s">
            <div class="icon">
              <i class="lni lni-cloud-network"></i>
            </div>
            <h3>
              IT & Networing <br />
              Sevices
            </h3>
          </a>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <a href="job-details.html" class="single-cat wow fadeInUp" data-wow-delay=".6s">
            <div class="icon">
              <i class="lni lni-restaurant"></i>
            </div>
            <h3>
              Restaurant <br />
              Services
            </h3>
          </a>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <a href="job-details.html" class="single-cat wow fadeInUp" data-wow-delay=".8s">
            <div class="icon">
              <i class="lni lni-fireworks"></i>
            </div>
            <h3>
              Defence & Fire <br />
              Service
            </h3>
          </a>
        </div>
      </div>
    </div>
  </div>
</section> --}}
<!-- /End Job Category Area -->

<!-- Start Call Action Area -->
{{-- <section class="call-action overlay section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2 col-12">
        <div class="inner">
          <div class="section-title">
            <span class="wow fadeInDown" data-wow-delay=".2s">JobGrids Free Lite Version</span>
            <h2 class="wow fadeInUp" data-wow-delay=".4s">Currently You are using free lite Version of JobGrids</h2>
            <p class="wow fadeInUp" data-wow-delay=".6s">
              Please, purchase full version of the template to get all pages, <br />
              Features and commercial license.
            </p>
            <div class="button wow fadeInUp" data-wow-delay=".8s">
              <a href="#" class="btn"><i class="lni lni-cart"></i> Buy Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> --}}
<!-- /End Call Action Area -->

<!-- Start Find Job Area -->
{{-- <section class="find-job section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title">
          <span class="wow fadeInDown" data-wow-delay=".2s">Lowongan</span>
          <h2 class="wow fadeInUp" data-wow-delay=".4s">Daftar Lowongan</h2>
          <p class="wow fadeInUp" data-wow-delay=".6s">Ini adalah daftar lowongan yang tersedia di Universitas Catur Insan Cendekia</p>
        </div>
      </div>
    </div>
    <div class="single-head">
      <div class="row">
        @forelse ($lowongan as $lw)
        <div class="col-lg-6 col-12">
          <div class="single-job wow fadeInUp" data-wow-delay=".3s">
            <div class="job-image">
              <img src="{{ $lw->perusahaan->logo }}" alt="logo perusahaan" width="65" />
            </div>
            <div class="job-content">
              <h4><a href="/lowongan/detail/{{ $lw->slug }}">{{ $lw->judul }}</a></h4>
              <p>We are looking for Enrollment Advisors who are looking to take 30-35 appointments per week. All leads are pre-scheduled.</p>
              <ul>
                <li><i class="lni lni-website"></i><a href="{{ $lw->perusahaan->website }}">Website</a></li>
                <li><i class="lni lni-map-marker"></i> {{ $lw->perusahaan->lokasi }}</li>
              </ul>
            </div>
            <div class="job-button">
              <ul>
                <li><a href="/lowongan/detail/{{ $lw->slug }}">Apply</a></li>
                <li><span>{{ ucwords($lw->tipe) }}</span></li>
              </ul>
            </div>
          </div>
        </div>
        @empty
          <h5 class="text-center">Lowongan tidak tersedia.</h5>
        @endforelse
      </div>
    </div>
  </div>
</section> --}}
<!--/ End Find Job Area -->

<!-- Start Featured Job Area -->
<section class="featured-job section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title">
          <span class="wow fadeInDown" data-wow-delay=".2s">Lowongan</span>
          <h2 class="wow fadeInUp" data-wow-delay=".4s">Daftar Lowongan</h2>
          <p class="wow fadeInUp" data-wow-delay=".6s">Ini adalah daftar lowongan yang tersedia di Universitas Catur Insan Cendekia.</p>
        </div>
      </div>
    </div>
    <div class="single-head">
      <div class="row">
        @forelse ($lowongan as $lw)
          <div class="col-lg-4 col-md-6 col-12">
            <div class="single-job wow fadeInUp" data-wow-delay=".2s">
              <div class="shape"></div>
              <div class="feature">Open</div>
              <div class="image">
                <img src="{{ $lw->gambar }}" alt="poster" />
              </div>
              <div class="content">
                <h4><a href="#">{{ $lw->judul }}</a></h4>
                <ul>
                  <li><i class="lni lni-map-marker"></i> UCIC</li>
                  <li><i class="lni lni-briefcase"></i> {{ ucwords($lw->tipe) }}</li>
                </ul>
                <p>{{ $lw->informasi }}</p>
                <div class="button">
                  <a href="/lowongan/detail/{{ $lw->slug }}" class="btn">Apply</a>
                  <span class="">Batas Akhir : {{ \Carbon\Carbon::parse($lw->batas_akhir)->format('d/m/Y') }}
                  </span>
                </div>
              </div>
            </div>
          </div>
        @empty
          <h5 class="text-center">Lowongan tidak tersedia.</h5>
        @endforelse
      </div>
    </div>
  </div>
</section>
<!-- /End Featured Job Area -->

<!-- Start Clients Area -->
{{-- <div class="client-logo-section">
  <div class="container">
    <div class="client-logo-wrapper">
      <div class="client-logo-carousel d-flex align-items-center justify-content-between">
        <div class="client-logo">
          <img src="{{ asset('assets_landing/images/clients/client1.png') }}" alt="#" />
        </div>
        <div class="client-logo">
          <img src="{{ asset('assets_landing/images/clients/client2.png') }}" alt="#" />
        </div>
        <div class="client-logo">
          <img src="{{ asset('assets_landing/images/clients/client3.png') }}" alt="#" />
        </div>
        <div class="client-logo">
          <img src="{{ asset('assets_landing/images/clients/client4.png') }}" alt="#" />
        </div>
        <div class="client-logo">
          <img src="{{ asset('assets_landing/images/clients/client5.png') }}" alt="#" />
        </div>
        <div class="client-logo">
          <img src="{{ asset('assets_landing/images/clients/client6.png') }}" alt="#" />
        </div>
        <div class="client-logo">
          <img src="{{ asset('assets_landing/images/clients/client2.png') }}" alt="#" />
        </div>
        <div class="client-logo">
          <img src="{{ asset('assets_landing/images/clients/client3.png') }}" alt="#" />
        </div>
        <div class="client-logo">
          <img src="{{ asset('assets_landing/images/clients/client4.png') }}" alt="#" />
        </div>
      </div>
    </div>
  </div>
</div> --}}
<!-- End Clients Area -->

@endsection