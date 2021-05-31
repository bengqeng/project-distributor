@extends('landingpage.master_landingpage')
@section('main-content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

    <div class="topCarousel" style="background-color: #48524F; height: 500px; width: 100%">
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
    </div>

    <!-- NEWS SECTION -->
    <div class="news" id="about" style="background-color: #48524F; height: 650px; width: 100%" >
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
    </div>

    <!-- PRODUCT SECTION -->
    <div class="product">
        <div class="container">
        <h1 class="text-left">FAVORITE PRODUCT</h1>
            <div class="row">
                    <div class="column">
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

                    <div class="column">
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

                    <div class="column">
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

                    <div class="column">
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

                    <div class="column">
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

        <div class="container">
            <h1 class="text-left">SHOP BY CATEGORY</h1>
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
                        <div class="column">
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
    </div>
</html>

@endsection

@section('js-script')
  <script>

  </script>
@endsection
