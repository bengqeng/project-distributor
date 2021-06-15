<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Member - @yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/member/master_member.css') }}">
</head>

<body class="hold-transition sidebar-mini">

  <div class="wrapper">
    @include('member.layout.sidebar')
    @include('member.layout.header')

    <div class="content-wrapper">
        @include('flash::message')
        @yield('main-content')
    </div>

    @include('member.layout.footer')

  </div>

  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/member/member.js') }}"></script>
  @yield('js-script')

</body>

</html>
