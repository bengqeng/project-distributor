@extends('landingpage.master_landingpage')
@section('main-content')
@section('title', 'About Us')
<div class="carousel-landing-page">
    <div class="container">
        <h1 class="text-white font-weight-bolder mt-3 ml-5">ABOUT US</h1>
        <div class="row">
            <div class="col-lg-6 py-3 ml-1px-0">
                <div class="p-4">
                    <img class="card-img" src="https://via.placeholder.com/1000x700" alt="Card image">
                    <div class="row mt-3">
                        <div class="col-1"><a class="text-our-white" href="!#"><i class="fab con fa-facebook"
                                    style="font-size:24px"></i></a></div>
                        <div class="col-1"><a class="text-our-white" href="!#"><i class="fab con fa-instagram"
                                    style="font-size:24px"></i></a></div>
                        <div class="col-1"><a class="text-our-white" href="!#"><i class="fab con fa-twitter"
                                    style="font-size:24px"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 py-3 px-0 aboutbg" id="rightcolumn">
                <div class="text-white p-2">
                    <p class="p-5">
                        Where can I get some?
                        There are many variations of passages of Lorem Ipsum available,
                        but the majority have suffered alteration in some form,
                        by injected humour, or randomised words which don't look even slightly believable.
                        If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything
                        embarrassing hidden in the middle of text.
                        All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary,
                        making this the first true generator on the Internet.
                        It uses a dictionary of over 200 Latin words, combined with a handful of model sentence
                        structures, to generate Lorem Ipsum which looks reasonable.
                        The generated Lorem Ipsum is therefore always free from repetition, injected humour, or
                        non-characteristic words etc.asd
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection