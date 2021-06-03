<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <link rel="stylesheet" href="{{ asset('css/app.css')}}">
  <link rel="stylesheet" href="{{ asset('css/landingpage/landingpage.css')}}">
</head>

<body>

  @include('landingpage.layout.header')
  <div class="content-wrapper">
    @yield('main-content')
  </div>
  @include('landingpage.layout.footer')

  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/landingpage/landingpage.js') }}"></script>

  {{-- @yield('script') --}}
</body>

</html>
