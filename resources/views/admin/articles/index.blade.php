@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Article Listing</h1>
          </div><!-- /.col -->
          {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="nav-item">
                @auth
                    <a href="{{ route('logout') }}" class="btn btn-success">Logout</a>
                @endauth
                </li>
            </ol>
          </div><!-- /.col --> --}}
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
              @if (Session::get('msg'))
              <div class="alert fade alert-simple alert-primary alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show div" role="alert" id="msg" data-brk-library="component__alert">
                <button type="button" class="close font__size-18" data-dismiss="alert">
                        <span  aria-hidden="true"><i class="fa fa-times alertprimary"></i></span>
                        <span class="sr-only">Close</span>
                      </button>
                <i class="start-icon fa fa-thumbs-up faa-bounce animated"></i>
                {{Session::get('msg')}}
              </div>
            @endif
                <div class="card-body">
                  <a href="{{route('admin.article.create')}}" class="btn btn-success mb-4">Add New + </a>
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Review</td>
                        <td>Category_Name</td>
                        <td>Image</td>
                        <td>Action</td>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i =1;
                        @endphp
                      @foreach ($articles as $item)
                          <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{substr($item->review,0,30)}}</td>
                            <td>{{$item->category->name}}</td>
                            <td>
                              <img src="{{asset('image/'.$item->image)}}" width="100" alt="">
                            </td>
                            <td>
                              <a href="{{ route('admin.article.edit', $item->id) }}"><i class="fas fa fa-edit text-warning "></i></a>
                              <form action="{{route('admin.article.destroy', $item->id)}}" class="d-inline-block" method="post" enctype="multipart/form-data">
                               @csrf  @method("DELETE")
                               <button class="btn"><i class="fas fa fa-trash-alt text-danger"></i></button>
                              </form>
                            </td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
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
   setInterval(() => {
     document.querySelector("#msg").style.display ="none";
   }, 1000);

  </script>
@endsection
