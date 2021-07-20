<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-3l-grey">
  <div class="container p-sm-2">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
      aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ route('landingpage.index') }}"><img
        src="{{ route('landingpage.index') }}/vendor/img/main/logo-white.png" width="60" height="60"
        class="d-inline-block align-top" alt=""></a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        {{-- <li class="nav-item">
          <a class="nav-link ml-5" href="{{ route('landingpage.index') }}">Home</a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link ml-5" href="{{ route('landingpage.news.all') }}">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link ml-5" href="{{ route('landingpage.about') }}">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link ml-5" href="{{ route('landingpage.product.category') }}">Our Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link ml-5" href="{{ route('landingpage.gallery') }}">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link ml-5" href="{{ route('login') }}">Member</a>
        </li>
      </ul>
    </div>
  </div>
</nav>