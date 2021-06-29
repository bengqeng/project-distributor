@extends('landingpage.master_landingpage')
@section('main-content')
@section('title', 'Category')
<div class="about-landing-page">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-our-grey shadow">
                <li class="breadcrumb-item"><a class="text-3l-white" href="{{route('landingpage.index')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category</li>
            </ol>
        </nav>
        <h2 class="text-white font-weight mt-3">For All About Product</h2>
        <h3 class="text-white font-weight-bolder mt-1">OUR CATEGORY</h3>
        <div class="container-fluid">
            <div class="row justify-content-center p-5">

                @forelse ($category as $item)
                <div id="card-product" class="col-lg-3 py-3 px-4">
                    <div class="card text-white">
                        <img class="card-img"
                            src="{{empty($item->thumbnail_url) ? asset('vendor/img/main/img-not-found-potrait.png') : asset($item->thumbnail_url)}}"
                            alt="Card image">
                        <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                            <h5 class="card-title font-weight-bold text-center">
                                {{ Str::limit($item->category_name, 20, $end='...') }}</h5>
                            <a class="align-self-center btn-sm btn-our-grey" href="category/{{$item->id}}">View
                                Inside</a>
                            {{-- <button class="align-self-center btn-sm btn-our-grey">View Product</button> --}}
                        </div>
                    </div>
                </div>
                @empty
                <div class="card mb-3" style="">
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
                {!! $category->onEachSide(0)->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection