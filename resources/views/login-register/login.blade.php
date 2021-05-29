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

    <div class="container pt-5 pb-5">
        {{-- <h5 class="text-muted">Vertical center using auto-margins..</h5>
        <!--vertical align on parent using my-auto-->
        <div class="row h-100">
            <div class="col-sm-12 my-auto">
                I am Groot.
            </div>
        </div> --}}
        {{-- <h5 class="text-muted">Vertical &amp; horizontal center using auto-margins..</h5> --}}
        <!--vertical align on parent using my-auto, horizontal align on self mx-auto-->
        <div class="row h-100 bg-white">
            <div class="col-12 m-0">
                <div class="row">
                    <div class="col-8 bg-grey p-0 m-0">
                        <div class="this">
                            <img class="img img-responsive" src="/vendor/img/login-register/login-image.png"
                                alt="login-image">
                        </div>
                    </div>
                    <div class="col-4 h-100">
                        Login
                    </div>
                    {{-- <div class="card card-block w-25 mx-auto">I am Groot.</div> --}}
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="note">
        Various vertical align examples with Bootstrap 4
    </div> --}}
    {{-- <div class="container">
        <code>vertical center content of full height cards (solved)</code>
        <div class="row bg-faded">
            <div class="col-md-2">
                <div class="card card-body h-100 justify-content-center">
                    I have a lot of content that wraps on multiple lines..
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-body h-100 justify-content-center">
                    I have a line of content.<br>
                    And another line here..
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-body h-100 justify-content-center">
                    I have a little bit.
                </div>
            </div>
        </div>
    </div> --}}
    {{-- <div class="container">
        cek
    </div> --}}
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('js/login-register/login.js') }}"></script>

</body>

</html>