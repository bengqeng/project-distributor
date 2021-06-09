@extends('landingpage.master_landingpage')
@section('main-content')
<div class="carousel-landing-page mb-5">
  <div class="container">
  </div>
  <div class="container">
    <h3 class="text-white font-weight-bolder mb-4">NEWS</h3>
    @for ($i = 0; $i < 4; $i++) <div class="card mb-3" style="">
      <div class="row no-gutters">
        <div class="col-md-4 p-3">
          <img src="//placehold.it/1000x700" class="card-img" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text mb-3">Author</p>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
              content.This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            <div class="d-flex h-100 d-flex flex-column">
              <a role="button" href="#" class="align-self-end btn-sm btn-our-grey float-right">READ MORE</a>
            </div>
          </div>
        </div>
      </div>
  </div>
  @endfor
</div>
</div>
@endsection