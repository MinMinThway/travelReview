@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Creating Category</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                  <a  href="{{ route('admin.category.index') }}" class="btn btn-info" id="cat">Back</a>
                    <form action="{{ route('admin.category.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                            <p class="text-danger mt-2" id="nameError">{{ $errors->first('name') }}</p>
                        </div>
                        <div>
                            <button class="btn btn-success">Submit</button>
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

@section('js')
    <script>
        document.querySelector("#name").addEventListener('keyup', function(){
            document.querySelector("#nameError").style.display="none";
        });
    </script>
@endsection
