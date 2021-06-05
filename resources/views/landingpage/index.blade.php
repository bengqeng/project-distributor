@extends('landingpage.master_landingpage')
@section('main-content')

<div class="carousel-landing-page">
    <div class="container pb-5 px-0">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="https://via.placeholder.com/1000x700" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://via.placeholder.com/1000x700" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://via.placeholder.com/1000x700" alt="Third slide">
                </div>
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

{{-- <div class="topCarousel" style="background-color: #48524F; height: 500px; width: 100%">
    <!-- Indicators -->
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    <!-- The slideshow -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://www.w3schools.com/bootstrap4/ny.jpg" alt="Los Angeles" width="1100" height="500">
        </div>
        <div class="carousel-item">
            <img src="https://www.w3schools.com/bootstrap4/chicago.jpg" alt="Chicago" width="1100" height="500">
        </div>
        <div class="carousel-item">
            <img src="https://www.w3schools.com/bootstrap4/la.jpg" alt="New York" width="1100" height="500">
        </div>
    </div>
    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div> --}}

<!-- NEWS SECTION -->
<div class="news-landing-page pb-5">
    <div class="container">
        <h1 class="text-white font-weight-bolder mt-5">NEWS</h1>
        <div class="row">
            <div class="col-6 py-3 px-0 news-col">
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
            <div class="col-3 py-3 px-0 news-col">
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
            <div class="col-3 py-3 px-0 news-col">
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
{{-- <div class="news" id="about" style="background-color: #48524F; height: 650px; width: 100%">
    <div class="container">
        <h1 class="text-left" style="color:white">NEWS</h1>
        <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="card">
                    <div class="card-img">
                        <img src="images/posts/polit.jpg" class="img-fluid">
                    </div>

                    <div class="card-body">
                        <h4 class="card-title">Post Title</h4>
                        <p class="card-text">

                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="" class="card-link">Read more</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="card">
                    <div class="card-img">
                        <img src="images/posts/images.jpg" class="img-fluid">
                    </div>

                    <div class="card-body">
                        <h4 class="card-title">Post Title</h4>
                        <p class="card-text">

                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="" class="card-link">Read more</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="card">
                    <div class="card-img">
                        <img src="images/posts/imag2.jpg" class="img-fluid">
                    </div>

                    <div class="card-body">
                        <h4 class="card-title">Post Title</h4>
                        <p class="card-text">

                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="" class="card-link">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!-- PRODUCT SECTION -->
<div class="product-landing-page py-5">
    <div class="container">
        <h1 class="text-our-grey font-weight-bolder">FAVORITE PRODUCT</h1>
        <div class="row py-3">
            <div class="col-sm-3">
                <div class="card text-center" style="">
                    <img src="https://via.placeholder.com/1000x700" class="card-img-top" alt="...">
                    <div class="card-body bg-our-white">
                        <h5 class="card-title">Card title</h5>
                        <a href="#" class="btn btn-sm btn-our-grey">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card text-center" style="">
                    <img src="https://via.placeholder.com/1000x700" class="card-img-top" alt="...">
                    <div class="card-body bg-our-white">
                        <h5 class="card-title">Card title</h5>
                        <a href="#" class="btn btn-sm btn-our-grey">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card text-center" style="">
                    <img src="https://via.placeholder.com/1000x700" class="card-img-top" alt="...">
                    <div class="card-body bg-our-white">
                        <h5 class="card-title">Card title</h5>
                        <a href="#" class="btn btn-sm btn-our-grey">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card text-center" style="">
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
        <h1 class="text-our-grey font-weight-bolder">SHOP BY CATEGORY</h1>
        <div class="row py-3">
            <div class="col-sm-3">
                <div class="card text-center" style="">
                    <img src="https://via.placeholder.com/1000x700" class="card-img-top" alt="...">
                    <div class="card-body bg-our-white">
                        <h5 class="card-title">Card title</h5>
                        <a href="#" class="btn btn-sm btn-our-grey">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card text-center" style="">
                    <img src="https://via.placeholder.com/1000x700" class="card-img-top" alt="...">
                    <div class="card-body bg-our-white">
                        <h5 class="card-title">Card title</h5>
                        <a href="#" class="btn btn-sm btn-our-grey">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card text-center" style="">
                    <img src="https://via.placeholder.com/1000x700" class="card-img-top" alt="...">
                    <div class="card-body bg-our-white">
                        <h5 class="card-title">Card title</h5>
                        <a href="#" class="btn btn-sm btn-our-grey">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card text-center" style="">
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

</html>

@endsection
