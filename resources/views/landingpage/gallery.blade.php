@extends('landingpage.master_landingpage')
@section('main-content')
@section('title', 'Gallery')
<div class="gallery-landing-page">
    <div class="container">
        <h1 class="text-white font-weight-bolder mt-3">Gallery</h1>
        <div class="container mt-5">
            <div class="mb-4">
                <div class="grid gallery justify-content-center ">
                    @forelse ($pictures as $item)
                    <div style="max-width: 300px" class="grid-item m-1 border-1 p-0">
                        <div class="card text-center border-0" style="">
                            <a class="gallery-demo"
                                href="{{empty($item->url_path) ? asset('vendor/img/main/img-not-found-landscape.png') : asset($item->url_path)}}">
                                <img src="{{empty($item->url_path) ? asset('vendor/img/main/img-not-found-landscape.png') : asset($item->url_path)}}"
                                    class="card-img-top" alt="{{$item->title}}">
                            </a>
                        </div>
                    </div>
                    @empty
                    <div style="max-width: 300px" class="grid-item m-1 border-1 p-0">
                        <div class="card text-center border-0 text-white" style="">
                            <a class="text-our-grey gallery-demo"
                                href="{{asset('vendor/img/main/img-not-found-landscape.png') }}">
                                <img src="{{asset('vendor/img/main/img-not-found-potrait.png')}}" class="card-img-top"
                                    alt="empty image">

                                <div class="card-body text-center p-5">
                                    <h5 class="card-title">Ups.. Maaf, halaman Gallery masih dalam pengisian</h5>
                                    <p class="card-text">Mohon ditunggu ya kabar selanjutnya...
                                        tetap cantik.
                                    </p>
                                    <p class="card-text"><small class="text-muted">Last updated hmm mins ago</small></p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection