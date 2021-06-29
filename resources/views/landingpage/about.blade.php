@extends('landingpage.master_landingpage')
@section('main-content')
@section('title', 'About Us')
<div class="carousel-landing-page">
    <div class="container">
        <h1 class="text-white font-weight-bolder mt-3 text-uppercase">
            {{$about->count()>0 ? $about->first()->title : 'About U'}}</h1>
        <div class="row">
            <div class="col-lg-6 py-3 ml-1px-0">
                <div class="p-4">
                    <img class="card-img"
                        src="{{empty($about->first()->url_image) ? asset('vendor/img/main/img-not-found-landscape.png') : asset($about->first()->url_image)}}"
                        alt="Card image">
                    <div class="row mt-3">
                        <div class="col-1"><a class="text-our-white"
                                href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"><i
                                    class="fab con fa-facebook" style="font-size:24px"></i></a></div>
                        <div class="col-1"><a class="text-our-white"
                                href="http://twitter.com/share?text={{$about->count() > 0 ? $about->first()->title : 'Judul Masih Kosong'}}!!! &url={{ url()->current() }} &hashtags=hashtag1,hashtag2,hashtag3"><i
                                    class="fab con fa-twitter" style="font-size:24px"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 py-3 px-0 aboutbg" id="rightcolumn">
                <div class="text-white p-2">
                    <p class="p-5">
                        {{$about->count()>0 ? $about->first()->description : 'About is running empty'}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection