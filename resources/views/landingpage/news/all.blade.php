@extends('landingpage.master_landingpage')
@section('main-content')
@section('title', 'News')
<div class="carousel-landing-page mb-5">
  <div class="container">
  </div>
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-our-grey shadow">
        <li class="breadcrumb-item"><a class="text-3l-white" href="{{route('landingpage.index')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Blog</li>
      </ol>
    </nav>
    <h3 class="text-white font-weight-bolder mb-4">NEWS</h3>
    @forelse ($news as $item)
    <div class="card mb-3 shadow" style="">
      <div class="row no-gutters">
        <div class="col-md-4 p-3">
          <img
            src="{{empty($item->url_image) ? asset('vendor/img/main/img-not-found-landscape.png') : asset($item->url_image)}}"
            class="card-img" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">{{$item->title}}</h5>
            <p class="card-text mb-3">{{$item->author}}</p>
            <p class="card-text">{{Str::limit(strip_tags($item->body_article), 200, $end='...')}}</p>
            <p class="card-text"><small class="text-muted">Last Updated {{$item->created_at->diffForHumans()}}</small>
            </p>
            <div class="d-flex h-100 d-flex flex-column">
              <a role="button" href="news/{{$item->slug}}/detail"
                class="align-self-end btn-sm btn-our-grey float-right">READ MORE</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @empty
    <div class="card mb-3" style="">
      <div class="row no-gutters">
        <div class="card-body text-center p-5">
          <h5 class="card-title">Ups.. Maaf, halaman News masih dalam penulisan</h5>
          <p class="card-text mb-3">Mimin Cakep</p>
          <p class="card-text">Mohon ditunggu ya kabar selanjutnya...
            tetap cantik.
          </p>
          <p class="card-text"><small class="text-muted">Last updated hmm mins ago</small></p>
        </div>
      </div>
    </div>
  </div>
  @endforelse
  <div class="d-flex justify-content-center">
    {!! $news->onEachSide(0)->links() !!}
  </div>
</div>
</div>
@endsection