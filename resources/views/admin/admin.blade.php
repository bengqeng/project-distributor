<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>tiitle</title>

  <link href="{{ asset('css/app.css') }}"  rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">

  <script src="{{ asset('js/app.js') }}"></script>
  
</head>

  <body>
    
    @extends('admin.layout.header')

    @extends('admin.layout.sidebar')

    @yield('main-content')

    @extends('admin.layout.footer')    
    
  </body>

</html>



