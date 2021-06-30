<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register Form</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/auth/auth.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>

    <body>
        <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
            <div class="container">
                <div class="card login-card">
                    <div class="row no-gutters">
                        <div class="col-lg-4">
                            <img src="/vendor/img/auth/login-image.png" alt=" login" class="login-card-img">
                        </div>
                        <div class="col-lg-8">
                            <div class="container mt-4 mb-4 px-5">
                                <div class="brand-wrapper">
                                    <img src="/vendor/img/main/logo-grey.png" alt="logo" class="logo mx-auto d-block">
                                </div>
                                <p class="login-card-description m-0 text-center">Register</p>
                                @if (session('status'))
                                    <div class="alert alert-success success-message-registration" role="alert">
                                        <h4 class="alert-heading">{{ session('status') }}</h4>
                                        <p>Silahkan menunggu konfirmasi dari administrasi kami untuk penyelesaian, <br>proses verifikasi akan memerlukan beberapa waktu.</p>
                                        <hr>
                                        <p class="mb-0">Terimakasih.</p>
                                    </div>
                                @endif

                            </div>
                            <form method="POST" action="{{route('auth.submit_register')}}">
                                @csrf
                                <div class="row no-gutters">
                                    <div class="col-lg-6">
                                        <div class="card-body pb-md-0 pt-md-0 pb-0 pt-0 pr-md-2" id="left-card">

                                            <div class="form-group">
                                                @if($errors->has('referral'))
                                                    <div class="reject_validation">{{ $errors->first('referral') }}</div>
                                                @endif

                                                <input type="text" name="referral" id="referral" class="form-control"
                                                    placeholder="Referral" value="{{ old('referral')}}">
                                            </div>

                                            <div class="form-group">
                                                @if($errors->has('full_name'))
                                                    <div class="reject_validation">{{ $errors->first('full_name') }}</div>
                                                @endif

                                                <input type="text" name="full_name" id="full_name" class="form-control"
                                                    placeholder="Nama Lengkap" value="{{ old('full_name') }}">
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6 m-0">
                                                    @if($errors->has('password'))
                                                        <div class="reject_validation">{{ $errors->first('password') }}</div>
                                                    @endif

                                                    <input type="password" name="password" id="full-name" class="form-control"
                                                        placeholder="Password" >
                                                </div>

                                                <div class="form-group col-md-6 m-0">
                                                    @if($errors->has('password_confirmation'))
                                                        <div class="reject_validation">{{ $errors->first('password_confirmation') }}</div>
                                                    @endif

                                                    <input type="password" name="password_confirmation" id="full-name" class="form-control"
                                                        placeholder="Confirm Password" required>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6 m-0">
                                                    @if($errors->has('birth_place'))
                                                        <div class="reject_validation">{{ $errors->first('birth_place') }}</div>
                                                    @endif

                                                    <input type="text" name="birth_place" id="birth_place" class="form-control"
                                                        placeholder="Tempat Lahir" >
                                                </div>

                                                <div class="form-group col-md-6 m-0">
                                                    @if($errors->has('birthday'))
                                                        <div class="reject_validation">{{ $errors->first('birthday') }}</div>
                                                    @endif

                                                    <input type="date" name="birthday" id="birthday" class="form-control"
                                                        placeholder="Tanggal Lahir" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                @if($errors->has('gender'))
                                                    <div class="reject_validation">{{ $errors->first('gender') }}</div>
                                                @endif

                                                <select name="gender" id="gender" class="form-control" >
                                                    <option value="" class="text-disabled">Jenis Kelamin</option>
                                                    <option value="laki-laki">Laki-laki</option>
                                                    <option value="perempuan">Perempuan</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                @if($errors->has('email'))
                                                    <div class="reject_validation">{{ $errors->first('email') }}</div>
                                                @endif

                                                <input type="email" name="email" id="email" class="form-control"
                                                    placeholder="Email" value="{{ old('email') }}">
                                            </div>
                                            <div class="form-group">
                                                @if($errors->has('phone_number'))
                                                    <div class="reject_validation">{{ $errors->first('phone_number') }}</div>
                                                @endif

                                                <input type="text" name="phone_number" id="phone_number" min="0" class="form-control"
                                                    placeholder="Nomor HP/WhatsApp" >
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card-body pb-md-0 pt-md-0 pb-0 pt-0 pl-md-2" id="right-card">
                                            <div class="form-group">
                                                @if($errors->has('provinsi'))
                                                    <div class="reject_validation">{{ $errors->first('provinsi') }}</div>
                                                @endif

                                                <select name="provinsi" id="provinsi" class="form-control">
                                                    <option value="">Pilih Provinsi</option>

                                                    @foreach ($provinsi as $p)
                                                        <option value="{{$p->id_prov}}"> {{$p->nama}} </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                @if($errors->has('city'))
                                                    <div class="reject_validation">{{ $errors->first('city') }}</div>
                                                @endif

                                                <button class="form-control sr-only" id="loading-kabupaten" disabled>
                                                    <i class="fa fa-spinner fa-spin"></i> Loading Kota
                                                </button>

                                                <select name="city" id="city" class="form-control">
                                                    <option value="">Pilih Kota atau Kabupaten</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                @if($errors->has('kecamatan'))
                                                    <div class="reject_validation">{{ $errors->first('kecamatan') }}</div>
                                                @endif

                                                <button class="form-control sr-only" id="loading-kecamatan" disabled>
                                                    <i class="fa fa-spinner fa-spin"></i> Loading Kecamatan
                                                </button>

                                                <select name="kecamatan" id="kecamatan" class="form-control" >
                                                    <option value="">Pilih Kecamatan</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                @if($errors->has('kelurahan'))
                                                    <div class="reject_validation">{{ $errors->first('kelurahan') }}</div>
                                                @endif

                                                <button class="form-control sr-only" id="loading-kelurahan" disabled>
                                                    <i class="fa fa-spinner fa-spin"></i> Loading Kelurahan
                                                </button>

                                                <select name="kelurahan" id="kelurahan" class="form-control" >
                                                    <option value="">Pilih Kelurahan</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                @if($errors->has('model'))
                                                    <div class="reject_validation">{{ $errors->first('model') }}</div>
                                                @endif

                                                <select name="model" id="model" class="form-control" >
                                                    <option value="">Daftar Sebagai</option>
                                                    <option value="outlet">Outlet</option>
                                                    <option value="friends">Friends</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                @if($errors->has('address'))
                                                    <div class="reject_validation">{{ $errors->first('address') }}</div>
                                                @endif

                                                <textarea name="address" maxlength = "150" id="address" class="form-control" placeholder="Alamat"></textarea>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="container register-foot pb-sm-5 px-sm-5">
                                    <button type="submit" name="login" id="login" class="btn float-right login-btn" type="button"
                                    value="Register">Register</button>
                                    <span class="login-card-footer-text">
                                        Telah memiliki akun?
                                        <a class="direct-login" onclick="location.href='{{route('login')}}'" class="text-reset">Login disini!</a>
                                    </span>

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
                <button onclick="location.href='{{ url('/') }}'"  type="button" class="btn btn-dark btn-circle float-right"><i
                        class="fas fa-home"></i></button>
            </div>
        </main>

        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/auth/auth.js') }}"></script>
        <script>
            $(document).ready(function () {
                if (window.screen.width < 992){
                    $('div#left-card').removeClass('pr-md-2');
                    $('div#right-card').removeClass('pl-md-2');
                }
            });
        </script>
</body>

</html>
