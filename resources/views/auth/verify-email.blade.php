
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Email Verify</title>
    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets_landing/images/logo/logo-tab.jpg') }}" />
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

    <div class="maill-success">
        <div class="d-table">
          <div class="d-table-cell">
            <div class="container">
              <div class="success-content">
                {{-- <h1>Verifikasi Email</h1> --}}
                <h2>Verifikasi Email Anda!</h2>
                <p>Silakan cek email Anda, termasuk di bagian spam, untuk memverifikasi email Anda.</p>
                <div class="button">
                  <a href="/" class="btn">Kembali ke Home</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <script src="{{ asset('assets_landing/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets_landing/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets_landing/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets_landing/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets_landing/js/main.js') }}"></script>
</body>

</html>