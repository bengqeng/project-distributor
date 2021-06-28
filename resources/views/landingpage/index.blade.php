@extends('landingpage.master_landingpage')
@section('main-content')
@section('title', 'Beranda')

<div class="carousel-landing-page">
    <div class="container pb-lg-5 px-0">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                {{-- {{dd($carousel)}} --}}
                @forelse ($carousel as $index => $items)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{$index}}"
                    class="@if ($items == $carousel->first()) active @endif"></li>
                @empty
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                @endforelse
            </ol>
            <div class="carousel-inner">
                @forelse ($carousel as $item)
                <div class="carousel-item @if ($item == $carousel->first()) active @endif">
                    <img class="d-block w-100"
                        src="{{empty($item->url_image) ? asset('vendor/img/main/img-not-found-potrait.png') : asset($item->url_image)}}"
                        alt="{{asset($item->description) }}">
                </div>
                @empty
                <div class="carousel-item active">
                    <div class="card mb-3" style="">
                        <div class="row no-gutters">
                            <div class="card-body text-center p-5">
                                <h5 class="card-title">Ups.. Maaf, halaman Carousell masih dalam pengisian</h5>
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


            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                {{-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> --}}
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                {{-- <span class="carousel-control-next-icon" aria-hidden="true"></span> --}}
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>


<!-- NEWS SECTION -->
<div class="news-landing-page pb-5">
    <div class="container">
        <h1 class="text-white font-weight-bolder mt-5">NEWS</h1>
        @if ($news->count() >= 3)
        <div class="row">
            <div class="col-md-6 col-6 py-3 px-0 news-col link-news-landing">
                <a href="news/{{$news[0]->slug}}/detail" class="">
                    <div id="landing-page-1" class="card bg-3l-grey text-white">
                        <img class="card-img"
                            src="{{empty($news[0]->url_image) ? asset('vendor/img/main/img-not-found-landscape.png') : asset($news[0]->url_image)}}"
                            alt="Card image">
                        <div id="landing-page-text-1"
                            class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                            <h5 class="card-title font-weight-bold">{{Str::limit($news[0]->title, 25, $end='...')}}</h5>
                            <p class="card-text mb-0">author</p>
                            <p class="card-text mb-0">Last updated 3 mins ago</p>

                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-6 py-3 px-0 news-col link-news-landing">
                <a href="news/{{$news[1]->slug}}/detail" class="">
                    <div id="landing-page-2" class="card bg-3l-grey text-white h-100">
                        <img class="card-img"
                            src="{{empty($news[1]->url_image) ? asset('vendor/img/main/img-not-found-landscape.png') : asset($news[1]->url_image)}}"
                            alt="Card image" style="object-fit: cover;">
                        <div id="landing-page-text-2"
                            class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                            <h5 class="card-title font-weight-bold">{{Str::limit($news[1]->title, 25, $end='...')}}</h5>
                            <p class="card-text mb-0">author</p>
                            <p class="card-text mb-0">Last updated 3 mins ago</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-12 py-3 px-0 news-col ">
                <div class="">
                    <a href="news/{{$news[2]->slug}}/detail" class="link-news-landing">
                        <div id="landing-page-3" class="card bg-3l-grey text-white pb-3 pb-md-0">
                            <img class="card-img"
                                src="{{empty($news[2]->url_image) ? asset('vendor/img/main/img-not-found-landscape.png') : asset($news[2]->url_image)}}"
                                alt="Card image">
                            <div id="landing-page-text-3"
                                class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                                <h5 class="card-title font-weight-bold">{{Str::limit($news[2]->title, 25, $end='...')}}
                                </h5>
                                <p class="card-text mb-0">author</p>
                                <p class="card-text mb-0">Last updated 3 mins ago</p>
                            </div>
                        </div>
                    </a>
                    <a href="news/{{$news[3]->slug}}/detail" class="link-news-landing">
                        <div id="landing-page-4" class="card bg-3l-grey text-white pt-3 pt-md-0">
                            <img class="card-img"
                                src="{{empty($news[3]->url_image) ? asset('vendor/img/main/img-not-found-landscape.png') : asset($news[3]->url_image)}}"
                                alt="Card image">
                            <div id="landing-page-text-4"
                                class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                                <h5 class="card-title font-weight-bold">{{Str::limit($news[3]->title, 25, $end='...')}}
                                </h5>
                                <p class="card-text mb-0">author</p>
                                <p class="card-text mb-0">Last updated 3 mins ago</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @else
        <div class="card mb-3" style="">
            <div class="row no-gutters">
                <div class="card-body text-center p-5">
                    <h5 class="card-title">Ups.. Maaf, halaman Article masih dalam pengisian</h5>
                    <p class="card-text mb-3">Mimin Cakep</p>
                    <p class="card-text">Mohon ditunggu ya kabar selanjutnya...
                        tetap cantik.
                    </p>
                    <p class="card-text"><small class="text-muted">Last updated hmm mins ago</small></p>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col">
                <a class="btn btn-sm btn-light d-flex d-none float-right" href="{{ route('landingpage.news.all') }}"
                    role="button">Open All</a>
            </div>
        </div>
    </div>
</div>

<!-- PRODUCT SECTION -->
<div class="product-landing-page py-5 bg-white">
    <div class="container mb-4">
        <h1 class="text-our-grey font-weight-bolder">FAVORITE PRODUCT</h1>
        <div class="row py-3 justify-content-center">
            @forelse ($products as $item)
            <div class="col-md-3">
                <div class="card text-center border-0" style="">
                    <img src="{{empty($item->url_image) ? asset('vendor/img/main/img-not-found-potrait.png') : asset($item->url_image)}}"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ Str::limit($item->title, 15, $end='...') }}</h5>
                        <a href="product/{{$item->slug}}/detail" class="btn btn-sm btn-our-grey">Tampilkan</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="card shadow col mb-3" style="">
                <div class="row no-gutters">
                    <div class="card-body text-center p-5">
                        <h5 class="card-title">Ups.. Maaf, Product masih dalam pengisian</h5>
                        <p class="card-text mb-3">Mimin Cakep</p>
                        <p class="card-text">Mohon ditunggu ya kabar selanjutnya...
                            tetap cantik.
                        </p>
                        <p class="card-text"><small class="text-muted">Last updated hmm mins ago</small></p>
                    </div>
                </div>
            </div>
            @endforelse

        </div>
    </div>
    <div class="container mb-4">
        <h1 class="text-our-grey font-weight-bolder">CATEGORY</h1>
        <div class="row py-3 justify-content-center">
            @forelse ($category as $item)
            <div class="col-md-3">
                <div class="card text-center border-0" style="">
                    <img src="{{empty($item->thumbnail_url) ? asset('vendor/img/main/img-not-found-potrait.png') : asset($item->thumbnail_url)}}"
                        class="card-img-top" alt="{{$item->category_name}}">
                    <div class="card-body">
                        <h5 class="card-title">{{ Str::limit($item->category_name, 18, $end='...') }}</h5>
                        <a href="category/{{$item->id}}" class="btn btn-sm btn-our-grey">Tampilkan</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="card shadow col mb-3" style="">
                <div class="row no-gutters">
                    <div class="card-body text-center p-5">
                        <h5 class="card-title">Ups.. Maaf, Kategori masih dalam pengisian</h5>
                        <p class="card-text mb-3">Mimin Cakep</p>
                        <p class="card-text">Mohon ditunggu ya kabar selanjutnya...
                            tetap cantik.
                        </p>
                        <p class="card-text"><small class="text-muted">Last updated hmm mins ago</small></p>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>


@endsection