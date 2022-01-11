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
        <div class="row">
            <div class="col-12 register-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">Create Account</h3>
                        <form action="{{ route('register.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}">
                                <p class="text-danger" id="nameError">{{$errors->first('name')}}</p>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}">
                                <p class="text-danger" id="emailError">{{$errors->first('email')}}</p>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control" name="password" value="{{ old('password') }}">
                                <p class="text-danger" id="passwordError">{{$errors->first('password')}}</p>
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" id="check" class="form-check-input" id="check" name="checkbox">
                                <label for="check">I agreee all the statements in <u>Terms of Services</u></label>
                                <p class="text-danger" id="checkError">{{$errors->first('checkbox')}}</p>
                            </div>
                            <div class="form-group">
                               <button class="btn btn-primary form-control">SIGN UP</button>
                            </div>
                        </form>

                        <p class="text-center mt-3">Have already an account? <b><a href="{{ route('login') }}" class="text-dark">Login here</a></b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Bootstrap JavaScript --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
  
    document.getElementById("name").addEventListener("keyup",function(){
        document.getElementById("nameError").style.display="none";
    });
    document.getElementById("email").addEventListener("keyup", function(){
        document.getElementById("emailError").style.display = "none";
    });

    document.getElementById("password").addEventListener("keyup", function(){
        document.getElementById("passwordError").style.display = "none";
    });
    document.getElementById("check").addEventListener("click", function(){
        document.getElementById("checkError").style.display="none";
    })
</script>
</body>
</html>