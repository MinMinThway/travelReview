<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield("meta")
    <title>Personal Blog</title>
    <!-- Bootstrap Css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Bootstrap Css -->
    <!-- Css -->
    <link rel="stylesheet" href="{{asset('asset/client/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('asset/client/css/article.css')}}">
    <!-- Css -->
    <!-- Font Fmaily -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <!-- Font Fmaily -->
</head>
<body>

   <header style="background-image: url('{{asset('asset/client/images/banner2.jpg')}}'); height: 600px; width :100%; " id="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark navbar-style">
        <a class="navbar-brand text"><h3>A Ordiary Traveler</h3></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarTogglerDemo01">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="{{route('client')}}" class="nav-link text">Home</a>
            </li>
             <li class="nav-item">
                <a href="{{ route('client.articel') }}" class="nav-link text">Articles</a>
            </li>
             <li class="nav-item">
                <a href="{{ route('client.contact') }}" class="nav-link text">Contact</a>
            </li>
             <li class="nav-item">
                @auth
                {{-- <div class="dropdown">
                    <a class="nav-link text loginName">{{ Auth::user()->name }}</a>                    <div class="dropdown-content">
                    <a href="{{ route('logout') }}" class="text-dark">Logout</a>
                    </div>
                  </div> --}}
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-white">{{Auth::user()->name }}</span>
              </a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('logout') }}">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
                @endauth
                @guest
                <a href="{{ route('login') }}" class="nav-link text loginName pl-3 pr-3">Login</a>
                @endguest
            </li>
        </ul>
        </div>
    </nav>
    <div class="container-fluid title">
        <h4 class="blog-greeding">Hello! Welcome to</h4>
        <h1 class="blog-title">A Ordiary Traveler</h1>
        <p class="blog-description">
            Hello, I am a travel enthusisat and currently live in Myanmar, so I am going on a study tour of many parts....I will share my experiences in this blog as a review thank you...
        </p>
    </div>
   </header>
   <div class="container-fluid">
   <!-- body section -->
   <section class="body-section">
    @yield('content')
   </section>
 <!-- body section -->
<!-- pagination -->
@yield("pagination")

<!-- pagination -->
 <!-- footer -->
   <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <h3><p>Readit</p></h3>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo reprehenderit at nisi maxime numquam voluptatem laboriosam architecto ratione. Perferendis exercitationem eligendi consequatur iure dolor deleniti corrupti distinctio quasi nostrum cumque.
                    </p>
                   <div class="footer-icon">
                    <i class="fab fa-2x fa-facebook-square pl-2"></i>
                    <i class="fab fa-2x fa-twitter-square"></i>
                    <i class="fab fa-2x fa-instagram-square"></i>
                   </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <h3><p>latest News</p></h3>
                    <div class="row mt-4">
                        <div class="col-5">
                         <img src="https://preview.colorlib.com/theme/readit/images/ximage_1.jpg.pagespeed.ic.ndb4JOHu-q.webp"  width="110" alt="Image Error">
                        </div>
                        <div class="col-7">
                            <a href="#">
                                <p>Even the all-powerful Pointing has no control about <i>11/13/2019 </i></p>
                            </a>

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-5">
                         <img src="https://preview.colorlib.com/theme/readit/images/ximage_1.jpg.pagespeed.ic.ndb4JOHu-q.webp"  width="110" alt="Image Error">
                        </div>
                        <div class="col-7">
                            <a href="#">
                                <p>Even the all-powerful Pointing has no control about  <i>11/13/2019 </i></p>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                   <h3><p>Information</p></h3>
                   <ul class="list-unstyled list">
                       <li><i class="fas fa-angle-right list-icon"></i>Home</li>
                       <li><i class="fas fa-angle-right list-icon"></i>About</li>
                       <li><i class="fas fa-angle-right list-icon"></i>Article</li>
                       <li><i class="fas fa-angle-right list-icon"></i>Contact</li>
                   </ul>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <h3><p>Have a Qusetions?</p></h3>
                    <ul class="list-unstyled list">
                        <li><i class="fas fa-map-marker list-icon"></i><span>203 Fake St. Yangon, North Okkalapa, Myanmar</span></li>
                        <li><i class="fas fa-envelope list-icon"></i>minthway668@gmail.com</li>
                        <li><i class="fas fa-phone-alt list-icon"></i> 09598328</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="footer-text">Copyright ©2021 All rights reserved  😁  This template is made   by Min Min Thway</p>
                </div>
            </div>
        </div>
   </section>
  <!-- footer -->
</div>
</body>
   <!-- Bootstrap Java Script-->
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
   <!-- Bootstrap -->
   @yield("js")
</html>
