@extends('landingpage.master_landingpage')
@section('main-content')
@section('title', 'Gallery')
<div class="gallery-landing-page">
    <div class="container">
        <h1 class="text-white font-weight-bolder mt-3 ml-5 mb-4">Gallery</h1>
        <div class="container">
            <div class="col-lg-12 mb-4 grid">
                <div class="row justify-content-center text-center align-content-center">
                    @for ($i = 0; $i < 25; $i++) <div class="col-lg-2 grid-item m-1 border-1 p-0">
                        <div class="card text-center border-0" style="">
                            <img src="https://via.placeholder.com/800x{{mt_rand(500,800)}}" class="card-img-top"
                                alt="...">
                            {{-- <div class="card-body bg-our-white">
                                            <h5 class="card-title">Card title</h5>
                                            <a href="#" class="btn btn-sm btn-our-grey">Go somewhere</a>
                                        </div> --}}
                        </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</div>
</div>
@endsection
