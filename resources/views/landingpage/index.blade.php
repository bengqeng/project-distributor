@extends('landingpage.master_landingpage')
@section('main-content')
@section('title', 'Index')

<div class="carousel-landing-page">
    <div class="container pb-5 px-0">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                {{-- {{dd($carousel)}} --}}
                @forelse ($carousel as $index => $items)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{$index}}"
                    class="@if ($items == $carousel->first()) active @endif"></li>
                @empty
                @endforelse
            </ol>
            <div class="carousel-inner">
                @forelse ($carousel as $item)
                <div class="carousel-item @if ($item == $carousel->first()) active @endif">
                    <img class="d-block w-100" src="{{asset($item->url_image) }}" alt="{{asset($item->description) }}">
                </div>
                @empty
                <div class="carousel-item ">
                    <img class="d-block w-100" src="https://via.placeholder.com/1000x700">
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
        <div class="row">
            <div class="col-sm-6 py-3 px-0 news-col">
                <div class="card bg-dark text-white">
                    <img class="card-img" src="https://via.placeholder.com/1000x700" alt="Card image">
                    <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                        <h5 class="card-title font-weight-bold">The Beauty of Friendship</h5>
                        <p class="card-text mb-0">author</p>
                        <p class="card-text mb-0">Last updated 3 mins ago</p>
                        <button class="align-self-end btn btn-sm btn-light float-right">read more</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3 py-3 px-0 news-col">
                <div class="card bg-dark text-white">
                    <img class="card-img" src="https://via.placeholder.com/285x400" alt="Card image">
                    <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                        <h5 class="card-title font-weight-bold">The Beauty of Friendship</h5>
                        <p class="card-text mb-0">author</p>
                        <p class="card-text mb-0">Last updated 3 mins ago</p>
                        <button class="align-self-end btn btn-sm btn-light float-right">read more</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3 py-3 px-0 news-col">
                <div class="card bg-dark text-white">
                    <img class="card-img" src="https://via.placeholder.com/1000x700" alt="Card image">
                    <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                        <h5 class="card-title font-weight-bold">The Beauty of Friendship</h5>
                        <p class="card-text mb-0">author</p>
                        <p class="card-text mb-0">Last updated 3 mins ago</p>
                        <button class="align-self-end btn btn-sm btn-light float-right">read more</button>
                    </div>
                </div>
                <div class="card bg-dark text-white">
                    <img class="card-img" src="https://via.placeholder.com/1000x700" alt="Card image">
                    <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                        <h5 class="card-title font-weight-bold">The Beauty of Friendship</h5>
                        <p class="card-text mb-0">author</p>
                        <p class="card-text mb-0">Last updated 3 mins ago</p>
                        <button class="align-self-end btn btn-sm btn-light float-right">read more</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="btn btn-sm btn-light d-flex d-none float-right" href="/news/all" role="button">Open All</a>
            </div>
        </div>
    </div>
</div>

<!-- PRODUCT SECTION -->
<div class="product-landing-page py-5 bg-our-white">
    <div class="container">
        <h1 class="text-our-grey font-weight-bolder">FAVORITE PRODUCT</h1>
        <div class="row py-3">
            <div class="col-md-3">
                <div class="card text-center border-0" style="">
                    <img src="https://via.placeholder.com/1000x700" class="card-img-top" alt="...">
                    <div class="card-body bg-our-white">
                        <h5 class="card-title">Card title</h5>
                        <a href="#" class="btn btn-sm btn-our-grey">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center border-0" style="">
                    <img src="https://via.placeholder.com/1000x700" class="card-img-top" alt="...">
                    <div class="card-body bg-our-white">
                        <h5 class="card-title">Card title</h5>
                        <a href="#" class="btn btn-sm btn-our-grey">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center border-0" style="">
                    <img src="https://via.placeholder.com/1000x700" class="card-img-top" alt="...">
                    <div class="card-body bg-our-white">
                        <h5 class="card-title">Card title</h5>
                        <a href="#" class="btn btn-sm btn-our-grey">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center border-0" style="">
                    <img src="https://via.placeholder.com/1000x700" class="card-img-top" alt="...">
                    <div class="card-body bg-our-white">
                        <h5 class="card-title">Card title</h5>
                        <a href="#" class="btn btn-sm btn-our-grey">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h1 class="text-our-grey font-weight-bolder">CATEGORY</h1>
        <div class="row py-3">
            <div class="col-md-3">
                <div class="card text-center border-0" style="">
                    <img src="https://via.placeholder.com/1000x700" class="card-img-top" alt="...">
                    <div class="card-body bg-our-white">
                        <h5 class="card-title">Card title</h5>
                        <a href="#" class="btn btn-sm btn-our-grey">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center border-0" style="">
                    <img src="https://via.placeholder.com/1000x700" class="card-img-top" alt="...">
                    <div class="card-body bg-our-white">
                        <h5 class="card-title">Card title</h5>
                        <a href="#" class="btn btn-sm btn-our-grey">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center border-0" style="">
                    <img src="https://via.placeholder.com/1000x700" class="card-img-top" alt="...">
                    <div class="card-body bg-our-white">
                        <h5 class="card-title">Card title</h5>
                        <a href="#" class="btn btn-sm btn-our-grey">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center border-0" style="">
                    <img src="https://via.placeholder.com/1000x700" class="card-img-top" alt="...">
                    <div class="card-body bg-our-white">
                        <h5 class="card-title">Card title</h5>
                        <a href="#" class="btn btn-sm btn-our-grey">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection