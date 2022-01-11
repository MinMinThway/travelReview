@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Editing Article</h1>
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
                  <a href="{{route('admin.article.index')}}" class="btn btn-info">Back  - </a>
                 <form action="{{route('admin.article.update', $article->id)}}" method="POST" enctype="multipart/form-data">
                   @csrf @method("PUT")
                     <div class="form-group">
                        <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $article->name }}" id="error" class="form-control">
                            <p class="text-danger" id="errors">{{$errors->first("name")}}</p>
                      </div>

                      <div class="form-group">
                        <label for="review">Review</label>
                        <textarea name="review" id="error"  cols="30" rows="10" class="form-control">{{ $article->review }}</textarea>
                        <p class="text-danger" id="errors">{{$errors->first("name")}}</p>
                      </div>
                      <div class="form-group">
                        <label for="read_time">Read_Time</label>
                        <input type="text" name="read_time" id="error" value="{{ $article->read_time }}" class="form-control">
                        <p class="text-danger" id="errors">{{$errors->first("read_time")}}</p>
                      </div>
                      <div class="form-group">
                        <label for="category">Category_Name</label>
                        <select name="cat_id" id="" class="form-control">
                            <option value="" class="disable">--Select One--</option>
                            @foreach ($categories as $item)
                            <option value="{{$item->id}}" id="error" {{ $item->id == $article->cat_id ? 'selected' :'' }}>{{$item->name}}</option>
                            @endforeach
                        </select>
                        <p class="text-danger" id="errors">{{$errors->first("cat_id")}}</p>
                      </div>
                      <div class="form-group">
                          <label for="">Image</label>
                          <input type="file" name="image" id="error" class="form-control" onchange="previewImg(this)">
                          <img src="{{asset('image/'.$article->image)}}" alt="" id="imgPreview" width="200" class="img-fluid mt-3">
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

    function previewImg(input){
        let reader = new FileReader();
        reader.readAsBinaryString(input.files[0])

        reader.onload = function() {
            let img = btoa(reader.result); // base64
            let imgPreview = document.querySelector('#imgPreview');
            imgPreview.src = "data:image/jpeg;base64,"+img
        };
        reader.onerror = function() {
            console.log('there are some problems');
        };
    }
  </script>
@endsection
