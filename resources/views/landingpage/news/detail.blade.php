@extends('landingpage.master_landingpage')
@section('main-content')
@section('title', $news->title)
<div class="show-news">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-our-grey shadow">
                <li class="breadcrumb-item"><a class="text-3l-white" href="{{route('landingpage.index')}}">Home</a></li>
                <li class="breadcrumb-item" aria-current="page"><a class="text-3l-white"
                        href="{{route('landingpage.news.all')}}">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">{!!$news->title!!}</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-lg-6 py-3 ml-1px-0">
                <div class="">
                    <img class="card-img"
                        src="{{empty($news->url_image) ? asset('vendor/img/main/img-not-found-landscape.png') : asset($news->url_image)}}"
                        alt="Card image">
                    <div class="row mt-3">
                        <div class="col-1"><a class="text-our-white"
                                href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"><i
                                    class="fab con fa-facebook" style="font-size:24px"></i></a></div>
                        <div class="col-1"><a class="text-our-white"
                                href="http://twitter.com/share?text={!!$news->title!!} !!! &url={{ url()->current() }} &hashtags=hashtag1,hashtag2,hashtag3"><i
                                    class="fab con fa-twitter" style="font-size:24px"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 py-3 px-0 bg-3l-grey" id="rightcolumn">
                <div class="text-white px-5">
                    <h4 class="card-title">{!! $news->title !!}</h4>
                    <p class="card-text mb-0">Author : {!! $news->author !!}</p>
                    <p class="card-text mb-3">Last updated {!! $news->updated_at->diffForHumans() !!}</p>
                    <p class="pb-3">
                        {!! $news->body_article !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection