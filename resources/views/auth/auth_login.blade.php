<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/auth.css') }}">
</head>

<body style="">

    <div class="container-fluid position-absolute">
        <div class="row">
            <div class="col text-center align-content-center">
                <div class="logo-background  mt-5 text-center">
                    <img src="/vendor/img/main/logo.png" alt="logo" class="mx-auto d-block">
                </div>
            </div>
        </div>
    </div>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-lg-8">
                        <img src="/vendor/img/auth/login-image.png" alt=" login" class="login-card-img">
                    </div>
                    <div class="col-lg-4">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                {{-- <img src="/vendor/img/main/logo-grey.png" alt="logo" class="logo"> --}}
                            </div>
                            <p class="login-card-description">Login</p>

                            @if($errors->has('smart_user_login'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    {{ $errors->first('smart_user_login') }}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('auth.submit_login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="text" name="smart_user_login" id="user_login" class="form-control"
                                        placeholder="Email address | Account Id" value="{{ old('smart_user_login') }}" required>
                                </div>

                                <div class="form-group mb-4">
                                    @if($errors->has('referral'))
                                        <div class="reject_validation">{{ $errors->first('password') }}</div>
                                    @endif

                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="***********" required>
                                </div>

                                <button type="submit" name="login" id="login" class="btn btn-block login-btn mb-4" type="button"
                                    value="Login">
                                    Submit
                                </button>

                            </form>

                            {{-- <a href="#!" class="forgot-password-link">Lupa password?</a> --}}
                            <p class="login-card-footer-text">Tidak memiliki akun? <a href="{{ route('register') }}"
                                    class="text-reset">Register di sini</a></p>
                            <nav class="login-card-footer-nav">
                                <a href="#!">Terms of use.</a>
                                <a href="#!">Privacy policy</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed-bottom m-5">
            <button href="#" type="button" class="btn btn-dark btn-circle float-right"><i
                    class="fas fa-home"></i></button>
        </div>
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/auth/auth.js') }}"></script>

</body>

</html>
