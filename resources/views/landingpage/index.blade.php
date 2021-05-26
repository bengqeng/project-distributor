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

    <div class="about" id="about" style="background-color: #48524F; height: 500px; width: 100%" >
        <div class="container">
          <h1 class="text-center">About Me</h1>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <img src="images/team-3.jpg" class="img-fluid">
                    <span class="text-justify">S.Web Developer</span>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 desc">

                    <h3>D.John</h3>
                    <p>
                       ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- portfolio -->
    <div class="portfolio" id="portfolio">
         <h1 class="text-center">Portfolio</h1>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <img src="images/portfolio/port13.png" class="img-fluid">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <img src="images/portfolio/port1.png" class="img-fluid">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <img src="images/portfolio/port6.png" class="img-fluid">
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <img src="images/portfolio/port3.png" class="img-fluid">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <img src="images/portfolio/port11.png" class="img-fluid">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <img src="images/portfolio/electric.png" class="img-fluid">
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <img src="images/portfolio/Classic.jpg" class="img-fluid">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <img src="images/portfolio/port1.png" class="img-fluid">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <img src="images/portfolio/port8.png" class="img-fluid">
                </div>
            </div>
        </div>
    </div>


    <!-- Posts section -->
    <div class="blog" id="blog">
        <div class="container">
        <h1 class="text-center">Blog</h1>
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

    <!-- Team section -->
    <div class="team" id="team">
        <div class="container">
           <h1 class="text-center">Our Team</h1>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 item">
                    <img src="images/team-2.jpg" class="img-fluid" alt="team">
                    <div class="des">
                         Sara
                     </div>
                    <span class="text-muted">Manager</span>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 item">
                    <img src="images/team-3.jpg" class="img-fluid" alt="team">
                    <div class="des">
                          Chris
                     </div>
                    <span class="text-muted">S.enginner</span>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 item">
                    <img src="images/team-2.jpg" class="img-fluid" alt="team">
                    <div class="des">
                         Layla
                     </div>
                    <span class="text-muted">Front End Developer</span>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 item">
                    <img src="images/team-3.jpg" class="img-fluid" alt="team">
                     <div class="des">
                         J.Jirard
                     </div>
                    <span class="text-muted">Team Manger</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact form -->
    <div class="contact-form" id="contact">
        <div class="container">
            <form>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <h1>Get in Touch</h1>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 right">
                       <div class="form-group">
                            <input type="text" class="form-control form-control-lg" placeholder="Your Name" name="">
                       </div>
                       <div class="form-group">
                            <input type="email" class="form-control form-control-lg" placeholder="YourEmail@email.com" name="email">
                       </div>
                       <div class="form-group">
                            <textarea class="form-control form-control-lg">

                            </textarea>
                       </div>
                       <input type="submit" class="btn btn-secondary btn-block" value="Send" name="">
                    </div>
                </div>
            </form>
        </div>
    </div>
</html>

@endsection

@section('js-script')
  <script>

  </script>
@endsection
