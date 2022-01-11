@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Creating Article</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div>
      </div>
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                  <a href="{{route('admin.article.index')}}" class="btn btn-info">Back  - </a>
                 <form action="{{route('admin.article.store')}}" method="POST" enctype="multipart/form-data">
                   @csrf
                     <div class="form-group">
                        <label for="name">Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" id="error" class="form-control">
                            <p class="text-danger" id="errors">{{$errors->first("name")}}</p>
                      </div>

                      <div class="form-group">
                        <label for="review">Review</label>
                        <textarea name="review" value="{{ old('review') }}"  id="error" cols="30" rows="10" class="form-control"></textarea>
                        <p class="text-danger" id="errors">{{$errors->first("review")}}</p>
                      </div>
                      <div class="form-group">
                        <label for="read_time">Read_Time</label>
                        <input type="text" value="{{ old('read_time') }}"  name="read_time" id="error" class="form-control">
                        <p class="text-danger" id="errors">{{$errors->first("read_time")}}</p>
                      </div>
                      <div class="form-group">
                        <label for="category">Category_Name</label>
                        <select name="cat_id" id="" class="form-control">
                            <option value="" class="disable">--Select One--</option>
                            @foreach ($categories as $item)
                            <option value="{{$item->id}}" {{ $item->id == old('cat_id')? 'selected' : '' }} id="error"  >{{$item->name}}</option>
                            @endforeach
                        </select>
                        <p class="text-danger" id="errors">{{$errors->first("cat_id")}}</p>
                      </div>
                      <div class="form-group">
                          <label for="">Image</label>
                          <input type="file" name="image" id="error" class="form-control">
                          <p class="text-danger" id="errors">{{$errors->first("image")}}</p>
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
    document.querySelectorAll("#error")[0].addEventListener("keyup", function(){
      document.querySelectorAll("#errors")[0].style.display="none";
    });
    document.querySelectorAll("#error")[1].addEventListener('keyup', function(){
      document.querySelectorAll("#errors")[1].style.display="none";
    });
    document.querySelectorAll("#error")[2].addEventListener('keyup', function(){
      document.querySelectorAll("#errors")[2].style.display="none";
    });
    document.querySelectorAll("#error")[3].addEventListener("click", function(){
      document.querySelectorAll("#errors")[3].style.display="none";
    });
    document.querySelectorAll("#error")[5].addEventListener("click", function(){
      document.querySelectorAll("#errors")[4].style.display="none";
    });
  </script>
@endsection
