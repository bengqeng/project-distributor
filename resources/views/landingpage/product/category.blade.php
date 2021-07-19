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
                    <div class="card text-white border-0">
                        <div class="text-center " style="">
                            <img src="{{empty($item->CategoryPict) ? asset('vendor/img/main/img-not-found-potrait.png') : asset($item->CategoryPict)}}"
                                class="card-img-top" alt="{{$item->CatetgoryName}}">
                            <div class="card-body">
                                <h5 class="card-title">{{ Str::limit($item->CatetgoryName, 15, $end='...') }}</h5>
                                @if ($item->sum > 0)
                                <a href="{{route('landingpage.product.show', $item->CatetgoryId)}}"
                                    class="btn btn-sm btn-our-grey">Tampilkan</a>
                                @else
                                <a class="btn btn-sm btn-our-grey disabled">Coming Soon</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="card mb-3" style="">
                    <div class="row no-gutters">
                        <div class="card-body text-center p-5">
                            <h5 class="card-title">Ups.. Maaf, halaman Kategori masih dalam pengisian</h5>
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