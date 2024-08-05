<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Portal Job - Register</title>
    <!-- Favicon icon -->
    {{-- <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png"> --}}
    <link href="{{ asset('assets_admin/css/style.css') }}" rel="stylesheet" />

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email"><strong>Email</strong></label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password"><strong>Password</strong></label>
                                            <input type="password" class="form-control" id="password" name="password">
                                            @error('password')
                                                <div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation"><strong>Konfirmasi Password</strong></label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                            @error('password')
                                                <div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-outline-dark btn-block">Sign me up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="/login">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')


    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ asset('assets_admin/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets_admin/js/quixnav-init.js') }}"></script>

</body>

</html>