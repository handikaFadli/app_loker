<!DOCTYPE html>
<html class="no-js" lang="zxx">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Portal Job</title>
    <meta name="description" content="Portal Job Universitas Catur Insan Cendekia" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets_landing/images/favicon.svg') }}" />

    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

    <!-- ========================= CSS ========================= -->
    <link rel="stylesheet" href="{{ asset('assets_landing/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_landing/css/LineIcons.2.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_landing/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_landing/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_landing/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_landing/css/main.css') }}" />
  </head>

  <body>
    <div id="loading-area"></div>

    <!-- Start Header Area -->
		@include('layouts.header')
    <!-- End Header Area -->

    @yield('content')

    <!-- Start Footer Area -->
		@include('layouts.footer')
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top btn-hover">
      <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('assets_landing/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets_landing/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets_landing/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets_landing/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets_landing/js/main.js') }}"></script>
    <script type="text/javascript">
      // Pastikan JavaScript dijalankan setelah elemen header dimuat di halaman
      document.addEventListener("DOMContentLoaded", function() {
        // Cek apakah halaman saat ini adalah halaman detail lowongan
        if (window.location.pathname.includes('/detail/')) {
            // Dapatkan elemen header
            var header = document.querySelector('.header');

            // Tambahkan kelas "other-page" ke elemen header
            header.classList.add('other-page');
        }
      });
    </script>
    <script type="text/javascript">
      //====== Clients Logo Slider
      tns({
        container: ".client-logo-carousel",
        slideBy: "page",
        autoplay: true,
        autoplayButtonOutput: false,
        mouseDrag: true,
        gutter: 15,
        nav: false,
        controls: false,
        responsive: {
          0: {
            items: 1,
          },
          540: {
            items: 2,
          },
          768: {
            items: 3,
          },
          992: {
            items: 4,
          },
          1170: {
            items: 6,
          },
        },
      });
      //========= glightbox
      GLightbox({
        href: "https://www.youtube.com/watch?v=cz4z8CyvDas",
        type: "video",
        source: "youtube", //vimeo, youtube or local
        width: 900,
        autoplayVideos: true,
      });
    </script>
  </body>
</html>
