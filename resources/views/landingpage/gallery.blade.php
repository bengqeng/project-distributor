@extends('landingpage.master_landingpage')
@section('main-content')
@section('title', 'Gallery')
<div class="gallery-landing-page">
    <div class="container">
        <h1 class="text-white font-weight-bolder mt-3 ml-5 mb-4">Gallery</h1>
        <div class="container">
            <div class="mb-4">
                <div class="grid gallery justify-content-center ">
                    @forelse ($pictures as $item)
                    <div style="max-width: 300px" class="grid-item m-1 border-1 p-0">
                        <div class="card text-center border-0" style="">
                            <a
                                href="{{empty($item->url_path) ? asset('vendor/img/main/img-not-found-landscape.png') : asset($item->url_path)}}">
                                <img src="{{empty($item->url_path) ? asset('vendor/img/main/img-not-found-landscape.png') : asset($item->url_path)}}"
                                    class="card-img-top" alt="...">
                            </a>
                        </div>
                    </div>
                    @empty
                    <div style="max-width: 300px" class="grid-item m-1 border-1 p-0">
                        <div class="card text-center border-0" style="">
                            <a
                                href="{{empty($item->url_path) ? asset('vendor/img/main/img-not-found-landscape.png') : asset($item->url_path)}}">
                                <img src="{{asset('vendor/img/main/img-not-found-potrait.png')}}" class="card-img-top"
                                    alt="...">
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