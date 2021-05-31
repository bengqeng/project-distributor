<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Login Form</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login-register/login.css') }}">
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
                        <img src="/vendor/img/login-register/login-image.png" alt=" login" class="login-card-img">
                    </div>
                    <div class="col-lg-4">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="/vendor/img/main/logo-grey.png" alt="logo" class="logo">
                            </div>
                            <p class="login-card-description">Login</p>
                            <form action="#!">
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email address">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="***********">
                                </div>
                                <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button"
                                    value="Login">
                            </form>
                            <a href="#!" class="forgot-password-link">Lupa password?</a>
                            <p class="login-card-footer-text">Tidak memiliki akun? <a href="/register"
                                    class="text-reset">Register di sini</a></p>
                            <nav class="login-card-footer-nav">
                                <a href="#!">Terms of use.</a>
                                <a href="#!">Privacy policy</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="card login-card">
        <img src="assets/images/login.jpg" alt="login" class="login-card-img">
        <div class="card-body">
          <h2 class="login-card-title">Login</h2>
          <p class="login-card-description">Sign in to your account to continue.</p>
          <form action="#!">
            <div class="form-group">
              <label for="email" class="sr-only">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="password" class="sr-only">Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-prompt-wrapper">
              <div class="custom-control custom-checkbox login-card-check-box">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember me</label>
              </div>              
              <a href="#!" class="text-reset">Forgot password?</a>
            </div>
            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
          </form>
          <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p>
        </div>
      </div> -->
        </div>
    </main>
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('js/login-register/login.js') }}"></script>

</body>

</html>