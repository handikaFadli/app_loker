<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="description" content="Halaman Admin" />
    <meta name="keywords" content="Lowongan Kerja" />
    <title>@yield('title')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets_admin/images/logo-tab.jpg') }}" />

    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('assets_admin/vendor/owl-carousel/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_admin/vendor/owl-carousel/css/owl.theme.default.min.css') }}" />
    <link href="{{ asset('assets_admin/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet" />
    
    <!-- Data tables -->
    <link href="{{ asset("assets_admin/vendor/datatables/css/jquery.dataTables.min.css") }}" rel="stylesheet">

    <!-- Form Wizard -->
    <link href="{{ asset('assets_admin/vendor/jquery-steps/css/jquery.steps.css') }}" rel="stylesheet" />

    <!-- Style Utama -->
    <link href="{{ asset('assets_admin/css/style.css') }}" rel="stylesheet" />

    <!-- Trix -->
    <link href="{{ asset('assets_admin/css/trix.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets_admin/js/trix.js') }}" type="text/javascript" ></script>
    <style>
      trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>

		@yield('style')
  </head>

  <body>
    <!--*******************
        Preloader start
    ********************-->
    
    <div id="preloader">
      <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
      </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
      <!--**********************************
            Nav header start
        ***********************************-->
				@include('admin.layouts.nav-header')
      <!--**********************************
            Nav header end
        ***********************************-->

      <!--**********************************
            Header start
        ***********************************-->
				@include('admin.layouts.header')
      <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

      <!--**********************************
            Sidebar start
        ***********************************-->
				@include('admin.layouts.sidebar')
      <!--**********************************
            Sidebar end
        ***********************************-->

      <!--**********************************
            Content body start
        ***********************************-->
      <div class="content-body">
        <!-- row -->
				@yield('content-admin')
      </div>
      <!--**********************************
            Content body end
        ***********************************-->

      <!--**********************************
            Footer start
        ***********************************-->
				@include('admin.layouts.footer')
      <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->


    <!--**********************************
        Scripts
    ***********************************-->

    @include('sweetalert::alert')
    
    <!-- Required vendors -->
    <script src="{{ asset('assets_admin/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets_admin/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('assets_admin/js/custom.min.js') }}"></script>

    <!-- Vectormap -->
    <script src="{{ asset('assets_admin/vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/morris/morris.min.js') }}"></script>

    <script src="{{ asset('assets_admin/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/chart.js/Chart.bundle.min.js') }}"></script>

    <script src="{{ asset('assets_admin/vendor/gaugeJS/dist/gauge.min.js') }}"></script>

    <!--  flot-chart js -->
    <script src="{{ asset('assets_admin/vendor/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/flot/jquery.flot.resize.js') }}"></script>

    <!-- Owl Carousel -->
    <script src="{{ asset('assets_admin/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

    <!-- Counter Up -->
    <script src="{{ asset('assets_admin/vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/jquery.counterup/jquery.counterup.min.js') }}"></script>

    <script src="{{ asset('assets_admin/js/dashboard/dashboard-1.js') }}"></script>

    <!-- Data tables -->
    <script src="{{ asset("assets_admin/vendor/datatables/js/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset("assets_admin/js/plugins-init/datatables.init.js") }}"></script>

    <!-- Form wizard -->
    <script src="{{ asset("assets_admin/vendor/jquery-steps/build/jquery.steps.min.js") }}"></script>
    <script src="{{ asset("assets_admin/vendor/jquery-validation/jquery.validate.min.js") }}"></script>
    <!-- Form validate init -->
    <script src="{{ asset("assets_admin/js/plugins-init/jquery.validate-init.js") }}"></script>
    <!-- Form step init -->
    <script src="{{ asset("assets_admin/js/plugins-init/jquery-steps-init.js") }}"></script>

    <!-- Chart ChartJS plugin files -->
    <script src="{{ asset("assets_admin/vendor/chart.js/Chart.bundle.min.js") }}"></script>
    <script src="{{ asset("assets_admin/js/plugins-init/chartjs-init.js") }}"></script>
    
		@yield('script')
  </body>
</html>
