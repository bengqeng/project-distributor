@extends('landingpage.master_landingpage')
@section('main-content')
<div class="carousel-landing-page">
    <div class="container">
        <h2 class="text-white font-weight mt-3 ml-5">SHOP BY CATEGORY</h2>
        <h3 class="text-white font-weight-bolder mt-1 ml-5 mb-5">BODY SERIES</h3>
        <div class="container-fluid">
            <div class="row justify-content-center p-5">
                @for ($i = 0; $i < 50; $i++) <div class="col-lg-3 py-3 px-4">
                    <div class="card text-white">
                        <img class="card-img" src="https://via.placeholder.com/285x400" alt="Card image">
                        <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                            <button class="align-self-center btn-sm btn-our-grey">View Product</button>
                        </div>
                    </div>
            </div>
            @endfor
        </div>
    </div>
</div>
</div>
@endsection