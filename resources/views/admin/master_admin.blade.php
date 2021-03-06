<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Admin - @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/master_admin.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

  </head>

  <body class="hold-transition sidebar-mini">

    <div class="wrapper">
        @include('admin.layout.header')
        @include('admin.layout.sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @include('flash::message')
        @yield('main-content')
        @yield('modal')
      </div>

        @include('admin.layout.footer')
    </div>

    <!-- ./wrapper -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/admin/admin.js') }}"></script>

    @yield('js-script')

  </body>
</html>
