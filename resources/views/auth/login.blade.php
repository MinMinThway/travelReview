<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>
    {{-- Bootstrap Css --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
     crossorigin="anonymous">
     {{-- Css --}}
     <link rel="stylesheet" href="{{ asset('asset/auth/login-style.css') }}">
      <!-- Font Fmaily -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <!-- Font Fmaily -->
</head>
<body style="background-image: url('{{asset('asset/client/images/banner2.jpg')}}'); height: 500px; opacity:0.9">
    <div class="container login-container"   >
        <h3 class="text-center">Travel Blog</h3>
        <div class="row all">
            <div class="col-6">
                <div class="card card-style">
                    <div class="card-body">
                       <img src="{{asset('asset/auth/img/logo.jpg')}}" alt="" class="img-fluid img">
                    </div>
                    <a href="{{ route('register') }}" class="card-links link ml-3 pb-4">create account?</a>
                </div>
            </div>
            <div class="col-6">
                <div class="card card-style">
                    <div class="card-body">
                        <h3>Login</h3>
                       <form action="{{route('loginValidate')}}" method="POST">
                        @csrf
                        <div class="input-group mb-3 mt-5">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                  <span class="fas fa-envelope"></span>
                                </div>
                              </div>
                            <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Enter Email" >
                        </div>
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                        <div class="input-group mb-3 mt-5">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                  <span class="fas fa-envelope"></span>
                                </div>
                              </div>
                            <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Enter Password" >
                        </div>
                        <p class="text-danger">{{ $errors->first('password') }}</p>
                            <input type="checkbox" name="" id="" class="mr-3">Remember Me
                            <div class="form-group">
                                <button class="btn btn-primary pl-5 pr-5 mt-3">Login</button>
                            </div>
                       </form>
                       <div class="mt-4">
                           Or login with <i class="fab fa-facebook fa-1x text-primary pr-2"></i>
                           <i class="fab fa-twitter-square text-primary pr-2"></i><i class="fab fa-google text-danger pr-2"></i>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Bootstrap JavaScript --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
