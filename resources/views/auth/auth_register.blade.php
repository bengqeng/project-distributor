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

    {{-- <div class="container-fluid position-absolute">
        <div class="row">
            <div class="col text-center align-content-center">
                <div class="logo-background  mt-5 text-center">
                    <img src="/vendor/img/main/logo.png" alt="logo" class="mx-auto d-block">
                </div>
            </div>
        </div>
    </div> --}}
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-lg-4">
                        {{-- <img src="/vendor/img/login-register/login-image.png" alt=" login" class="login-card-img"> --}}
                    </div>
                    <div class="col-lg-8">
                        <div class="container mt-4 mb-4 px-5">
                            <div class="brand-wrapper">
                                <img src="/vendor/img/main/logo-grey.png" alt="logo" class="logo mx-auto d-block">
                            </div>
                            <p class="login-card-description m-0 text-center">Register</p>
                        </div>
                        <form method="POST" action="{{route('auth.verify_register')}}">
                            @csrf
                            <div class="row no-gutters">
                                <div class="col-lg-6">
                                    <div class="card-body pb-md-0 pt-md-0 pb-0 pt-0 pr-md-2">
                                        <div class="form-group">
                                            <label for="referral" class="sr-only">Referral</label>
                                            <input type="" name="referral" id="referral" class="form-control"
                                                placeholder="Referral">
                                        </div>
                                        <div class="form-group">
                                            <label for="full-name" class="sr-only">Nama Lengkap</label>
                                            <input type="" name="full-name" id="full-name" class="form-control"
                                                placeholder="Nama Lengkap">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6 m-0">
                                                <label for="birth-place" class="sr-only">Tempat Lahir</label>
                                                <input type="" name="birth-place" id="birth-place" class="form-control"
                                                    placeholder="Tempat Lahir">
                                            </div>
                                            <div class="form-group col-md-6 m-0">
                                                <label for="birth-day" class="sr-only">Tanggal Lahir</label>
                                                <input type="date" name="birth-day" id="birth-day" class="form-control"
                                                    placeholder="Tanggal Lahir">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender" class="sr-only">Jenis Kelamin</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="" class="text-disabled">Jenis Kelamin</option>
                                                <option value="laki-laki">Laki-laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="sr-only">Email</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone-number" class="sr-only">Nomor Telepon</label>
                                            <input type="" name="phone-number" id="phone-number" class="form-control"
                                                placeholder="Nomor HP/WhatsApp">
                                        </div>
                                        <div class="form-group">
                                            <label for="model" class="sr-only">Member</label>
                                            <select name="model" id="model" class="form-control">
                                                <option value="">Pilih 3L model</option>
                                                <option value="outlet">Outlet</option>
                                                <option value="friends">Friends</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card-body pb-md-0 pt-md-0 pb-0 pt-0 pl-md-2">
                                        <div class="form-group">
                                            <label for="address" class="sr-only">Alamat</label>
                                            <textarea type="" name="address" id="address" class="form-control"
                                                style="max-height: 90px" placeholder="Alamat"></textarea>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6 m-0">
                                                <label for="rt" class="sr-only">RT</label>
                                                <input type="" name="rt" id="rt" class="form-control" placeholder="RT">
                                            </div>
                                            <div class="form-group col-md-6 m-0">
                                                <label for="rw" class="sr-only">RW</label>
                                                <input type="" name="rw" id="rw" class="form-control" placeholder="RW">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender" class="sr-only">Provinsi</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="">Provinsi</option>
                                                <option value="laki-laki">Laki-laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender" class="sr-only">Kota</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="">Kota</option>
                                                <option value="laki-laki">Laki-laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender" class="sr-only">Kecamatan</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="">Kecamatan</option>
                                                <option value="laki-laki">Laki-laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="gender" class="sr-only">Kelurahan</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="">Kelurahan</option>
                                                <option value="laki-laki">Laki-laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="container register-foot pb-sm-5 px-sm-5">
                                <button type="submit" name="login" id="login" class="btn float-right login-btn" type="button"
                                value="Register">Register</button>
                                <br><br>
                                <p class="login-card-footer-text">Telah memiliki akun? <a href="/login"
                                        class="text-reset">Login
                                        di sini</a></p>
                                <nav class="login-card-footer-nav">
                                    <a href="#!">Terms of use.</a>
                                    <a href="#!">Privacy policy</a>
                                </nav>
                            </div>
                        </form>
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

    <script src="{{ asset('js/login-register/login.js') }}"></script>

</body>

</html>
