@extends('landingpage.master_landingpage')
@section('main-content')
@section('title', $news->title)
<div class="show-product bg-3l-grey">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 py-3 ml-1px-0">
                <div class="p-4">
                    <img class="card-img" src="https://via.placeholder.com/1000x700" alt="Card image">
                    <div class="row mt-3">
                        <div class="col-1"><a class="text-our-white" href="!#"><i class="fab con fa-facebook"
                                    style="font-size:24px"></i></a></div>
                        <div class="col-1"><a class="text-our-white" href="!#"><i class="fab con fa-instagram"
                                    style="font-size:24px"></i></a></div>
                        <div class="col-1"><a class="text-our-white"
                                href="http://twitter.com/share?text={!!$news->title!!} !!! &url={{ url()->current() }} &hashtags=hashtag1,hashtag2,hashtag3"><i
                                    class="fab con fa-twitter" style="font-size:24px"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 py-3 px-0 aboutbg" id="rightcolumn">
                <div class="text-white p-5">
                    <h4 class="card-title">{!! $news->title !!}</h4>
                    <p class="card-text mb-0">Author : {!! $news->author !!}</p>
                    <p class="card-text mb-3">Last updated {!! $news->updated_at->diffForHumans() !!}</p>
                    <p class="pb-3">
                        {!! $news->content !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection