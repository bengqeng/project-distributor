@extends('landingpage.master_landingpage')
@section('main-content')
@section('title', 'News')
<div class="carousel-landing-page mb-5">
  <div class="container">
  </div>
  <div class="container">
    <h3 class="text-white font-weight-bolder mb-4">NEWS</h3>
    @forelse ($news as $items)
    <div class="card mb-3" style="">
      <div class="row no-gutters">
        <div class="col-md-4 p-3">
          <img src="//placehold.it/1000x700" class="card-img" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">{{$items->title}}</h5>
            <p class="card-text mb-3">{{$items->author}}</p>
            <p class="card-text">{{Str::limit($items->content, 150, $end='...')}}</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            <div class="d-flex h-100 d-flex flex-column">
              <a role="button" href="{{ route('landingpage.news.detail', $items->slug) }}" class="align-self-end btn-sm btn-our-grey float-right">READ MORE</a>
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
    {!! $news->links() !!}
  </div>
</div>
</div>
@endsection
