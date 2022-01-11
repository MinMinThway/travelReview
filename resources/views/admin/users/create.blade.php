@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Creating User</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
    </div>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                  <a href="{{ route('admin.user.index') }}" class="btn btn-primary">Back+</a>
                    <form action="{{ url('admin/user ') }}" method="post" enctype="multipart/form-data">
                      @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="errorName" value="{{ old('name') }}" class="form-control">
                            <p class="text-danger" id="errorsName">{{ $errors->first('name') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="errorEmail" value="{{ old('email') }}" class="form-control">
                            <p class="text-danger" id="errorsEmail">{{ $errors->first('email') }}</p>
                        </div>
                        <div>
                            <label for="password">Password</label>
                            <input type="password" name="password" id="errorPsw" value="{{ old('password') }}" class="form-control">
                            <p class="text-danger" id="errorsPsw">{{ $errors->first('password') }}</p>
                        </div>
                        <div class="custom-control custom-switch mt-3">
                            <input type="checkbox" name="role" class="custom-control-input" id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1">Admin</label>
                        </div>
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-success">Sumbit</button>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection

@section("js")
<script>
    document.querySelector("#errorName").addEventListener("keyup", function(){
        document.querySelector("#errorsName").style.display ="none";
    });

    document.querySelector("#errorEmail").addEventListener("keyup", function(){
        document.querySelector("#errorsEmail").style.display ="none";
    });

    document.querySelector("#errorPsw").addEventListener("keyup", function(){
        document.querySelector("#errorsPsw").style.display="none";
    })
</script>
@endsection

