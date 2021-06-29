@extends('landingpage.master_landingpage')
@section('main-content')
@section('title', 'Product')
<div class="carousel-landing-page">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-3l-grey shadow">
                <li class="breadcrumb-item"><a class="text-3l-white" href="{{route('landingpage.index')}}">Home</a></li>
                <li class="breadcrumb-item"><a class="text-3l-white"
                        href="{{route('landingpage.product.category')}}">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$category->category_name}}</li>
            </ol>
        </nav>
        <h2 class="text-white font-weight mt-sm-5 ml-5">PRODUCT BY CATEGORY</h2>
        <h3 class="text-white font-weight-bolder mt-1 ml-5 mb-sm-5">{{$category->category_name}}</h3>
        <div class="container-fluid">
            <div class="row justify-content-center p-5">

                @forelse ($products as $item)
                <div id="card-product" class="col-lg-3 py-3 px-4">
                    <div class="card text-our-grey card-img-overlay-shadow">
                        <img class="card-img"
                            src="{{empty($item->url_image) ? asset('vendor/img/main/img-not-found-potrait.png') : asset($item->url_image)}}"
                            alt="Card image">
                        <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                            <h5 class="card-title font-weight-bold text-center text-white">
                                {{ Str::limit($item->title, 20, $end='...') }}</h5>
                            <a class="align-self-center btn-sm btn-our-grey"
                                href="../product/{{$item->slug}}/detail">View
                                Product</a>
                            {{-- <button class="align-self-center btn-sm btn-our-grey">View Product</button> --}}
                        </div>
                    </div>
                </div>
                @empty
                <div class="card col shadow mb-3" style="">
                    <div class="row no-gutters">
                        <div class="card-body text-center p-5">
                            <h5 class="card-title">Ups.. Maaf, halaman Produk masih dalam pengisian</h5>
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
            <div class="d-flex justify-content-center">
                {!! $products->onEachSide(1)->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection