@extends('landingpage.master_landingpage')
@section('main-content')
@section('title', 'Product')
<div class="carousel-landing-page">
  <div class="container">
    <h2 class="text-white font-weight mt-3 ml-5">SHOP BY CATEGORY</h2>
    <h3 class="text-white font-weight-bolder mt-1 ml-5 mb-5">BODY SERIES</h3>
    <div class="container-fluid">
      <div class="row justify-content-center p-5">
        @forelse ($product as $item)
        <div class="col-lg-3 py-3 px-4">
          <div class="card text-white">
            <img class="card-img" src="https://via.placeholder.com/285x285" alt="Card image">
            <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
              <h5 class="card-title font-weight-bold text-center">{{Str::limit($item->title, 20, $end='...')}}</h5>
              <a class="align-self-center btn-sm btn-our-grey" href="product/{{$item->slug}}/detail">View Product</a>
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
        <div class="d-flex justify-content-center">
          {!! $product->links() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
