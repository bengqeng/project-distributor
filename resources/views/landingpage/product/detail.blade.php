@extends('landingpage.master_landingpage')
@section('main-content')
@section('title', $product->title)
<div class="product-landing-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 py-3 ml-1px-0">
                <div class="p-4">
                  <div id="carouselProduct" class="carousel slide" data-ride="carousel">
                    {{-- <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol> --}}
                    <div class="carousel-inner mr-5">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="http://placehold.it/150x120/e8117f/fff&amp;text=Product+Main" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="http://placehold.it/150x120/00ffff/000&amp;text=Product+Image+2" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="http://placehold.it/150x120/ff00ff/fff&amp;text=Product+Image+3" alt="Third slide">
                        </div>
                    </div>
                    {{-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a> --}}
                    <div class="clearfix">
                      <div id="thumbcarousel" class="carousel slide" data-interval="false">
                          <div class="carousel-inner">
                              <div class="item active">
                                  <div data-target="#carouselProduct" data-slide-to="0" class="thumb ml-2 mr-4"><img src="http://placehold.it/100/e8117f/fff&amp;text=Product+Main"></div>
                                  <div data-target="#carouselProduct" data-slide-to="1" class="thumb ml-2 mr-1"><img src="http://placehold.it/100/00ffff/000&amp;text=Product+Image+2"></div>
                                  <div data-target="#carouselProduct" data-slide-to="2" class="thumb ml-4"><img src="http://placehold.it/100/ff00ff/fff&amp;text=Product+Image+3"></div>
                              </div>
                          </div>
                      </div>
                    </div>
                 </div>
               </div>
             </div>
            <div class="col-lg-6 py-2 px-0" id="rightcolumn">
                <div class="text-white p-2">
                  <h1 style="font-weight: bold" class="mb-0 mt-4 pt-3">{!! $product->title !!}</h1>
                  <h3>{!! $product->series !!}</h3>
                    <p class="p-2">
                      {!! $product->description !!}
                    </p>
                </div>
              <div>
                <div class="row pt-5 mt-5 mb-4">
                    <h5 class="ml-5">Share On</h5>
                    <div class="col-1 ml-3"><a class="text-our-white" href="!#"><i class="fab con fa-facebook"
                                style="font-size:24px"></i></a></div>
                    <div class="col-1"><a class="text-our-white" href="!#"><i class="fab con fa-instagram"
                                style="font-size:24px"></i></a></div>
                    <div class="col-1"><a class="text-our-white" href="http://twitter.com/share?text=Produk Bagus Guys check it out !!! &url={{ url()->current() }} &hashtags=hashtag1,hashtag2,hashtag3"><i class="fab con fa-twitter"
                                style="font-size:24px"></i></a></div>
                </div>
                <div class="col-md-12 mb-5">
                  <nav>
                      <div class="nav nav-tabs nav-fill p-3" id="nav-tab" role="tablist">
                          <a class="nav-item nav-link ablack active" id="nav-home-tab" data-toggle="tab" href="#nav-description" role="tab" aria-controls="nav-description" aria-selected="true">DESCRIPTION</a>
                          <a class="nav-item nav-link ablack" id="nav-profile-tab" data-toggle="tab" href="#nav-howto" role="tab" aria-controls="nav-howto" aria-selected="false">HOW TO USE</a>
                          <a class="nav-item nav-link ablack" id="nav-contact-tab" data-toggle="tab" href="#nav-ingredients" role="tab" aria-controls="nav-ingredients" aria-selected="false">INGREDIENTS</a>
                      </div>
                  </nav>
                  <div class="tab-content text-black" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="nav-description" role="tabpanel" aria-labelledby="nav-home-tab">
                      <p>
                        {!! $product->tabdesc !!}
                      </p>
                      </div>
                      <div class="tab-pane fade" id="nav-howto" role="tabpanel" aria-labelledby="nav-profile-tab">
                        {!! $product->howtouse !!}
                      </div>
                      <div class="tab-pane fade" id="nav-ingredients" role="tabpanel" aria-labelledby="nav-contact-tab">
                        {!! $product->ingredients !!}
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
